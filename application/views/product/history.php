 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding-top:50px">
              <table  id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> Name</th>
                                      <th> Unit</th>
                                      <th> Product Type</th>
                                       <th> Price</th>
                                        <th> Start Date</th>
                                         <th> End Date</th>
                                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                            foreach($product as $amb){ ?>
                                <tr class="odd gradeX">
                                <td><?php echo $amb["heading"];?></td>
                                 <td><?php echo $amb["unit"];?></td>
                                 <td><?php echo $amb["producttype"];?></td>
                                  <td><?php echo $amb["price"];?></td>
                                  <td><?php echo $amb["createdAt"];?></td>
                                  <td><?php echo $amb["modifiedAt"];?></td>
                                <td>
                                     <a class="btn btn-info" href="<?php echo base_url('editproduct/'.encode_url($amb['id'])); ?>" title="Edit">
                                                <i class="fa fa-edit "></i>  
                                        </a>
                                        <a class="btn btn-danger" onclick="return confirm('Do you really want to Delete this information ?');" href="<?php echo base_url('deleteproduct/'.encode_url($amb['id'])); ?>" title="Delete">
                                                <i class="fa fa-trash-o "></i> 
                                        </a>
                                </td>
                                
                            </tr>
                            <?php } ?>

                </tbody>
               
              </table>
            </div>
          </div>
        </div>
