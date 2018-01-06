 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title">Tournaments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                    <a href="<?= base_url() ?>tournaments/match_add" class="btn btn-success"><span class="fa fa-plus"></span> New Match Schedule</a>
                </div>
              </div><br>
                <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tournaments</th>
                          <th>Match</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>winning-team</th>
                          <th>Actions</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $i=1; foreach ($matches as $key => $value) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['tour_name']; ?></td>
                          <td><?php echo $this->tm->getTeamName($value['team1'])." vs ".$this->tm->getTeamName($value['team2']); ?></td>
                          <td><?php echo date('d-m-y',strtotime($value['date'])); ?></td>
                          <td><?php echo ($value['status']==1?"Upcoming":"Completed"); ?></td>
                          <td><?php echo ($value['winning_team']==0?"-":$this->tm->getTeamName($value['winning_team'])); ?></td>
                          <td>
                            <a href="<?php echo $base_url; ?>tournaments/match_edit/<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></a> 
                            <a href="<?php echo $base_url; ?>tournaments/match_delete/<?php echo $value['id']; ?>"><i class="fa fa-trash"></i></a>
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
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 