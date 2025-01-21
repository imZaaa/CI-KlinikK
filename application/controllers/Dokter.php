<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));  
        $this->load->library('upload');
        $this->load->library('session');  // Load library session untuk alert
        $this->load->model('Dokter_model');         
    }

    public function admin()
    {
        $data['uploads'] = $this->Dokter_model->get_uploads();  
        $data['message'] = $this->session->flashdata('message');  // Ambil flashdata untuk alert
        $this->load->view('admin/dokter', $data);
    }

    public function user()
    {
        $data['uploads'] = $this->Dokter_model->get_uploads();  
        $this->load->view('user/dokter', $data);
    }

    public function create()
{
    if ($this->input->post('submit')) {
        // Ambil data dari form
        $nama = $this->input->post('nama');
        $spesialis = $this->input->post('spesialis');
        $jadwal = $this->input->post('jadwal');
        $jam_praktek = $this->input->post('jam_praktek');

        // Tentukan tarif berdasarkan spesialis
        $tarif = ($spesialis == 'umum') ? 50000 : (($spesialis == 'spesialis') ? 100000 : 0);

        // Siapkan data untuk disimpan ke database
        $data = [
            'nama' => $nama,
            'spesialis' => $spesialis,
            'jadwal' => implode(',', $jadwal), // Menggabungkan jadwal menjadi string
            'jam_praktek' => $jam_praktek,
            'tarif' => $tarif
        ];

        // Proses upload gambar jika ada
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './assets/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = 'upload_' . time();
            $config['overwrite'] = true;
            $config['max_size'] = 2048; // Maksimal 2MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $data['gambar'] = $upload_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('dokter/create');
            }
        }

        // Simpan data ke database
        if ($this->Dokter_model->insert_upload($data)) {
            $this->session->set_flashdata('success', 'Data dokter berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data dokter.');
        }

        redirect('dokter/admin');
    } else {
        // Load form tambah dokter
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        $this->load->view('admin/createD', $data);
    }
}

    public function edit($id)
    {
        if ($this->input->post('Submit')) {
            // Ambil data dari form
            $spesialis = $this->input->post('spesialis');
            $jadwal = $this->input->post('jadwal');
            $jam_praktek = $this->input->post('jam_praktek');

            // Tentukan biaya berdasarkan jenis dokter
            if ($spesialis == 'umum') {
            $tarif = 50000;  // Tarif untuk umum
            } elseif ($spesialis == 'spesialis') {
                $tarif = 100000;  // Tarif untuk spesialis
            } else {
                $tarif = 0;  // Default jika tidak ada pilihan
            }


            $data = array(
                'nama' => $this->input->post('nama'),
                'spesialis' => $spesialis,
                'jadwal' => implode(',', $jadwal),
                'jam_praktek' => $jam_praktek,
                'tarif' => $tarif
            );

            // Mengecek apakah ada gambar yang diunggah
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './assets/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = 'upload_' . rand(1, 1000);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    $upload_data = $this->upload->data();
                    $data['gambar'] = $upload_data['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('dokter/edit/' . $id);
                }
            }

            // Memperbarui data dokter di database
            $this->Dokter_model->update_upload($id, $data);
            $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
            redirect('dokter/admin');
        } else {
            // Ambil data dokter berdasarkan ID untuk ditampilkan di form
            $data['upload'] = $this->Dokter_model->get_upload_by_id($id);

            if (empty($data['upload'])) {
                show_404();
            }

            $data['upload']->jadwal = explode(',', $data['upload']->jadwal);
            $this->load->view('admin/editD', $data);
        }
    }

    public function delete($id)
    {
        $this->Dokter_model->delete_upload($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('dokter/admin');
    }
}
?>