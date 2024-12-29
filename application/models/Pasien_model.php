<?php
class Pasien_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();  // Memuat library database untuk berinteraksi dengan database
    }

    // Mengambil semua data upload dari tabel 'tbl_pasien'
    public function get_uploads(){
        $query = $this->db->get('tbl_pasien');  // Melakukan query untuk mengambil semua data dari tabel 'tbl_pasien'
        return $query->result_array();  // Mengembalikan hasil query dalam bentuk array objek
    }

    // Menambahkan data upload baru ke dalam tabel 'tbl_pasien'
    public function insert_upload($data){
        // Ambil ID terakhir untuk membuat nomor berurutan
        $this->db->select_max('id');
        $last_id = $this->db->get('tbl_pasien')->row()->id;

        // Tentukan prefix dan buat custom_id
        $prefix = "PAS-"; // Contoh prefix
        $new_id = $last_id + 1; // Tambahkan 1 ke ID terakhir
        $data['id'] = $prefix . str_pad($new_id, 5, '0', STR_PAD_LEFT); // Format: PAS00001

        $this->db->insert('tbl_pasien', $data);  // Melakukan insert data ke tabel 'tbl_pasien'
        return $this->db->insert_id();  // Mengembalikan ID dari data yang baru saja dimasukkan
    }

    // Mengambil data upload berdasarkan ID
   public function get_upload_by_id($id) {
    $query = $this->db->get_where('tbl_pasien', ['id' => $id]);  // Adjust table name as needed
    return $query->row();  // Return the first row as an object
}


    // Memperbarui data upload berdasarkan ID
    public function update_upload($id, $data){
        $this->db->where('id', $id);  // Menambahkan kondisi untuk mencari berdasarkan ID
        $upload = $this->db->get('tbl_pasien')->row();  // Mengambil data upload berdasarkan ID

        // Hapus gambar lama jika ada
        if (isset($upload->foto_pasien) && file_exists('./assets/' . $upload->foto_pasien)) {
            unlink('./assets/' . $upload->foto_pasien);
        }

        $this->db->where('id', $id);  // Menambahkan kondisi untuk memperbarui berdasarkan ID
        $this->db->update('tbl_pasien', $data);  // Melakukan update data di tabel 'tbl_pasien'
    }

    // Menghapus data upload berdasarkan ID
    public function delete_upload($id){
        $this->db->where('id', $id);  // Menambahkan kondisi untuk mencari berdasarkan ID
        $upload = $this->db->get('tbl_pasien')->row();  // Mengambil data upload berdasarkan ID

        // Hapus file gambar jika ada
        if (isset($upload->foto_pasien) && file_exists('./assets/' . $upload->foto_pasien)) {
            unlink('./assets/' . $upload->foto_pasien);
        }

        $this->db->where('id', $id);  // Menambahkan kondisi untuk menghapus berdasarkan ID
        $this->db->delete('tbl_pasien');  // Menghapus data dari tabel 'tbl_pasien'
    }
}
