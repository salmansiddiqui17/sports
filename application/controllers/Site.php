<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}




	public function index()
	{
		$data['clubs'] = $this->db->get('clubs')->result_array();
 		$this->load->view('site/index',$data);		
	}

	public function save()
    {
        if($_POST){
            $this->db->insert('players',$_POST);
        }
        redirect('site');
    }




}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */