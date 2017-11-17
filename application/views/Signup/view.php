    <!-- Main content -->
 
  
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">View Retailers</h3>
        </div>
        <div class="box-body">
          <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
              <tr>
                <th>#</th>
                <th>Group</th>
                <th>F Name</th>
                <th>L Name</th>
                <th>Comp</th>
                <th>Address</th>
                <th>Ph#</th>
                <th>Email</th>
                <th>Cnic</th>
                <th>Pass</th>
                <th>Status</th>
                <th>c on</th>
                <th>c by</th>
                 <th>U on</th>
                <th>U by</th>
                <th>Actions</th>
              </tr>
            </thead>


            <tbody>
              <?php $i=1; foreach ($view as $val) { ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $val['g_name']; ?></td>
                <td><?php echo $val['u_firstname']; ?></td>
                <td><?php echo $val['u_lastname']; ?></td>
               <td><?php echo $val['u_company']; ?></td>
                <td><?php echo $val['u_address']; ?></td>
                 <td><?php echo $val['u_phone']; ?></td>
                  <td><?php 
                  if (strlen($val['u_email']) > 4)
                 $str = substr($val['u_email'], 0, 3);  
                 echo $str;?></td>
                   <td><?php 
                   if(strlen($val['u_cnic'])>3)
                    $str=substr($val['u_cnic'], 0,3);
                  echo $str; ?></td>
                   <td><?php echo $val['u_password']; ?></td>
                   <td><a href="<?php echo base_url()?>backend/Signup/update_status/<?php echo $val['u_id'];?>">
                    <?php echo ($val['u_status']=='Active') ? "<img src='../../Uploads/2.png' width='20px'>":"<img src='../../Uploads/3.png' width='20px'>"?>
                   </a></td>
                   <td><?php echo $val['created_on']; ?></td>
                   <td><?php echo $val['created_by']; ?></td>
                   <td><?php echo $val['updated_on']; ?></td>
                   <td><?php echo $val['updated_by']; ?></td>
                  <td>
                  <a class="text-custom1" href="<?php echo base_url(); ?>backend/Signup/edit/<?php echo $val['u_id']; ?>"><i class="fa fa-edit"></i></a> 
                  <a class="text-custom1" href="<?php echo base_url(); ?>backend/Signup/delete/<?php echo $val['u_id']; ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
         
        </div>
      </div>
    </section>
 
 