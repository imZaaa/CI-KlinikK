<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resep_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Mengambil semua data resep dengan join
    public function get_all()
    {
        $this->db->select('r.*, p.tgl_pengobatan, o.nama_obat');
        $this->db->from('tbl_resep r');
        $this->db->join('tbl_pengobatan p', 'r.id_pengobatan = p.id_pengobatan');
        $this->db->join('tbl_obat o', 'r.id_obat = o.id');
        return $this->db->get()->result_array();
    }

    // Menambahkan data resep baru
    public function insert($data)
    {
        return $this->db->insert('tbl_resep', $data);
    }

    // Mengambil data resep berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tbl_resep', ['id_resep' => $id])->row_array();
    }

    // Memperbarui data resep berdasarkan ID
    public function update($id, $data)
    {
        $this->db->where('id_resep', $id);
        return $this->db->update('tbl_resep', $data);
    }

    // Menghapus data resep berdasarkan ID
    public function delete($id)
    {
        $this->db->where('id_resep', $id);
        return $this->db->delete('tbl_resep');
    }
}
