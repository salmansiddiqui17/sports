<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function total_trips()
	{
		$this->db->select('COUNT(id) as total');
		$this->db->from('tripmanagement');
		$this->db->where('is_deleted =', 0);
		$result = $this->db->get()->result_array()[0]['total'];

		return $result;

	}


	public function active_trips()
	{
		$this->db->select('COUNT(id) as total');
		$this->db->from('tripmanagement');
		$this->db->where('is_deleted =', 0);
		$this->db->where('status !=', 0);
		$result = $this->db->get()->result_array()[0]['total'];

		return $result;

	}


	public function total_contractors()
	{
		$this->db->select('COUNT(id) as total');
		$this->db->from('contractorinformation');
		$this->db->where('is_deleted =', 0);
		$result = $this->db->get()->result_array()[0]['total'];

		return $result;

	}


	public function total_vehicles()
	{
		$this->db->select('COUNT(id) as total');
		$this->db->from('vehicle');
		$this->db->where('is_deleted =', 0);
		$result = $this->db->get()->result_array()[0]['total'];

		return $result;

	}






}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */