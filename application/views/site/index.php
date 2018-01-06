<?= require_once "template/header.php"; ?>
    <!--SECTION: HEADER AND BANNER-->
    <section>
        <div class="home" id="home">
            <div class="h_l">
                <!-- BRAND LOGO AND EVENT NAMES -->
                <img src="<?= base_url(); ?>assets/frontend/images/cricket-logo.png" alt="" />
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
                                        <td><a href="team-register.html" class="link-btn reg-btn">Register Now</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 eve-res">
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
        </div>
    </section>

    <!-- SECTION: TRAINING -->
    <section>
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