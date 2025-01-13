<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Mengambil data 'About Us' dari tabel 'tbl_profile'.
     * @return array Data 'About Us' dalam bentuk array asosiatif.
     */
    public function get_about()
    {
        $query = $this->db->get('tbl_profile'); // Ambil semua data dari tabel 'tbl_profile'
        return $query->row_array(); // Mengembalikan hasil sebagai array asosiatif (baris pertama)
    }

    /**
     * Mengambil nilai tertentu berdasarkan kunci (key).
     * @param string $key Nama kolom/kunci yang ingin diambil.
     * @return string|null Nilai dari kolom tersebut, atau null jika tidak ditemukan.
     */
    public function get_value($key)
    {
        $this->db->select('value'); // Ambil hanya kolom 'value'
        $this->db->from('tbl_profile'); // Dari tabel 'tbl_profile'
        $this->db->where('key', $key); // Berdasarkan key
        $query = $this->db->get();
        $result = $query->row();
        return $result ? $result->value : null; // Mengembalikan nilai atau null jika tidak ditemukan
    }

    /**
     * Memperbarui nilai tertentu berdasarkan kunci (key).
     * @param string $key Nama kolom/kunci yang akan diperbarui.
     * @param string $value Nilai baru untuk kunci tersebut.
     * @return void
     */
    public function update_value($key, $value)
    {
        $this->db->where('key', $key); // Cari berdasarkan key
        $this->db->update('tbl_profile', ['value' => $value]); // Perbarui kolom 'value'
    }

    /**
     * Memperbarui data lengkap 'About Us'.
     * @param array $data Data baru untuk diupdate, berupa key-value pair.
     * @return void
     */
    public function update_about($data)
    {
        foreach ($data as $key => $value) {
            $this->db->where('key', $key);
            $this->db->update('tbl_profile', ['value' => $value]);
        }
    }
}
