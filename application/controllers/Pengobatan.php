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
    public $input;

    public function index() {
        // Mengambil data pengobatan beserta nama dokter, penyakit, dan obat
        $data['pengobatan'] = $this->Pengobatan_model->get_all();
        $this->load->view('admin/pengobatan', $data);
    }

    public function create() {
    // Load data untuk form
    $data['pasien'] = $this->Pasien_model->get_uploads();
    $data['penyakit'] = $this->Penyakit_model->get_all_penyakit();
    $data['obat'] = $this->Obat_model->get_uploads();
    $data['dokter'] = $this->Dokter_model->get_uploads();

    if ($this->input->post()) {
        // Mengambil data dari form
        $id_pasien = $this->input->post('id_pasien');
        $id_dokter = $this->input->post('id_dokter');
        $id_obat = $this->input->post('id_obat'); // Obat yang dipilih
        $biaya_pengobatan = $this->input->post('biaya_pengobatan');
        $status_bayar = $this->input->post('status_bayar');
        $tarif = $this->input->post('tarif');

        $dokter = $this->Dokter_model->get_upload_by_id($id_dokter);
        $tarif = $dokter->tarif;  // Ambil tarif dokter dari hasil query

        // Menghitung total biaya
        $total_biaya = $this->calculate_total_cost($id_obat, $id_dokter);

        // Siapkan data pengobatan
        $pengobatanData = [
            'id_pasien' => $id_pasien,
            'id_dokter' => $id_dokter,
            'tgl_pengobatan' => $this->input->post('tgl_pengobatan'),
            'biaya_pengobatan' => $biaya_pengobatan,
            'status_bayar' => $status_bayar,
            'tarif' => $tarif,
            'total_biaya' => $total_biaya
        ];

        // Simpan data pengobatan
        $id_pengobatan = $this->Pengobatan_model->insertPengobatan($pengobatanData);

        if ($id_pengobatan) {
            // Menyimpan obat yang terkait
            foreach ($id_obat as $id_obat_item) {
                $this->Pengobatan_model->insertPengobatanObat([
                    'id_pengobatan' => $id_pengobatan,
                    'id_obat' => $id_obat_item
                ]);
            }

            // Menyimpan penyakit yang terkait
            $penyakitList = $this->input->post('id_penyakit');
            foreach ($penyakitList as $id_penyakit) {
                $this->Pengobatan_model->insertPengobatanPenyakit([
                    'id_pengobatan' => $id_pengobatan,
                    'id_penyakit' => $id_penyakit
                ]);
            }

            redirect('Pengobatan');
        }
    }
    $this->load->view('admin/createPE', $data);
}

    public function edit($id) {
    if ($this->input->post()) {
        // Ambil data dari form
        $data = [
            'id_pasien' => $this->input->post('id_pasien'),
            'id_dokter' => $this->input->post('id_dokter'),
            'tgl_pengobatan' => $this->input->post('tgl_pengobatan'),
            'biaya_pengobatan' => $this->input->post('biaya_pengobatan'),
            'status_bayar' => $this->input->post('status_bayar')
        ];

        // Update data pengobatan di tabel utama
        $this->Pengobatan_model->update_pengobatan($id, $data);

        // Update hubungan dengan tabel penyakit
        $id_penyakit = $this->input->post('id_penyakit'); // Array penyakit
        if (!empty($id_penyakit)) {
            // Hapus hubungan penyakit lama
            $this->Pengobatan_model->delete_penyakit_to_pengobatan($id);
            // Tambahkan hubungan penyakit baru
            foreach ($id_penyakit as $penyakit_id) {
                $this->Pengobatan_model->insert_penyakit_to_pengobatan($id, $penyakit_id);
            }
        }

        // Update hubungan dengan tabel obat
        $id_obat = $this->input->post('id_obat'); // Array obat
        if (!empty($id_obat)) {
            // Hapus hubungan obat lama
            $this->Pengobatan_model->delete_obat_to_pengobatan($id);
            // Tambahkan hubungan obat baru
            foreach ($id_obat as $obat_id) {
                $this->Pengobatan_model->insert_obat_to_pengobatan($id, $obat_id);
            }
        }

        // Redirect ke halaman daftar pengobatan setelah update
        redirect('Pengobatan');
    } else {
        // Ambil data pengobatan berdasarkan ID
        $data['pengobatan'] = $this->Pengobatan_model->get_pengobatan_by_id($id);
        $data['pasien'] = $this->Pasien_model->get_uploads(); // Data pasien untuk dropdown
        $data['penyakit'] = $this->Penyakit_model->get_all_penyakit(); // Data penyakit
        $data['obat'] = $this->Obat_model->get_uploads(); // Data obat
        $data['dokter'] = $this->Dokter_model->get_uploads(); // Data dokter

        // Load view untuk form edit
        $this->load->view('admin/editPE', $data);
    }
}


    public function delete($id) {
        $this->Pengobatan_model->delete($id);
        redirect('Pengobatan');
    }

    private function calculate_total_cost($id_obat, $id_dokter) {
    // Mengambil harga obat
    $harga_obat = 0;
    foreach ($id_obat as $obat_id) {
        $harga_obat += $this->Obat_model->get_total_obat_cost($obat_id);
    }

    // Mengambil tarif dokter
    $dokter = $this->Dokter_model->get_upload_by_id($id_dokter);
    $tarif_dokter = $dokter->tarif;

    // Menghitung total biaya
    $total_biaya = $harga_obat + $tarif_dokter; // Total biaya = harga obat + tarif dokter
    return $total_biaya;
}
}
