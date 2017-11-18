<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $userInfo = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->user_model->check_login("admin");
        $this->userInfo = $this->user_model->userInfo("first_name,last_name,role_id");
    }

	public function index()
	{
        redirect('admin/user/view',"refresh");
	}

    public function user($action,$p=1)
	{
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        if($action=="add")
		{
            $data['page']='user/add';
            $this->load->view('Template/main',$data);
        }else if($action=="view")
		{
            $this->db->select("*"); 
            $this->db->from('admin');
            $this->db->where("is_delete","0");
            $query = $this->db->get();
            $data['admins'] = $query->result_array();
            $data['page']='user/view';
            $this->load->view('Template/main',$data);
        }else if($action=="save")
		{
            if($this->input->post())
            {
                $fname = $this->input->post("fname",true);
                $lname = $this->input->post("lname",true);
                $email = $this->input->post("email",true);
                $contact = $this->input->post("contact",true);
                $username = $this->input->post("username",true);
                $password = $this->input->post("password",true);
                $cpassword = $this->input->post("password2",true);

                if(!empty($fname) AND !empty($lname) AND !empty($email) AND !empty($contact) AND !empty($username) AND !empty($password))
                {
                    if($password==$cpassword)
                    {
                        $pass = md5($password);
                        $data = array(
                            'first_name'=>$fname,
                            'last_name'=>$lname,
                            'email'=>$email,
                            'username'=>$username,
                            'password'=>$pass,
                            'contact_no'=>$contact
                        );

                        $this->db->insert('admin',$data);
                        redirect("admin/user/view","refresh");
                    }else{
                        redirect("admin/user/add","refresh");
                    }
                }else{
                    redirect("admin/user/add","refresh");
                }
            }
        }else if($action=="delete")
        {
            $data = array(
                "is_delete"=>"1"
            );

            $this->db->where("id",$p);
            $this->db->update("admin",$data);
            redirect("admin/user/view","refresh");
        }else if($action=="edit")
		{
            $this->db->select("*"); 
            $this->db->from('admin');
            $this->db->where("is_delete","0");
            $this->db->where("id",$p);
            $query = $this->db->get();
            $data['admin'] = $query->result_array()[0];
            $data['page']='user/edit';
            $this->load->view('Template/main',$data);
        }else if($action=="update")
		{
            if($this->input->post())
            {
                $id = $this->input->post("id",true);
                $fname = $this->input->post("fname",true);
                $lname = $this->input->post("lname",true);
                $email = $this->input->post("email",true);
                $contact = $this->input->post("contact",true);
                $username = $this->input->post("username",true);

                if(!empty($fname) AND !empty($lname) AND !empty($email) AND !empty($contact) AND !empty($username))
                {
                    $data = array(
                    'first_name'=>$fname,
                    'last_name'=>$lname,
                    'email'=>$email,
                    'username'=>$username,
                    'contact_no'=>$contact
                    );
                    $this->db->where('id',$id);
                    $this->db->update('admin',$data);
                    redirect("admin/user/view","refresh");
                }else{
                    redirect("admin/user/add","refresh");
                }
            }
        }else if($action=="updatePass")
		{
            if($this->input->post())
            {
                $id = $this->input->post("id",true);
                $pass = $this->input->post("pass",true);
                $cpass = $this->input->post("cpass",true);

                if(!empty($pass) AND !empty($cpass) AND !empty($id))
                {
                    if($cpass==$pass)
                    {
                        $password = md5($pass);
                        $data = array(
                        'password'=>$password
                        );
                        $this->db->where('id',$id);
                        $this->db->update('admin',$data);
                    }
                    redirect("admin/user/view","refresh");
                }else{
                    redirect("admin/user/add","refresh");
                }
            }
        }
	}

   
}
