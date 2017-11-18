<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

	public function login($u="",$p="")
	{
        if($u=="" OR $p=="")
            return "Empty Username/Password";
        $pass = md5($p);
        $query = $this->db->query("SELECT * FROM `admin` WHERE `username`='$u' AND `password`='$pass' AND is_delete='0'");
        if($query->num_rows() == 1)
        {
            $id = $query->result_array()[0]['id'];
            $this->session->admin = base64_encode(json_encode(array('id' => $id, 'username' => $u)));
            // $this->sendDetails($u);
            redirect("home","refresh");
        }else{
            return "Invalid Credientials";
        }
	}

    public function logout()
	{
        $this->session->admin = '';
        redirect("user/index","refresh");
	}
    
    public function check_login()
	{
        $admin = $this->session->admin;
        if(isset($admin) && $admin!='')
        {
            //redirect("home","refresh");
        }else{
                redirect("user/index","refresh");
        }
	}

    public function userInfo($c="")
	{
        if($c=="")
            $c = "*";
        $admin = json_decode(base64_decode($this->session->admin),true);
        //var_dump($admin);
        $id = $admin['id'];
        $q = $this->db->query("SELECT $c FROM `admin` WHERE `id`='$id'");
        return $q->result_array()[0];
	}


    public function is_super()
    {
        $user=$this->userInfo("id,role_id");
        if($user['role_id']==1)
            return true;
        else
            return false;
    }

    public function limitText($t="",$l=10,$dots=true)
    {
        if($dots)
            $do = "...";
        else
            $do = "";
        if(strlen($t) > $l)
            $ret = substr($t, 0, $l) . $do;
        else
            $ret = $t;
        return $ret;
    }

    public function search_multi_arr($array=array(), $key, $val) 
    {
        foreach ($array as $item)
            if (isset($item[$key]) && $item[$key] == $val)
                return true;
        return false;
    }

}
