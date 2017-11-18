<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends CI_Controller {

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
        $this->db->from('teams');
        $this->db->where("is_delete","0");
        $data['teams'] = $this->db->get()->result_array();

        foreach ($data['teams'] as $key => $team) {
            $players = explode(',',$team['players']);
            if(!empty($players)){
                $players = $this->db->where_in('id',$players)->get('players')->result_array();
                $data['teams'][$key]['p_names'] = implode('<br>',array_column($players,'name'));
            }
        }
        
        $data['page']='Teams/view';
        $this->load->view('Template/main',$data);
	}

	public function add()
    {
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['players'] = $this->db->where('is_delete',0)->get('players')->result_array();
        
        $data['page']='teams/add';
        $this->load->view('Template/main',$data);
    }

    public function save()
    {
        if($_POST){
            $_POST['players'] = implode(',',$_POST['players']); 
            $this->db->insert('teams',$_POST);
        }
        redirect('teams/view');
    }

    public function edit($id='')
    {
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;

        $this->db->select("*"); 
        $this->db->from('teams');
        $this->db->where("is_delete","0");
        $this->db->where("id",$id);
        $data['team'] = $this->db->get()->row_array();

        $data['players'] = $this->db->where('is_delete',0)->get('players')->result_array();
        
        $data['page']='teams/edit';
        $this->load->view('Template/main',$data);
    }

    public function update()
    {
        if($_POST){
            $id = $_POST['id'];
            $_POST['players'] = implode(',',$_POST['players']);
            $this->db->where('id',$id)->update('teams',$_POST);
        }
        redirect('teams/view');
    }

    public function delete($id='')
    {
        $this->db->where('id',$id)->update('teams',['is_delete'=>1]);
        redirect('teams/view');
    }

}
