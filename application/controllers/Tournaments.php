<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tournaments extends CI_Controller {

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
        $this->db->from('tournaments');
        $this->db->where("is_delete","0");
        $data['tournaments'] = $this->db->get()->result_array();

        foreach ($data['tournaments'] as $key => $team) {
            $teams = explode(',',$team['teams']);
            if(!empty($teams)){
                $teams = $this->db->where_in('id',$teams)->get('teams')->result_array();
                $data['tournaments'][$key]['t_names'] = implode('<br>',array_column($teams,'name'));
            }
        }
        
        $data['page']='tournaments/view';
        $this->load->view('Template/main',$data);
	}

	public function add()
    {
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['teams'] = $this->db->where('is_delete',0)->get('teams')->result_array();
        
        $data['page']='tournaments/add';
        $this->load->view('Template/main',$data);
    }

    public function save()
    {
        if($_POST){
            $_POST['teams'] = implode(',',$_POST['teams']); 
            $this->db->insert('tournaments',$_POST);
        }
        redirect('tournaments/view');
    }

    public function edit($id='')
    {
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;

        $this->db->select("*"); 
        $this->db->from('tournaments');
        $this->db->where("is_delete","0");
        $this->db->where("id",$id);
        $data['tournament'] = $this->db->get()->row_array();

        $data['teams'] = $this->db->where('is_delete',0)->get('teams')->result_array();
        
        $data['page']='tournaments/edit';
        $this->load->view('Template/main',$data);
    }

    public function update()
    {
        if($_POST){
            $id = $_POST['id'];
            $_POST['teams'] = implode(',',$_POST['teams']);
            $this->db->where('id',$id)->update('tournaments',$_POST);
        }
        redirect('tournaments/view');
    }

    public function delete($id='')
    {
        $this->db->where('id',$id)->update('tournaments',['is_delete'=>1]);
        redirect('tournaments/view');
    }

}
