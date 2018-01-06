 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title">New Match</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-horizontal form-label-left" action="<?php echo $base_url; ?>tournaments/match_update" method="post">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tournament Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="id" value="<?php echo $match['id']; ?>" type="hidden">
                          <select id="tour_id" class="form-control col-md-7 col-xs-12" name="tour_id" required="required" >
                              <option value="">Select Tournament</option>
                              <?php foreach ($tournaments as $key => $value) {
                                  echo "<option value='$value[id]' ".($value['id']==$match['tour_id']?"selected":"")." >$value[name]</option>";
                              } ?>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Team 1 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="team1" class="form-control col-md-7 col-xs-12" name="team1" required="required" >
                                <option value="">Select Team 1</option>
                                <?php
                                   foreach ($teams as $key => $value) {
                                    echo "<option value='$value[id]' ".($value['id']==$match['team1']?"selected":"")." >$value[name]</option>";
                                   }
                                ?>
                            </select>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Team 2 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="team2" class="form-control col-md-7 col-xs-12" name="team2" required="required" >
                                <option value="">Select Team 2</option>
                                <?php
                                   foreach ($teams as $key => $value) {
                                    echo "<option value='$value[id]' ".($value['id']==$match['team2']?"selected":"")." >$value[name]</option>";
                                   }
                                ?>
                            </select>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Match date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="date" value="<?= $match['date'] ?>" class="form-control col-md-7 col-xs-12" name="date" required="required" >
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Match Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="status" class="form-control col-md-7 col-xs-12" name="status" required="required">
                              <option value="1" <?= ($match['status']==1?"selected":"") ?> >Upcoming</option>
                              <option value="2" <?= ($match['status']==2?"selected":"") ?>>Completed</option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Winning Team
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="winning_team" class="form-control col-md-7 col-xs-12" name="winning_team" >
                              <option value="">Select Winning Team</option>
                              <?php
                                   foreach ($teams as $key => $value) {
                                    echo "<option value='$value[id]' ".($value['id']==$match['winning_team']?"selected":"")." >$value[name]</option>";
                                   }
                              ?>
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Add</button>
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
<script>
$(function(){

  $('#tour_id').change(function(){
      var val = $(this).val();
      $.get('<?= base_url() ?>tournaments/teamsAgainstTour/'+val,function(ret){
          var team1 = '<option value="">Select Team 1</option>';
          var team2 = '<option value="">Select Team 2</option>';
          var win_team = '<option value="">Select Winning Team</option>';
          $('#team1').html(team1+ret);
          $('#team2').html(team2+ret);
          $('#winning_team').html(win_team+ret);
      });
  });


});
</script>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 