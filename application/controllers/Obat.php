<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Obat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));  // Memuat helper untuk form dan URL (untuk upload dan redirect)
        $this->load->library('upload');             // Memuat library Upload untuk menangani proses upload file
        $this->load->model('Obat_model');         // Memuat model upload_model untuk berinteraksi dengan database
    }

    // Menampilkan semua data upload
    public function index(){
        $data['uploads'] = $this->Obat_model->get_uploads();  // Mengambil data upload dari model
        $this->load->view('admin/dataO', $data);                // Memuat tampilan 'index' dan mengirim data upload ke view
    }
    // public function admin(){
    //     $data['uploads'] = $this->Obat_model->get_uploads();  // Mengambil data upload dari model
    //     $this->load->view('admin/gallery', $data);                // Memuat tampilan 'index' dan mengirim data upload ke view
    // }
    // public function user(){
    //     $data['uploads'] = $this->Gallery_model->get_uploads();  // Mengambil data upload dari model
    //     $this->load->view('user/gallery', $data);                // Memuat tampilan 'index' dan mengirim data upload ke view
    // }



    // Membuat upload baru
    public function create(){
        if ($this->input->post('Submit')){  // Mengecek apakah form telah disubmit
            $config['upload_path'] = './assets/';  // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';  // Jenis file yang diperbolehkan (gambar)
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate secara otomatis dengan angka acak
            $this->upload->initialize($config);  // Menginisialisasi library upload dengan konfigurasi di atas

            if ($this->upload->do_upload('gambar')){  // Melakukan upload jika form disubmit
                $upload_data = $this->upload->data();  // Mengambil data file setelah upload berhasil
                $data = array(
                    'id' => $this->input->post('id'),
                    'gambar' => $upload_data['file_name'],  // Menyimpan nama file yang diupload
                    'nama_obat' => $this->input->post('nama_obat'),
                    'komposisi' => $this->input->post('komposisi'),
                    'guna_obat' => $this->input->post('guna_obat'),
                    'dosis' => $this->input->post('dosis'),
                    'harga' => $this->input->post('harga')
                );
                $this->Obat_model->insert_upload($data);  // Menyimpan data upload ke database
                redirect('obat');  // Redirect ke halaman 'upload' setelah sukses
            } else {
                $error = array('error' => $this->upload->display_errors()); // Menangkap error jika upload gagal
                $id = $this->generate_next_code(); // Tambahkan ID baru jika upload gagal
                $error['id'] = $id;
                $this->load->view('admin/createO', $error);
            }
        } else {
            $id = $this->generate_next_code(); // Generate ID otomatis
            $data['id'] = $id;
            $this->load->view('admin/createO', $data);  // Memuat tampilan 'create' jika form belum disubmit
        }
    }

    private function generate_next_code()
    {
        $latest_code = $this->Obat_model->get_last_id();
        $last_number = (int) substr($latest_code, -4);
        $next_number = $last_number + 1;
        return 'OBT-' . str_pad($next_number, 4, '0', STR_PAD_LEFT);
    }

    // Mengedit upload yang sudah ada
   public function edit($id) {
    if ($this->input->post('Submit')) { // Mengecek apakah form telah disubmit
        $data = array(
            'nama_obat' => $this->input->post('nama_obat'),
            'komposisi' => $this->input->post('komposisi'),
            'guna_obat' => $this->input->post('guna_obat'),
            'dosis' => $this->input->post('dosis'),
            'harga' => $this->input->post('harga'),
        );

        // Mengecek apakah ada file gambar yang diunggah
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './assets/'; // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp'; // Jenis file yang diperbolehkan
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file dengan angka acak
            $this->upload->initialize($config); // Inisialisasi library upload

            if ($this->upload->do_upload('gambar')) { // Jika file berhasil diunggah
                $upload_data = $this->upload->data(); // Mengambil data file yang diunggah
                $data['gambar'] = $upload_data['file_name']; // Menyimpan nama file ke array data
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('obat/edit/' . $id);
            }
        }

        $this->Obat_model->update_upload($id, $data); // Memperbarui data ke database
        redirect('obat'); // Redirect ke halaman 'obat' setelah sukses
    } else {
        $data['upload'] = $this->Obat_model->get_upload_by_id($id); // Mengambil data berdasarkan ID
        $this->load->view('admin/editO', $data); // Memuat tampilan 'edit' dengan data yang ada
    }
}


    // Menghapus upload
    public function delete($id)
    {
        if ($this->Obat_model->delete_obat($id)) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('message', 'Gagal menghapus data!');
        }
        redirect('obat');
    }

}
?>