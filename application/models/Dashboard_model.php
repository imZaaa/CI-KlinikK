<?php
    class Dashboard_model extends CI_Model {
    public function get_user_count($role = null) {
        if ($role) {
            $this->db->where('role', $role); // role: kolom ENUM ('admin', 'user')
        }
        return $this->db->count_all_results('tbl_login');
    }

    public function get_patient_count() {
        return $this->db->count_all('tbl_pasien');
    }

    public function get_doctor_count() {
        return $this->db->count_all('tbl_dokter');
    }

     public function countData($table, $column = null, $value = null)
    {
        if ($column && $value) {
            $this->db->where($column, $value);
        }
        return $this->db->count_all_results($table);
    }
}

?>