 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box col-sm-3" style="padding-top:20px">
            <a  class="btn btn-success"  href="<?php echo base_url();?>Product/add/">Add Product Type </a>
 
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
                                    <th>Description</th>
                                     
                                    <th>Status</th>
                                    <th>Action</th>
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($producttype))
                            {
                            foreach($producttype as $amb){ ?>
                                <tr class="odd gradeX">
                                <td><?php echo $amb["name"];?></td>


                                  
                                  <td><?php echo $amb["description"];?></td>
                            
                                <td>
                                        <?php if ($amb["status"]=="0"){?>
                                                                      Active
                                                 
                                        

                                    <?php } elseif($amb["status"]=="1") {?>
                                                    De-Active
                                                 
                                       
                                    <?php } ?>
                                    
                                </td>
                                    <td>
                                    
                                       


                                          <a class="text-custom1" href="<?php echo base_url();?>Product/edit/<?php echo $amb['id'];?>"><i class="fa fa-edit fa-1x"></i></a> 
               <a class="text-custom1" href="<?php echo base_url();?>Product/delete/<?php echo $amb['id'];?>"><i class="fa fa-trash fa-1x"></i></a>
                  <a class="text-custom1" href="<?php echo base_url();?>Product/states/<?php echo $amb['id'];?>"><i class="fa fa-times fa-1x"></i></a>
<a class="text-custom1" href="<?php echo base_url();?>Product/active/<?php echo $amb['id'];?>"><i class="fa fa-check fa-1x"></i></a>
 
 
                               
                                </td>
                            </tr>
                            <?php } }?>

                           
                            </tbody>
                        </table>
               </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 