<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->userInfo = $this->user_model->userInfo("first_name,last_name,role_id");
        $this->user_model->check_login();
    }

	public function view()
	{
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;

        $this->db->select("*"); 
        $this->db->from('players');
        $this->db->where("is_delete","0");
        $data['players'] = $this->db->get()->result_array();

        $data['page']='players/view';
        $this->load->view('Template/main',$data);
	}

	public function add()
    {
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;

        $data['page']='players/add';
        $this->load->view('Template/main',$data);
    }

    public function save()
    {
        if($_POST){
            $this->db->insert('players',$_POST);
        }
        redirect('players/view');
    }

    public function edit($id='')
    {
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;

        $this->db->select("*"); 
        $this->db->from('players');
        $this->db->where("is_delete","0");
        $this->db->where("id",$id);
        $data['player'] = $this->db->get()->row_array();
        
        $data['page']='players/edit';
        $this->load->view('Template/main',$data);
    }

    public function update()
    {
        if($_POST){
            $id = $_POST['id'];
            $this->db->where('id',$id)->update('players',$_POST);
        }
        redirect('players/view');
    }

    public function delete($id='')
    {
        $this->db->where('id',$id)->update('players',['is_delete'=>1]);
        redirect('players/view');
    }

}
