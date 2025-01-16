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
    }
   public function create()
{
    if ($this->input->post('submit')) { // Mengecek apakah form telah disubmit
        // Ambil data dari form
        $jadwal = $this->input->post('jadwal'); // Array checkbox
        $jam_praktek = $this->input->post('jam_praktek'); // Jam praktik

        // Konversi jadwal_hari ke format string (JSON) untuk disimpan di database
        $jadwal_str = json_encode($jadwal);

        $data = array(
            'nama' => $this->input->post('nama'),
            'spesialis' => $this->input->post('spesialis'),
            'jadwal' => implode(',', $this->input->post('jadwal')), // Menggabungkan jadwal menjadi satu string
            'jam_praktek' => $jam_praktek,
        );

        // Jika ada gambar yang diunggah, proses upload
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './assets/'; // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png'; // Jenis file yang diperbolehkan
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate otomatis
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data(); // Mengambil data file yang diunggah
                $data['gambar'] = $upload_data['file_name']; // Tambahkan nama file ke array data
            } else {
                // Jika upload gagal, set pesan error dan redirect kembali ke halaman create
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('dokter/create');
            }
        }

        // Simpan data ke database
        if ($this->Dokter_model->insert_upload($data)) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data.');
        }

        redirect('dokter/admin'); // Redirect ke halaman admin setelah selesai
    } else {
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        $this->load->view('admin/createD', $data);
    }
}


 public function edit($id)
{
    if ($this->input->post('Submit')) {
        // Ambil data dari form
        $data = array(
            'nama' => $this->input->post('nama'),
            'spesialis' => $this->input->post('spesialis'),
            'jadwal' => implode(',', $this->input->post('jadwal')), // Menggabungkan jadwal menjadi satu string
            'jam_praktek' => $this->input->post('jam_praktek') // Menggabungkan jam praktek menjadi satu string
        );

        // Mengecek apakah ada gambar yang diunggah
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './assets/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = 'upload_' . rand(1, 1000);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $data['gambar'] = $upload_data['file_name']; // Menyimpan nama file gambar baru
            } else {
                // Jika upload gagal, set pesan error dan redirect kembali
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

        // Memastikan bahwa data ditemukan
        if (empty($data['upload'])) {
            show_404();
        }

        // Mengonversi jadwal dan jam praktek dari string ke array
        $data['upload']->jadwal = explode(',', $data['upload']->jadwal);
        $data['upload']->jam_praktek = explode(',', $data['upload']->jam_praktek);

        // Menampilkan form edit dengan data yang ada
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