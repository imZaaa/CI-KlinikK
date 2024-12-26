<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Dokter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));  // Memuat helper untuk form dan URL (untuk upload dan redirect)
        $this->load->library('upload');             // Memuat library Upload untuk menangani proses upload file
        $this->load->model('Dokter_model');         // Memuat model upload_model untuk berinteraksi dengan database
    }

    // Menampilkan semua data upload
    public function admin(){
        $data['uploads'] = $this->Dokter_model->get_uploads();  // Mengambil data upload dari model
        $this->load->view('admin/dokter', $data);                // Memuat tampilan 'index' dan mengirim data upload ke view
    }
    public function user(){
        $data['uploads'] = $this->Dokter_model->get_uploads();  // Mengambil data upload dari model
        $this->load->view('user/dokter', $data);                // Memuat tampilan 'index' dan mengirim data upload ke view
    }



    // Membuat upload baru
    public function create(){
        if ($this->input->post('Submit')){  // Mengecek apakah form telah disubmit
            $config['upload_path'] = './assets/';  // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png|jpeg';  // Jenis file yang diperbolehkan (gambar)
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate secara otomatis dengan angka acak
            $this->upload->initialize($config);  // Menginisialisasi library upload dengan konfigurasi di atas

            if ($this->upload->do_upload('gambar')){  // Melakukan upload jika form disubmit
                $upload_data = $this->upload->data();  // Mengambil data file setelah upload berhasil
                $data = array(
                    'gambar' => $upload_data['file_name'],  // Menyimpan nama file yang diupload
                    'nama' => $this->input->post('nama'),
                    'spesialis' => $this->input->post('spesialis'),
                    'jadwal' => $this->input->post('jadwal')
                );
                $this->Dokter_model->insert_upload($data);  // Menyimpan data upload ke database
                redirect('dokter/admin');  // Redirect ke halaman 'upload' setelah sukses
            } else {
                $error = array('error' => $this->upload->display_errors());  // Menangkap error jika upload gagal
                $this->load->view('admin/createD', $error);  // Memuat tampilan 'create' dengan pesan error
            }
        } else {
            $this->load->view('admin/createD');  // Memuat tampilan 'create' jika form belum disubmit
        }
    }

    // Mengedit upload yang sudah ada
    public function edit($id){
        if ($this->input->post('Submit')){  // Mengecek apakah form telah disubmit
            $config['upload_path'] = './assets/';  // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png';  // Jenis file yang diperbolehkan (gambar)
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate secara otomatis dengan angka acak
            $this->upload->initialize($config);  // Menginisialisasi library upload dengan konfigurasi di atas

            if ($this->upload->do_upload('gambar')){  // Melakukan upload jika form disubmit
                $upload_data = $this->upload->data();  // Mengambil data file setelah upload berhasil
                $data = array(
                    'gambar' => $upload_data['file_name'],  // Menyimpan nama file yang diupload
                    'nama' => $this->input->post('nama'),
                    'spesialis' => $this->input->post('spesialis'),
                    'jadwal' => $this->input->post('jadwal')
                );
                $this->Dokter_model->update_upload($id, $data);  // Memperbarui data upload yang ada di database
                redirect('dokter/admin');  // Redirect ke halaman 'upload' setelah sukses
            }
        } else {
            $data['upload'] = $this->Dokter_model->get_upload_by_id($id);  // Mengambil data upload berdasarkan ID
            $this->load->view('admin/editD', $data);  // Memuat tampilan 'edit' dengan data upload yang ada
        }
    }

    // Menghapus upload
    public function delete($id){
        $this->Dokter_model->delete_upload($id);  // Menghapus data upload dari database
        redirect('dokter/admin');  // Redirect ke halaman 'upload' setelah penghapusan
    }
}
?>