<?php 

include "config.php";

$_SESSION["lang"] = "en";

$thispage = "home"; ?>

<!DOCTYPE html>

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <?php include "head_en.php" ?>

    <body>

        <div id="page-container">

            <header>

                <div class="container">

                    <?php include "nav_en.php" ?>

                </div>

            </header>



            <div id="home-carousel" class="carousel carousel-home slide" data-ride="carousel" data-interval="5000">

                <div class="carousel-inner">

                    <div class="active item">

                        <section class="site-section site-section-light site-section-top themed-background-default">

                            <div class="container">

                                <img src="img/logo_dbkl_sm.png" align="right" style="padding:20px;" />

                                <h1 class="text-right animation-slideDown"><strong>Welcome to<br />  Dog License<br /> Management System</strong></h1>

                                <h2 class="text-right animation-slideUp push">Register or renew<br /> your dog license online</h2> 
								
								<!-- <h2 class="text-right animation-slideUp push" style="color:red" ><strong>ANNOUNCEMENT:
								<br />The system will be temporarily closed <br />for registration and payment until further notice.
								<br />For any inquiries,<br /> please contact us at 03-9221 0419.
								<br />Sorry for any inconvenience.</strong></h2>-->



                            <h2 class="text-right animation-fadeIn360 push">
                                <a href="dog-license.php" class="btn btn-lg btn-primary" id="button"> Learn More</a> 
                                <!-- <a href="" class="btn btn-lg btn-primary" disabled> Under maintenance</a></h2> -->
								<!-- <a href="/index.php/login" class="btn btn-lg btn-primary"> Log In</a></h2>  -->

                                <p class=" hidden-xs">&nbsp;</p>

                                <p class=" hidden-xs">&nbsp;</p>

                                <p class=" hidden-xs">&nbsp;</p>

                                <p class=" hidden-xs">&nbsp;</p>

                                <p class=" hidden-xs">&nbsp;</p>

                                <p class=" hidden-xs">&nbsp;</p>

                            </div>

                        </section>

                    </div>

                    >

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

                            <h4 class="site-heading"><strong>Owner's</strong> Responsibilty</h3>

                            <p>A person who is licensed to have, preserve, protect or maintain a controlled dog shall keep the dog under proper supervision at all times.</p>

                            <p><a href="dog-license.php#tanggungjawab" class="btn btn-lg btn-primary" ><i class="fa fa-share"></i> Learn More</a></p>

                        </div>

                        <div class="col-sm-4 site-block">

                            <div class="circle themed-background animation-fadeIn360" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100" style="cursor:default"><i class="gi gi-dog"></i></div>

                            <h4 class="site-heading"><strong>Forbidden</strong> Dogs</h3>

                            <p>Forbidden dog means any listed dog types such as Pit Bull Terrier / Pit Bull, American Bulldog, Neapolitan Mastiff, Japanese Tosa, Akita, Dogo Argentino, Fila Braziliero.</p>

                            <p><a href="dog-license.php#terlarang" class="btn btn-lg btn-primary" ><i class="fa fa-share"></i> Learn More</a></p>

                        </div>

                        <div class="col-sm-4 site-block">

                            <div class="circle themed-background animation-fadeIn360" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100" style="cursor:default"><i class="gi gi-building"></i></div>

                            <h4 class="site-heading"><strong>Highrise</strong> Building</h3>

                            <p>An application for a dog license for a residence should be accompanied by a consent letter from Joint Management Body (JMC) or Management Corporation (MC) when applying for a license.</p>

                            <p><a href="dog-license.php#apartment" class="btn btn-lg btn-primary" ><i class="fa fa-share"></i> Learn More</a></p>

                        </div>

                    </div>

                    <hr>

                </div>

            </section>

            <?php include "footer_en.php" ?>

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