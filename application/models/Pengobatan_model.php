<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengobatan_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all() {
        $this->db->select('p.*, pasien.nama, penyakit.nama_penyakit, obat.nama_obat');
        $this->db->from('tbl_pengobatan p');
        $this->db->join('tbl_pasien pasien', 'p.id_pasien = pasien.id');
        $this->db->join('tbl_penyakit penyakit', 'p.id_penyakit = penyakit.id');
        $this->db->join('tbl_obat obat', 'p.id_obat = obat.id');
        return $this->db->get()->result_array();
    }

    public function insert_pengobatan($data) {
        return $this->db->insert('tbl_pengobatan', $data); // Menyimpan data ke tabel tbl_pengobatan
    }

    public function delete($id) {
        $this->db->where('id_pengobatan', $id);
        $this->db->delete('tbl_pengobatan');
    }
}
