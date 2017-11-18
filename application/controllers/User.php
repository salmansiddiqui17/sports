<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model("user_model");
    }

	public function login()
	{
        if($this->input->post())
		{
			$username = $this->input->post('username',true);
			$password = $this->input->post('password',true);
			echo $this->user_model->login($username,$password);
		}
	}

	public function index()
	{
        $data['base_url'] = base_url();
		$this->load->view('user/login',$data);
	}

	public function logout()
	{
        $this->user_model->logout();
	}

}
