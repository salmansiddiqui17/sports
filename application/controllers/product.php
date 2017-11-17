<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

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
          $data["producttype"]=$this->generic_model->getAllRecords("producttype",array("is_deleted"=>0)
          ,"id","DESC");

          $data["page"]='product/list';
          $this->load->view('Template/main',$data);
        
    }

    public function add()
    {
          $data["page"]='product/add';
          $this->load->view('Template/main',$data);

    }

    public function save()
                  {
                  if ($_POST )
                  {

                  $this->load->model('generic_model');
                  $data["name"]=$this->input->post('name');
                  $data["description"]=$this->input->post('dec');
                  $data["createdAt"]=date("Y-m-d h:i:sa");
                  // $data["createdBy"]=$this->session->userdata('dekho_userId');

                  $this->db->insert('producttype', $data);
                  // $this->generic_model->insert("producttype",$data,array("id"=>$id));


                  $this->session->set_flashdata('msg', "Add producttype, Information has been added successfully");
                  redirect('product/add');

                  }

                  else{
                  $this->session->set_flashdata('msg', "Add producttype,id reference is missing or incorrect");
                  redirect('product/add');
                  }
                                
    }
     public function pricehistory()
    {
        $data["product"]=$this->generic_model->getProductPriceHistory();


        $data['page']='product/history';
        $this->load->view('Template/main',$data);
        //}
    }

    public function delete()
    {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('producttype',array('is_deleted'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Product is Deleted!');
        redirect('product/index');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: Product is not Deleted');
        redirect('product/index');
        }
    
    }   
     public function states()
    {
              $id=$this->uri->segment(3);
              $done=$this->db->where('id',$id)->update('producttype',array('status'=>1));
              if($done)
              {
              $this->session->set_flashdata('msg', 'Product is Deleted!');
              redirect('product/index');
              }
              else 
              {
              $this->session->set_flashdata('msg',' Error: Product is not Deleted');
              redirect('product/index');
              }
    
    }  
     public function active()
    {
          $id=$this->uri->segment(3);
          $done=$this->db->where('id',$id)->update('producttype',array('status'=>0));
          if($done)
          {
          $this->session->set_flashdata('msg', 'Product is Deleted!');
          redirect('product/index');
          }
          else 
          {
          $this->session->set_flashdata('msg',' Error: Product is not Deleted');
          redirect('product/index');
          }
    
    }    
    public function edit($id)
    {
        $id=$this->uri->segment(3);

        $data['product'] = $this->db->select()->from('producttype')->where('id',$id)
       ->get()->row();
      // var_dump( $data['product']);
      // die();
        $data['page']='Product/edit';
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
      $this->db->update('producttype',$data);
      $this->session->set_flashdata('msg', "producttype record has been updated successfully");
      redirect('product/index');  
       }


       public function list_prodcut()
      {
        $data["product"]=$this->generic_model->getProduct();
        $data['page']='Product/listproduct';
        $this->load->view('Template/main',$data);
      }

     public function add_product()
      {
          $data["productid"]=$this->generic_model->getSpecificRecord("product", array()); 
          $data["unitid"]=$this->generic_model->getSpecificRecord("unit", array()); 
          $data["producttype"]=$this->generic_model->getAllRecords("producttype",array("is_deleted"=>0,"status"=>0),"id","DESC"); 
          $data["unit"]=$this->generic_model->getAllRecords("unit",array("is_deleted"=>0,"status"=>0),"id","DESC"); 
          $data["page"]='product/add_product';
          $this->load->view('Template/main',$data);
      }
      public function save_product()
      {
         if ($_POST )
                  {
            date_default_timezone_set("Asia/Karachi");
     //    $data["id"]=$id;
          
              $this->load->model('generic_model');
              $data["heading"]=$this->input->post('heading');
              $data["unit_id"]=$this->input->post('unit_id');
              $data["product_type"]=$this->input->post('product_type');
              $data["description"]=$this->input->post('description');
              $data["price"]=$this->input->post('price');
              $data["createdAt"]=date("Y-m-d h:i:sa");
              // $data["createdBy"]=$this->session->userdata('dekho_userId');
              $this->generic_model->insert("product",$data);
              $this->session->set_flashdata('msg', "Add product, Information has been added successfully");
              redirect('product/add_product');
              }
              else{
              $this->session->set_flashdata('msg', "Add product,  reference is missing or incorrect");
              redirect('product/add_product');
              }

      }

          public function List_delete()
    {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('producttype',array('is_deleted'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Product is Deleted!');
        redirect('product/index');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: Product is not Deleted');
        redirect('product/index');
        }
    
    }   









       


}