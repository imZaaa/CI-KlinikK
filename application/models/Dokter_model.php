<?php
class Dokter_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();  // Memuat library database untuk berinteraksi dengan database
    }

    // Mengambil semua data upload dari tabel 'tbl_upload'
    public function get_uploads(){
        $query = $this->db->get('tbl_dokter');  // Melakukan query untuk mengambil semua data dari tabel 'tbl_upload'
        return $query->result_array();  // Mengembalikan hasil query dalam bentuk array objek
    }

    // Menambahkan data upload baru ke dalam tabel 'tbl_upload'
    public function insert_upload($data){
        $this->db->insert('tbl_dokter', $data);  // Melakukan insert data ke tabel 'tbl_upload'
        return $this->db->insert_id();  // Mengembalikan ID dari data yang baru saja dimasukkan
    }

    // Mengambil data upload berdasarkan ID
    public function get_upload_by_id($id){
        $this->db->where('id', $id);  // Menambahkan kondisi untuk mencari berdasarkan ID
        $query = $this->db->get('tbl_dokter');  // Melakukan query untuk mengambil data dari tabel 'tbl_upload'
        return $query->row();  // Mengembalikan satu baris data yang sesuai dengan ID
    }

    // Memperbarui data upload berdasarkan ID
    public function update_upload($id, $data)
{
    $this->db->where('id', $id);
    $this->db->update('tbl_dokter', $data);

    // Mengembalikan true jika ada baris yang diperbarui
    if ($this->db->affected_rows() > 0) {
        return true;
    }
    // Jika tidak ada baris yang diperbarui, cek apakah data memang tidak berubah
    $existing_data = $this->db->get_where('tbl_dokter', ['id' => $id])->row();
    foreach ($data as $key => $value) {
        if ($existing_data->$key !== $value) {
            return false; // Data baru tidak sama dengan data lama, tetapi tidak berhasil diperbarui
        }
    }
    return true; // Data tidak berubah, tetapi dianggap sukses
}


    // Menghapus data upload berdasarkan ID
    public function delete_upload($id){
        $this->db->where('id', $id);  // Menambahkan kondisi untuk mencari berdasarkan ID
        $upload = $this->db->get('tbl_dokter')->row();  // Mengambil data upload berdasarkan ID

        unlink('./assets/' . $upload->gambar);  // Menghapus file gambar yang terkait dengan upload yang dihapus
        $this->db->where('id', $id);  // Menambahkan kondisi untuk menghapus berdasarkan ID
        $this->db->delete('tbl_dokter');  // Menghapus data dari tabel 'tbl_upload'
    }
    
}
?>
