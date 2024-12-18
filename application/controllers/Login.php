<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model dan library yang dibutuhkan
        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    // Menampilkan halaman login
    public function index() {
        // Cek apakah sudah login
        if ($this->session->userdata('logged_in')) {
            redirect('home'); // jika sudah login, alihkan ke dashboard
        }

        // Tampilkan form login
        $this->load->view('login');
    }

    // Proses login
    public function login_process() {
        // Aturan validasi form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form login lagi
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            // Verifikasi user berdasarkan email dan password
            $user = $this->Login_model->login($email, $password);

            if ($user) {
                // Set session jika login berhasil
                $session_data = array(
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                redirect('home'); // alihkan ke halaman dashboard setelah login
            } else {
                // Jika login gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('login');
            }
        }
    }

    // Logout
    public function logout() {
        // Hapus session dan redirect ke halaman login
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>
