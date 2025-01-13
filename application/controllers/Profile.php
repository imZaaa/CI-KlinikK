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
        // Ambil data 'About Us' dari model
        $data['about_us'] = $this->Profile_model->get_about();

        // Load view untuk pengguna
        $this->load->view('user/about', $data);
    }

    // Halaman About Us untuk Admin
    public function admin()
    {
        $data['about_us'] = $this->Profile_model->get_about();
        $this->load->view('admin/profile', $data);
    }
    

    // Update data 'About Us'
    public function update()
    {
        $this->load->library('upload');
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']      = 2048; // Maksimal 2MB
        $config['encrypt_name']  = TRUE; // Enkripsi nama file
    
        $this->upload->initialize($config);
    
        $data_update = [
            'about_title' => $this->input->post('about_title'),
            'about_description' => $this->input->post('about_description'),
            'about_vision' => $this->input->post('about_vision'),
            'about_mission' => $this->input->post('about_mission'),
        ];
    
        // index sajaaaa
        // Proses Upload File Gambar
        if (!empty($_FILES['gambar1']['name'])) {
            if ($this->upload->do_upload('gambar1')) {
                $upload_data = $this->upload->data();
                $data_update['gambar1'] = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('profile'); // Kembali ke halaman form jika gagal upload
            }
        }
    
        // Simpan Data ke Database
        $this->load->model('Profile_model');
        if ($this->Profile_model->update_about($data_update)) {
            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    
        redirect('profile/admin');
    }
    
}
