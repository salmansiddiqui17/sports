<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $userInfo = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('load_model');
        $this->user_model->check_login("admin");
        $this->userInfo = $this->user_model->userInfo("first_name,last_name,role_id");
    }

	public function index()
	{
	redirect('admin/user/view',"refresh");
	}

    public function user($action,$p=1)
	{
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        if($action=="add")
		{
            // $this->user_model->check_permissions('admin/user/add');
            $data['roles']=$this->db->where('is_delete',0)->get('role')->result_array();
            $data['page']='user/add';
            $this->load->view('Template/main',$data);
        }else if($action=="view")
		{
        $this->user_model->check_permissions('admin/user/view');
        $data['edit_delete']=$this->user_model->checkEditDelete('admin/user/view');

            $this->db->select("id,first_name,last_name,username,email,contact_no,role_id"); 
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
                $role_id = $this->input->post("role_id",true);
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
                        'role_id'=>$role_id,
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
            $this->db->select("id,role_id,first_name,last_name,username,email,contact_no"); 
            $this->db->from('admin');
            $this->db->where("is_delete","0");
            $this->db->where("id",$p);
            $query = $this->db->get();
            $data['roles']=$this->db->where('is_delete',0)->get('role')->result_array();
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

    public function role($action,$p=1)
	{
        $data['menu'] = $this->load_model->menu();
        $data['is_super'] = $this->user_model->is_super();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        if($action=="manage")
	    {
            $this->user_model->check_permissions('admin/role/manage');
            $data['roles'] = $this->db->query("SELECT `role`.`id`,`role`.`title` FROM `role` WHERE `role`.`is_delete`='0'")->result_array();
            $data['users'] = $this->db->query("SELECT id,first_name,last_name FROM `admin` WHERE `is_delete`='0'")->result_array();
            $data['page']='user/manage_role';
            $this->load->view('Template/main',$data);
        }elseif($action=="view")
	    {
            $this->user_model->check_permissions('admin/role/view');
            $data['edit_delete']=$this->user_model->checkEditDelete('admin/role/view');
            $data['roles'] = $this->db->query("SELECT * FROM `role` WHERE `role`.`is_delete`='0'")->result_array();
            $data['page']='user/role_view';
            $this->load->view('Template/main',$data);
        }elseif($action=="add")
	    {
            $data['page']='user/role_add';
            $this->load->view('Template/main',$data);
        }else if($action=="delete")
        {
            $data = array(
                "is_delete"=>"1"
            );

            $this->db->where("id",$p);
            $this->db->update("role",$data);
            redirect("admin/role/view","refresh");
        }else if($action=="save")
		{
            if($this->input->post())
            {
                $title = $this->input->post("title",true);
                $remarks = $this->input->post("remarks",true);

                if(!empty($title) AND !empty($remarks))
                {
                    $data = array(
                    'title'=>$title,
                    'remarks'=>$remarks
                    );

                    $this->db->insert('role',$data);
                    redirect("admin/role/view","refresh");
                }else{
                    redirect("admin/role/view","refresh");
                }
            }
        }else if($action=="assign")
		{
            if($this->input->post())
            {
                $role = $this->input->post("role",true);
                $user = $this->input->post("user",true);

                if(!empty($role) AND !empty($user))
                {
                    $data = array(
                    'role_id'=>$role
                    );

                    $this->db->where('id', $user);
                    $this->db->update('admin' ,$data);
                    redirect("admin/role/manage","refresh");
                }else{
                    redirect("admin/role/manage","refresh");
                }
            }
        }
	}

    public function permission($action,$p=1)
	{
        $data['is_super'] = $this->user_model->is_super();
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        if($action=="manage")
	{
            // $this->user_model->check_permissions('admin/permission/manage');
            $data['role'] = $this->db->query("SELECT * FROM `role`  WHERE `role`.`is_delete`='0' AND `role`.`id`='$p'")->row_array();
            $data['allowed'] = $this->load_model->sub_menu();
            $data['page']='user/permissions';
            $this->load->view('Template/main',$data);
        }else if($action=="assign")
	{
            if($this->input->post())
            {
                if(!$this->input->post("role",true)){
                    #==if saving new role then insert into db and get role id==
                    $insert['title'] = $this->input->post("title",true);
                    $insert['remarks'] = $this->input->post("remarks",true);
                    $this->db->insert('role',$insert);
                    $role = $this->db->insert_id();
                    #===================================================
                }else{
                    $role = $this->input->post("role",true);
                    #==================else updating Role values=============
                    $insert['title'] = $this->input->post("title",true);
                    $insert['remarks'] = $this->input->post("remarks",true);
                    $this->db->where('id',$role)->update('role',$insert);
                    #===================================================
                }
                $permissions = $this->input->post("permissions",true);
                $edit_permissions = $this->input->post("edit_permissions",true);
                $delete_permissions = $this->input->post("delete_permissions",true);
                if(!empty($role))
                {
                    $this->db->where('role_id', $role);
                    $this->db->delete('permission');
                    if(!empty($permissions))
                    {
                        foreach ($permissions as $k => $v) {
                            $edit=false;
                            $delete=false;
                            if(isset($edit_permissions[$v]))
                            $edit=true;
                            if(isset($delete_permissions[$v]))
                            $delete=true;

                            $d = explode("_",$v);
                            $count_d=count($d);
                            if($count_d==2){
                                $menu_id = $d[0];
                                $submenu_id = $d[1];   

                                $data = array(
                                'role_id'=>$role,
                                'menu_id'=>$menu_id,
                                'submenu_id'=>$submenu_id
                                );
                                if($edit){
                                    $data['editable']=1;
                                }
                                if($delete){
                                    $data['deleteable']=1;
                                }
                            }else{
                                $menu_id = $d[0];
                                $submenu_id = $d[1];   
                                $sub_submenu_id = $d[2];   

                                $data = array(
                                'role_id'=>$role,
                                'menu_id'=>$menu_id,
                                'submenu_id'=>$submenu_id,
                                'sub_submenu_id'=>$sub_submenu_id
                                );
                                if($edit){
                                    $data['editable']=1;
                                }
                                if($delete){
                                    $data['deleteable']=1;
                                }
                            }
                            
                            $this->db->insert('permission', $data);
                        }
                    }
                    redirect("admin/role/view","refresh");
                }else{
                    redirect("admin/role/view","refresh");
                }
            }
        }
	}

    public function per_menu($role="")
    {
       echo $this->load_model->per_menu($role);
    }

    public function widgets($user_id='')
    {
        if($user_id=='') {
            $this->db->select('*');
            $this->db->where('is_delete',0);
            $wigdets=$this->db->get('dashboard_widgets')->result_array();
            $wigdets_div='';
            foreach ($wigdets as $key => $value) {
                $wigdets_div.= "<div class='checkbox'>
                        <label>
                            <input type='checkbox' class='widget_permission' name='widget_permissions[]' value='$value[id]'>$value[name]
                        </label>
                    </div>";
            }
            return $wigdets_div;
        }
        else {
            $this->db->select('*');
            $this->db->where('is_delete',0);
            $wigdets=$this->db->get('dashboard_widgets')->result_array();
            $wigdets_div='';
            foreach ($wigdets as $key => $value) {
                $has_permission=$this->db->query("select id from dashboard_permissions where user_id=$user_id and widget_id=$value[id]")->result_array();
                if(!empty($has_permission))
                $checked="checked";
                else
                $checked="";
                $wigdets_div.= "<div class='checkbox'>
                        <label>
                            <input type='checkbox' class='widget_permission' $checked name='widget_permissions[]' value='$value[id]'>$value[name]
                        </label>
                    </div>";
            }
            echo $wigdets_div;
        }
    }

    public function dashboard_permissions()
    {
        $data['is_super'] = $this->user_model->is_super();
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['roles'] = $this->db->query("SELECT `role`.`id`,`role`.`title`,`branch`.`name` FROM `role` INNER JOIN `branch` ON `branch`.`id`=`role`.`branch_id` WHERE `role`.`is_delete`='0'")->result_array();

        $data['widgets']=$this->widgets();
        $this->load->view('header',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('user/dashboard_permissions',$data);
    }

    public function update_dashboard_permissions()
    {
        if(!empty($this->input->post('user')) ) {
            $user_id=$this->input->post('user');
            $permissions=$this->input->post('widget_permissions');
            //var_dump('<pre>',$permissions);die();
            $this->db->query("delete from dashboard_permissions where user_id=$user_id");
            if(!empty($permissions)) {
                foreach ($permissions as $key => $value) {
                    $data[]=array(
                                "user_id"=>$user_id,
                                "widget_id"=>$value
                            );
                }
                //var_dump($data);die();
                $this->db->insert_batch('dashboard_permissions', $data);
            }

            redirect("Admin/dashboard_permissions","refresh");
        }
        else {
            redirect("Admin/dashboard_permissions","refresh");
        }
    }

}
