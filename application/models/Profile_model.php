<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Pastikan database terhubung
    }

    /**
     * Mengambil data 'About Us' dari tabel 'tbl_profile'.
     * @return array|null Data 'About Us' dalam bentuk array asosiatif, atau null jika tidak ada.
     */
    public function get_about()
    {
        $query = $this->db->get_where('tbl_profile', ['id' => 1]);  // Asumsikan ID adalah 1
        return $query->row_array();
    }

    /**
     * Memperbarui data lengkap 'About Us'.
     * @param array $data Data baru untuk diupdate, berupa key-value pair.
     * @return bool True jika berhasil, False jika gagal.
     */
    public function update_about($data)
    {
        if (isset($data['id'])) {
            // Periksa apakah ada perubahan gambar
            if (empty($data['gambar1'])) {
                // Jika gambar tidak diubah, kita bisa hapus key gambar1 untuk tetap mempertahankan gambar lama
                unset($data['gambar1']);
            }
            
            // Update data tanpa mengganti gambar jika tidak ada gambar baru
            $this->db->where('id', $data['id']);
            $this->db->update('tbl_profile', $data);

            // Cek apakah ada perubahan
            if ($this->db->affected_rows() > 0) {
                return true; // Update berhasil
            } else {
                return false; // Tidak ada perubahan
            }
        }
        return false; // ID tidak ada
    }
}
