 <!-- /.row -->
 <section class="content">
    <form class="form-horizontal form-label-left" action="<?php echo $base_url; ?>admin/permission/assign" method="post">
      <div class="row">
        <div class="col-xs-12">
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title">Add New Role</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Role Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="title" class="form-control col-md-7 col-xs-12" name="title" placeholder="Role Title" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="remarks" name="remarks" class="form-control col-md-7 col-xs-12" placeholder="Remarks">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="all"> All
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <button id="send" type="submit" class="btn btn-success pull-right">Save Role</button>
                        </div>
                      </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div id="permision_wrapper">
        <?php
            echo $this->load_model->per_menu($userInfo['role_id']);   
        ?>
      </div>
    </form>
    </section>
    <script>
    $(function(){
        $("checkbox").prop( "checked", false );
        $('#all').click(function() {   
                if ($(this).is(':checked')) {
                    $(".sub_menu").prop( "checked", true );
                } else {
                    $(".sub_menu").prop( "checked", false );
                }
        });
        $('._module').click(function() {   
                if ($(this).is(':checked')) {
                    $(this).parent().parent().parent().find(':checkbox').prop( "checked", true );
                } else {
                    $(this).parent().parent().parent().find(':checkbox').prop( "checked", false );
                }
        });
    });
    </script>