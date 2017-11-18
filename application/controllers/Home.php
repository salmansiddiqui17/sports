<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('user_model');
		$this->user_model->check_login("Home");
		$this->userInfo = $this->user_model->userInfo("first_name,last_name");
	}




	public function index()
	{
		$data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
		
		$data['page'] = "home/dashboard";
		$this->load->view('Template/main', $data);		
	}




}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */