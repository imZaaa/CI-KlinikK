<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengobatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Pengobatan_model');
        $this->load->model('Pasien_model');  // Load model terkait
        $this->load->model('Penyakit_model');
        $this->load->model('Obat_model');
    }

    public function index() {
        $data['pengobatan'] = $this->Pengobatan_model->get_all();
        $this->load->view('admin/pengobatan', $data);
    }

    public function create() {
        $data['pasien'] = $this->Pasien_model->get_uploads();
        $data['penyakit'] = $this->Penyakit_model->get_all_penyakit();
        $data['obat'] = $this->Obat_model->get_uploads();

        if ($this->input->post()) {
            $data = array(
                'id_pasien' => $this->input->post('id_pasien'),
                'id_penyakit' => $this->input->post('id_penyakit'),
                'id_obat' => $this->input->post('id_obat'),
                'tgl_pengobatan' => $this->input->post('tgl_pengobatan'),
                'biaya_pengobatan' => $this->input->post('biaya_pengobatan'),
                'status_bayar' => $this->input->post('status_bayar')
            );
            $this->Pengobatan_model->insert_pengobatan($data);
            redirect('Pengobatan');
        } else {
            $this->load->view('admin/createPE', $data);
        }
    }

    public function edit($id) {
    if ($this->input->post()) { // Mengecek apakah form telah disubmit
        // Ambil data dari form
        $data = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'id_penyakit' => $this->input->post('id_penyakit'),
            'id_obat' => $this->input->post('id_obat'),
            'tgl_pengobatan' => $this->input->post('tgl_pengobatan'),
            'biaya_pengobatan' => $this->input->post('biaya_pengobatan'),
            'status_bayar' => $this->input->post('status_bayar'),
        );

        // Memperbarui data di database
        $this->Pengobatan_model->update_pengobatan($id, $data);

        // Redirect ke halaman pengobatan setelah sukses
        redirect('Pengobatan');
    } else {
        // Ambil data pengobatan berdasarkan ID
        $data['pengobatan'] = $this->Pengobatan_model->get_pengobatan_by_id($id);

        // Ambil data tambahan untuk dropdown pasien, penyakit, dan obat
        $data['pasien'] = $this->Pasien_model->get_uploads();
        $data['penyakit'] = $this->Penyakit_model->get_all_penyakit();
        $data['obat'] = $this->Obat_model->get_uploads();

        // Memuat tampilan edit dengan data yang ada
        $this->load->view('admin/editPE', $data);
    }
}


    public function delete($id) {
        $this->Pengobatan_model->delete($id);
        redirect('pengobatan');
    }
}
