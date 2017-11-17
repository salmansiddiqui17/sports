<div class="container">
    <div class="row">
        <div class="col-md-11">
  <div class="box box-info">
            <div class="box-header with-border">
              <h2 class="box-title">Add Driver Information</h2>
               <p style="color:green;font-weight: bold;padding:10px;text-align: center"><?php echo $this->session->flashdata('msg');?></p>
 
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url()?>product/save_product" method="post" enctype="multipart/formdata">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-6">
                      <input type="name" name="heading" class="form-control" id="inputEmail3" placeholder="Name" required>
                  </div>
                </div>
                  
                  
                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Product Type:</label>

                  <div class="col-sm-6">
                   <select class="form-control" name="product_type" selected="selected">
                    <option>Select Product Type</option> 
                            <?php        
                     if(!empty($producttype)){
     foreach ($producttype as $v){         
                                       ?>
                                    <option value="<?php  echo  $v["id"];?>">
                                   
                                <?php  echo  $v["name"]; 'selected'?>
                                    </option>               
                                    <?php }} ?>
                                </select>
                  </div>
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Units:</label>

                  <div class="col-sm-6">
             <select class="form-control" name="unit_id" selected="selected">
              <option>Select Units   </option>    
                    <?php        
                     if(!empty($unit)){
     foreach ($unit as $u){         
                                       ?>
                                    <option value="<?php  echo  $u["id"];?>" <?php  if($productid['unit_id']==$u["id"]) { { echo "selected"; } } ?>  >
                                <?php  echo  $u["name"]; 'selected'?>
                                    </option>                                                              
                                    <?php }} ?>
                                </select>
                  </div>
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Price:</label>

                  <div class="col-sm-6">
                      <input type="name" name="price" class="form-control" id="inputEmail3" placeholder="Name" required>
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Description:</label>

                  <div class="col-sm-6">
                            
                            <textarea name="description" class="form-control" rows="4" cols="50"  required></textarea>
                  
   
                                       </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <input type="submit" value="Add Product" class="btn btn-primary pull-left col-md-offset-2">
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
    </div>
</div>