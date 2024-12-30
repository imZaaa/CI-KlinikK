<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit_model extends CI_Model {

    // Mendapatkan semua data penyakit
    public function get_all_penyakit() {
        return $this->db->get('tbl_penyakit')->result();
    }

    // Menambahkan penyakit baru
    public function insert_penyakit($data) {
        return $this->db->insert('tbl_penyakit', $data);
    }

    // Mendapatkan data penyakit berdasarkan ID
    public function get_penyakit_by_id($id) {
        return $this->db->get_where('tbl_penyakit', ['id' => $id])->row();
    }

    // Memperbarui data penyakit
    public function update_penyakit($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_penyakit', $data);
    }

    // Menghapus data penyakit
    public function delete_penyakit($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_penyakit');
    }
}
?>
