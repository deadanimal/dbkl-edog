 <!-- Media Container -->
            <div class="media-container">
				<!-- Header Background -->
				<img src="<?php echo base_url(); ?>img/placeholders/headers/page_header01.jpg" alt="Login Background" class="animation-pulseSlow">
				<!-- END Header Background -->
				
                <!-- Intro -->
                <section class="site-section site-section-light site-section-top">
                    <div class="container">
                        <h1 class="text-center animation-slideDown"><i class="fa fa-building-o"></i> <strong>Hubungi</strong> Kami</h1>
                    </div>
                </section>
                <!-- END Intro -->
            </div>
            <!-- END Media Container -->
			


            <!-- Contact -->
            <section class="site-content site-section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 site-block">
                            <div class="site-block">
                                <h3 class="h2 site-heading"><strong>Jabatan Kesihatan dan Alam Sekitar</strong></h3>
                                <address>
									Dewan Bandaraya Kuala Lumpur<br>
									KM 4, Jalan Cheras, <br>
                                    56100 Kuala Lumpur. <br><br>
                                    <i class="fa fa-phone"></i> 03-2027 5300 <br>
                                    <i class="fa fa-fax"></i> 03-9285 7295 <br>
                                    <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">jkas@dbkl.gov.my</a>
                                </address>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-8 site-block">
                            <h3 class="h2 site-heading"><strong>Aduan</strong> / Cadangan</h3>
                            <form action="<?php echo base_url(); ?>index.php/contact/send_email_complaint" method="post" id="form-contact">
                                <div class="form-group">
                                    <label for="contact-name">Nama <font color=red>*</font></label>
                                    <input type="text" id="contact-name" name="contact-name" class="form-control input-lg" placeholder="Nama anda..">
                                </div>
                                <div class="form-group">
                                    <label for="contact-email">Emel <font color=red>*</font></label>
                                    <input type="text" id="contact-email" name="contact-email" class="form-control input-lg" placeholder="Emel anda..">
                                </div>
                                <div class="form-group">
                                    <label for="contact-message">Mesej <font color=red>*</font></label>
                                    <textarea id="contact-message" name="contact-message" rows="10" class="form-control input-lg" placeholder="Nyatakan aduan atau cadangan anda kepada kami.."></textarea>
                                </div>
                                <div class="form-group">
                                	<!--<input type="submit" />-->
                                    <button type="button" id="complaint-submit" class="btn btn-lg btn-primary">Hantar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END Contact -->

        </div>
        <!-- END Page Container -->

        
        <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url();?>js/pages/contact.js"></script>
        <script>$(function(){ Contact.init(); });</script>
