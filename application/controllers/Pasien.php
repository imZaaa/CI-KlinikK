<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Pasien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));  // Memuat helper untuk form dan URL (untuk upload dan redirect)
        $this->load->library('upload');             // Memuat library Upload untuk menangani proses upload file
        $this->load->model('Pasien_model');         // Memuat model Pasien_model untuk berinteraksi dengan database
    }

    // Menampilkan semua data pasien
    public function index(){
        $data['uploads'] = $this->Pasien_model->get_uploads();  // Mengambil data pasien dari model
        $this->load->view('admin/dataP', $data);   
    }

    // Membuat upload baru
    public function create(){
        if ($this->input->post('submit')){  // Mengecek apakah form telah disubmit
            $config['upload_path'] = './assets/';  // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png|jpeg';  // Jenis file yang diperbolehkan (gambar)
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate secara otomatis dengan angka acak
            $this->upload->initialize($config);  // Menginisialisasi library upload dengan konfigurasi di atas

            if ($this->upload->do_upload('foto_pasien')){  // Melakukan upload jika form disubmit
                $upload_data = $this->upload->data();  // Mengambil data file setelah upload berhasil
                $data = array(
                    'foto_pasien' => $upload_data['file_name'],  // Menyimpan nama file yang diupload
                    'nama' => $this->input->post('nama'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'goldar' => $this->input->post('goldar'),
                    'nomor_telepon' => $this->input->post('nomor_telepon'),
                    'riwayat_penyakit' => $this->input->post('riwayat_penyakit')
                );
                $this->Pasien_model->insert_upload($data);  // Menyimpan data pasien ke database
                redirect('Pasien/index');  // Redirect ke halaman data pasien setelah sukses
            } else {
                $error = array('error' => $this->upload->display_errors());  // Menangkap error jika upload gagal
                $this->load->view('admin/createP', $error);  // Memuat tampilan 'create' dengan pesan error
            }
        } else {
            $this->load->view('admin/createP');  // Memuat tampilan 'create' jika form belum disubmit
        }
    }

    // Mengedit data pasien
    public function edit($id){
        if ($this->input->post('Submit')){  // Mengecek apakah form telah disubmit
            // Mengatur konfigurasi upload gambar
            $config['upload_path'] = './assets/';  // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png|jpeg';  // Jenis file yang diperbolehkan (gambar)
            $config['file_name'] = 'upload_' . rand(1, 1000);  // Nama file di-generate secara otomatis dengan angka acak
            $this->upload->initialize($config);  // Menginisialisasi library upload dengan konfigurasi di atas

            // Memeriksa apakah ada file gambar yang di-upload
            if ($this->upload->do_upload('foto_pasien')){  // Melakukan upload jika form disubmit
                $upload_data = $this->upload->data();  // Mengambil data file setelah upload berhasil
                $data = array(
                    'foto_pasien' => $upload_data['file_name'],  // Menyimpan nama file yang diupload
                    'nama' => $this->input->post('nama'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'goldar' => $this->input->post('goldar'),
                    'nomor_telepon' => $this->input->post('nomor_telepon'),
                    'riwayat_penyakit' => $this->input->post('riwayat_penyakit')
                );
            } else {
                // Jika tidak ada file gambar yang diupload, gunakan data lama
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'goldar' => $this->input->post('goldar'),
                    'nomor_telepon' => $this->input->post('nomor_telepon'),
                    'riwayat_penyakit' => $this->input->post('riwayat_penyakit')
                );
            }

            // Memperbarui data pasien di database
            $this->Pasien_model->update_upload($id, $data);  
            redirect('pasien');  // Redirect ke halaman 'pasien' setelah sukses
        } else {
            // Ambil data pasien berdasarkan ID
            $data['upload'] = $this->Pasien_model->get_upload_by_id($id);
            
            // Jika data pasien tidak ditemukan, tampilkan halaman 404
            if (empty($data['upload'])) {
                show_404();
            }

            // Memuat tampilan 'editP' dengan data pasien
            $this->load->view('admin/editP', $data);
        }
    }

    // Menghapus data pasien
    public function delete($id){
        $this->Pasien_model->delete_upload($id);  // Menghapus data pasien dari database
        redirect('Pasien/index');  // Redirect ke halaman data pasien setelah penghapusan
    }
}
?>
