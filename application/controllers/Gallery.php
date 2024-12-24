<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Gallery extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));  // Memuat helper untuk form dan URL (untuk upload dan redirect)
        $this->load->library('upload');             // Memuat library Upload untuk menangani proses upload file
        $this->load->model('Gallery_model');         // Memuat model upload_model untuk berinteraksi dengan database
    }

    // Menampilkan semua data upload
    public function index(){
        $data['uploads'] = $this->Gallery_model->get_uploads();  // Mengambil data upload dari model
        $this->load->view('admin/gallery', $data);                // Memuat tampilan 'index' dan mengirim data upload ke view
    }

    // Membuat upload baru
    public function create(){
        if ($this->input->post('submit')){  // Mengecek apakah form telah disubmit
            $config['upload_path'] = './assets/';  // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png';  // Jenis file yang diperbolehkan (gambar)
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate secara otomatis dengan angka acak
            $this->upload->initialize($config);  // Menginisialisasi library upload dengan konfigurasi di atas

            if ($this->upload->do_upload('gambar')){  // Melakukan upload jika form disubmit
                $upload_data = $this->upload->data();  // Mengambil data file setelah upload berhasil
                $data = array(
                    'gambar' => $upload_data['file_name'],  // Menyimpan nama file yang diupload
                    'deskripsi' => $this->input->post('deskripsi')
                );
                $this->Gallery_model->insert_upload($data);  // Menyimpan data upload ke database
                redirect('gallery');  // Redirect ke halaman 'upload' setelah sukses
            } else {
                $error = array('error' => $this->upload->display_errors());  // Menangkap error jika upload gagal
                $this->load->view('admin/create', $error);  // Memuat tampilan 'create' dengan pesan error
            }
        } else {
            $this->load->view('admin/create');  // Memuat tampilan 'create' jika form belum disubmit
        }
    }

    // Mengedit upload yang sudah ada
    public function edit($id){
        if ($this->input->post('submit')){  // Mengecek apakah form telah disubmit
            $config['upload_path'] = './assets/';  // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png';  // Jenis file yang diperbolehkan (gambar)
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate secara otomatis dengan angka acak
            $this->upload->initialize($config);  // Menginisialisasi library upload dengan konfigurasi di atas

            if ($this->upload->do_upload('gambar')){  // Melakukan upload jika form disubmit
                $upload_data = $this->upload->data();  // Mengambil data file setelah upload berhasil
                $data = array(
                    'gambar' => $upload_data['file_name'],  // Menyimpan nama file yang diupload
                    'deskripsi' => $this->input->post('deskripsi')
                );
                $this->Gallery_model->update_upload($id, $data);  // Memperbarui data upload yang ada di database
                redirect('gallery');  // Redirect ke halaman 'upload' setelah sukses
            }
        } else {
            $data['upload'] = $this->Gallery_model->get_upload_by_id($id);  // Mengambil data upload berdasarkan ID
            $this->load->view('admin/edit', $data);  // Memuat tampilan 'edit' dengan data upload yang ada
        }
    }

    // Menghapus upload
    public function delete($id){
        $this->Gallery_model->delete_upload($id);  // Menghapus data upload dari database
        redirect('gallery');  // Redirect ke halaman 'upload' setelah penghapusan
    }
}
?>