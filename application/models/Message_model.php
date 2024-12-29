<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

     // Fungsi untuk mengambil pesan
    public function get_data() {
        return $this->db->get('messages')->result(); // Ambil semua pesan dari tabel messages
    }

    // Fungsi untuk menyimpan pesan
    public function save_message($data) {
        $this->db->insert('messages', $data); // Menyimpan data ke tabel messages
    }

    // Fungsi untuk mengambil pesan (untuk admin)
    public function get_messages() {
        return $this->db->get('messages')->result(); // Ambil pesan dari tabel messages
    }
}
