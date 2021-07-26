<!--Page Title -->
			<div class="media-container">
                <!-- Intro -->
                <section class="site-section site-section-light site-section-top">
                    <div class="container text-center">
                        <h1 class="animation-slideDown"><strong>Appeal</strong></h1>
                    </div>
                </section>
                <!-- END Intro -->

                <!-- For best results use an image with a resolution of 2560x279 pixels -->
                <img src="<?php echo base_url(); ?>img/placeholders/headers/login_header01.jpg" alt="" class="media-image animation-pulseSlow">
            </div>
			<!-- END Page Title -->

            <!-- Company Info -->
            <section class="site-section site-content-single">
                <div class="container">
                <div class="row">
                	<div class="col-sm-7">
	                	Application No :
	                	<h1><strong><?php echo $info[0]->app_no; ?></strong></h1>
	                </div>
	                <div class="col-sm-5">
	                	Application Status :
	                	<h1><strong>
	                	<?php 
							if( $info[0]->app_type == "NOT_RENEW" )
								echo "Tidak Diperbaharui";
							else
								echo $info[0]->status; 
							?>	
						</strong></h1>
	                </div>
                </div>
                <hr>
                    <div class="row">
						
						<?php 
						$profile = get_users_by_userid($this->session->userdata('userid'));
						$comment = get_staff_comment($info[0]->app_id);
						//print_r($comment);
						?>
						<!-- Butiran Pemohon -->
						<div class="col-sm-7">
							<h3>Applicant Detail <br><small>Butiran Pemohon</small></h3>
							<hr>
							<form class="form-horizontal form-bordered">
								<div class="form-group">
									<label class="col-md-4 control-label">Name / Nama</label>
									<div class="col-md-6">
										<p class="form-control-static"><?php echo $this->session->userdata('name'); ?></p>
									</div>
									
									<label class="col-md-4 control-label">Phone No / No. Telefon</label>
									<div class="col-md-6">
										<p class="form-control-static"><?php echo $profile[0]->phone_no; ?></p>
									</div>
									
									<label class="col-md-4 control-label" for="address-select">Email / Emel</label>
									<div class="col-md-6">
										<p class="form-control-static"><?php echo $profile[0]->email; ?></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="address-select">Address / Alamat </label>
									<div class="col-md-6">
										<p class="form-control-static">
											<?php echo strtoupper($info[0]->no_unit);
											if($info[0]->home_name)
											echo ', '.strtoupper($info[0]->home_name);
											echo ', '.strtoupper($info[0]->street_name);
											echo '<br>'.strtoupper($info[0]->town_name);
											echo strtoupper(get_parlimen_name($info[0]->parlimen));
											echo '<br>'.$info[0]->postcode.' KUALA LUMPUR.'; 
											?> 
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="example-file-input">Supporting Document / Dokumen Sokongan</label>
									<div class="col-md-7">
										<?php 
											if( $info[0]->doc_support == '' ){
												$doc = "Tiada";
											}
											else{

												$dc = explode('|', $info[0]->doc_support);

												for($i=0; $i < count($dc); $i++)
												{
													$no = $i + 1;

													if($dc[$i] != '')
													$doc .= $no." . <a href='".$dc[$i]."' download>".$dc[$i]."</a><br>";
												}

											}
										?>
										<p class="form-control-static"><?php echo $doc;?> </p>
									</div>
								</div>
							</form>
						</div>
						
						<!-- Butiran Pengesahan & Lesen -->
						<div class="col-sm-5">
							<div class="widget">
								<!-- <div class="widget-simple no-padding-y themed-background-dark-sand">
									<h4 class="widget-content widget-content-light">
										<strong>No. Permohonan </strong><?php echo $info[0]->app_no; ?></a>
									</h4>
								</div> -->
								<div class="widget-simple themed-background-sand">
									<h5 class="widget-content">
										<strong>Info License Details <br><small>Butiran Pengesahan dan Lesen</small></strong>
									</h5>
								</div>
								<div class="widget-extra themed-background-light-sand">
									<!-- <div class="row"></div> -->
										<form class="form-horizontal">
											<div class="form-group">
												<!-- <label class="col-md-8 control-label" for="address-select">Status Permohonan</label>
												<div class="col-md-4">
													<p class="form-control-static"><?php echo $info[0]->status; ?></p>
												</div>
												<?php 
												if( $info[0]->status == 'Ditolak' )
												{
												?>
													<label class="col-md-8 control-label" for="address-select">Permohonan Rayuan Dibenarkan?</label>
													<div class="col-md-4">
														<p class="form-control-static themed-color-spring"><strong>
														<?php 
														if( $info[0]->appeal == 0)
															echo 'Ya';
														else
															echo 'Tidak';
														?>	
														</strong></p>
													</div>
												<?php 
												}
												?> -->
												<label class="col-md-8 control-label" for="address-select">Accepted Date <br><small>Tarikh Diterima</small></label>
												<div class="col-md-4">
													<p class="form-control-static"><?php echo date('d/m/Y', strtotime($info[0]->date_apply));?></p>
												</div>
												<label class="col-md-8 control-label" for="address-select">Approval Date <br><small>Tarikh Diluluskan</small></label>
												<div class="col-md-4">
													<?php 
													
													if( $info[0]->statusApp == 'Lulus' )
															$date_app = date('d/m/Y', strtotime($info[0]->date_start));
													else
															$date_app = 'Tiada';
													?>
													<p class="form-control-static"><?php echo $date_app;?></p>
												</div>
											
												<label class="col-md-8 control-label" for="address-select">License Start Date <br><small>Tarikh Lesen Mula</small></label>
												<div class="col-md-4">
													<p class="form-control-static"><?php echo $date_app; ?></p>
												</div>
												<label class="col-md-6 control-label" for="address-select">Ulasan Pendaftar (Jika Ada)<br><small>Ulasan Pendaftar (Jika Ada)</small></label>
												<div class="col-md-6">
													<p class="form-control-static"><?php echo $comment->description; ?></p>
												</div>
											</div>
										</form>
								</div>
							</div>
						</div>
						<?php 
							$dog_detail = get_dog_detail($info[0]->app_id);
							
						?>
						<!-- Butiran Anjing #1 -->
						<div class="col-sm-6">
							<div class="block bordered">
                                <!-- Anjing #1 Title -->
                                <div class="block-title">
                                    <h2>Dog's Detail <strong>#1</strong> / Butiran Anjing Peliharaan <strong>#1</strong></h2>
                                </div>
                                <!-- END Title -->

                                <!-- Form Anjing #1 Content -->
                                <form action="renew_license_yes.html" method="post" class="form-horizontal form-bordered">
									<div class="form-group">
										<label class="col-md-6 control-label" for="val_username">Type / Baka <small></small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo get_dog_name($dog_detail[0]->dog_type); ?></p>
										</div>
										
										<label class="col-md-6 control-label" for="val_username">Color <small>/ Warna</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog_detail[0]->color;?></p>
										</div>
										
										<label class="col-md-6 control-label">Gender <small>/ Jantina</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog_detail[0]->gender; ?></p>
										</div>
										
										<label class="col-md-6 control-label" for="example-select">Weight <small>/ Berat</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo get_dogs_weight($dog_detail[0]->weight);?></p>
										</div>
										
										<label class="col-md-6 control-label">Sterilization <small>/ Pemandulan</small></label>
										<div class="col-md-6">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[0]->sterilization == 1 )
													echo "Ya";
												else
													echo "Tidak";
											?>	
											</p>
										</div>
										
										<label class="col-md-6 control-label">Microchip <small>/ Mikrocip</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog_detail[0]->microchip; ?></p>
										</div>
										
										<label class="col-md-8 control-label">The owner has attended a training or animal preservation course.<br><small>Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</small></label>
										<div class="col-md-3">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[0]->owner_training == 1 )
													echo "Ya";
												else
													echo "Tidak";
											?>	
											</p>
										</div>
										<label class="col-md-8 control-label">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small></label>
										<div class="col-md-3">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[0]->dog_training == 1 )
													echo "Ya";
												else
													echo "Tidak";
											?>
											</p>
										</div>
									</div>
									<div class="form-group">
                                        <label class="col-md-4 control-label">Dog's Image <br><small>Gambar Anjing</small></label>
										<div class="col-md-7">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[0]->dog_pic == "" )
												{
													echo "<img src='".base_url()."images/no_picture.gif' width=\"100\" height=\"100\">";
												}else
												{
													echo "<img src=".base_url().$dog_detail[0]->dog_pic." width=\"100\" height=\"100\">";
												}
											?>
											</p>
										</div>
                                    </div>
                                </form>
                                <!-- END Form Anjing #2 Content -->
                            </div>
						</div>
						<!-- END Butiran Anjing #1 -->
						
						<!-- Butiran Anjing #2 -->
						<div class="col-sm-6">
							<div class="block bordered">
                                <!-- Anjing #2 Title -->
                                <div class="block-title">
                                    <h2>Dog's Detail <strong>#1</strong> <small>/ Butiran Anjing Peliharaan <strong>#1</strong></small></h2>
                                </div>
                                <!-- END Anjing #2 Title -->
								<?php 
										if( count($dog_detail) == 2 )
										{
								?>
                  <!-- Form Anjing #2 Content -->
                  <form action="renew_license_yes.html" method="post" class="form-horizontal form-bordered">
									<div class="form-group">
										<label class="col-md-6 control-label" for="val_username">Type / Baka <small></small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo get_dog_name($dog_detail[1]->dog_type); ?></p>
										</div>
										
										<label class="col-md-6 control-label" for="val_username">Color <small>/ Warna</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog_detail[1]->color;?></p>
										</div>
										
										<label class="col-md-6 control-label">Gender <small>/ Jantina</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog_detail[1]->gender; ?></p>
										</div>
										
										<label class="col-md-6 control-label" for="example-select">Weight <small>/ Berat</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo get_dogs_weight($dog_detail[1]->weight);?></p>
										</div>
										
										<label class="col-md-6 control-label">Sterilization <small>/ Pemandulan</small></label>
										<div class="col-md-6">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[1]->sterilization == 1 )
													echo "Ya";
												else
													echo "Tidak";
											?>	
											</p>
										</div>
										
										<label class="col-md-6 control-label">Microchip <small>/ Mikrocip</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog_detail[1]->microchip; ?></p>
										</div>
										
										<label class="col-md-8 control-label">The owner has attended a training or animal preservation course.<br><small>Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</small></label>
										<div class="col-md-3">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[1]->owner_training == 1 )
													echo "Ya";
												else
													echo "Tidak";
											?>	
											</p>
										</div>
										<label class="col-md-8 control-label">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small></label>
										<div class="col-md-3">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[1]->dog_training == 1 )
													echo "Ya";
												else
													echo "Tidak";
											?>
											</p>
										</div>
									</div>
									<div class="form-group">
                                        <label class="col-md-4 control-label">Dog's Image <br><small>Gambar Anjing</small></label>
										<div class="col-md-7">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[1]->dog_pic == "" )
												{
													echo "<img src='".base_url()."images/no_picture.gif' width=\"100\" height=\"100\">";
												}else
												{
													echo "<img src=".base_url().$dog_detail[1]->dog_pic." width=\"100\" height=\"100\">";
												}
											?>
											</p>
										</div>
                                    </div>
                </form>
                <!-- END Form Anjing #2 Content -->
                <?php 
              	}
              	else
              	{
              	?>
              	<form action="#" method="post" class="form-horizontal form-bordered">
              		<div class="form-group">
										<label class="col-md-4 control-label">No registered <br><small>Tidak didaftarkan</small></label>
									</div>
              	</form>
              	<?php
              	}
                ?>
                            </div>
						</div>
						<!-- END Butiran Anjing #2 -->
							
						<?php 
						if( $info[0]->appeal == 0 )
						{
						?>		
						<div class="col-sm-12">
							<form action="<?php echo base_url();?>index.php/appeal/save_appeal" method="post" id="submit-appeal" enctype="multipart/form-data" class="form-horizontal">
								<div class="col-md-8">
								<div class="form-horizontal form-bordered">
											<div class="form-group">
												<label class="col-md-7 control-label" for="example-file-input">Supporting Documents (.docx, .doc, .pdf, .gif, .jpg, .jpeg, .png, .rtf, .odt, .xps) <br><small>Dokumen Sokongan (.docx, .doc, .pdf, .gif, .jpg, .jpeg, .png, .odt, .xps)</small></label>
												<div class="col-md-5">
													<input type="file" id="doc_support" name="doc_support[]" multiple="">
												</div>
											</div>
								</div>	
								<div class="form-group">
								<div class="col-md-7">
											<label class="control-label text-left">
I would like to appeal for the following reasons:<br><small>Saya ingin merayu diatas sebab-sebab berikut</small>:</label>
											<textarea id="text-appeal" name="text-appeal" rows="5" class="form-control" placeholder="Please state your reasons / Nyatakan rayuan di sini"></textarea>
										</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="checkbox">
											<label for="val_dogcolor_blk"><input type="checkbox" id="val_verify" name="val_verify" value="1" > I agree to abide by all the provisions under the Dog Licensing Law and the Dog Breeding House (WPKL) (Pindaan) 2011<br><small>Saya bersetuju mematuhi semua peruntukan dibawah Undang Undang Kecil Perlesenan Anjing dan Rumah Pembiakan Anjing (WPKL) (Pindaan) 2011
											</small></label>
											<br><br>
											<button type="button" class="btn btn-square btn-md btn-primary pull-left" id="appeal-app" value="Simpan"><i class="fa fa-long-arrow-right"></i> Send Appeal Form / Hantar Permohonan Rayuan</button>
										</div>
									</div>
								</div>
								</div>
								<div class="col-md-4">
								<div class="block full">
									<div class="block-title">
										<ul class="nav nav-tabs" data-toggle="tabs">
											<li class="active"><a href="#example-tabs2-activity">English</a></li>
											<li class=""><a href="#example-tabs2-profile">B.Melayu</a></li>
										</ul>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="example-tabs2-activity">
											<div class="alert alert-warning">
												<h4><i class="fa fa-hand-o-right"></i> <strong>Notes</strong></h4>
												<p>
												<small>
												If you are living in condo/apartment, letter of authorization from JMB is required.<br><br>
													Please upload your document file(s) with the following criteria:<br><br>
													1. File format accepted are:<br> .doc, .docx, .pdf, .jpg, .jpeg, .png, .rtf, .odt, .xps<br>
													2. Maximum of total file size for all document is 2MB<br>
													3. File name cannot contain space or symbol (eg: &amp;, %, $ etc)<br>
													4. File will be uploaded after submitting the form <br>
												</small>
												</p>
											</div>
										</div>
										<div class="tab-pane" id="example-tabs2-profile">
											<div class="alert alert-warning">
												<h4><i class="fa fa-hand-o-right"></i> <strong>Nota</strong></h4>
												<p>
													<small>
													Jika anda tinggal di kondo/apartment, surat kebenaran JMB adalah wajib.<br><br>
													Sila muat naik dokumen mengikut kriteria berikut:<br><br>
													1. Format fail yang dibenarkan:<br> .doc, .docx, .pdf, .jpg, .jpeg, .png, .rtf, .odt, .xps<br>
													2. Jumlah maksimum saiz fail adalah 2MB<br>
													3. Nama fail tidak boleh mengandungi simbol (&amp;, %, $ dan sebagainya)<br>
													4. Fail akan dimuatnaik selepas borang dihantar. <br>
												</small>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>	
								
									<hr>
								
							<!--<input type="submit" />-->
								<input type="hidden" name="app_id" value="<?php echo $info[0]->app_id;?>" />
								<!-- <input type="submit" name=""> -->
							</form>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-sm-12">
							<hr>
							<a href="<?php echo base_url();?>index.php/dashboard_user" class="btn btn-square btn-sm btn-warning" id="add-dog" value="Simpan"><i class="fa fa-long-arrow-left"></i>   Kembali</a>
						</div>
						<?php
						}
						?>
					
						
                    </div>
                </div>
            </section>
            <!-- END Company Info