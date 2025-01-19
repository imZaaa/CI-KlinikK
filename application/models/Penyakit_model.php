<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit_model extends CI_Model {

    // Mendapatkan semua data penyakit
    public function get_all_penyakit() {
    $query = $this->db->get('tbl_penyakit');
    return $query->result(); // Mengembalikan array objek stdClass
}


    // Menambahkan penyakit baru
   public function insert_penyakit($data) {
    // Ambil ID terakhir dari database untuk menentukan ID berikutnya
    $this->db->select_max('id');
    $query = $this->db->get('tbl_penyakit');
    $last_id = $query->row()->id;

    // Tentukan ID berikutnya, mulai dari PSN-0001 jika belum ada data
    if (!$last_id) {
        $next_id = 'PKT-0001';
    } else {
        // Ambil angka terakhir dari ID terakhir (misalnya PSN-0005 menjadi PSN-0006)
        $last_number = (int) substr($last_id, 4);
        $next_id = 'PKT-' . str_pad($last_number + 1, 4, '0', STR_PAD_LEFT);
    }

    // Masukkan ID ke dalam data
    $data['id'] = $next_id;

    // Masukkan data ke dalam database
    $this->db->insert('tbl_penyakit', $data);

    return $this->db->insert_id();  // Mengembalikan ID yang baru saja dimasukkan
}

    // Mendapatkan data penyakit berdasarkan ID
    public function get_penyakit_by_id($id) {
        return $this->db->get_where('tbl_penyakit', ['id' => $id])->row();
    }

     public function get_last_id() {
        $this->db->select('id');
        $this->db->from('tbl_penyakit');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id;  // Mengembalikan ID terakhir
        } else {
            return 'PKT-0000'; // Default ID jika belum ada data
        }
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
