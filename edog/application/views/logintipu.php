<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Lesen Anjing - DBKL</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/themes.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/js/dist/jAlert.css" /> 
        <!-- END Stylesheets -->
				
				<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="<?php echo base_url();?>js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>js/plugins.js"></script>
        <script src="<?php echo base_url();?>js/app.js"></script>
        
        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="<?php echo base_url();?>js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
        <script src="<?php echo base_url();?>js/jquery.form.js"></script>
        <script src="<?php echo base_url();?>js/jQuery.Spin.js"></script>
        <script src="<?php echo base_url();?>/js/dist/jAlert.min.js"></script>
        <script src="<?php echo base_url();?>/js/dist/jAlert-functions.min.js"> //optional!!</script>  
        <script src="<?php echo base_url();?>js/script.js"></script>
    </head>
    <body>
        <!-- Login Background -->
        <div id="login-background">
            <!-- For best results use an image with a resolution of 2560x400 pixels (prefer a blurred image for smaller file size) -->
            <img src="<?php echo base_url();?>img/placeholders/headers/login_header01.jpg" alt="Login Background" class="animation">
        </div>
        <!-- END Login Background -->

        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
				<a href="/edog2017"><img src="<?php echo base_url();?>img/logo_lesenanjingdbkl_login.png" alt="Login Lesen Anjing DBKL"></a>
                <!-- <h1>
                    <small>Sila <strong>Log Masuk</strong> atau <strong>Daftar</strong></small><br>
                    <small><i>Please <strong>Log In</strong> or <strong>Register</strong></i></small>
                </h1> -->
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">
                <!-- Login Form -->
				<!-- <div>
                    <p>"Dimaklumkan sistem perlesenan anjing ditangguhkan sehingga dimaklumkan kelak. Segala kesulitan amat dikesali. Sebarang pertanyaan, boleh terus menghubungi unit kawalan pest di talian 03-92210419."Harap maklum.</p>
                    <p>"Please be informed that the dog licensing system is delayed until further notice. Any inconvenience may be remedied. Any questions can be directed to the pest control unit at 03-92210419."Please note.</p>
				</div> -->

                	<div>
                    <p>"MAKLUMAN PENUTUPAN SISTEM PENGURUSAN LESEN ANJING" Capaian Sistem pengurusan Lesen Anjing DBKL akan ditutup sementara waktu bagi kerja-kerja pengemaskinian maklumat pemohon bagi tahun 2021.  Segala kesulitan amatlah dikesali. Sebarang pertanyaan lanjut boleh hubungi Unit Kawalan Pest, Jabatan Kesihatan Dan Alam Sekitar di talian 03-92210419.Sekian, dimaklumkan.Terima kasih.</p>
                    <p>"NOTICE OF CLOSING OF DOG LICENSE MANAGEMENT SYSTEM" Access to DBKL Dog License Management System will be temporarily closed due to updating applicant information for 2021. We regret the inconvenience caused. Any further inquiries can be contacted Pest Control Unit, Department of Health and Environment at 03-92210419.Be informed. Thank you.</p>
				</div>
				
                <!-- <form action="<?php// echo base_url();?>index.php/login/loginUser" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input type="text" id="login-user" name="login-user" class="form-control input-lg" maxlength="12" placeholder="IC No / Passport / Army. No / Police. No">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Kata Laluan / Password">
                            </div>
                        </div>
                    </div> 
                    <div class="form-group form-actions">  -->
                        <!-- <div class="col-xs-4">
                            <label class="switch switch-primary" data-toggle="tooltip" title="Ingatkan saya?">
                                <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                                <span></span>
                            </label>
                        </div> -->
                  <!-- <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-primary" id="btnLogin"><i class="fa fa-angle-right"></i> Enter / Masuk</button>
                       </div>
                    </div> -->
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <a href="javascript:void(0)" id="link-reminder-login"><small>Forget Password / Lupa Katalaluan?</small></a><br>
                            <a href="javascript:void(0)" id="link-register-login"><small>Apply New Account / Daftar akaun baru</small></a><br>
                            <a href="/edog2017"><small>Main Page / Laman Utama</small></a> 
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->

                <!-- Reminder Form -->
                <form action="login.html#reminder" method="post" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <h5><strong>Forgot password / Lupa kata laluan</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                <input type="text" id="register-ic-forgot" name="register-ic-forgot" class="form-control input-lg" placeholder="IC No / Passport / Army. No / Police. No">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="email" id="reminder-email-forgot" name="reminder-email-forgot" class="form-control input-lg" placeholder="Email / Emel">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" id="forgot-password-button" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit New Password / Hantar Kata Laluan Baru</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                             <small>Know your password?</small> <a href="javascript:void(0)" id="link-reminder"><small>Login</small></a> <br> <small>Anda ingat kata laluan anda? <a href="" id="link-reminder">Log Masuk</small></a>
                        </div>
                    </div>
                    <!-- <input type="submit" value="TEST"> -->
                </form>
                <!-- END Reminder Form -->

                <!-- Register Form -->
                <form action="login.html#register" method="post" id="form-register" class="form-horizontal form-bordered form-control-borderless display-none">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i> <font color=red>*</font></span>
                                <input type="text" id="register-name" name="register-name" class="form-control input-lg" placeholder="Name / Nama">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
											<div class="col-xs-12">
												<div class="input-group">
					                                <span class="input-group-addon"><i class="fa fa-suitcase"></i> <font color=red>*</font></span>
													<select id="register_type_id" name="register_type_id" class="form-control" size="1">
														<option value="0">Identity Type / Jenis Pengenalan</option>
														<option value="IC">IC No / No. Kad Pengenalan</option>
														<option value="ARMY">Army or Police No / No. Tentera or Polis</option>
														<option value="PASSPORT">Passport No / No. Paspot</option>
													</select>
												</div>
					            </div>
	                    <div class="col-xs-12 no-pengenalan" style="display:none">
	                        <div class="input-group">
	                            <span class="input-group-addon"></span>
	                            <input type="text" id="register-ic" name="register-ic" class="form-control input-lg" placeholder="Enter your identity number / Masukkan Nombor Jenis Pengenalan">
	                        </div>
					            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i> <font color=red>*</font></span>
                                <input type="email" id="register-email" name="register-email" class="form-control input-lg" placeholder="Email / E-mel">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i> <font color=red>*</font></span>
                                <input type="password" id="register-password" name="register-password" class="form-control input-lg" placeholder="Password / Katalaluan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i> <font color=red>*</font></span>
                                <input type="password" id="register-password-verify" name="register-password-verify" class="form-control input-lg" placeholder="Repeat Password / Ulang Katalaluan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-6">
                           <!-- <a href="#modal-terms" data-toggle="modal" class="register-terms">Terms</a>
                            <label class="switch switch-primary" data-toggle="tooltip" title="Agree to the terms">
                                <input type="checkbox" id="register-terms" name="register-terms">
                                <span></span>
                            </label>-->
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="button" id="btn-form-register" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Register Account / Daftar Akaun</button>
                        </div>
                        
                    </div> 
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <small>Already have account?</small> <a href="javascript:void(0)" id="link-register"><small>Login</small></a> <br> <small>Anda telah mempunyai akaun?</small> <a href="javascript:void(0)" id="link-register"><small>Log Masuk</small></a>
                        </div>
                    </div>
                </form>
                <!-- END Register Form -->
            </div>
            <!-- END Login Block -->

            <!-- Footer -->
            <footer class="footer-login text-muted text-center">
                <small><span id="year-copy"></span> &copy; <a href="/edog2017">Sistem Pengurusan Lesen Anjing</a> | <a href="http://www.dbkl.gov.my/" target="_blank">Dewan Bandaraya Kuala Lumpur</a></small>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Login Container -->
 <!-- Modal -->
																							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																							  <div class="modal-dialog">
																							    <div class="modal-content">
																							      <div class="modal-header">
																							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
																							        <h4 class="modal-title" id="myModalLabel">Please Wait</h4>
																							      </div>
																							      <div class="modal-body center-block">
																							        <div class="progress">
																							          <div class="progress-bar bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
																							            
																							          </div>
																							        </div>
																							      </div>
																							      <div class="modal-footer">
																							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																							      </div>
																							    </div><!-- /.modal-content -->
																							  </div><!-- /.modal-dialog -->
																							</div><!-- /.modal -->
        <!-- Modal Terms -->
        <div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Terms &amp; Conditions</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Title</h4>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4>Title</h4>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4>Title</h4>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal Terms -->
        
       
        <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url();?>js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
    </body>
</html>