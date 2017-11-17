        

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class units extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
          $this->load->model('generic_model');
        //&& $this->uri->segment(1)!="userlogout"
        //  if ($this->session->userdata('dekho_userId') == ''){
        // redirect ('');}
        // else{
        // $this->load->model('generic_model');
        //$this->load->model('backend/model_permissions');
   // }

}
    public function index()
    {
        //$result=checkModulePermission();
        // if($result==TRUE){
        // $data = array();
        // if ($this->session->flashdata('success') != ""){
        //    $data['success'] = $this->session->flashdata('success');
        // }
        // if ($this->session->flashdata('errors') != ""){
        //    $data['errors'] = $this->session->flashdata('errors');
        // }
		
	// $data["unitArr"]=$this->generic_model->getAllRecordss("unit");
        $data["unit"]=$this->generic_model->getAllRecords("unit",array("is_deleted"=>0),"id","DESC");
        	
       
         $data["page"]='units/list';
          $this->load->view('Template/main',$data);
        
    }
     
          public function states()
    {
              $id=$this->uri->segment(3);
              $done=$this->db->where('id',$id)->update('unit',array('status'=>1));
              if($done)
              {
              $this->session->set_flashdata('msg', 'unit is Deactive!');
              redirect('units/index');
              }
              else 
              {
              $this->session->set_flashdata('msg',' Error: unit is not Deleted');
              redirect('units/index');
              }
    
    }  
     public function active()
    {
          $id=$this->uri->segment(3);
          $done=$this->db->where('id',$id)->update('unit',array('status'=>0));
          if($done)
          {
          $this->session->set_flashdata('msg', 'unit is active!');
          redirect('units/index');
          }
          else 
          {
          $this->session->set_flashdata('msg',' Error: unit is not Deleted');
          redirect('units/index');
          }
    }
       public function delete()
    {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('unit',array('is_deleted'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Product is Deleted!');
        redirect('units/index');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: Product is not Deleted');
        redirect('units/index');
        }
}

 public function add()
    {
          $data["page"]='units/add';
          $this->load->view('Template/main',$data);
    }

    public function save()
      {
      if ($_POST )
      {

      // $this->load->model('generic_model');
      $data["name"]=$this->input->post('name');
      $data["description"]=$this->input->post('dec');
      $data["createdAt"]=date("Y-m-d h:i:sa");
      // $data["createdBy"]=$this->session->userdata('dekho_userId');

      $this->db->insert('unit', $data);
      // $this->generic_model->insert("producttype",$data,array("id"=>$id));


      $this->session->set_flashdata('msg', "Add Units, Information has been added successfully");
      redirect('units/add');

      }

      else{
      $this->session->set_flashdata('msg', "Add units,id reference is missing or incorrect");
      redirect('units/add');
      }
                    
}

 public function edit($id)
    {
        $id=$this->uri->segment(3);

        $data['units'] = $this->db->select()->from('unit')->where('id',$id)
       ->get()->row();
       //var_dump( $data['units']);
       //die();
        $data['page']='units/edit';
        $this->load->view('Template/main',$data);
    }
    
   public function update()
    {
    //$this->load->model('generic_model');
    // $id=decode_uri($this->uri->segment(2));
      $id=$this->input->post('id');
      $data["name"]=$this->input->post('name');
      $data["description"]=$this->input->post('dec');
      $data["modifiedAt"]=date("Y-m-d h:i:sa");
      $this->db->where('id',$id);
      $this->db->update('unit',$data);
      $this->session->set_flashdata('msg', "units record has been updated successfully");
      redirect('units/index');  
    }



}
?>
