<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Load_model extends CI_Model 
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function menu()
    {
        $role = $this->user_model->userInfo('role_id')['role_id'];
        $per_menu = $this->db->query("SELECT DISTINCT `permission`.`menu_id`,`menu`.`name`,`menu`.`icon` FROM `permission` INNER JOIN `menu` ON `menu`.`id` = `permission`.`menu_id` WHERE `permission`.`role_id`='$role' AND `menu`.`is_delete`='0' ORDER BY `menu`.`order` ASC")->result_array();
        $per_submenu = $this->db->query("SELECT DISTINCT `permission`.`submenu_id`,`permission`.`menu_id`,`submenu`.`name`,`submenu`.`link` FROM `permission` INNER JOIN `submenu` ON `submenu`.`id` = `permission`.`submenu_id` WHERE `permission`.`role_id`='$role' AND `submenu`.`is_delete`='0'")->result_array();
        
        $return = "";

        foreach ($per_menu as $k => $v) {
            $m_id = $v['menu_id'];
            $m_name = $v['name'];
            $m_icon = $v['icon'];
            $return .= '<li class="treeview">
                            <a href="#"><i class="fa '.$m_icon.'"></i>
                                <span>'.$m_name.'</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                        <ul class="treeview-menu">';
            foreach($per_submenu as $key=>$value)
            {
                $s_id = $value['menu_id'];
                $sm_id = $value['submenu_id'];
                $s_name = $value['name'];
                $s_link = $value['link'];
                if($m_id==$s_id){
                    $per_sub_submenu = $this->db->query("SELECT `permission`.`submenu_id`,`sub_submenu`.`name`,`sub_submenu`.`link` FROM `permission` INNER JOIN `sub_submenu` ON `sub_submenu`.`id` = `permission`.`sub_submenu_id` WHERE `permission`.`role_id`='$role' AND `sub_submenu`.`submenu_id`='$sm_id' AND `sub_submenu`.`is_delete`='0'")->result_array();
                     if(empty($per_sub_submenu) && !empty($s_link)) {
                        $return .= '<li><a href="'.base_url().$s_link.'"><i class="fa fa-circle-o"></i> '.$s_name.'</a></li>';
                     }else{
                        $return .= '<li class="treeview">
                                        <a href="#"><i class="fa fa-circle-o"></i> '.$s_name.
                                            '<span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                             </span>
                                        </a>
                                        <ul class="treeview-menu">';
                                            foreach ($per_sub_submenu as $ke => $va) {
                                                $return .= '<li><a href="'.base_url().$va['link'].'"><i class="fa fa-circle-o"></i> '.$va['name'].'</a></li>';
                                            }
                        $return .=      '</ul>
                                    </li>';
                     }
                }
            }
              $return .= '</ul>
                  </li>';
        }

        return $return;
    }

    public function menu_array($id="")
    {
        if(empty($id))
            $role = $this->user_model->userInfo('role_id')['role_id'];
        else
            $role = $id;
        $per_menu = $this->db->query("SELECT DISTINCT `permission`.`menu_id`,`menu`.`name`,`menu`.`icon` FROM `permission` INNER JOIN `menu` ON `menu`.`id` = `permission`.`menu_id` WHERE `permission`.`role_id`='$role' AND `menu`.`is_delete`='0' order by `menu`.`id`")->result_array();
        $per_submenu = $this->sub_menu($role);

        $return = array();

        foreach ($per_menu as $k => $v) {
            $m_id = $v['menu_id'];
            $m_name = $v['name'];
            $sub = array(); 
            foreach($per_submenu as $key=>$value)
            {
                $s_id = $value['menu_id'];
                $sub_id = $value['id'];
                $s_name = $value['name'];
                if($m_id==$s_id) {
                    $sub[] = array($s_id,$s_name,$sub_id);
                    end($sub);
                    $last = key($sub);
                    $per_sub_submenu = $this->db->query("SELECT `sub_submenu`.`id`,`sub_submenu`.`name` FROM `permission` INNER JOIN `sub_submenu` ON `sub_submenu`.`id` = `permission`.`sub_submenu_id` WHERE `permission`.`role_id`='$role' AND `sub_submenu`.`submenu_id`='$sub_id' AND `sub_submenu`.`is_delete`='0'")->result_array();
                    foreach ($per_sub_submenu as $ke => $va) {
                        $sub[$last]['sub_submenu'][]=array($s_id,$sub_id,$va['id'],$va['name']);
                    }
                }
            }
            $return[] = array($m_id,$m_name,$sub);
        }
        
        return $return;
    }

    public function sub_menu($role="")
    {
        if(empty($role))
            $role = $this->user_model->userInfo('role_id')['role_id'];
        else
            $role = $role;
        return $this->db->query("SELECT DISTINCT `submenu`.`id`,`permission`.`menu_id`,`submenu`.`name`,`submenu`.`link`,`permission`.`editable`,`permission`.`deleteable` FROM `permission` INNER JOIN `submenu` ON `submenu`.`id` = `permission`.`submenu_id` WHERE `permission`.`role_id`='$role' AND `submenu`.`is_delete`='0'")->result_array();
    }
    
    public function sub_submenu($role="")
    {
        if(empty($role))
            $role = $this->user_model->userInfo('role_id')['role_id'];
        else
            $role = $role;
        return $this->db->query("SELECT `permission`.`sub_submenu_id`,`sub_submenu`.`name`,`sub_submenu`.`link`,`permission`.`editable`,`permission`.`deleteable` FROM `permission` INNER JOIN `sub_submenu` ON `sub_submenu`.`id` = `permission`.`sub_submenu_id` WHERE `permission`.`role_id`='$role' AND `sub_submenu`.`is_delete`='0'")->result_array();
    }

    public function per_menu($role="")
    {
        if(empty($role))
            $role = $this->user_model->userInfo('role_id')['role_id'];
        else
            $role = $role;
        $curr_user = $this->user_model->userInfo('role_id')['role_id'];
        $return = "";
        $sub_i = $this->sub_menu($role);
        $sub_sub_i = $this->sub_submenu($role);
        $make_header=false;
        if($this->user_model->is_super())
        {
            $menus = $this->db->query("SELECT id,name FROM `menu` WHERE `is_delete`='0'")->result_array();
            $sub = $this->db->query("SELECT `submenu`.`id`,`submenu`.`name`,`submenu`.`menu_id` FROM `submenu` WHERE `is_delete`='0'")->result_array();
            foreach ($sub as $key => $value) {
                $sub_submenu=$this->db->query("SELECT `sub_submenu`.`id`,`sub_submenu`.`name`,`sub_submenu`.`submenu_id` FROM `sub_submenu` WHERE `submenu_id`='".$value['id']."' AND `is_delete`='0'")->result_array();
                if(!empty($sub_submenu))
                $sub[$key]['sub_submenu']=$sub_submenu;
            }
            foreach($menus as $k=>$v){
                $return .= '<div class="row">
                                <div class="col-xs-12">
                                    <div class="box col-sm-3 collapsed-box">
                                        <div class="box-header" >
                                            <h3 class="box-title">'.$v['name'].'</h3>
                                        <div class="box-tools pull-right">
                                            <input type="checkbox" class="sub_menu _module" />
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                            <i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                            <table class="per-table table table-bordered table-striped">
                                <thead class="bg-primary">
                                    <tr><th>Page</th><th>Edit</th><th>Delete</th></tr>
                                </thead>';
                foreach ($sub as $key => $value) { 
                    if($value['menu_id']==$v['id']){
                        if(!isset($value['sub_submenu'])) {
                            if($make_header){
                                $return .= $this->makeHeader();
                                $make_header = false;
                            }
                            $i = $this->user_model->search_multi_arr($sub_i,"name",$value["name"]);
                            if($role!=$curr_user)
                            {
                                if($i)
                                    $a = "checked";
                                else
                                    $a = "";
                                $e = $this->checkEditable($sub_i,$value["name"]);
                                $d = $this->checkDeleteable($sub_i,$value["name"]);
                            }else{
                                $a = "";
                                $e = "";
                                $d = "";
                            }
                            $return .= '<div class="checkbox">
                                        <tr>
                                            <td><input type="checkbox" class="sub_menu" '.$a.' name="permissions[]" value="'.$v['id'].'_'.$value['id'].'"> '.$value['name'].'</td>
                                            <td><input type="checkbox" class="sub_menu" '.$e.' name="edit_permissions['.$v['id'].'_'.$value['id'].']" value="true" /></td>
                                            <td><input type="checkbox" class="sub_menu" '.$d.' name="delete_permissions['.$v['id'].'_'.$value['id'].']" value="true" /></td>
                                        </tr>
                                        </div>'; 
                        }else {
                            $return .= '</table><h2>&emsp;&emsp;'.$value['name'].'</h2>
                                        <table class="sub-submenu per-table table table-bordered table-striped" style="width:80%;">
                                            <thead class="bg-info">
                                                <tr><th>Page</th><th>Edit</th><th>Delete</th></tr>
                                            </thead>';
                            foreach ($value['sub_submenu'] as $ke => $va) {
                               $i = $this->user_model->search_multi_arr($sub_sub_i,"name",$va['name']);
                               if($role!=$curr_user)
                                {
                                    if($i)
                                        $a = "checked";
                                    else
                                        $a = "";
                                    $e = $this->checkEditable($sub_sub_i,$va['name']);
                                    $d = $this->checkDeleteable($sub_sub_i,$va['name']);
                                }else{
                                    $a = "";
                                    $e = "";
                                    $d = "";
                                }
                                $return .= '<div class="checkbox">
                                                <tr>
                                                    <td><input type="checkbox" class="sub_menu" '.$a.' name="permissions[]" value="'.$v['id'].'_'.$value['id'].'_'.$va['id'].'"> '.$va['name'].'</td>
                                                    <td><input type="checkbox" class="sub_menu" '.$e.' name="edit_permissions['.$v['id'].'_'.$value['id'].'_'.$va['id'].']" value="true" /></td>
                                                    <td><input type="checkbox" class="sub_menu" '.$d.' name="delete_permissions['.$v['id'].'_'.$value['id'].'_'.$va['id'].']" value="true" /></td>
                                                </tr>
                                            </div>'; 
                            }
                            $return .= '</table>';
                            $make_header = true;
                        }
                    }
                }
                $return .= '</table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->';
            } 
        }else{
            $permissions = $this->menu_array();
            foreach ($permissions as $key => $value) {
                $return .= '<div class="row">
                                <div class="col-xs-12">
                                    <div class="box col-sm-3 collapsed-box">
                                        <div class="box-header" >
                                            <h3 class="box-title">'.$value[1].'</h3>
                                        <div class="box-tools pull-right">
                                            <input type="checkbox" class="sub_menu _module" />
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                            <i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                <table class="per-table table table-bordered table-striped">
                    <thead class="bg-primary">
                        <tr><th>Page</th><th>Edit</th><th>Delete</th></tr>
                    </thead>';
                foreach ($value[2] as $key => $v) { 
                    if($value[0]==$v[0]){
                        if(!isset($v['sub_submenu'])) {
                            if($make_header){
                                $return .= $this->makeHeader();
                                $make_header = false;
                            }
                            $i = $this->user_model->search_multi_arr($sub_i,"name",$v[1]);
                            //var_dump($admin,$curr_user);
                            if($role!=$curr_user)
                            {
                                if($i)
                                    $a = "checked";
                                else
                                    $a = "";
                                $e = $this->checkEditable($sub_i,$v[1]);
                                $d = $this->checkDeleteable($sub_i,$v[1]);
                            }else{
                                $a = "";
                                $e = "";
                                $d = "";
                            }
                            $return .= '<div class="checkbox">
                                    <tr>
                                    <td><input type="checkbox" class="sub_menu" '.$a.' name="permissions[]" value="'.$value[0].'_'.$v[2].'"> '.$v[1].'</td>
                                    <td><input type="checkbox" class="sub_menu" '.$e.' name="edit_permissions['.$value[0].'_'.$v[2].']" value="true" /></td>
                                    <td><input type="checkbox" class="sub_menu" '.$d.' name="delete_permissions['.$value[0].'_'.$v[2].']" value="true" /></td>
                                    </tr>
                            </div>';    
                        }
                        else{
                            $return .= '</table><h2>&emsp;&emsp;'.$v[1].'</h2>
                                        <table class="sub-submenu per-table table table-bordered table-striped" style="width:80%;">
                                            <thead class="bg-info">
                                                <tr><th>Page</th><th>Edit</th><th>Delete</th></tr>
                                            </thead>';
                            foreach ($v['sub_submenu'] as $ke => $va) {
                                $i = $this->user_model->search_multi_arr($sub_sub_i,"name",$va[3]);
                                if($role!=$curr_user)
                                {
                                    if($i)
                                        $a = "checked";
                                    else
                                        $a = "";
                                    $e = $this->checkEditable($sub_sub_i,$va[3]);
                                    $d = $this->checkDeleteable($sub_sub_i,$va[3]);
                                }else{
                                    $a = "";
                                    $e = "";
                                    $d = "";
                                }
                                $return .= '<div class="checkbox">
                                        <tr>
                                        <td><input type="checkbox" class="sub_menu" '.$a.' name="permissions[]" value="'.$value[0].'_'.$v[2].'_'.$va[2].'"> '.$va[3].'</td>
                                        <td><input type="checkbox" class="sub_menu" '.$e.' name="edit_permissions['.$value[0].'_'.$v[2].'_'.$va[2].']" value="true" /></td>
                                        <td><input type="checkbox" class="sub_menu" '.$d.' name="delete_permissions['.$value[0].'_'.$v[2].'_'.$va[2].']" value="true" /></td>
                                        </tr>
                                </div>';
                            }
                            $return .= '</table>';
                            $make_header = true;
                        }
                    }
                }
                $return .= '</table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->';
            }
        } 
        return $return;
    }
     public function data_emp($ref="",$val=0)
    {
    
        $branch=$this->user_model->getbranch();
        if($ref=="teacher"){
            
            $this->db->select("id,CONCAT(firstname,' ', lastname) as name");
            $this->db->from('teacher');
            $this->db->where('branch',$branch)->where('is_delete',0)->where('id',$val);
            
            $data=$this->db->get()->result_array()[0];
            return $data;
        
        }else if($ref=="staff"){
            $this->db->select("id,CONCAT(firstname,' ', lastname) as name");
            $this->db->from('staff');
            $data1= $this->db->where('branch',$branch)->where('status',0)->where('id',$val);
            $data=$this->db->get()->result_array()[0];
       
             return $data;
        }else{echo "";}
    }

    public function checkEditable($array=array(), $val)
    {
        $edit=false;
        foreach ($array as $item) {
            if ($item['name'] == $val){
                if($item['editable']==1)
                $edit=true;
            }
        }
        return $edit?"checked":" ";
    }
    
    public function checkDeleteable($array=array(), $val)
    {
        $delete=false;
        foreach ($array as $item) {
            if ($item['name'] == $val){
                if($item['deleteable']==1)
                $delete=true;
            }
        }
        return $delete?"checked":" ";
    }

    public function makeHeader()
    {
        return '<table class="per-table table table-bordered table-striped">
                    <thead class="bg-primary">
                        <tr><th>Page</th><th>Edit</th><th>Delete</th></tr>
                    </thead>';
    }

}


?>