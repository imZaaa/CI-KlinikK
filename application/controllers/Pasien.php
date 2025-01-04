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
   public function create()
{
    if ($this->input->post('submit')) { // Mengecek apakah form telah disubmit
        $config['upload_path'] = './assets/'; // Direktori tempat file akan disimpan
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; // Jenis file yang diperbolehkan (gambar)
        $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate secara otomatis dengan angka acak
        $this->upload->initialize($config); // Menginisialisasi library upload dengan konfigurasi di atas

        if ($this->upload->do_upload('foto_pasien')) { // Melakukan upload jika form disubmit
            $upload_data = $this->upload->data(); // Mengambil data file setelah upload berhasil
            $data = array(
                'id' => $this->input->post('id'),
                'foto_pasien' => $upload_data['file_name'], // Menyimpan nama file yang diupload
                'nama' => $this->input->post('nama'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'goldar' => $this->input->post('goldar'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'riwayat_penyakit' => $this->input->post('riwayat_penyakit')
            );
            $this->Pasien_model->insert_upload($data); // Menyimpan data pasien ke database
            redirect('Pasien/index'); // Redirect ke halaman data pasien setelah sukses
        } else {
            $error = array('error' => $this->upload->display_errors()); // Menangkap error jika upload gagal
            $id = $this->generate_next_code(); // Tambahkan ID baru jika upload gagal
            $error['id'] = $id;
            $this->load->view('admin/createP', $error); // Memuat tampilan 'create' dengan pesan error
        }
    } else {
        $id = $this->generate_next_code(); // Generate ID otomatis
        $data['id'] = $id;
        $this->load->view('admin/createP', $data); // Kirimkan data ID ke view
    }
}


    private function generate_next_code()
    {
        $latest_code = $this->Pasien_model->get_last_id();
        $last_number = (int) substr($latest_code, -4);
        $next_number = $last_number + 1;
        return 'PSN-' . str_pad($next_number, 4, '0', STR_PAD_LEFT);
    }

    // Mengedit data pasien
    public function edit($id) {
    if ($this->input->post('Submit')) { // Mengecek apakah form telah disubmit
        // Array data default
        $data = array(
            'nama' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'goldar' => $this->input->post('goldar'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit')
        );

        // Mengecek apakah ada file gambar yang diunggah
        if (!empty($_FILES['foto_pasien']['name'])) {
            $config['upload_path'] = './assets/'; // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; // Jenis file yang diperbolehkan
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate otomatis
            $this->upload->initialize($config); // Inisialisasi library upload

            if ($this->upload->do_upload('foto_pasien')) { // Jika upload berhasil
                $upload_data = $this->upload->data(); // Mengambil data file yang diunggah
                $data['foto_pasien'] = $upload_data['file_name']; // Tambahkan nama file ke array data
            } else {
                // Jika upload gagal, set pesan error dan redirect ke halaman edit
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('pasien/edit/' . $id);
            }
        }

        // Memperbarui data pasien di database
        $this->Pasien_model->update_upload($id, $data);
        redirect('pasien'); // Redirect ke halaman 'pasien' setelah sukses
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
   public function delete($id)
    {
        if ($this->Pasien_model->delete_pasien($id)) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('message', 'Gagal menghapus data!');
        }
        redirect('pasien');
    }


}
?>
