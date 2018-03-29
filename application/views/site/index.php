<?= require_once "template/header.php"; ?>
    <!--SECTION: HEADER AND BANNER-->
    <section>
        <div class="home" id="home">
            <div class="h_l">
                <!-- BRAND LOGO AND EVENT NAMES -->
                <img src="<?= base_url(); ?>assets/frontend/images/logo.png" alt="" />
                <br><br>
                <p>Becoming a gym certified personal cricket trainer is your foundation for success. gym is the only personal trainer certification program that integrates a complete approach to cricket, wellness and business skills.</p>
                <h2>Current cricket Events</h2>
                <ul>
                    <?php foreach ($tournaments as $key => $value):  ?>
                        <?php if($key>4) break; ?>
                        <li><a href="#ev-po"><span><?= $key+1 ?></span><?= $value['name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <a href="#ev-po" class="aebtn">View All Events</a>
            </div>
            <div class="h_r">
                <!-- SLIDER -->
                <div class="slideshow-container">
                    <!-- FIRST SLIDER -->
                    <div class="mySlides fade">
                        <div class="numbertext">2 / 2</div>
                        <a href="#ev-po"><img src="<?= base_url(); ?>assets/frontend/images/banner/b6.jpg" alt="">
                        </a>
                        <!--<div class="text">Caption Text</div>-->
                    </div>
                    <!-- SECOND SLIDER -->
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 2</div>
                        <a href="#ev-po"><img src="<?= base_url(); ?>assets/frontend/images/banner/cricket1.jpg" alt="">
                        </a>
                        <!--<div class="text">Caption Text</div>-->
                    </div>

                    <!-- YOU CAN ADD MULTIPLE SLIDERS NOW-->
                    <!-- SLIDER NAVIGATION -->
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                </div>
            </div>
        </div>
    </section>

    <!--SECTION: EVENTS AND POINTS-->
    <section class="ev-po" id="ev-po">
        <div class="lp">
            <div class="row">
                <div class="col-md-12 eve-res">
                    <div class="events ev-po-2 ev-po-com">
                        <div class="ev-po-title pag-cri-inn-combg">
                            <h3>Match Schedule</h3>
                            <p>Recent & Upcoming matches and status</p>
                        </div>
                        <table class="myTable">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Tournament</th>
                                    <th>Teams</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Winning Team</th>
                                </tr>
                                <?php foreach ($matches as $key => $value): ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $value['t_name'] ?></td>
                                        <td><?= $value['t1_name']." <b>vs</b> ".$value['t2_name'] ?></</td>
                                        <td><?= date('d-m-y',strtotime($value['date'])) ?></</td>
                                        <td><?= ($value['status']==1?"Upcoming":"Completed") ?></</td>
                                        <td><?= ($value['winning_team']==0?"-":$this->tm->getTeamName($value['winning_team'])) ?></</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 eve-res">
                    <div class="events ev-po-1 ev-po-com">
                        <div class="ev-po-title pag-cri-inn-combg1">
                            <h3>Cricket Events</h3>
                            <p>Current and Upcoming</p>
                        </div>
                        <table class="myTable">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Event</th>
                                    <th>Register</th>
                                </tr>
                                <?php foreach ($tournaments as $key => $value): ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><img src="<?= base_url(); ?>assets/frontend/images/coun/19.png" alt="">
                                            <div class="h-tm-ra1">
                                                <h4><?= $value['name'] ?></h4><span><?= date('F d, Y',strtotime($value['start_date'])) ?></span>
                                            </div>
                                        </td>
                                        <td><a href="#register" class="link-btn reg-btn">Register Now</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 eve-res">
                    <div class="events ev-po-1 ev-po-com">
                        <div class="ev-po-title pag-cri-inn-combg1">
                            <h3>Cricket Clubs</h3>
                            <p>All</p>
                        </div>
                        <table class="myTable">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Club Name</th>
                                    <th>Location</th>
                                </tr>
                                <?php foreach ($clubs as $key => $value): ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><img src="<?= base_url(); ?>assets/frontend/images/coun/t10.png" alt="">
                                            <div class="h-tm-ra1">
                                                <h4><?= $value['name'] ?></h4>
                                            </div>
                                        </td>
                                        <td><a href="#register" class="link-btn reg-btn">Apply Now</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 eve-res">
                    <div class="teams ev-po-2 ev-po-com">
                        <div class="ev-po-title pag-cri-inn-combg">
                            <h3>Teams</h3>
                            <p>All teams and their players</p>
                        </div>
                        <table class="myTable">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Team Name</th>
                                    <th>Coach</th>
                                    <th>Players</th>
                                    <th>Club</th>
                                </tr>
                                <?php foreach ($teams as $key => $value): ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['coach'] ?></</td>
                                        <td><?php foreach ($value['players'] as $k => $v) {
                                            echo $v['name'].",";
                                        } ?></</td>
                                        <td><?php echo $this->db->where('id',$value['club'])->get('clubs')->row_array()['name']; ?></</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- REGISTER MY INFORMATION -->
    <section id="register">
        <div class="booking-bg-s lp">
            <div class="booking-bg-1">
                <div class="bg-book">
                    <div class="spe-title-1 spe-title-wid">
                        <h2>Register yourself <span>Now!</span> </h2>
                        <div class="hom-tit">
                            <div class="hom-tit-1"></div>
                            <div class="hom-tit-2"></div>
                            <div class="hom-tit-3"></div>
                        </div>
                        <p>Feel the thrill of seeing a global sporting event in one of the world's most incredible cities.</p>
                    </div>
                    <div class="book-succ">Thank you for Register with us we will get back to you soon.</div>
                    <div class="book-form">
                        <form id="tr_form" name="tr_form" class="form-horizontal" action="<?= base_url() ?>site/save" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Applicant name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Father name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="f_name" name="f_name" class="form-control" placeholder="Father Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">CNIC</label>
                                <div class="col-sm-10">
                                    <input type="text" id="cnic" name="cnic" class="form-control" placeholder="CNIC #" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Age / Gender</label>
                                <div class="col-sm-5">
                                    <input type="text" id="age" name="age" class="form-control" placeholder="Age" required>
                                </div>
                                <div class="col-sm-5">
                                    <select type="text" id="gender" name="gender" class="form-control" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Player Strength</label>
                                <div class="col-sm-10">
                                    <input type="text" id="type" name="type" class="form-control" placeholder="e.g: Bowler, Batsman" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Sports Club</label>
                                <div class="col-sm-10">
                                    <select id="club" name="club" class="form-control" >
                                        <option value="">Select Club</option>
                                        <?php
                                            foreach ($clubs as $key => $value) {
                                                echo "<option value='$value[name]'>$value[name]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Contact #</label>
                                <div class="col-sm-10">
                                    <input type="text" id="contacts" name="contact" class="form-control" placeholder="Contact no" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" value="submit" id="send_button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: TRAINING -->
    <section id="about">
        <div class="training img-pag-about">
            <div class="tr-pro">
                <div class="inn-title">
                    <h2><i class="fa fa-check" aria-hidden="true"></i> sports 2017 <span> about us</span></h2>
                    <p>Becoming a gym certified personal cricket trainer is your foundation for success. gym is the only personal trainer certification program that integrates</p>
                </div>

                <div class="inn-all-com inn-all-list tp-1">
                    <h4>Other Details</h4>
                    <ul>
                        <li>Get trained by qualified personnel</li>
                        <li>Guest lectures by International faculty</li>
                        <li>Internship with the Global cricket leader</li>
                        <li>Placement opportunities with Gold’s Gym</li>
                        <li>Earn handsome salaries on completion of course</li>
                        <li>cricket Assessment room</li>
                    </ul>
                </div>
                <!-- TRAINING BENEFITS -->
                <div class="inn-all-com inn-all-list inn-pad-top-5 tp-1">
                    <h4>Current match events</h4>
                    <p>Cricket Club management system will keep you updated with all the current tournaments and events, their match schedule, winning team and much more.</p>
                    <a href="#ev-po" class="inn-te-ra-link">Click to view Current match events</a>
                </div>
            </div>
        </div>
    </section>
<?= require_once "template/footer.php"; ?>