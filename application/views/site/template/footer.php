    <!--SECTION: FOOTER-->
    <section>
        <div class="ffoot" id="contact">
            <div class="lp">
                <!--SECTION: FOOTER-->
                <div class="row">
                    <div class="col-md-12 foot1">
                        <a href="#"><img src="<?= base_url(); ?>assets/frontend/images/cricket-logo.png" alt="">
                        </a>
                        <ul>
                            <li><span>10,231,124</span> Community Members</li>
                            <li><span>512</span> Sports Events</li>
                            <li><span>2124</span> Sports Games</li>
                        </ul>
                    </div>
                </div>
                <!--SECTION: FOOTER-->
                <div class="row foot2">
                    <div class="col-md-4">
                        <div class="foot2-1 foot-com">
                            <h4>ADDRESS & CONTACT</h4>
                            <p>DHA Phase VIII, Block C, Defence Road, near Canal Gardens, Lahore, Pakistan</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="foot2-2 foot-soc foot-com">
                            <h4>Follow Us Now</h4>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook fb1"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter tw1"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus gp1"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-envelope-o sh1"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="foot2-1 foot-com">
                            <h4>CONTACT US</h4>
                        </div>
                        <div class="foot2-2 foot-soc foot-com">
                            <span class="foot-ph">Phone: +71 8596 4152</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Footer-->
    <section>
        <!-- FOOTER: COPY RIGHTS -->
        <div class="fcopy">
            <div class="lp copy-ri row">
                <div class="col-md-6 col-sm-12 col-xs-12">Copyright © 2017 Sports Club Management. All Rights Reserved.</div>
                <div class="col-md-6 foot-privacy">
                    <ul>
                        <li><a href="#">Privacy</a>
                        </li>
                        <li><a href="#">Terms of use</a>
                        </li>
                        <li><a href="#">Security</a>
                        </li>
                        <li><a href="#">Policy</a>
                        </li>
                        <li><a href="#">Make Sponsors</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--== Bootstrap & Latest JS ==-->
    <script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/custom.js"></script>
    <script>
        $(document).ready(function () {

            $(document).on('click', 'a[href^="#"]', function (event) {
                event.preventDefault();
            
                $('html, body').animate({
                    scrollTop: $($.attr(this, 'href')).offset().top
                }, 500);
            });

        });
    </script>
</body>


</html>