<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function total_admins()
	{
		$this->db->select('COUNT(id) as total');
		$this->db->from('admin');
		$this->db->where('is_delete =', 0)->where('role_id!=',1);
		$result = $this->db->get()->result_array()[0]['total'];

		return $result;
	}


	public function total_players()
	{
		$this->db->select('COUNT(id) as total');
		$this->db->from('players');
		$this->db->where('is_delete =', 0);
		$result = $this->db->get()->result_array()[0]['total'];

		return $result;
	}


	public function total_teams()
	{
		$this->db->select('COUNT(id) as total');
		$this->db->from('teams');
		$this->db->where('is_delete =', 0);
		$result = $this->db->get()->result_array()[0]['total'];

		return $result;
	}


	public function total_tournaments()
	{
		$this->db->select('COUNT(id) as total');
		$this->db->from('tournaments');
		$this->db->where('is_delete =', 0);
		$result = $this->db->get()->result_array()[0]['total'];

		return $result;
	}

}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */