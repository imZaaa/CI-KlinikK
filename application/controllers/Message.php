<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Message_model');
        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('admin/contact');
    }

    public function submit() {
        // Validasi form
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/contact');
        } else {
            // Simpan ke database menggunakan model
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message')
            ];
            $this->Message_model->save_message($data);

            $this->session->set_flashdata('message', 'Pesan Anda telah berhasil dikirim!');
$this->load->view('admin/contact');
    }
}
}