<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));  
        $this->load->library('upload');
        $this->load->library('session');  // Load library session untuk alert
        $this->load->model('Dokter_model');         
    }

    public function admin()
    {
        $data['uploads'] = $this->Dokter_model->get_uploads();  
        $data['message'] = $this->session->flashdata('message');  // Ambil flashdata untuk alert
        $this->load->view('admin/dokter', $data);
    }

    public function user()
    {
        $data['uploads'] = $this->Dokter_model->get_uploads();  
        $data['message'] = $this->session->flashdata('message');  // Ambil flashdata untuk alert
        $this->load->view('user/dokter', $data);
    }

    public function create()
    {
        if ($this->input->post('Submit')) {
            $config['upload_path'] = './assets/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'upload_' . rand(1, 1000);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $data = array(
                    'gambar' => $upload_data['file_name'],
                    'nama' => $this->input->post('nama'),
                    'spesialis' => $this->input->post('spesialis'),
                    'jadwal' => $this->input->post('jadwal')
                );
                $this->Dokter_model->insert_upload($data);
                $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
                redirect('dokter/admin');
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', 'Error: ' . $error);
                $this->load->view('admin/createD', array('error' => $error));
            }
        } else {
            $this->load->view('admin/createD');
        }
    }

   public function edit($id)
{
    if ($this->input->post('Submit')) {
        $config['upload_path'] = './assets/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = 'upload_' . rand(1, 1000);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
        } else {
            // Jika tidak ada file yang diunggah, ambil gambar lama dari database
            $existing_data = $this->Dokter_model->get_upload_by_id($id);
            $gambar = $existing_data->gambar;
        }

        $data = array(
            'gambar' => $gambar,
            'nama' => $this->input->post('nama'),
            'spesialis' => $this->input->post('spesialis'),
            'jadwal' => $this->input->post('jadwal')
        );

        $this->Dokter_model->update_upload($id, $data);
        $this->session->set_flashdata('message', 'Data berhasil diperbarui!');
        redirect('dokter/admin');
    } else {
        $data['upload'] = $this->Dokter_model->get_upload_by_id($id);
        $data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/editD', $data);
    }
}


    public function delete($id)
    {
        $this->Dokter_model->delete_upload($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        redirect('dokter/admin');
    }
}