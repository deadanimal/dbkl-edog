<?php $thispage = "contact"; 
include "config.php";?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php include "head_en.php" ?>
    <body>
        <div id="page-container">
            <header>
                <div class="container">
                    <?php include "nav_en.php"; ?>
                </div>
            </header>
            <div class="media-container text-center">

                <section class="site-section site-section-light site-section-top">
                    <div class="container">
                        <h1 class="animation-slideDown"><strong>Contact Us</strong></h1>
                    </div>
                </section>

                <!-- For best results use an image with a resolution of 2560x279 pixels -->
                <img src="img/edog-3-header.jpg" alt="Dog License Management System Dewan Bandaraya Kuala Lumpur" class="">
            </div>      

            <section class="site-content site-section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 site-block">
                            <div class="site-block">
                                <h3 class="h2 site-heading"><strong>Unit Kawalan Pest</strong></h3>
                                <address>
                                    <strong>Jabatan Kesihatan dan Alam Sekitar</strong><br />
                                    Dewan Bandaraya Kuala Lumpur<br>
                                    Lot 24, Jalan Loke Yew<br />56100 Cheras Kuala Lumpur.<br><br>
                                    <i class="fa fa-phone"></i> 03-9221 0419 <br>
                                    <i class="fa fa-fax"></i> 03-9285 7295 <br>
                                    <i class="fa fa-envelope-o"></i> <a href="mailto:jkas@dbkl.gov.my">jkas@dbkl.gov.my</a>
                                </address>
                                <p>
                                <a href="https://goo.gl/maps/ssjgeYYKmnG2" class="btn btn-lg btn-primary" id="button" target="_blank"> Google Map</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-8 site-block">
                            <h3 class="h2 site-heading"><strong>Contact</strong> Us</h3>
                            <form action="<? echo $formURL ?>/contact/send_email_complaint" method="post" id="form-contact">
                                <div class="form-group">
                                    <label for="contact-name">Name <font color=red>*</font></label>
                                    <input type="text" id="contact-name" name="contact-name" class="form-control input-lg" placeholder="Your name..">
                                </div>
                                <div class="form-group">
                                    <label for="contact-email">Email <font color=red>*</font></label>
                                    <input type="text" id="contact-email" name="contact-email" class="form-control input-lg" placeholder="Your email..">
                                </div>
                                <div class="form-group">
                                    <label for="contact-message">Message <font color=red>*</font></label>
                                    <textarea id="contact-message" name="contact-message" rows="10" class="form-control input-lg" placeholder="State your complaint or suggestion to us"></textarea>
                                </div>
                                <div class="form-group">
                                    <!--<input type="submit" />-->
                                    <button type="button" id="complaint-submit" class="btn btn-lg btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <?php include "footer_en.php" ?>
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>
        <script src="<?php echo $webURL ?>js/jquery.form.js"></script> 
        <script src="<?php echo $webURL ?>js/jQuery.Spin.js"></script>
        <script src="<?php echo $webURL ?>js/script.js"></script>
    </body>
</html>