<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('vehicle_model');
	}


	public function show_vehicle()
	{
		$data['vehicles']=$this->vehicle_model->get_vehicles();	
		$data['page'] = "vehicle/show";
		$this->load->view('Template/main', $data);
	}


	public function add_vehicle()
	{
		$data['vehicles']=$this->vehicle_model->get_vehicles();	
		$data['page'] = "vehicle/add";
		$this->load->view('Template/main', $data);
	}











}

/* End of file Vehicle.php */
/* Location: ./application/controllers/Vehicle.php */