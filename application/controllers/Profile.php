<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    // Halaman About Us untuk User
    public function user()
{
    // Ambil data terbaru dari database
    $data['about_us'] = $this->Profile_model->get_about();

    // Pastikan data terkirim
    if (empty($data['about_us'])) {
        $data['error'] = 'Data About Us tidak ditemukan!';
    }

    // Tampilkan alert jika ada pesan
    $data['success'] = $this->session->flashdata('success');
    $data['error'] = $this->session->flashdata('error');

    // Load view dengan data
    $this->load->view('user/about', $data);
}

   public function admin()
    {
        $data['about_us'] = $this->Profile_model->get_about();
        $this->load->view('admin/profile', $data);
    }
    // Halaman About Us untuk Admin
 public function update()
{
    $this->load->library('upload');
    $config['upload_path']   = './assets/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['max_size']      = 2048; // Maksimal 2MB
    $config['encrypt_name']  = TRUE; // Enkripsi nama file
    
    $this->upload->initialize($config);

    $data_update = [
        'deskripsi1' => $this->input->post('deskripsi1'),
        'visi' => $this->input->post('visi'),
        'misi' => $this->input->post('misi'),
        'id' => 1 // Pastikan id ada
    ];

    // Proses Upload File Gambar
    if (!empty($_FILES['gambar1']['name'])) {
        if ($this->upload->do_upload('gambar1')) {
            $upload_data = $this->upload->data();
            $data_update['gambar1'] = $upload_data['file_name'];
        } else {
            $error = $this->upload->display_errors();
            log_message('error', $error);
            $this->session->set_flashdata('error', $error);
            redirect('profile/admin');
        }
    }

    // Log data yang dikirim ke model
    log_message('debug', 'Data Update: ' . print_r($data_update, true));

    // Simpan Data ke Database
    $this->load->model('Profile_model');
    if ($this->Profile_model->update_about($data_update)) {
        $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
    } else {
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        log_message('error', 'Update failed. Data: ' . print_r($data_update, true));
    }

    redirect('profile/admin');
}


}
