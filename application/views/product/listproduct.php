 <section class="content">
      <div class="row">
        <div class="col-xs-12">
               <div style="padding-left:0px;" class="panel-heading">
                  <a  class="btn btn-success"  href="<?php echo base_url();?>Product/add/">Add Product</a>
 
              </div>
          <div class="box col-sm-3" style="padding-top:20px">
            
            <div class="box-header" style="padding-top:50px" >
              <h3 class="box-title">List Product Type</h3>
            </div>
             <p style="color:green;font-weight: bold;padding:10px;text-align: center"><?php echo $this->session->flashdata('msg');?></p>
 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                   
                                    <th> Name</th>
                                    <th> Unit</th>
                                    <th> Product Type</th>
                                    <th> Price</th>
                                    <th>Action</th>
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($product))
                            {
                            foreach($product as $amb){ ?>
                                <tr class="odd gradeX">
                                <td><?php echo $amb["heading"];?></td>
                                 <td><?php echo $amb["unit"];?></td>
                                 <td><?php echo $amb["producttype"];?></td>
                                  <td><?php echo $amb["price"];?></td>
                                <td>
               <a class="text-custom1" href="<?php echo base_url();?>Product/List_edit/<?php echo $amb['id'];?>"><i class="fa fa-edit fa-1x"></i></a> 
               <a class="text-custom1" href="<?php echo base_url();?>Product/List_delete/<?php echo $amb['id'];?>"><i class="fa fa-trash fa-1x"></i></a>


                                </td>
                                
                            </tr>
                            <?php } }?>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
            

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 