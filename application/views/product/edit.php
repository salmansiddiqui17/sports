<div class="container">
    <div class="row">
        <div class="col-md-11">
  <div class="box box-info">
            <div class="box-header with-border">
              <h2 class="box-title">Update data</h2>
               <p style="color:green;font-weight: bold;padding:10px;text-align: center"><?php echo $this->session->flashdata('msg');?></p>
 
            </div>
             <p style="color:green;font-weight: bold;padding:10px;text-align: center"><?php echo $this->session->flashdata('msg');?></p>
 
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url()?>product/update" method="post" enctype="multipart/formdata">
              <div class="box-body">
                <div class="form-group">
                   <input type="hidden" name="id" value="<?php echo $product->id?>">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-6">
                      <input type="name" name="name" value="<?php echo $product->name?>" class="form-control" id="inputEmail3" placeholder="Name" required>
                  </div>
                </div>
                  
                  
                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Description </label>

                  <div class="col-sm-6">
                    <textarea name="dec" class="form-control" rows="4" cols="50"  required><?php echo $product->description?>
                    </textarea>
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <input type="submit" value="Update product" class="btn btn-primary pull-left col-md-offset-2">
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
    </div>
</div>