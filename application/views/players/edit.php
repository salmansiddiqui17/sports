 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title">Edit Player</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-horizontal form-label-left" action="<?php echo $base_url; ?>players/update" method="post">
                    <input name="id" value="<?php echo $player['id']; ?>" type="hidden">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" value="<?= $player['name'] ?>" name="name" placeholder="Full Name" required="required" pattern="[A-Za-z ]+" title="Alphabets only" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Father Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="f_name" class="form-control col-md-7 col-xs-12" value="<?= $player['f_name'] ?>" name="f_name" placeholder="Father Name" required="required" pattern="[A-Za-z ]+" title="Alphabets only" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">CNIC <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="cnic" name="cnic" value="<?= $player['cnic'] ?>" required="required" class="form-control col-md-7 col-xs-12" placeholder="CNIC 13 digits">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Age <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="age" class="form-control col-md-7 col-xs-12" value="<?= $player['age'] ?>" name="age" placeholder="Age" required="required" type="number">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gender <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="gender" class="form-control col-md-7 col-xs-12" name="gender" required="required" >
                              <option value="">Select Gender</option>
                              <option value="Male" <?= ($player['gender']=="Male"?"selected":"") ?> >Male</option>
                              <option value="Female" <?= ($player['gender']=="Female"?"selected":"") ?> >Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Player Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="type" name="type" value="<?= $player['type'] ?>" required="required" class="form-control col-md-7 col-xs-12" placeholder="E.g Batsman, Bowler">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Player Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="club" name="club" value="<?= $player['club'] ?>"  class="form-control col-md-7 col-xs-12" placeholder="Club">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Contact # <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="contact" name="contact" value="<?= $player['contact'] ?>" required="required" class="form-control col-md-7 col-xs-12" placeholder="Contact Number">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 