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
                    'gambar' => $upload_data['file_name'],  // Menyimpan nama file yang diupload
                    'nama_obat' => $this->input->post('nama_obat'),
                    'komposisi' => $this->input->post('komposisi'),
                    'guna_obat' => $this->input->post('guna_obat'),
                    'dosis' => $this->input->post('dosis')
                );
                $this->Obat_model->insert_upload($data);  // Menyimpan data upload ke database
                redirect('obat');  // Redirect ke halaman 'upload' setelah sukses
            } else {
                $error = array('error' => $this->upload->display_errors());  // Menangkap error jika upload gagal
                $this->load->view('admin/createO', $error);  // Memuat tampilan 'create' dengan pesan error
            }
        } else {
            $this->load->view('admin/createO');  // Memuat tampilan 'create' jika form belum disubmit
        }
    }

    // Mengedit upload yang sudah ada
    public function edit($id){
        if ($this->input->post('submit')){  // Mengecek apakah form telah disubmit
            $config['upload_path'] = './assets/';  // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';  // Jenis file yang diperbolehkan (gambar)
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate secara otomatis dengan angka acak
            $this->upload->initialize($config);  // Menginisialisasi library upload dengan konfigurasi di atas

            if ($this->upload->do_upload('gambar')){  // Melakukan upload jika form disubmit
                $upload_data = $this->upload->data();  // Mengambil data file setelah upload berhasil
                $data = array(
                    'gambar' => $upload_data['file_name'],  // Menyimpan nama file yang diupload
                    'nama_obat' => $this->input->post('nama_obat'),
                    'komposisi' => $this->input->post('komposisi'),
                    'guna_obat' => $this->input->post('guna_obat'),
                    'dosis' => $this->input->post('dosis')                );
                $this->Obat_model->update_upload($id, $data);  // Memperbarui data upload yang ada di database
                redirect('obat');  // Redirect ke halaman 'upload' setelah sukses
            }
        } else {
            $data['upload'] = $this->Obat_model->get_upload_by_id($id);  // Mengambil data upload berdasarkan ID
            $this->load->view('admin/editO', $data);  // Memuat tampilan 'edit' dengan data upload yang ada
        }
    }

    // Menghapus upload
    public function delete($id){
        $this->Obat_model->delete_upload($id);  // Menghapus data upload dari database
        redirect('obat');  // Redirect ke halaman 'upload' setelah penghapusan
    }
}
?>