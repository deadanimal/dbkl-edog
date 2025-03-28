<!-- Page Container -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!-- 'boxed' class for a boxed layout -->
        <div id="page-container">
            <!-- Site Header -->
            <header>
                <div class="container">
                    <!-- Site Logo -->
                    <a href="index.html" class="site-logo">
                        <img src="<?php echo base_url();?>img/logo_lesenanjingdbkl_sm.png" alt="Login Lesen Anjing DBKL"> Lesen Anjing
                    </a>
                    <!-- Site Logo -->

                    <!-- Site Navigation -->
                    <nav>
                        <!-- Menu Toggle -->
                        <!-- Toggles menu on small screens -->
                        <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
                            <i class="fa fa-bars"></i>
                        </a>
                        <!-- END Menu Toggle -->

                        <!-- Main Menu -->
                        <ul class="site-nav">
                            <!-- Toggles menu on small screens -->
                            <li class="visible-xs visible-sm">
                                <a href="javascript:void(0)" class="site-menu-toggle text-center">
                                    <i class="fa fa-times"></i>
                                </a>
                            </li>
                            <!-- END Menu Toggle -->
                            
                            <li>
                                <a href="<?php echo base_url();?>index.php/login/logout" class="active">Keluar</a>
                            </li>
                        </ul>
                        <!-- END Main Menu -->
                    </nav>
                    <!-- END Site Navigation -->
                </div>
            </header>
            <!-- END Site Header -->

            <!-- Page Title -->
			<section class="site-heading site-section-top">
				<div class="header-section dashboard">
					<div class="container">
						<h1>Pembaharuan Lesen</h1>
					</div>
				</div>
			</section>
			<!-- END Page Title -->

            <!-- Company Info -->
            <section class="site-section site-content-single">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="site-block">
								<table class="table table-borderless table-striped table-condensed table-vcenter">
									<thead>
										<tr>
											<th style="width: 30px;">Bil</th>
											<th><strong>No. Permohonan</strong></th>
											<th>Tarikh</th>
											<th>Jenis</th>
											<th class="text-centre">Tindakan</th>
										</tr>
									<thead>
									<tbody>
										<tr>
											<td>01</td>
											<td><strong>LX-A-2014-001</strong></td>
											<td><strong>23-07-2014</strong></td>
											<td><strong>Pembaharuan </strong></td>
											<td class="text-centre"><a class="btn btn-xs btn-success" href="renew_license.html"><i class="fa fa-refresh"></i> Kemaskini Lesen</a></td>
										</tr>
										<tr>
											<td>02</td>
											<td><strong>LX-A-2014-025</strong></td>
											<td><strong>10-05-2014</strong></td>
											<td><strong>Pembaharuan</strong></td>
											<td class="text-centre"><a class="btn btn-xs btn-success" href="renew_license.html"><i class="fa fa-refresh"></i> Kemaskini Lesen</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						
                        <!-- Right sidebar submenu --> 
                        <div class="col-sm-4">
                            <div class="widget">
                                <div class="widget-advanced">
                                    <!-- Widget Header -->
                                    <div class="widget-header text-center themed-background-dark-flatie">
                                        <h3 class="widget-content-light">Dashboard Pengguna
                                        </h3>
                                    </div>
                                    <!-- END Widget Header -->

                                    <!-- Widget Main -->
                                    <div class="widget-main widget-border themed-border-night">
                                        <div class="widget-image-container animation-bigEntrance">
                                            <a class="widget-icon themed-background-flatie" href="dashboard_user.html"><i class="gi gi-dashboard"></i></a>
                                        </div>
										<div class="list-group remove-margin square">
                                            <a href="register_license.html" class="list-group-item">
                                                <p class="list-group-item-heading remove-margin"><i class="fa fa-file fa-fw"></i> Permohonan Lesen Baru</p>
                                            </a>
                                            <a href="list_renew_license.html" class="list-group-item">
                                                <p class="list-group-item-heading remove-margin"><i class="fa fa-refresh fa-fw"></i> Pembaharuan Lesen</p>
                                            </a>
                                            <a href="javascript:void(0)" class="list-group-item">
                                                <p class="list-group-item-heading remove-margin"><i class="fa fa-thumb-tack fa-fw"></i> Arkib</p>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- END Widget Main -->
                                </div>
                            </div>
							<div class="big-gap has-padding"></div>
                        </div>
						<!-- END: Right sidebar submenu --> 
                    </div>
                </div>
            </section>
            <!-- END Company Info -->
				
				<!-- Load and execute javascript code used only in this page -->
        <script src="js/pages/formsWizard.js"></script>
        <script>$(function(){ FormsWizard.init(); });</script>
        
   </div>