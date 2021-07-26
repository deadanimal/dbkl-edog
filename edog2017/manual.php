<?php $thispage = "manual"; 
include "config.php";?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php include "head.php" ?>
    <body>
        <div id="page-container">
            <header>
                <div class="container">
                    <?php include "nav.php"; ?>
                </div>
            </header>
            <div class="media-container text-center">

                <section class="site-section site-section-light site-section-top">
                    <div class="container">
                        <h1 class="animation-slideDown"><strong>Manual Pengguna</strong></h1>
                    </div>
                </section>

                <!-- For best results use an image with a resolution of 2560x279 pixels -->
                <img src="img/edog-3-header.jpg" alt="Sistem Pengurusan Lesen Anjing Dewan Bandaraya Kuala Lumpur" class="">
            </div>      

            <section class="site-content site-section">
                <div class="container">
                    <p><strong>Selamat datang!</strong> Panduan ini akan membimbing anda melalui asas menggunakan Sistem Pengurusan Lesen Anjing termasuk cara mendaftar, log masuk ke laman web dan mengisi borang.</p>
                    <a href="DBKL-eDog-User-Manual-v1.0.pdf" class="btn btn-lg btn-primary" target="_blank"><i class="fa fa-angle-right"></i> Muat turun <i class="fa fa-angle-left"></i> </a>
                    
                    <p>&nbsp;</p>
                </div>
            </section>
            <?php include "footer.php" ?>
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>