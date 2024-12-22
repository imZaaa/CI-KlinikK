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
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        // Cek login melalui model
        $user = $this->Login_model->login($username, $password);
        
        if ($user) {
            // Memastikan kapitalisasi username dan password cocok
            if (strcmp($user->username, $username) === 0 && strcmp($user->password, $password) === 0) {
                // Set session jika login berhasil
                $session_data = array(
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
    
                // Set flashdata untuk pesan berhasil login
                $this->session->set_flashdata('success', 'Login berhasil! Selamat datang, ' . $user->username);
                redirect('home'); // Arahkan ke halaman utama
            } else {
                // Jika login gagal karena kapitalisasi yang tidak cocok
                $this->session->set_flashdata('error', 'Username atau password tidak cocok');
                redirect('login');
            }
        } else {
            // Jika login gagal
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('login');
        }
    }
    public function change_password() {
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $email = $this->input->post('email');

        // Ambil data user berdasarkan email
        $user = $this->Login_model->get_user_by_email($email);

        if ($user) {
            // Cek apakah password lama cocok
            if ($old_password === $user->password) {
                // Password lama cocok, update password baru
                $this->Login_model->update_password($email, $new_password);
                
                // Set flashdata pesan sukses
                $this->session->set_flashdata('success', 'Password berhasil diubah.');
                redirect('login');
            } else {
                // Password lama tidak cocok
                $this->session->set_flashdata('error', 'Password lama salah.');
                redirect('login');
            }
        } else {
            // Jika email tidak ditemukan
            $this->session->set_flashdata('error', 'Email tidak ditemukan.');
            redirect('login');
        }
    }

    // Logout
    public function logout() {
        $this->session->sess_destroy(); // Hapus session
        $this->session->set_flashdata('success', 'Anda telah berhasil logout');
        redirect('login'); // Kembali ke halaman login
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
}
?>
