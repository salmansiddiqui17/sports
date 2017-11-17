 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title">Assign Role To Existing User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-horizontal form-label-left" action="<?php echo $base_url; ?>admin/role/assign" method="post">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Role <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select id="role" class="form-control col-md-7 col-xs-12" name="role" required="required">
                            <option value="">Select Role</option>
                            <?php foreach ($roles as $key => $value) {
                              if(!$is_super)
                              {
                                if($value['title']!="Super")
                                  echo '<option value="'.$value['id'].'">' . $value['title'] . '</option>';
                              }
                              else
                                  echo '<option value="'.$value['id'].'">' . $value['title'] . '</option>';
                            } ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user">User <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select id="user" class="form-control col-md-7 col-xs-12" name="user" required="required">
                            <option value="">Select User</option>
                            <?php foreach ($users as $key => $value) {
                              echo '<option value="'.$value['id'].'">' . $value['first_name'] . ' ' . $value['last_name'] . '</option>';
                            } ?>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Assign Role</button>
                        </div>
                      </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title">Add New Role</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-horizontal form-label-left" action="<?php echo $base_url; ?>admin/role/save" method="post">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Role Title <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="title" class="form-control col-md-7 col-xs-12"  name="title" placeholder="Role Title" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="remarks" name="remarks" required="required" class="form-control col-md-7 col-xs-12" placeholder="Remarks">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Save Role</button>
                        </div>
                      </div>
                  </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>