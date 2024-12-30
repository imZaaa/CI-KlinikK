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
    public function create() {
        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('penyebab', 'Penyebab', 'required');
        $this->form_validation->set_rules('gejala', 'Gejala', 'required');
        $this->form_validation->set_rules('ciri_ciri', 'Ciri-Ciri', 'required');
        $this->form_validation->set_rules('pengobatan', 'Pengobatan', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/createPK');
        } else {
            $data = array(
                'nama_penyakit' => $this->input->post('nama_penyakit'),
                'deskripsi' => $this->input->post('deskripsi'),
                'penyebab' => $this->input->post('penyebab'),
                'gejala' => $this->input->post('gejala'),
                'ciri_ciri' => $this->input->post('ciri_ciri'),
                'pengobatan' => $this->input->post('pengobatan'),
                'kategori' => $this->input->post('kategori')
            );

            if ($this->Penyakit_model->insert_penyakit($data)) {
                $this->session->set_flashdata('success', 'Data penyakit berhasil ditambahkan!');
                redirect('penyakit');
            }
        }
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
