<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengobatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Pengobatan_model');
        $this->load->model('Pasien_model');
        $this->load->model('Penyakit_model');
        $this->load->model('Obat_model');
        $this->load->model('Dokter_model');  // Load model dokter
    }

    public function index() {
        // Mengambil data pengobatan beserta nama dokter, penyakit, dan obat
        $data['pengobatan'] = $this->Pengobatan_model->get_all();
        $this->load->view('admin/pengobatan', $data);
    }

    public function create() {
        $data['pasien'] = $this->Pasien_model->get_uploads();
        $data['penyakit'] = $this->Penyakit_model->get_all_penyakit();
        $data['obat'] = $this->Obat_model->get_uploads();
        $data['dokter'] = $this->Dokter_model->get_uploads();  // Data dokter

        if ($this->input->post()) {
            $id_pasien = $this->input->post('id_pasien');
            $id_dokter = $this->input->post('id_dokter');  // Menyimpan ID dokter
            $id_penyakit = $this->input->post('id_penyakit');  // Multiple penyakit
            $id_obat = $this->input->post('id_obat');  // Multiple obat
            $tgl_pengobatan = $this->input->post('tgl_pengobatan');
            $biaya_pengobatan = $this->input->post('biaya_pengobatan');
            $status_bayar = $this->input->post('status_bayar');

            // Menghitung total biaya berdasarkan harga obat dan tarif dokter
            $total_biaya = $this->calculate_total_cost($id_obat, $id_dokter);

            // Menyimpan data pengobatan
            $data_pengobatan = array(
                'id_pasien' => $id_pasien,
                'id_dokter' => $id_dokter,
                'tgl_pengobatan' => $tgl_pengobatan,
                'biaya_pengobatan' => $biaya_pengobatan,
                'total_biaya' => $total_biaya,
                'status_bayar' => $status_bayar
            );
            
            // Insert pengobatan dan dapatkan id pengobatan
            $pengobatan_id = $this->Pengobatan_model->insert_pengobatan($data_pengobatan);

            // Menyimpan hubungan penyakit dengan pengobatan
            if (!empty($id_penyakit)) {
                $this->Pengobatan_model->insert_penyakit_to_pengobatan($pengobatan_id, $id_penyakit);
            }

            // Menyimpan hubungan obat dengan pengobatan
            if (!empty($id_obat)) {
                $this->Pengobatan_model->insert_obat_to_pengobatan($pengobatan_id, $id_obat);
            }

            redirect('Pengobatan');
        } else {
            $this->load->view('admin/createPE', $data);
        }
    }

    public function edit($id) {
        if ($this->input->post()) {
            $data = array(  
                'id_pasien' => $this->input->post('id_pasien'),
                'id_dokter' => $this->input->post('id_dokter'),  // Mengupdate dokter
                'tgl_pengobatan' => $this->input->post('tgl_pengobatan'),
                'biaya_pengobatan' => $this->input->post('biaya_pengobatan'),
                'status_bayar' => $this->input->post('status_bayar')
            );

            $this->Pengobatan_model->update_pengobatan($id, $data);

            // Update hubungan penyakit dan obat
            $id_penyakit = $this->input->post('id_penyakit');
            $id_obat = $this->input->post('id_obat');

            // Mengupdate penyakit dan obat terkait pengobatan
            $this->Pengobatan_model->update_penyakit_to_pengobatan($id, $id_penyakit);
            $this->Pengobatan_model->update_obat_to_pengobatan($id, $id_obat);

            redirect('Pengobatan');
        } else {
            $data['pengobatan'] = $this->Pengobatan_model->get_pengobatan_by_id($id);
            $data['pasien'] = $this->Pasien_model->get_uploads();
            $data['penyakit'] = $this->Penyakit_model->get_all_penyakit();
            $data['obat'] = $this->Obat_model->get_uploads();
            $data['dokter'] = $this->Dokter_model->get_uploads();

            $this->load->view('admin/editPE', $data);
        }
    }

    public function delete($id) {
        $this->Pengobatan_model->delete($id);
        redirect('Pengobatan');
    }

    private function calculate_total_cost($id_obat, $id_dokter) {
        // Mengambil harga obat
        $harga_obat = $this->Obat_model->get_total_obat_cost($id_obat);
        
        // Mengambil tarif dokter
        $dokter = $this->Dokter_model->get_dokter_by_id($id_dokter);
        $tarif_dokter = $dokter->tarif;

        // Menghitung total biaya
        $total_biaya = $harga_obat + $tarif_dokter;
        return $total_biaya;
    }
}
