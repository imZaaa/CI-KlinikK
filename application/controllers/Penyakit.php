<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Penyakit_model');
        $this->load->library('form_validation');
        }   

    // Menampilkan daftar penyakit
    public function index() {
        $data['penyakit'] = $this->Penyakit_model->get_all_penyakit();
        $this->load->view('admin/dataPK', $data);
    }

    // Menambahkan data penyakit
    public function create()
{
    // Set rules untuk validasi form
    $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    $this->form_validation->set_rules('penyebab', 'Penyebab', 'required');
    $this->form_validation->set_rules('gejala', 'Gejala', 'required');
    $this->form_validation->set_rules('ciri_ciri', 'Ciri-Ciri', 'required');
    $this->form_validation->set_rules('pengobatan', 'Pengobatan', 'required');
    $this->form_validation->set_rules('kategori', 'Kategori', 'required');

    // Generate ID baru sebelum memuat form
    $id = $this->generate_next_code(); // Fungsi untuk membuat ID otomatis
    $data['id'] = $id; // Simpan ID baru dalam array data

    if ($this->form_validation->run() == FALSE) {
        // Validasi gagal, kirimkan ID dan error jika ada
        $data['error'] = validation_errors(); // Tampilkan error dari validasi
        $this->load->view('admin/createPK', $data); // Muat view dengan data
    } else {
        // Validasi berhasil, masukkan data ke database
        $data = array(
            'id' => $this->input->post('id'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'deskripsi' => $this->input->post('deskripsi'),
            'penyebab' => $this->input->post('penyebab'),   
            'gejala' => $this->input->post('gejala'),
            'ciri_ciri' => $this->input->post('ciri_ciri'),
            'pengobatan' => $this->input->post('pengobatan'),
            'kategori' => $this->input->post('kategori')
        );

        // Simpan data ke database melalui model
        if ($this->Penyakit_model->insert_penyakit($data)) {
            // Beri pesan sukses dan arahkan ke halaman list penyakit
            $this->session->set_flashdata('success', 'Data penyakit berhasil ditambahkan!');
            redirect('Penyakit'); // **Arahkan ke halaman daftar penyakit**
        } else {
            // Jika gagal simpan, tampilkan pesan error
            $this->session->set_flashdata('error', 'Gagal menyimpan data penyakit.');
            $this->load->view('admin/createPK', $data);
        }
    }
}


    private function generate_next_code()
    {
        $latest_code = $this->Penyakit_model->get_last_id();
        $last_number = (int) substr($latest_code, -4);
        $next_number = $last_number + 1;
        return 'PKT-' . str_pad($next_number, 4, '0', STR_PAD_LEFT);
    }

    // Memperbarui data penyakit
    public function edit($id) {
        $data['penyakit'] = $this->Penyakit_model->get_penyakit_by_id($id);

        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('penyebab', 'Penyebab', 'required');
        $this->form_validation->set_rules('gejala', 'Gejala', 'required');
        $this->form_validation->set_rules('ciri_ciri', 'Ciri-Ciri', 'required');
        $this->form_validation->set_rules('pengobatan', 'Pengobatan', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/editPK', $data);
        } else {
            $update_data = [
                'nama_penyakit' => $this->input->post('nama_penyakit'),
                'deskripsi' => $this->input->post('deskripsi'),
                'penyebab' => $this->input->post('penyebab'),
                'gejala' => $this->input->post('gejala'),
                'ciri_ciri' => $this->input->post('ciri_ciri'),
                'pengobatan' => $this->input->post('pengobatan'),
                'kategori' => $this->input->post('kategori')
            ];

            if ($this->Penyakit_model->update_penyakit($id, $update_data)) {
                $this->session->set_flashdata('success', 'Data penyakit berhasil diperbarui!');
                redirect('penyakit');
            }
        }
    }

    // Menghapus data penyakit
    public function delete($id) {
        if ($this->Penyakit_model->delete_penyakit($id)) {
            $this->session->set_flashdata('success', 'Data penyakit berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data penyakit!');
        }
        redirect('penyakit');
    }
}
?>
