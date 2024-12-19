<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model'); // Load Login_model
        $this->load->library('session'); // Load library session
    }

    // Menampilkan halaman login
    public function index() {
        if ($this->session->userdata('logged_in')) { 
            redirect('home'); // Jika sudah login, arahkan ke halaman utama
        }
        $this->load->view('login'); // Tampilkan view login
    }

    // Proses login
    public function login_process() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Cek login melalui model
        $user = $this->Login_model->login($email, $password);

        if ($user) {
            // Set session jika login berhasil
            $session_data = array(
                'user_id' => $user->id,
                'email' => $user->email,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            redirect('home'); // Arahkan ke halaman utama
        } else {
            // Jika login gagal, tampilkan pesan error
            $this->session->set_flashdata('error', 'Email atau password salah');
            redirect('login');
        }
    }

    // Fungsi untuk menampilkan password pengguna berdasarkan email
    public function show_password() {
        $email = $this->input->post('email'); // Ambil email dari input form

        // Cek apakah email ada dalam database
        $user = $this->Login_model->get_user_by_email($email);

        if ($user) {
            // Jika email ditemukan, tampilkan password
            $data['password_message'] = 'Your password: ' . $user->password;
            $data['error_message'] = null;
        } else {
            // Jika email tidak ditemukan, tampilkan pesan error
            $data['error_message'] = 'Email is not registered.';
            $data['password_message'] = null;
        }

        // Tampilkan halaman login dengan pesan terkait password
        $this->load->view('login', $data);
    }

    // Logout
    public function logout() {
        $this->session->sess_destroy(); // Hapus session
        redirect('login'); // Kembali ke halaman login
    }
}
?>
