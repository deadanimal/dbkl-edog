<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>	   

				<title>Lesen Anjing - Dewan Bandaraya Kuala Lumpur</title>  		

				<?php

				 //   		echo link_tag("css/style.css");   		

				 echo link_tag("css/bootstrap.min.css");   		
				 echo link_tag("css/bootstrap-theme.min.css");   		
				 echo link_tag("css/ui-lightness/jquery-ui-1.10.4.custom.css");   		
				 echo link_tag("css/box.css");
?>
<script src="<?php echo base_url();?>js/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui-1.10.4.custom.js"></script>
<?php				 

				 //echo script_tag("js/jquery-2.1.1.min.js");   		
				 //echo script_tag("js/bootstrap.min.js");   		
				 //echo script_tag("js/jquery-1.10.2.js");   		
				 //echo script_tag("js/jquery-ui-1.10.4.custom.js");

				 //echo script_tag("js/jquery.isloading.js");

				 //   		echo script_tag("js/jquery.form.js");

				 //   		echo script_tag("js/script.js");



header('Content-type: text/html; charset=utf-8');				 

				 ?>       
					

				 <meta charset="utf-8">        

				 	<title>Lesen Anjing - DBKL</title>        

				 	<meta name="description" content="Lesen Anjing - Dewan Bandaraya Kuala Lumpur">        <meta name="author" content="pixelcave">        <meta name="robots" content="noindex, nofollow">        

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

				 								 			<!-- END Icons -->        <!-- Stylesheets -->        

				 								 			<!-- Bootstrap is included in its original form, unaltered -->        

				 								 			<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">        

				 								 				<!-- Related styles of various icon packs and plugins -->       

				 								 				 <link rel="stylesheet" href="<?php echo base_url();?>css/plugins.css">       

				 								 				 	 <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->       

				 								 				 	  <link rel="stylesheet" href="<?php echo base_url();?>css/main.css">       

				 								 				 	  	 <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->        

				 								 				 	  	 <link rel="stylesheet" href="<?php echo base_url();?>css/themes.css">
																		 	 <link rel="stylesheet" href="<?php echo base_url();?>js/dist/jAlert.css" /> 
				 								 				 	  	 	<!-- END Stylesheets -->								

				 								 				 	  	 	<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->       

				 								 				 	  	 	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->

				 								 				 	  	 	<script>!window.jQuery && document.write(decodeURI('%3Cscript src="<?php echo base_url();?>js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>       

				 								 				 	  	 		 <!-- Bootstrap.js, Jquery plugins and Custom JS code -->        

				 								 				 	  	 		 <script src="<?php echo base_url();?>js/vendor/bootstrap.min.js"></script>        

				 								 				 	  	 		 <script src="<?php echo base_url();?>js/plugins.js"></script>        

				 								 				 	  	 		 <script src="<?php echo base_url();?>js/app.js"></script>        

				 								 				 	  	 		               

				 								 				 	  	 		 <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->        

				 								 				 	  	 		 <script src="<?php echo base_url();?>js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>        

				 								 				 	  	 		 <script src="<?php echo base_url();?>js/jquery.form.js"></script>        

				 								 				 	  	 		 <script src="<?php echo base_url();?>js/script.js"></script>        

				 								 				 	  	 		 <script src="<?php echo base_url(); ?>js/jquery-barcode.js"></script>

				 								 				 	  	 		 <script src="<?php echo base_url(); ?>js/jQuery.Spin.js"></script>
																				 
																				 

				 								 				 	  	 		 </head><body>	

				 								 				 	  	 		 	<!-- Page Container -->        

				 								 				 	  	 		 	<!-- In the PHP version you can set the following options from inc/config file -->        

				 								 				 	  	 		 	<!-- 'boxed' class for a boxed layout -->        

				 								 				 	  	 		 	<div id="page-container">            

				 								 				 	  	 		 		<!-- Site Header -->			

				 								 				 	  	 		 		<header>				

				 								 				 	  	 		 			<?php 				if( $this->session->userdata('isLoggedIn'))				{				?>

				 								 				 	  	 		 								<div class="topbar-user">						<div class="container">						

				 								 				 	  	 		 										<div class="pull-right">							

				 								 				 	  	 		 												<span class="username">Selamat Datang, <strong><?php echo $this->session->userdata('name');?></strong></span>								

				 								 				 	  	 		 													<a href="<?php echo base_url('admin');?>/index.php/manage_profile" class="btn btn-square btn-info" data-toggle="tooltip" data-placement="bottom" title="Urus Profil" data-original-title="Urus Profil"><i class="gi gi-user"></i></a>						

				 								 				 	  	 		 													<a class="btn btn-square btn-danger " href="<?php echo base_url('admin');?>/index.php/login/logout">Keluar</a>							

				 								 				 	  	 		 														</div>						

				 								 				 	  	 		 														</div>	        

				 								 				 	  	 		 														</div>        

				 								 				 	  	 		 														<?php     		}        ?>				

				 								 				 	  	 		 														<div class="container-fluid">                    

				 								 				 	  	 		 															<!-- Site Logo -->					

				 								 				 	  	 		 															<a href="http://www.dbkl.gov.my/" target="_blank" class="site-logo"><img src="<?php echo base_url();?>img/logo_dbkl_sm.png" alt="DBKL"></a>                    

				 								 				 	  	 		 																<a href="index.html" class="site-logo"><img src="<?php echo base_url();?>img/logo_lesenanjingdbkl_sm.png" alt="Lesen Anjing DBKL">   

				 								 			                 </a>										<div class="site-logo col-sm-4">						

				 								 			                 	<h3 class="site-logo-text">Sistem Pengurusan Lesen Anjing</h3>					

				 								 			                 		<h4 class="site-logo-text">Dewan Bandaraya Kuala Lumpur</h4>					

				 								 			                 			<h4 class="site-logo-text">Jabatan Kesihatan & Alam Sekitar</h4>				

				 								 			                 				</div>															                   

				 								 			                 				 <!-- Site Logo -->									

				 								 			                 				 	<!-- Site Navigation -->                   

				 								 			                 				 	 <nav>                      

				 								 			                 				 	 	  <!-- Menu Toggle -->                       

				 								 			                 				 	 	   <!-- Toggles menu on small screens -->                      

				 								 			                 				 	 	     <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm"> 

				 								 			                 				 	 	     	 <i class="fa fa-bars"></i>                       

				 								 			                 				 	 	     	  </a>                      

				 								 			                 				 	 	     	    <!-- END Menu Toggle -->		

				 								 			                 				 	 	    <?php 										if( $this->session->userdata('isLoggedIn') )										

				 								 			                 				 	 	    {                      

				 								 			                 				 	 	    	 echo $this->menu->user_menu();                    

				 								 			                 				 	 	    	  }else

				 								 			                 				 	 	    	  {

				 								 			                 				 	 	    	  ?>

				 								 			                 				 	 	    	  <!-- Main Menu -->

																								                    <ul class="site-nav">

																								                        <!-- Toggles menu on small screens -->

																								                        <li class="visible-xs visible-sm">

																								                            <a href="javascript:void(0)" class="site-menu-toggle text-center">

																								                                <i class="fa fa-times"></i>

																								                            </a>

																								                        </li>

																								                        <!-- END Menu Toggle -->

																								                        

																								                        <li class="btn btn-square btn-info">

																								                            <a href="<?php echo base_url();?>index.php/login">Login</a>

																								                        </li>

																								                    </ul>

																								                    <!-- END Main Menu -->

				 								 			                 				 	 	    	  <?php

				 								 			                 				 	 	    	  }                       

				 								 			                 				 	 	    	  ?>                   

				 								 			                 				 	 	      </nav>                    

				 								 			                 				 	 	      <!-- END Site Navigation -->                

				 								 			                 				 	 	      </div>            </header>           

				 								 			                 				 	 	       <!-- END Site Header -->	<div id="content">		

				 								 			                 				 	 	       	<?php echo $content; ?>	</div>							        

				 								 			                 				 	 	       	</div>       

				 								 			                 				 	 	       	 <!-- END Page Container -->	

				 								 			                 				 	 	       	



				 								 			                 				 	 	       	 <!-- Footer -->          

				 								 			                 				 	 	       	   <footer class="site-footer site-section">
																									                <div class="container-fluid">
																									                    <div class="row">
																									                        <div class="col-sm-6 col-md-6">    
																									                            <h4 class="footer-heading">Info</h4>
																									                            <p><a href="/edog2017" target="_blank">Sistem Pengurusan Lesen Anjing</a> ini bertujuan memudahkan pengurusan permohonan & pembaharuan lesen anjing secara online. Daftar sekarang dan nikmati kemudahan pengurusan lesen anjing secara mudah dan cepat.</p>
																									                            <ul class="footer-nav list-inline">
																									                                <li><a href="/edog2017/contact_us.php" target="_blank">Hubungi Kami</a></li>
																									                                <li><a href="#">Dasar Privasi & Keselamatan</a></li>
																									                                <li><a href="/edog2017/copyright.php" target="_blank">Notis Hak Cipta</a></li>
																									                                <li><a href="/edog2017/manual.php" target="_blank">Manual Pengguna</a></li>
																									                            </ul><!-- <small>Dibangunkan oleh Karya Media Sdn Bhd</small> -->
																									                            
																									                        </div>
																									                        <div class="col-sm-6 col-md-6 text-right">
																									                            <h4 class="footer-heading">Unit Kawalan Pest</h4>
																									                            <p><strong>Jabatan Kesihatan dan Alam Sekitar</strong><br />Dewan Bandaraya Kuala Lumpur, Lot 24, Jalan Loke Yew<br />56100 Cheras Kuala Lumpur.</p>
																									                            <small>Paparan Terbaik Menggunakan Internet Explorer 9.0 / Mozilla Firefox 12.0 / Google Chrome 13.0 Ke Atas Dengan Resolusi 1024 x 768 | <strong>Penafian</strong>: Dewan Bandaraya Kuala Lumpur tidak bertanggungjawab terhadap sebarang kehilangan atau kerosakan yang dialami kerana menggunakan maklumat dalam laman ini.</small>
																									                            
																									                        </div>
																									                    </div>

																									                </div>
																									            </footer>     

				 								 			                 				 	 	       	   	 	   	   	   	 	    	                     <!-- END Footer -->    

				 								 			                 				 	 	       	   	 	   	   	   	 	    	                         </div>	</body>

				 								 			                 				 	 	       	   	 	   	   	   	 	    	                         </html>