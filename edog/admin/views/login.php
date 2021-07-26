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
        <link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo base_url();?>img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?php echo base_url();?>img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?php echo base_url();?>img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?php echo base_url();?>img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?php echo base_url();?>img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?php echo base_url();?>img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?php echo base_url();?>img/icon152.png" sizes="152x152">
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
		<link rel="stylesheet" href="<?php echo base_url();?>js/dist/jAlert.css" />
        <!-- END Stylesheets -->
				
				<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="<?php echo base_url();?>js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>js/plugins.js"></script>
        <script src="<?php echo base_url();?>js/app.js"></script>
		<script src="<?php echo base_url();?>js/dist/jAlert.min.js"></script>
        <script src="<?php echo base_url();?>js/dist/jAlert-functions.min.js"> //optional!!</script>
        
        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="<?php echo base_url();?>js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
        <script src="<?php echo base_url();?>js/jquery.form.js"></script>
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
				<img src="<?php echo base_url();?>img/logo_lesenanjingdbkl_login.png" alt="Login Lesen Anjing DBKL">
                <h1><small>Sila <strong>Log Masuk</strong></small></h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">
                <!-- Login Form -->
                <form action="<?php echo base_url('admin');?>/index.php/login/loginUser" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input type="text" id="login-users" name="login-users" class="form-control input-lg" placeholder="ID Pengguna">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Kata Laluan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" id="btnLogin" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Log Masuk</button>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <div class="col-xs-12 text-center">
                            <a href="javascript:void(0)" id="link-reminder-login"><small>Lupa Kata Laluan?</small></a>
                        </div>
                    </div>-->
                </form>
                <!-- END Login Form -->
            </div>
            <!-- END Login Block -->

            <!-- Footer -->
            <footer class="footer-login text-muted text-center">
                <small><span id="year-copy"></span> &copy; Sistem Pengurusan Lesen Anjing | <a href="http://www.dbkl.gov.my/" target="_blank">Dewan Bandaraya Kuala Lumpur</a></small>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Login Container -->

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url();?>js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
    </body>
</html>