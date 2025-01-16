<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Pasien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->model('Pasien_model');
    }

    public function index(){
        $data['uploads'] = $this->Pasien_model->get_uploads();
        $this->load->view('admin/dataP', $data);
    }

    public function create()
    {
        if ($this->input->post('submit')) {
            $config['upload_path'] = './assets/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'upload_' . rand(1, 1000);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto_pasien')) {
                $upload_data = $this->upload->data();
                $data = array(
                    'id' => $this->input->post('id'),
                    'foto_pasien' => $upload_data['file_name'],
                    'nama' => $this->input->post('nama'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'goldar' => $this->input->post('goldar'),
                    'nomor_telepon' => $this->input->post('nomor_telepon'),
                    'riwayat_penyakit' => $this->input->post('riwayat_penyakit')
                );
                $this->Pasien_model->insert_upload($data);
                $this->session->set_flashdata('success', 'Data pasien berhasil ditambahkan!');
                redirect('Pasien/index');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $id = $this->generate_next_code();
                $error['id'] = $id;
                $this->load->view('admin/createP', $error);
            }
        } else {
            $id = $this->generate_next_code();
            $data['id'] = $id;
            $this->load->view('admin/createP', $data);
        }
    }

    private function generate_next_code()
    {
        $latest_code = $this->Pasien_model->get_last_id();
        $last_number = (int) substr($latest_code, -4);
        $next_number = $last_number + 1;
        return 'PSN-' . str_pad($next_number, 4, '0', STR_PAD_LEFT);
    }

    public function edit($id) {
        if ($this->input->post('Submit')) {
            $data = array(
                'nama' => $this->input->post('nama'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'goldar' => $this->input->post('goldar'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'riwayat_penyakit' => $this->input->post('riwayat_penyakit')
            );

            if (!empty($_FILES['foto_pasien']['name'])) {
                $config['upload_path'] = './assets/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = 'upload_' . rand(1, 1000);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_pasien')) {
                    $upload_data = $this->upload->data();
                    $data['foto_pasien'] = $upload_data['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('pasien/edit/' . $id);
                }
            }

            $this->Pasien_model->update_upload($id, $data);
            $this->session->set_flashdata('success', 'Data pasien berhasil diperbarui!');
            redirect('pasien');
        } else {
            $data['upload'] = $this->Pasien_model->get_upload_by_id($id);
            if (empty($data['upload'])) {
                show_404();
            }
            $this->load->view('admin/editP', $data);
        }
    }

    public function delete($id)
    {
        if ($this->Pasien_model->delete_pasien($id)) {
            $this->session->set_flashdata('success', 'Data pasien berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data pasien!');
        }
        redirect('pasien');
    }
}
?>
