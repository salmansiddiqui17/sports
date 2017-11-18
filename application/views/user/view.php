 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                    <a href="<?= base_url() ?>Admin/user/add" class="btn btn-primary"><span class="fa fa-plus"></span> Add User</a>
                </div>
              </div><br>
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>FirstName</th>
                          <th>LastName</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Contact</th>
                          <th>Actions</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $i=1; foreach ($admins as $key => $value) {
                            if(!$this->user_model->is_super() && $value['role_id']==1)
                            continue; ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['first_name']; ?></td>
                          <td><?php echo $value['last_name']; ?></td>
                          <td><?php echo $value['username']; ?></td>
                          <td><?php echo $value['email']; ?></td>
                          <td><?php echo $value['contact_no']; ?></td>
                          <td>
                            <a href="<?php echo $base_url; ?>admin/user/edit/<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></a> 
                            <a href="<?php echo $base_url; ?>admin/user/delete/<?php echo $value['id']; ?>"><i class="fa fa-trash"></i></a>
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
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 