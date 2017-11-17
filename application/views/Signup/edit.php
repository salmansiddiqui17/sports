 
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Manage Category</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="form-horizontal form-label-left" action="<?php echo base_url(); ?>backend/Category/update" method="post">
        <?php echo $this->session->flashdata('msg');?>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="fname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" type="text">
              </div>
            </div>
             <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Description<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="desc" class="form-control col-md-7 col-xs-12" name="desc"></textarea>
              </div>
            </div>
          
           
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button id="send" type="submit" class="btn btn-custom1">Add</button>
              </div>
            </div>
          </form>
        </div>
      </div>    
    </section>
    <!-- /.content -->
  </div>


