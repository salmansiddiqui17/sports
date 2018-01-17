<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model("tournament_model",'tm');
	}




	public function index()
	{
		$data['clubs'] = $this->db->get('clubs')->result_array();
		$data['tournaments'] = $this->db->where('is_delete',0)->get('tournaments')->result_array();
		$data['matches'] = $this->db->select('tournaments.name as t_name,team1.name t1_name,team2.name t2_name,matches.date,matches.status,matches.winning_team')->
						   join('teams as team1','team1.id=matches.team1')->
						   join('teams as team2','team2.id=matches.team2')->
						   join('tournaments','tournaments.id=matches.tour_id')->
						   get('matches')->result_array();
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