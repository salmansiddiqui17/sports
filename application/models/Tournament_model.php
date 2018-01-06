<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tournament_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

	public function getTeamName($team='')
    {
        if($team!=''){
            return @$this->db->where('id',$team)->get('teams')->row_array()['name'];
        }
    }

}
