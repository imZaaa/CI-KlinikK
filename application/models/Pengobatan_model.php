<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengobatan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Mendapatkan semua pengobatan lengkap dengan data pasien, penyakit, dan obat
    public function get_all() {
    $this->db->select('tbl_pengobatan.id_pengobatan, tbl_pasien.id AS id_pasien, tbl_pasien.nama AS nama_pasien, tbl_penyakit.nama_penyakit, tbl_obat.id AS id_obat, tbl_dokter.nama AS nama_dokter, tbl_pengobatan.tgl_pengobatan, tbl_pengobatan.biaya_pengobatan, tbl_pengobatan.status_bayar, tbl_pengobatan.tarif, tbl_pengobatan.total_biaya');
    $this->db->from('tbl_pengobatan');
    $this->db->join('tbl_pasien', 'tbl_pasien.id = tbl_pengobatan.id_pasien');
    $this->db->join('tbl_penyakit', 'tbl_penyakit.id = tbl_pengobatan.id_penyakit');
    $this->db->join('tbl_obat', 'tbl_obat.id = tbl_pengobatan.id_obat', 'left');
    $this->db->join('tbl_dokter', 'tbl_dokter.id = tbl_pengobatan.id_dokter');
    $query = $this->db->get();

    // Pastikan query menghasilkan hasil yang benar
    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return []; // Kembalikan array kosong jika tidak ada data
    }
}


    // Menambahkan pengobatan baru ke database
   public function insert_pengobatan($data_pengobatan)
{
    $this->db->insert('tbl_pengobatan', $data_pengobatan);
    return $this->db->insert_id();
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
        $this->db->select('tbl_penyakit.nama_penyakit');
        $this->db->from('tbl_pengobatan_penyakit pp');
        $this->db->join('tbl_penyakit tbl_penyakit', 'pp.id_penyakit = tbl_penyakit.id');
        $this->db->where('pp.id_pengobatan', $id);
        return $this->db->get()->result_array();
    }

    // Mendapatkan daftar obat terkait pengobatan
    public function get_obat_by_pengobatan($id) {
        $this->db->select('tbl_obat.nama_obat');
        $this->db->from('tbl_pengobatan_obat po');
        $this->db->join('tbl_obat obat', 'po.id_obat = obat.id');
        $this->db->where('po.id_pengobatan', $id);
        return $this->db->get()->result_array();
    }
  public function insert_penyakit_to_pengobatan($id_pengobatan, $id_penyakit) {
    $data = [
        'id_pengobatan' => $id_pengobatan,
        'id_penyakit' => $id_penyakit
    ];
    $this->db->insert('tbl_pengobatan_penyakit', $data);
}

public function insert_obat_to_pengobatan($id_pengobatan, $id_obat) {
    $data = [
        'id_pengobatan' => $id_pengobatan,
        'id_obat' => $id_obat
    ];
    $this->db->insert('tbl_pengobatan_obat', $data);
}

public function get_tarif($id)
{
    // Query untuk mendapatkan tarif berdasarkan ID pengobatan
    $this->db->select('tarif');
    $this->db->from('tbl_dokter');
    $this->db->where('id', $id);
    $query = $this->db->get();

    // Memeriksa apakah data ditemukan
    if ($query->num_rows() > 0) {
        // Mengembalikan tarif yang ditemukan
        return $query->row_array()['tarif'];
    } else {
        // Jika tidak ditemukan, mengembalikan null atau nilai default
        return null;
    }
}


}
?>