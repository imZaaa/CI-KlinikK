<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resep extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Resep_model');
        $this->load->model('Pengobatan_model');
        $this->load->model('Obat_model');
    }

    // Menampilkan daftar resep
    public function index()
    {
        $data['resep'] = $this->Resep_model->get_all_resep();
        $this->load->view('admin/dataR', $data);
    }

    // Form tambah resep
    public function create()
    {
        $data['pengobatan'] = $this->Pengobatan_model->get_all();
        $data['obat'] = $this->Obat_model->get_uploads();

        if ($this->input->post()) {
            $insert_data = [
                'id_pengobatan' => $this->input->post('id_pengobatan'),
                'id_obat' => $this->input->post('id_obat'),
                'jumlah_obat' => $this->input->post('jumlah_obat'),
                'dosis' => $this->input->post('dosis'),
                'tanggal_resep' => $this->input->post('tanggal_resep'),
                'keterangan' => $this->input->post('keterangan'),
            ];

            $this->Resep_model->insert($insert_data);
            redirect('Resep');
        }

        $this->load->view('admin/create_resep', $data);
    }

    // Form edit resep
    public function edit($id)
    {
        $data['resep'] = $this->Resep_model->get_by_id($id);
        $data['pengobatan'] = $this->Pengobatan_model->get_all();
        $data['obat'] = $this->Obat_model->get_uploads();

        if ($this->input->post()) {
            $update_data = [
                'id_pengobatan' => $this->input->post('id_pengobatan'),
                'id_obat' => $this->input->post('id_obat'),
                'jumlah_obat' => $this->input->post('jumlah_obat'),
                'dosis' => $this->input->post('dosis'),
                'tanggal_resep' => $this->input->post('tanggal_resep'),
                'keterangan' => $this->input->post('keterangan'),
            ];

            $this->Resep_model->update($id, $update_data);
            redirect('resep');
        }

        $this->load->view('admin/editR', $data);
    }

    // Hapus resep
    public function delete($id)
    {
        $this->Resep_model->delete($id);
        redirect('resep');
    }
}
