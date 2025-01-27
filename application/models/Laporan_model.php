<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    // Laporan Pemakaian Obat
    public function getPemakaianObat()
    {
        $this->db->select('o.nama_obat, COUNT(po.id_obat) as jumlah_pemakaian, MAX(p.tgl_pengobatan) as terakhir_digunakan');
        $this->db->from('tbl_pengobatan_obat po');
        $this->db->join('tbl_obat o', 'po.id_obat = o.id');
        $this->db->join('tbl_pengobatan p', 'po.id_pengobatan = p.id_pengobatan');
        $this->db->group_by('o.id');
        return $this->db->get()->result_array();
    }

    // Data Customer (Pasien)
    public function getDataCustomer()
    {
        $this->db->select('id, nama, tanggal_lahir, nomor_telepon, alamat, COUNT(p.id_pengobatan) as jumlah_kunjungan');
        $this->db->from('tbl_pasien');
        $this->db->join('tbl_pengobatan p', 'tbl_pasien.id = p.id_pasien', 'left');
        $this->db->group_by('tbl_pasien.id');
        return $this->db->get()->result_array();
    }

    // Data Pendapatan Pengobatan
    public function getPendapatanPengobatan()
    {
        $this->db->select('p.id_pengobatan, ps.nama, p.tgl_pengobatan, p.total_biaya, p.status_bayar');
        $this->db->from('tbl_pengobatan p');
        $this->db->join('tbl_pasien ps', 'p.id_pasien = ps.id');
        return $this->db->get()->result_array();
    }

    // Total Pendapatan
    public function getTotalPendapatan()
    {
        $this->db->select_sum('total_biaya');
        $this->db->from('tbl_pengobatan');
        $this->db->where('status_bayar', 'Sudah Dibayar');
        return $this->db->get()->row()->total_biaya;
    }
}
