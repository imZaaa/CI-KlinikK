<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    // Fungsi untuk login
    public function login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_login'); // Pastikan nama tabel sesuai dengan tabel Anda

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data user
        } else {
            return false; // Jika tidak ada user yang cocok
        }
    }

    // Fungsi untuk mendapatkan user berdasarkan email
    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('tbl_login'); // Pastikan nama tabel sesuai dengan tabel Anda

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data user
        } else {
            return null; // Jika tidak ditemukan user
        }
    }
}
?>
