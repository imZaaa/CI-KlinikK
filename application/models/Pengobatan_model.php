<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengobatan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Mendapatkan semua pengobatan lengkap dengan data pasien, penyakit, dan obat
    public function get_all() {
        $this->db->select('p.id_pengobatan, p.tgl_pengobatan, p.biaya_pengobatan, p.status_bayar, pasien.nama AS nama_pasien, GROUP_CONCAT(penyakit.nama_penyakit SEPARATOR ", ") AS penyakit, GROUP_CONCAT(obat.nama_obat SEPARATOR ", ") AS obat');
        $this->db->from('tbl_pengobatan p');
        $this->db->join('tbl_pasien pasien', 'p.id_pasien = pasien.id');
        $this->db->join('tbl_pengobatan_penyakit pp', 'p.id_pengobatan = pp.id_pengobatan');
        $this->db->join('tbl_penyakit penyakit', 'pp.id_penyakit = penyakit.id');
        $this->db->join('tbl_pengobatan_obat po', 'p.id_pengobatan = po.id_pengobatan');
        $this->db->join('tbl_obat obat', 'po.id_obat = obat.id');
        $this->db->group_by('p.id_pengobatan');  // Group by pengobatan untuk menggabungkan data penyakit dan obat
        return $this->db->get()->result_array();
    }

    // Menambahkan pengobatan baru ke database
    public function insert_pengobatan($data) {
        return $this->db->insert('tbl_pengobatan', $data);
    }

    // Menghapus data pengobatan berdasarkan id
    public function delete($id) {
        // Hapus relasi dari tabel pengobatan_penyakit dan pengobatan_obat sebelum menghapus pengobatan
        $this->db->where('id_pengobatan', $id);
        $this->db->delete('tbl_pengobatan_penyakit');
        $this->db->where('id_pengobatan', $id);
        $this->db->delete('tbl_pengobatan_obat');
        
        // Sekarang hapus pengobatan
        $this->db->where('id_pengobatan', $id);
        return $this->db->delete('tbl_pengobatan');
    }

    // Update pengobatan berdasarkan id
    public function update_pengobatan($id, $data) {
        $this->db->where('id_pengobatan', $id);
        return $this->db->update('tbl_pengobatan', $data);
    }

    // Mendapatkan detail pengobatan berdasarkan id
    public function get_pengobatan_by_id($id) {
        $this->db->select('p.*, pasien.nama AS nama_pasien, penyakit.nama_penyakit, obat.nama_obat');
        $this->db->from('tbl_pengobatan p');
        $this->db->join('tbl_pasien pasien', 'p.id_pasien = pasien.id');
        $this->db->join('tbl_penyakit penyakit', 'p.id_penyakit = penyakit.id');
        $this->db->join('tbl_obat obat', 'p.id_obat = obat.id');
        $this->db->where('p.id_pengobatan', $id);
        return $this->db->get()->row();
    }

    // Mendapatkan daftar penyakit terkait pengobatan
    public function get_penyakit_by_pengobatan($id) {
        $this->db->select('penyakit.nama_penyakit');
        $this->db->from('tbl_pengobatan_penyakit pp');
        $this->db->join('tbl_penyakit penyakit', 'pp.id_penyakit = penyakit.id');
        $this->db->where('pp.id_pengobatan', $id);
        return $this->db->get()->result_array();
    }

    // Mendapatkan daftar obat terkait pengobatan
    public function get_obat_by_pengobatan($id) {
        $this->db->select('obat.nama_obat');
        $this->db->from('tbl_pengobatan_obat po');
        $this->db->join('tbl_obat obat', 'po.id_obat = obat.id');
        $this->db->where('po.id_pengobatan', $id);
        return $this->db->get()->result_array();
    }
}
