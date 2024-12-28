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

    // Fungsi untuk mendapatkan user berdasarkan ID dengan prefix
    public function get_user_by_id($user_id) {
        // Menambahkan logika untuk mendeteksi prefix
        $prefix = substr($user_id, 0, 3); // Menangkap prefix pertama (ADM atau USR)
        
        // Memeriksa apakah ID sesuai dengan prefix yang diharapkan
        if ($prefix === 'ADM' || $prefix === 'USR') {
            $this->db->where('id', $user_id);
            return $this->db->get('tbl_login')->row(); // Mengembalikan satu baris data user
        }
        return false; // Jika prefix tidak sesuai
    }

    // Fungsi untuk mengambil semua user
    public function get_all_users() {
        $query = $this->db->get('tbl_login'); // Mengambil semua data dari tabel
        return $query->result(); // Mengembalikan array objek data user
    }

    // Fungsi untuk menambah user baru dengan ID yang memiliki prefix
    public function create_user($data) {
        // Menambahkan prefix ID
        if ($data['role'] === 'admin') {
            $data['id'] = 'ADM-' . uniqid(); // Prefix ADM untuk admin
        } else {
            $data['id'] = 'USR-' . uniqid(); // Prefix USR untuk user biasa
        }
        return $this->db->insert('tbl_login', $data); // Menyisipkan data baru ke tabel
    }

    // Fungsi untuk menghapus user berdasarkan ID
    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_login'); // Menghapus data dari tabel
    }

    // Fungsi untuk memperbarui data user
    public function update_user($id, $data) {
        // Menambahkan logika untuk memeriksa prefix pada ID
        if (substr($id, 0, 3) === 'ADM' || substr($id, 0, 3) === 'USR') {
            $this->db->where('id', $id);
            return $this->db->update('tbl_login', $data); // Memperbarui data user berdasarkan ID
        }
        return false; // Jika prefix ID tidak valid
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
