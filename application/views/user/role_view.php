 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title">Roles</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <div class="col-md-12">
                      <a href="<?= base_url() ?>Admin/role/add" class="btn btn-primary"><span class="fa fa-plus"></span> Add Role</a>
                  </div>
              </div><br>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Role Title</th>
                          <th>Remarks</th>
                          <th>Actions</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $i=1; foreach ($roles as $key => $value) { 
                        if(!$this->user_model->is_super() && $value['id']==1)
                        continue;
                        if(!$this->user_model->is_super() && $userInfo['role_id']==$value['id'])
                        continue;  ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['title']; ?></td>
                          <td><?php echo $value['remarks']; ?></td>
                          <td>
                            <?php if($edit_delete['edit']) {?>
                            <a href="<?php echo $base_url; ?>admin/permission/manage/<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></a> 
                            <?php } if($edit_delete['delete']){ ?>
                            <a href="<?php echo $base_url; ?>admin/role/delete/<?php echo $value['id']; ?>"><i class="fa fa-trash"></i></a>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
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