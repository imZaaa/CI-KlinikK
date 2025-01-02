<?php
    class Dashboard extends CI_Controller {
    public function index() {
        $this->load->model('Dashboard_model');

        $data['admin_count'] = $this->Dashboard_model->get_user_count('admin');
        $data['user_count'] = $this->Dashboard_model->get_user_count('user');
        $data['patient_count'] = $this->Dashboard_model->get_patient_count();
        $data['doctor_count'] = $this->Dashboard_model->get_doctor_count();

        $this->load->view('admin/dashboard', $data);
    }
}

?>