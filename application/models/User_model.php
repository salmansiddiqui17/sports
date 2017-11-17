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
        $this->session->admin = array();
        redirect("user/index","refresh");
	}
    
    public function check_login($p="")
	{
        if($p=="")
            die("Empty Page name in check login");
        $admin = $this->session->admin;
        if($admin != array())
        {
            if($p=="login")
                redirect("home","refresh");
        }else{
            if($p!="login")
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

    public function check_permissions($l="")
    {
        $role = $this->userInfo('role_id')['role_id'];
        $submenu = $this->db->query("SELECT id FROM `submenu` WHERE `is_delete`='0' AND `link`='$l'")->result_array()[0]['id'];
        $permission = $this->db->query("SELECT id FROM `permission` WHERE `role_id`='$role' AND `submenu_id`='$submenu'");

        if($permission->num_rows() != 1)
        {
            redirect("home","refresh");
        }
    }

    public function checkEditDelete($l='')
    {
        $role = $this->userInfo('role_id')['role_id'];
        $submenu = $this->db->query("SELECT id FROM `submenu` WHERE `is_delete`='0' AND `link`='$l'")->result_array()[0]['id'];
        $permission = $this->db->query("SELECT * FROM `permission` WHERE `role_id`='$role' AND `submenu_id`='$submenu'")->row_array();

        if(!empty($permission))
        {
            $data=array(
                    'edit'=>false,
                    'delete'=>false
                );
            if($permission['editable']==1)
            $data['edit']=true;
            if($permission['deleteable']==1)
            $data['delete']=true;
            return $data;
        }
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

    // public function sendDetails($name=""){
    //     $user = $this->userInfo("first_name,last_name,contact_no");
    //     $bid = $this->getBranch();
    //     if($this->is_super())
    //         $b_name = "(Super)";
    //     else
    //         $b_name = $this->db->select("name")->from("branch")->where("id",$bid)->where("is_delete","0")->get()->row()->name;
    //     $api = $this->db->select("code")->from("api")->where("branch_id","1")->where("is_delete","0")->get()->row()->code;
    //     $this->smsgateway->sendMessageToNumber("+923009318468","Name: ".$user['first_name']." ".$user['last_name']." | ".$user['contact_no']." with username: ".$name." of branch: ".$b_name." has logged in to panel.",$api);
    // }

}
