<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_model extends CI_Model {

	

	public function get_vehicles()
	 {
		$this->db->select('*');
		$this->db->from('vehicle');
		$this->db->where('is_deleted = ', 0);
		$result = $this->db->get()->result_array();
		return $result;

	 } 





}

/* End of file vehicle_model.php */
/* Location: ./application/models/vehicle_model.php */