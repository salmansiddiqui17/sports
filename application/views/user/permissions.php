<style>
    .per-table td {
        padding: 5px 5px;
    }
    
    .sub-submenu {
        margin-left: 50px;
    }
</style> 
 <!-- /.row -->
 <section class="content">
     <form action="<?php echo base_url(); ?>admin/permission/assign" class="form-horizontal form-label-left" method="post">
      <div class="row">
        <div class="col-xs-12">
          <div class="box col-sm-3">
            <div class="box-header" >
                <h3 class="box-title">Permissions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                      <input type="hidden" name="role" value="<?= $role['id'] ?>">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Role Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="title" class="form-control col-md-7 col-xs-12" value="<?= $role['title'] ?>"  name="title" placeholder="Role Title" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="remarks" name="remarks" value="<?= $role['remarks'] ?>" class="form-control col-md-7 col-xs-12" placeholder="Remarks">
                        </div>
                      </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="all"> All
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-success pull-right" type="submit">Update</button>
                        </div>
                  <!--</form>-->
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
            echo $this->load_model->per_menu($role['id']);   
        ?>
      </div>
    </form>
    </section>
 
     <script>
        $(document).ready(function(){
            // $(document).on("change","#role",function(){
            //     var value = $(this).val();
            //     $.get("<?php echo base_url(); ?>admin/per_menu/"+value,{},function(d){
            //         $("#permision_wrapper").html(d);
            //         $('.box').boxWidget();
            //     });
            // });;
            // setTimeout(function() {
            //     $.get("<?php echo base_url(); ?>admin/per_menu/"+"<?= $role['id'] ?>",{},function(d){
            //         $("#permision_wrapper").html(d);
            //         $('.box').boxWidget();
            //     });
            // }, 300);
            // $.get("<?php echo base_url(); ?>admin/per_menu/"+"<?= $role['id'] ?>",{},function(d){
            //     $("#permision_wrapper").html(d);
            //     $('.box').boxWidget();
            // });
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
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 