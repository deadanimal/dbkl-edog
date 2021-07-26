<!-- Page Container -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!-- 'boxed' class for a boxed layout -->
        <div id="page-container">
            <!-- Site Header -->
            <header>
                <div class="container">
                    <!-- Site Logo -->
                    <a href="index.html" class="site-logo">
                        <img src="img/logo_lesenanjingdbkl_sm.png" alt="Login Lesen Anjing DBKL"> Lesen Anjing
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
                                <a href="login.html" class="active">Keluar</a>
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
						<h1>Semakan Permohonan Lesen</h1>
					</div>
				</div>
			</section>
			<!-- END Page Title -->
				
            <!-- Company Info -->
            <section class="site-section site-content-single">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="block bordered full">
								<!-- Block Tabs Title -->
								<div class="block-title">
									<ul class="nav nav-tabs" data-toggle="tabs">
										<li class="active"><a href="#tabs-user">Butiran Pemohon Lesen</a></li>
										<li><a href="#tabs-place">Butiran Tempat Peliharaan</a></li>
										<li><a href="#tabs-dog">Butiran Anjing Peliharaan</a></li>
										<li><a href="#tabs-document">Lampiran Dokumen</a></li>
									</ul>
								</div> <!-- END Block Tabs Title -->
								<form id="advanced-wizard" action="jkas_form_app.html" method="post" class="form-horizontal form-bordered">
									<!-- Tabs Content -->
                                    <div class="tab-content">
										<!-- Tabs #1 -->
                                        <div class="tab-pane active" id="tabs-user">
											<div class="form-group">
												<label class="col-md-4 control-label" for="val_username">Nama Pemohon <span class="text-danger">*</span></label>
												<div class="col-md-6">
													<p class="form-control-static">Richard Ng Soi Lek</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label" for="val_email">Alamat <span class="text-danger">*</span></label>
												<div class="col-md-6">
													<p class="form-control-static">No. 2851, Jalan Sri Penchala (Kg. Sg. Penchala), 60000 Kuala Lumpur, Kuala Lumpur, Malaysia</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label" for="masked_phone">No. Telefon Bimbit <span class="text-danger">*</span></label>
												<div class="col-md-6">
													<p class="form-control-static">+6012) 945 9921</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label" for="val_email">Emel <span class="text-danger">*</span></label>
												<div class="col-md-6">
													<p class="form-control-static">test@example.com</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label" for="val_email">Kewarganegaraan <span class="text-danger">*</span></label>
												<div class="col-md-6">
													<p class="form-control-static">Malaysia</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label" for="masked_ssn">No. Kad Pengenalan / No. Tentera / No. Pasport <span class="text-danger">*</span></label>
												<div class="col-md-6">
													<p class="form-control-static">781012-14-2235</p>
												</div>
											</div>
										</div><!-- END Tab#1 #tabs-user -->
										
										<!-- Tabs #2 -->
                                        <div class="tab-pane" id="tabs-place">
											<div class="form-group">
												<label class="col-md-4 control-label" for="example-select">Jenis Rumah</label>
												<div class="col-md-6">
													<p class="form-control-static">Banglo</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label" for="example-select">Keluasan Rumah</label>
												<div class="col-md-6">
													<p class="form-control-static">Lebih dari 300 meter persegi</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label">Rumah Anjing</label>
												<div class="col-md-6">
													<p class="form-control-static">Ada</p>
												</div>
											</div>
										</div><!-- END Tab#2 #tabs-place -->
										
										<!-- Tabs #3 -->
                                        <div class="tab-pane" id="tabs-dog">
										
											<!-- Display details of dog -->
											<div class="form-group">
												<div class="col-md-12">
													<h4><strong>#1</strong> Butiran Anjing </h4>
													<hr>
												</div>
												<label class="col-md-4 control-label" for="val_username">Jenis / Baka <span class="text-danger">*</span></label>
												<div class="col-md-6">
													<p class="form-control-static">Biasa</p>
												</div>
												
												<label class="col-md-4 control-label" for="val_username">Warna <span class="text-danger">*</span></label>
												<div class="col-md-6">
													<p class="form-control-static">Kelabu</p>
												</div>
												
												<label class="col-md-4 control-label">Jantina</label>
												<div class="col-md-6">
													<p class="form-control-static">Jantan</p>
												</div>
												
												<label class="col-md-4 control-label" for="example-select">Berat</label>
												<div class="col-md-6">
													<p class="form-control-static">Kurang dari 10kg (22 pound)</p>
												</div>
												
												<label class="col-md-4 control-label">Pemandulan</label>
												<div class="col-md-6">
													<p class="form-control-static">Ya</p>
												</div>
												
												<label class="col-md-4 control-label">Mikrocip</label>
												<div class="col-md-6">
													<p class="form-control-static">DBKL-CIP-2014-27-A</p>
												</div>
												
												<label class="col-md-8 control-label">Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</label>
												<div class="col-md-3">
													<p class="form-control-static">Ya</p>
												</div>
												<label class="col-md-8 control-label">Anjing telah menjalani latihan "good behaviour and obedience".</label>
												<div class="col-md-3">
													<p class="form-control-static">Ya</p>
												</div>
											</div>
											<!-- END: Display details of 1 dog -->
										</div><!-- END Tab#3 #tabs-dog -->
										
										<!-- Tabs #4 -->
                                        <div class="tab-pane" id="tabs-document">
											<div class="form-group">
												<label class="col-md-4 control-label" for="example-file-multiple-input">Dokumen (.doc /.pdf /.jpg) </label>
												<div class="col-md-6">
													<p class="form-control-static">Lampiran dokumen disini</p>
												</div>
											</div>
										</div><!-- END Tab#4 #tabs-document -->
										
										
										<!-- Form Buttons -->
										<div class="form-group form-actions">
											<div class="col-md-12">
												<label class="col-md-4 control-label">Permohonan dililuskan? </label>
												<label class="radio-inline" for="example-inline-radio1">
													<input type="radio" id="example-inline-radio1" name="example-inline-radios" value="option1"> Ya
												</label>
												<label class="radio-inline" for="example-inline-radio2">
													<input type="radio" id="example-inline-radio2" name="example-inline-radios" value="option2"> Tidak
												</label>
											</div>
										</div>
										<div class="form-group form-actions">
											<div class="col-md-6 col-md-offset-4">
												<label for="example-nf-password">Kenyataan / Ulasan</label>
												<textarea id="example-textarea-input" name="example-textarea-input" rows="9" class="form-control" placeholder="Nyatakan sebarang komen berkaitan permohonan.."></textarea>
											</div>
										</div>
										<div class="form-group form-actions">
											<div class="col-md-8 col-md-offset-4">
												<input type="submit" class="btn btn-square btn-sm btn-primary" id="next2" value="Kemaskini">
											</div>
										</div>
										<!-- END Form Buttons -->
                                    </div><!-- END Tabs Content -->
								</form>
							</div><!-- END .block .full -->
						</div>
						
                        <!-- Right sidebar submenu --> 
                        <div class="col-sm-4">
                            <div class="widget">
                                <div class="widget-advanced">
                                    <!-- Widget Header -->
                                    <div class="widget-header text-center themed-background-dark-flatie">
                                        <h3 class="widget-content-light">Dashboard JKAS</h3>
                                    </div>
                                    <!-- END Widget Header -->

                                    <!-- Widget Main -->
                                    <div class="widget-main widget-border themed-border-night">
                                        <div class="widget-image-container animation-bigEntrance">
                                            <span class="widget-icon themed-background-flatie"><i class="gi gi-dashboard"></i></span>
                                        </div>
										<div class="list-group remove-margin square">
                                            <a href="jkas_kelulusan.html" class="list-group-item">
                                                <p class="list-group-item-heading remove-margin"><i class="fa fa-certificate fa-fw"></i> Kelulusan</p>
                                            </a>
                                            <a href="jkas_carian.html" class="list-group-item">
                                                <p class="list-group-item-heading remove-margin"><i class="fa fa-search fa-fw"></i> Carian</p>
                                            </a>
                                            <a href="javascript:void(0)" class="list-group-item">
                                                <p class="list-group-item-heading remove-margin"><i class="fa fa-file fa-fw"></i> Laporan</p>
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
		
        </div>
        <!-- END Page Container -->