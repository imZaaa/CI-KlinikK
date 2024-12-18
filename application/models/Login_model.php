<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk verifikasi login
    public function login($email, $password) {
        // Query untuk mencari pengguna berdasarkan email
        $this->db->where('email', $email);
        $query = $this->db->get('tbl_login');

        if ($query->num_rows() > 0) {
            $user = $query->row();

            // Verifikasi password
            if (password_verify($password, $user->password)) {
                return $user; // Jika berhasil, return data user
            }
        }

        return FALSE; // Jika gagal, return false
    }
}
