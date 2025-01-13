<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Profile_model');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function aboutA(){
		$this->load->view('admin/about');
	}
	public function aboutU(){
		$data['about_image'] = $this->Profile_model->get_value(); 
		$this->load->view('user/about');
	}
	public function about(){
		$this->load->view('about');
	}
	
	public function kontakA(){
		$this->load->view('admin/contact');
	}
	public function kontakU(){
		$this->load->view('user/contact');
	}
	public function kontak(){
		$this->load->view('contact');
	}


}
