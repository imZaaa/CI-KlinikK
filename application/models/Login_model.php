<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    // Fungsi untuk login dengan username dan password
    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Password langsung dibandingkan
        $query = $this->db->get('tbl_login'); // Pastikan nama tabel sesuai dengan tabel Anda

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data user jika login berhasil
        }
        return false; // Jika tidak ada user yang cocok
    }

    // Fungsi untuk mendapatkan user berdasarkan username
    public function get_user_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('tbl_login'); // Pastikan nama tabel sesuai dengan tabel Anda
        return $query->row(); // Mengembalikan satu baris data user
    }

    // Fungsi untuk mendapatkan user berdasarkan ID
    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->get('tbl_login')->row(); // Mengembalikan satu baris data user
    }

    // Fungsi untuk mengambil semua user
    public function get_all_users() {
        $query = $this->db->get('tbl_login'); // Mengambil semua data dari tabel
        return $query->result(); // Mengembalikan array objek data user
    }

    // Fungsi untuk menambah user baru
    public function create_user($data) {
        return $this->db->insert('tbl_login', $data); // Menyisipkan data baru ke tabel
    }

    // Fungsi untuk menghapus user berdasarkan ID
    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_login'); // Menghapus data dari tabel
    }

    // Fungsi untuk memperbarui data user
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_login', $data); // Memperbarui data user berdasarkan ID
    }

    // Fungsi untuk mengambil user berdasarkan email
    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('tbl_login'); // Pastikan nama tabel sesuai
        return $query->row(); // Mengembalikan satu baris data user
    }

    // Fungsi untuk update password
    public function update_password($email, $new_password) {
        $this->db->set('password', $new_password); // Password langsung disimpan
        $this->db->where('email', $email);
        $this->db->update('tbl_login'); // Memperbarui password di tabel
    }



}
?>
