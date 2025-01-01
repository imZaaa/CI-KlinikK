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
   public function insert_upload($data) {
    // Ambil ID terakhir dari database untuk menentukan ID berikutnya
    $this->db->select_max('id');
    $query = $this->db->get('tbl_pasien');
    $last_id = $query->row()->id;

    // Tentukan ID berikutnya, mulai dari PSN-0001 jika belum ada data
    if (!$last_id) {
        $next_id = 'PSN-0001';
    } else {
        // Ambil angka terakhir dari ID terakhir (misalnya PSN-0005 menjadi PSN-0006)
        $last_number = (int) substr($last_id, 4);
        $next_id = 'PSN-' . str_pad($last_number + 1, 4, '0', STR_PAD_LEFT);
    }

    // Masukkan ID ke dalam data
    $data['id'] = $next_id;

    // Masukkan data ke dalam database
    $this->db->insert('tbl_pasien', $data);

    return $this->db->insert_id();  // Mengembalikan ID yang baru saja dimasukkan
}


    // Mengambil data upload berdasarkan ID
   public function get_upload_by_id($id){
        $this->db->where('id', $id);  // Menambahkan kondisi untuk mencari berdasarkan ID
        $query = $this->db->get('tbl_pasien');  // Melakukan query untuk mengambil data dari tabel 'tbl_upload'
        return $query->row();  // Mengembalikan satu baris data yang sesuai dengan ID
    }

      public function get_last_id() {
        $this->db->select('id');
        $this->db->from('tbl_pasien');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id;  // Mengembalikan ID terakhir
        } else {
            return 'PSN-0000'; // Default ID jika belum ada data
        }
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
      public function delete_pasien($id) {
        $this->db->where('id', $id);
        if (!$this->db->delete('tbl_pasien')) {
            return false; // Return false if deletion fails
        }
        return true;
    }
}
