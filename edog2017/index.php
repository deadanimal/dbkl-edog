<?php

include "config.php";

$_SESSION["lang"] = "ms";

$thispage = "home"; ?>

<!DOCTYPE html>

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <?php include "head.php" ?>

    <body>

        <div id="page-container">

            <header>

                <div class="container">

                    <?php include "nav.php" ?>

                </div>

            </header>



            <div id="home-carousel" class="carousel carousel-home slide" data-ride="carousel" data-interval="5000">

                <div class="carousel-inner">

                    <div class="active item">

                        <section class="site-section site-section-light site-section-top themed-background-default">

                            <div class="container">

                                <img src="img/logo_dbkl_sm.png" align="right" style="padding:20px;" />

                                <h1 class="text-right animation-slideDown"><strong>Selamat Datang ke <br />Sistem Pengurusan Lesen Anjing</strong></h1>

                                <h2 class="text-right animation-slideUp push">Permohonan baru <br />atau pembaharuan<br /> lesen anjing secara atas talian.</h2> 
								<!--<h2 class="text-right animation-slideUp push"><strong>PENGUMUMAN :</strong><br /> Penutupan sementara permohonan baru atau pembaharuan lesen anjing secara 
								<br />atas talian bagi tahun 2019 <strong>DITANGGUHKAN</strong> sehingga Februari 2019.
								<br />Sebarang pertanyaan boleh menghubungi talian 03-9221 0419.
								<br />Segala kesulitan amat dikesali.
								<br />Terima kasih.</h2>-->

                                <!-- <h2 class="text-right animation-slideUp push"><strong>MAKLUMAN PENUTUPAN:</strong><br /> SISTEM PENGURUSAN LESEN ANJING 
                                    Capaian Sistem pengurusan Lesen Anjing DBKL 
								<br />akan ditutup sementara waktu bagi kerja-kerja pengemaskinian maklumat pemohon bagi tahun 2021. <strong</strong> 
								<br />Segala kesulitan amatlah dikesali. Sebarang pertanyaan lanjut boleh hubungi .
								<br />Unit Kawalan Pest, Jabatan Kesihatan Dan Alam Sekitar di talian 03-92210419.
								<br />Sekian, dimaklumkan. Terima kasih.</h2>  -->

                            <h2 class="text-right animation-fadeIn360 push">
                                <a href="pengurusan-lesen-anjing.php" class="btn btn-lg btn-primary" id="button"> Selanjutnya</a> 
                                <!-- <a href="" class="btn btn-lg btn-primary" disabled> Dalam penyelenggaraan</a> -->
								<!-- <a href="/index.php/login" class="btn btn-lg btn-primary"> Log Masuk</a> -->
							</h2>

                                <p class=" hidden-xs">&nbsp;</p>

                            </div>

                        </section>

                    </div>

                    

                </div>

                <a class="left carousel-control" href="#home-carousel" data-slide="prev">

                    <span>

                        <i class="fa fa-chevron-left"></i>

                    </span>

                </a>

                <a class="right carousel-control" href="#home-carousel" data-slide="next">

                    <span>

                        <i class="fa fa-chevron-right"></i>

                    </span>

                </a>

                <ol class="carousel-indicators">

<li data-target="#home-carousel" data-slide-to="0" class="active"></li>





</ol>

            </div>

            <section class="site-content site-section" id="myDiv">

                <div class="container text-center">

                    <div class="row">

                        <div class="col-sm-4 site-block">

                            <div class="circle themed-background animation-fadeIn360" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100" style="cursor:default"><i class="gi gi-user"></i></div>

                            <h4 class="site-heading"><strong>Tanggungjawab </strong> Pemilik</h3>

                            <p>Seseorang yang diberikan lesen untuk mempunyai,  memelihara, melindungi atau menyenggara anjing terkawal hendaklah memelihara anjing itu di bawah  pengawasan yang sepatutnya pada setiap masa.</p>

                            <p><a href="pengurusan-lesen-anjing.php#tanggungjawab" class="btn btn-lg btn-primary"><i class="fa fa-share"></i> Selanjutnya</a></p>

                        </div>

                        <div class="col-sm-4 site-block">

                            <div class="circle themed-background animation-fadeIn360" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100" style="cursor:default"><i class="gi gi-dog"></i></div>

                            <h4 class="site-heading"><strong>Anjing </strong> Terlarang</h3>

                            <p>Anjing terlarang ertinya mana-mana anjing jenis yang disenaraikan seperti Pit Bull Terrier / Pit Bull, American Bulldog, Neapolitan Mastiff, Japanese Tosa, Akita, Dogo Argentino, Fila Braziliero</p>

                            <p><a href="pengurusan-lesen-anjing.php#terlarang" class="btn btn-lg btn-primary" ><i class="fa fa-share"></i> Selanjutnya</a></p>

                        </div>

                        <div class="col-sm-4 site-block">

                            <div class="circle themed-background animation-fadeIn360" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100" style="cursor:default"><i class="gi gi-building"></i></div>

                            <h4 class="site-heading"><strong>Kediaman </strong> Bertingkat</h3>

                            <p>Permohonan lesen anjing untuk kediaman bertingkat hendaklah disertakan surat persetujuan daripada Joint Management Body ( JMC ) atau Management Corporation ( MC ) semasa memohon lesen.</p>

                            <p><a href="pengurusan-lesen-anjing.php#apartment" class="btn btn-lg btn-primary" ><i class="fa fa-share"></i> Selanjutnya</a></p>

                        </div>

                    </div>

                    <hr>

                </div>

            </section>

            <?php include "footer.php" ?>

        </div>



        <a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>

        <script src="js/vendor/jquery-1.12.0.min.js"></script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>

        <script src="js/app.js"></script>

        

        <script>

        $(function() {

            $("#button").click(function() {

                $('html, body').animate({

                    scrollTop: $("#myDiv").offset().top

                }, 1000);

            });

        });

        </script>

    </body>

</html>