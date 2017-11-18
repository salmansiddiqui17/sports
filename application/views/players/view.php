 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title">Players</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                    <a href="<?= base_url() ?>players/add" class="btn btn-primary"><span class="fa fa-plus"></span> Add Player</a>
                </div>
              </div><br>
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Father Name</th>
                          <th>Cnic</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>Player Type</th>
                          <th>Contact</th>
                          <th>Actions</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $i=1; foreach ($players as $key => $value) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['name']; ?></td>
                          <td><?php echo $value['f_name']; ?></td>
                          <td><?php echo $value['cnic']; ?></td>
                          <td><?php echo $value['age']; ?></td>
                          <td><?php echo $value['gender']; ?></td>
                          <td><?php echo $value['type']; ?></td>
                          <td><?php echo $value['contact']; ?></td>
                          <td>
                            <a href="<?php echo $base_url; ?>players/edit/<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></a> 
                            <a href="<?php echo $base_url; ?>players/delete/<?php echo $value['id']; ?>"><i class="fa fa-trash"></i></a>
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
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 