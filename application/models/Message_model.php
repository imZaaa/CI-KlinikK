<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_messages()
    {
        $query = $this->db->get('messages'); // Ganti 'messages' dengan nama tabel Anda
        return $query->result_array(); // Mengembalikan data sebagai array
    }

      public function save_message($data) {
        // Simpan pesan ke tabel messages
        $this->db->insert('messages', $data);
    }

    

}
