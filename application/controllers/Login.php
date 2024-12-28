<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model'); // Load Login_model
        $this->load->library('session'); // Load library session
        $this->load->library('form_validation');
    }

    // Menampilkan halaman login
    public function index() {
        if ($this->session->userdata('logged_in')) {
            $role = $this->session->userdata('role');
            if ($role === 'admin') {
                redirect('admin/home');
            } elseif ($role === 'user') {
                redirect('user/home');
            }
        }
        $this->load->view('login');
    }

    public function admin() {
        $this->load->view('admin/home');
    }

    public function user() {
        $this->load->view('user/home');
    }
    public function create() {
        $this->load->view('admin/createU');
    }

    public function dataU() {
        $data['users'] = $this->Login_model->get_all_users(); // Ambil semua data user dari model
        $this->load->view('admin/dataU', $data); // Tampilkan data user di view
    }

    // Proses login
    public function login_process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Login_model->login($username, $password);

        if ($user) {
            $session_data = [
                'user_id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($session_data);

            if ($user->role === 'admin') {
                $this->session->set_flashdata('success', 'Login berhasil sebagai Admin!');
                redirect('Login/admin');
            } elseif ($user->role === 'user') {
                $this->session->set_flashdata('success', 'Login berhasil sebagai User!');
                redirect('Login/user');
            }
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('login');
        }
    }

    // Fungsi untuk logout
    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Anda telah berhasil logout');
        redirect('login');
    }

    // Menambah user baru
    public function add_user() {
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_login.username]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_login.email]');
    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('Login/dataU');
    } else {
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email'    => $this->input->post('email'),
            'role'     => $this->input->post('role')
        ];

        if ($this->Login_model->create_user($data)) {
            $this->session->set_flashdata('success', 'User berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan user!');
        }
        redirect('Login/dataU');
    }
}


    // Menghapus user
    public function delete_user($id) {
        if ($this->Login_model->delete_user($id)) {
            $this->session->set_flashdata('success', 'User berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus user!');
        }
        redirect('Login/dataU');
    }

    // Mengupdate user
    public function update_user($id) {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Login/dataU');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email'    => $this->input->post('email'),
                'role'     => $this->input->post('role')
            ];

            if (!empty($this->input->post('password'))) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            }

            if ($this->Login_model->update_user($id, $data)) {
                $this->session->set_flashdata('success', 'User berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui user!');
            }
            redirect('Login/dataU');
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
      public function change_password() {
    // Ambil email dan password baru dari form
    $email = $this->input->post('email');
    $new_password = $this->input->post('new_password');
    $confirm_password = $this->input->post('confirm_password');

    // Validasi input
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

    if ($this->form_validation->run() === FALSE) {
        // Jika validasi gagal, tampilkan pesan error dan redirect kembali ke halaman login
        $this->session->set_flashdata('error', validation_errors());
        redirect('login'); // Mengarah ke halaman login (atau halaman reset)
    }

    // Cek apakah email ada di database
    $user = $this->Login_model->get_user_by_email($email);

    if ($user) {
        // Update password baru tanpa hashing
        $update_data = ['password' => $new_password];
        if ($this->Login_model->update_user($user->id, $update_data)) {
            $this->session->set_flashdata('success', 'Password berhasil diperbarui');
            redirect('login'); // Setelah reset password, arahkan ke halaman login
        } else {
            // Jika gagal memperbarui password
            $this->session->set_flashdata('error', 'Gagal memperbarui password');
            redirect('login'); // Kembali ke halaman login
        }
    } else {
        // Jika email tidak ditemukan
        $this->session->set_flashdata('error', 'Email tidak terdaftar');
        redirect('login'); // Kembali ke halaman login
    }
}

    public function edit_user($id) {
    // Ambil data user berdasarkan ID
    $data['user'] = $this->Login_model->get_user_by_id($id);
    if (empty($data['user'])) {
        $this->session->set_flashdata('error', 'User tidak ditemukan!');
        redirect('Login/dataU');
    }
    $this->load->view('admin/editU', $data); // Tampilkan form edit user
}
public function update_userr($id) {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('Login/dataU');
    } else {
        $data = [
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email'),
            'role'     => $this->input->post('role')
        ];

        // Jika password diisi, update password juga
        if (!empty($this->input->post('password'))) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        }

        if ($this->Login_model->update_user($id, $data)) {
            $this->session->set_flashdata('success', 'User berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui user!');
        }
        redirect('Login/dataU');
    }
}


}
?>
