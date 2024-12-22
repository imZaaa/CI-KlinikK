<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    // Fungsi untuk login dengan username dan password
    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Gunakan md5 atau hashing lain sesuai kebutuhan
        $query = $this->db->get('tbl_login'); // Pastikan nama tabel sesuai dengan tabel Anda

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data user
        } else {
            return false; // Jika tidak ada user yang cocok
        }
    }

    // Fungsi untuk mendapatkan user berdasarkan username
    public function get_user_by_username($username, $role) {
        $this->db->where('username', $username);
        $this->db->where('role', $role);
        $query = $this->db->get('tbl_login'); // Pastikan nama tabel sesuai dengan tabel Anda

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data user
        } else {
            return null; // Jika tidak ditemukan user
        }
    }

    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->get('tbl_login')->row();
    }

   // Model Login_model

// Fungsi untuk mengambil user berdasarkan email
public function get_user_by_email($email) {
    $this->db->where('email', $email);
    $query = $this->db->get('tbl_login'); // Ganti dengan nama tabel Anda
    return $query->row(); // Mengembalikan hasil satu baris
}

// Fungsi untuk update password
public function update_password($email, $new_password) {
    $this->db->set('password', $new_password);
    $this->db->where('email', $email);
    $this->db->update('tbl_login'); // Ganti dengan nama tabel Anda
}
}
?>
