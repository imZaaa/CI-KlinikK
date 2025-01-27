<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    }

    public function index()
    {
        $data['pemakaian_obat'] = $this->Laporan_model->getPemakaianObat();
        $data['data_customer'] = $this->Laporan_model->getDataCustomer();
        $data['pendapatan_pengobatan'] = $this->Laporan_model->getPendapatanPengobatan();
        $data['total_pendapatan'] = $this->Laporan_model->getTotalPendapatan();

        $this->load->view('admin/laporan', $data);
    }
}
