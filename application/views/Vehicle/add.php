
<section class="content">
    <div class="row">
        <div class="col-md-11">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h2 class="box-title">Add Helper Information</h2>
                   <p style="color:green;font-weight: bold;padding:10px;text-align: center"><?php echo $this->session->flashdata('msg');?></p>
                </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url()?>Defination/savehelper" method="post" enctype="multipart/formdata">
              <div class="box-body">
                  
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-6">
                      <input type="name" name="name" class="form-control" id="inputEmail3" placeholder="Name">
                  </div>
                </div>
                  
                  
                <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                           
                            <div class="col-sm-6">
                                
                                <input class="form-control" type="text" name="number[]"  placeholder="Phone Number" required="required" />
                                
                                <div class="input_fields_wrap"></div>
                            </div>
                          
                    <div class="col-lg-2">
                        
                        <button style="border:0px;color:#fff;font-size:18px;margin-top:15px;border-radius: 70px; background-color: #F44251;" class="add_field_button"><span class="fa fa-plus"></span></button>
   
                    </div>
                </div>
                 
                    
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Cnic</label>

                  <div class="col-sm-6">
                      <input type="cnic" name="cnic" class="form-control" id="inputEmail3" placeholder="Cnic">
                  </div>
                </div>
                  
                  
                  
                  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Religion</label>
                  <div class="col-sm-6">
                      <input type="cnic" name="religion" class="form-control" id="inputEmail3" placeholder="Religion">
                  </div>
                </div>
                  
                  
                  
                  
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-6">
                      <input type="address" name="address" class="form-control" id="inputEmail3" placeholder="Address">
                  </div>
                </div>
                  
             
                  
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Date of Joining</label>

                  <div class="col-sm-6">
                      <input type="cnic" name="doj" class="form-control" id="datepicker" placeholder="Date of Joining">
                  </div>
                </div>
                  
                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Date of Birth</label>

                  <div class="col-sm-6">
                      <input type="cnic" name="dob" class="form-control" id="datepicker1" placeholder="Date of Birth">
                  </div>
                </div>
                  
                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Driver License</label>

                  <div class="col-sm-6">
                      <input type="cnic" name="driver" class="form-control" id="inputEmail3" placeholder="Driver License">
                  </div>
                </div>
                 
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Scan Documents</label>

                  <div class="col-sm-6">
                      <input type="file" id="inputEmail3" name="image">
                  </div>
                </div>
                  
               
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                  <button type="submit" class="btn btn-info pull-left col-md-offset-2">Save</button>&nbsp;<button type="button" type="reset" class="btn btn-warning dropdown-toggle">Reset</button>
            
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
    </div>
</section>