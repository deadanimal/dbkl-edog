            <!-- Page Title -->
			<div class="media-container">
                <!-- Intro -->
                <section class="site-section site-section-light site-section-top">
                    <div class="container text-center">
                        <h1 class="animation-slideDown"><strong>Application Status</strong></h1>
                    </div>
                </section>
                <!-- END Intro -->

                <!-- For best results use an image with a resolution of 2560x279 pixels -->
                <img src="<?php echo base_url(); ?>img/placeholders/headers/login_header01.jpg" alt="" class="media-image animation-pulseSlow">
            </div>
			<!-- END Page Title -->

            <!-- Company Info -->
            <section class="site-section site-content-single">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-9">
            <form action="<?php echo base_url();?>index.php/new_license_app/save_new_application" id="new-application" method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="col-sm-12">
							<div class="table-responsive">
								<h3>Dog's Address Details <br><small>Butiran Alamat Tempat Peliharaan</small></h3>
								<hr>
								<br>
									<div class="form-group">
                                        <label class="col-md-4 control-label" for="address-select">Address / Alamat </label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">
                                            <?php 
                                            	
                                            		$addr .= $address[0]->no_unit;
                                            		if($address[0]->home_name)
                                    				$addr .= ",&nbsp;".ucwords(strtoupper($address[0]->home_name));
													if($address[0]->street_name)
													$addr .= ",&nbsp;".ucwords(strtoupper($address[0]->street_name));
													if($address[0]->town_name != '')
													$addr .= ",&nbsp;".ucwords(strtoupper($address[0]->town_name));
												    $addr .= ",&nbsp;".ucwords(strtoupper(get_parlimen_name($address[0]->parlimen))).",&nbsp;".$address[0]->postcode." KUALA LUMPUR";
											echo $addr;
											?>
                                             </p>
                                        </div>
                                    </div>
								<hr>
						</div>
					</div>
						<?php 
						$quota = get_license_quota($address[0]->home_space);
						
						$totalLicense = get_available_license($address[0]->addr_id);
						$homeType = get_home_type($address[0]->home_type);
						$totalDogAvai = get_license_quota($address[0]->home_space);
						$appealTotal = get_available_appeal_license($address[0]->addr_id);
						
						if( $homeType[0]->doc == 0 )
						{
							$totalDog = $totalLicense[0]->totalLicense;
							$total = $totalLicense[0]->totalLicense;
							
						}
						else
						{
							$total = $totalLicense[0]->totalLicense;
							$totalDog = 1;
							//$totalDogAvai = 1;
						}
							
							$totalAvailable = get_license_quota($address[0]->home_space) - $total - $appealTotal[0]->totalLicenseAppeal;
 						
 						$dog_second = "disabled";
 						//echo get_license_quota($address[0]->home_space);
 						//echo $appealTotal[0]->totalLicenseAppeal;
 						//echo $total;
 						//echo $totalAvailable;

						if($totalAvailable == 1)
						{
							$dog_second = "disabled";
						}
						else
						{
							$countDog = get_count_temp($address[0]->addr_id, 'BARU');
						
							if( count($countDog) > 0 )
							{ 
								$dog_second = null;
							}
						}
						
						$temp_dog = get_temp_dog($address[0]->addr_id, 1, 'BARU');

						$add_dog = null;
						$detail_dog = null;
						
						//Data Anjing
						$dog_type = null;
						$colorDog = null;
						$gender = null;
						$weight = null;
						$mandul = 0;
						$microchip = null;
						$owner_training = 0;
						$dog_training = 0;
						$pic_dog = null;
						$dog_id = null;
						
						if( count($temp_dog) > 0 )
						{
							 $add_dog = "display:none";
							 $verify = "display:block";
							 
							 $dog_type = get_dog_name($temp_dog[0]->dog_type);
							 $gender = $temp_dog[0]->dog_gender;
							 $weight = get_dogs_weight($temp_dog[0]->dog_weight);
							 $mandul = $temp_dog[0]->dog_mandul;
							 $microchip = $temp_dog[0]->dog_microchip;
							 $owner_training = $temp_dog[0]->owner_training;
							 $dog_training = $temp_dog[0]->dog_training;
							 $pic_dog = $temp_dog[0]->pic_dog;
							 $dog_id = $temp_dog[0]->no_dog;
							 $color = $temp_dog[0]->dog_color;
							 
							 $colorExplode = explode(", ", $color);
							
							 for($i=0; $i < count($colorExplode); $i++)
							 {
							 	 if($i > 0)
					 	         $colorDog .= ", ";
							 	 $colorDog .= $colorExplode[$i];

							 }
						}
						else
						{
							 $detail_dog = "display:none";
							 $verify = "display:none";
						}
					
						?>
						<!-- Butiran Anjing #1 -->
						<div class="col-sm-6">
							<div class="block bordered" id="add-detail-dog" style="<?php echo $add_dog; ?>">
                  <!-- Anjing #1 Title -->
                  <div class="block-title">
                      <h2>Dog's Detail <strong>#1</strong> / Butiran Anjing Peliharaan <strong>#1</strong></h2>
                  </div>
                  <!-- END Title -->
					
                  <!-- Form Anjing #1 Content -->
                  <div class="form-horizontal form-bordered">
                                    
									<div class="form-group form-actions">
                                        <div class="col-md-8">
                                            <a href="#update-renew-1" data-id="1" id="add-first-dog" class="btn btn-square btn-sm btn-primary" data-toggle="modal" value="Update"><i class="fa fa-edit"></i> Add Dog / Tambah Anjing</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Form Anjing #2 Content -->
                            </div>
                            <!-- Butiran Anjing #1 -->
														<div class="block bordered" id="detail-dog" style="<?php echo $detail_dog; ?>">
                                <!-- Anjing #1 Title -->
                                <div class="block-title">
                                    <h2>Dog's Detail <strong>#1</strong> <small>/ Butiran Anjing Peliharaan <strong>#1</strong></small></h2>
                                </div>
                                <!-- END Title -->

                                <!-- Form Anjing #1 Content -->
                                <div class="form-horizontal form-bordered">
									<div class="form-group">
										<label class="col-md-6 control-label" for="val_username">Type / Baka <small></small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog_type; ?></p>
										</div>
										
										<label class="col-md-6 control-label" for="val_username">Color <small>/ Warna</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $colorDog; ?></p>
										</div>
										
										<label class="col-md-6 control-label">Gender <small>/ Jantina</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $gender; ?></p>
										</div>
										
										<label class="col-md-6 control-label" for="example-select">Weight <small>/ Berat</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $weight; ?></p>
										</div>
										
										<label class="col-md-6 control-label">Sterilization <small>/ Pemandulan</small></label>
										<div class="col-md-6">
											<p class="form-control-static">
											<?php
											if($mandul == 1)
												echo 'Ya';
											else
												echo 'Tidak';
											?></p>
										</div>
										
										<label class="col-md-6 control-label">Microchip <small>/ Mikrocip</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $microchip; ?></p>
										</div>
										
										<label class="col-md-8 control-label">The owner has attended a training or animal preservation course.<br><small>Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</small></label>
										<div class="col-md-3">
											<p class="form-control-static">
											<?php
											if($owner_training == 1)
												echo 'Ya';
											else
												echo 'Tidak';
											?>
											</p>
										</div>
	
										<label class="col-md-8 control-label">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small></label>
											<div class="col-md-3">
												<p class="form-control-static">
												<?php
												if($dog_training == 1)
													echo 'Ya';
												else
													echo 'Tidak';
												?>
												</p>
											</div>
										</div>
										<div class="form-group">
									                         <label class="col-md-4 control-label">Dog's Image <br><small>Gambar Anjing</small></label>
																							<div class="col-md-7">
																								<p class="form-control-static">
																									<?php 
																										if( $pic_dog == "" ){
																										?>
																											<img src="<?php echo base_url()."images/no_picture.gif";?>" width="100" height="100">
																										<?php
																										}else{
																										?>
																											<img src="<?php echo base_url().$pic_dog;?>" width="100" height="100">
																										<?php
																										}
																										?>
																								</p>
																							</div>
									                    </div>
									                    <input type="hidden" name="dogid" id="dogid" value="<?php echo $dog_id;?>" />
									                    <input type="hidden" name="addrid" id="addrid" value="<?php echo $address[0]->addr_id;?>" />
																			
																			<div class="form-group form-actions">
                                        <div class="col-md-8 col-md-offset-4">
                                            <a href="#update-renew-2" data-id="<?php echo $address[0]->addr_id."|".$dog_id;?>" class="btn btn-square btn-sm btn-primary" data-toggle="modal" id="update-temp-dog" value="Update"><i class="fa fa-edit"></i> Update Info / Kemaskini Maklumat</a>
                                            <button type="button" class="btn btn-square btn-sm btn-warning" id="cancel-dog" value="Batal"><i class="fa fa-repeat"></i> Cancel / Batal</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Form Anjing #2 Content -->
                            </div>
						</div>
						<!-- END Butiran Anjing #1 -->
						<?php
						
						$temp_dog = get_temp_dog($address[0]->addr_id, 2, 'BARU');
						
						$add_dog = null;
						$detail_dog = null;
						
						//Data Anjing
						$dog_type = null;
						$colorDog = null;
						$gender = null;
						$weight = null;
						$mandul = 0;
						$microchip = null;
						$owner_training = 0;
						$dog_training = 0;
						$pic_dog = null;
						$dog_id = null;
						
						if( count($temp_dog) > 0 )
						{
							 $add_dog = "display:none";
							 //$verify = "display:block";
							 
							 $dog_type = get_dog_name($temp_dog[0]->dog_type);
							 $gender = $temp_dog[0]->dog_gender;
							 $weight = get_dogs_weight($temp_dog[0]->dog_weight);
							 $mandul = $temp_dog[0]->dog_mandul;
							 $microchip = $temp_dog[0]->dog_microchip;
							 $owner_training = $temp_dog[0]->owner_training;
							 $dog_training = $temp_dog[0]->dog_training;
							 $pic_dog = $temp_dog[0]->pic_dog;
							 $dog_id = $temp_dog[0]->no_dog;
							 $color = $temp_dog[0]->dog_color;
							 
							 $colorExplode = explode(", ", $color);
							
							 for($i=0; $i < count($colorExplode); $i++)
							 {

							 	 if($i > 0)
					 	         $colorDog .= ", "; 	
							 	 $colorDog .= $colorExplode[$i];

							 }
						}
						else
						{
							 $detail_dog = "display:none";
							 //$verify = "display:none";
						}
						?>
						<!-- Butiran Anjing #2 -->
						<div class="col-sm-6">
							<div class="block bordered" id="add-detail-dog" style="<?php echo $add_dog; ?>">
                  <!-- Anjing #1 Title -->
                  <div class="block-title">
                      <h2>Dog's Details <strong>#2</strong><small> / Butiran Anjing Peliharaan <strong>#2</strong></small></h2>
                  </div>
                  <!-- END Title -->
					
                  <!-- Form Anjing #1 Content -->
                  <div class="form-horizontal form-bordered">
                                    
									<div class="form-group form-actions">
                                        <div class="col-md-8">
                                      
                                            <a href="#update-renew-1" data-id="2" id="add-second-dog" <?php echo $dog_second;?> class="btn btn-square btn-sm btn-primary" data-toggle="modal" value="Update"><i class="fa fa-edit"></i> Add Dog / Tambah Anjing</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Form Anjing #2 Content -->
                            </div>
                            <!-- Butiran Anjing #1 -->
														<div class="block bordered" id="detail-dog" style="<?php echo $detail_dog; ?>">
                                <!-- Anjing #1 Title -->
                                <div class="block-title">
                                    <h2>Dog's Details <strong>#2</strong><small> / Butiran Anjing Peliharaan <strong>#2</strong></small></h2>
                                </div>
                                <!-- END Title -->

                                <!-- Form Anjing #1 Content -->
                                <div class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-6 control-label" for="val_username">Type / Baka <small></small></label>
																<div class="col-md-6">
																	<p class="form-control-static"><?php echo $dog_type; ?></p>
																</div>
																
																<label class="col-md-6 control-label" for="val_username">Color <small>/ Warna</small></label>
																<div class="col-md-6">
																	<p class="form-control-static"><?php echo $colorDog; ?></p>
																</div>
																
																<label class="col-md-6 control-label">Gender <small>/ Jantina</small></label>
																<div class="col-md-6">
																	<p class="form-control-static"><?php echo $gender; ?></p>
																</div>
																
																<label class="col-md-6 control-label" for="example-select">Weight <small>/ Berat</small></label>
																<div class="col-md-6">
																	<p class="form-control-static"><?php echo $weight; ?></p>
																</div>
																
																<label class="col-md-6 control-label">Sterilization <small>/ Pemandulan</small></label>
																<div class="col-md-6">
																	<p class="form-control-static">
																	<?php
																	if($mandul == 1)
																		echo 'Ya';
																	else
																		echo 'Tidak';
																	?></p>
																</div>
																
																<label class="col-md-6 control-label">Microchip <small>/ Mikrocip</small></label>
																<div class="col-md-6">
																	<p class="form-control-static"><?php echo $microchip; ?></p>
																</div>
																
																<label class="col-md-8 control-label">The owner has attended a training or animal preservation course.<br><small>Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</small></label>
																<div class="col-md-3">
																	<p class="form-control-static">
																	<?php
																	if($owner_training == 1)
																		echo 'Ya';
																	else
																		echo 'Tidak';
																	?>
																	</p>
																</div>
							
																<label class="col-md-8 control-label">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small></label>
																	<div class="col-md-3">
																		<p class="form-control-static">
																		<?php
																		if($dog_training == 1)
																			echo 'Ya';
																		else
																			echo 'Tidak';
																		?>
																		</p>
																	</div>
																</div>
																<div class="form-group">
						                                        <label class="col-md-4 control-label">Dog's Image <br><small>Gambar Anjing</small></label>
																<div class="col-md-7">
																	<p class="form-control-static">
																	<?php 
																	if( $pic_dog == "" ){
																	?>
																		<img src="<?php echo base_url()."images/no_picture.gif";?>" width="100" height="100">
																	<?php
																	}else{
																	?>
																		<img src="<?php echo base_url().$pic_dog;?>" width="100" height="100">
																	<?php
																	}
																	?>
																	</p>
																</div>
						                                    </div>
															
															<input type="hidden" name="dogid" id="dogid2" value="<?php echo $dog_id;?>" />
						                    <input type="hidden" name="addrid" id="addrid2" value="<?php echo $address[0]->addr_id;?>" />
																			<div class="form-group form-actions">
                                        <div class="col-md-8 col-md-offset-4">
                                            <a href="#update-renew-2" data-id="<?php echo $address[0]->addr_id."|".$dog_id;?>" class="btn btn-square btn-sm btn-primary" data-toggle="modal" id="update-temp-dog2" value="Update"><i class="fa fa-edit"></i> Update Info / Kemaskini Maklumat</a>
                                           <button type="button" class="btn btn-square btn-sm btn-warning" id="cancel2-dog" value="Batal"><i class="fa fa-repeat"></i> Cancel / Batal</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Form Anjing #2 Content -->
                            </div>
						</div>

						<!-- END Butiran Anjing #2 -->
						
						
						
						<!-- <input type="submit" name=""> -->
							
</div>
                <div class="col-md-3">
                    	<div class="site-block">
						
							<!-- <blockquote> -->
								<p>
									<strong>Hi,<?php echo $this->session->userdata('name');?></strong><br>
									User ID : <?php echo $this->session->userdata('nric');?><br>
									<!-- <a href="/index.php/manage_profile" class="btn btn-sm btn-info"><strong>Change Password</strong></a> -->
								</p>
							<!-- </blockquote> -->
							<hr>
							<div class="block full">
								<div class="block-title">
									<ul class="nav nav-tabs" data-toggle="tabs">
										<li class="active"><a href="#example-tabs2-activity">Notes</a></li>
										<li class=""><a href="#example-tabs2-profile">Nota</a></li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane active" id="example-tabs2-activity">
										<div class="alert alert-warning">
											<h4><i class="fa fa-hand-o-right"></i> <strong>New Application Steps</strong></h4>
											<p>
												Please complete the steps below in order to apply your dog license<br><br>
												1. Create Account<br>
												2. Update Profile<br>
												3. Add Dog's Address<br>
												4. Add Dog's Detail #1 <br>
												5. Add Dog's Detail #2 (if any)<br>
												6. Agree & Submit Application <br>
												7. Print Payment Bill & Pay at Counter
											</p>
										</div>
									</div>
									<div class="tab-pane" id="example-tabs2-profile">
										<div class="alert alert-warning">
											<h4><i class="fa fa-hand-o-right"></i> <strong>Langkah Permohonan Baru</strong></h4>
											<p>
												Sila lengkapkan langkah di bawah untuk memohon lesen anjing anda<br><br>
												1. Bina Akaun<br>
												2. Kemaskini Profile<br>
												3. Tambah Alamat Peliharaan<br>
												4. Tambah Info Anjing #1 <br>
												5. Tambah Info Anjing #2 (jika ada)<br>
												6. Setuju & Hantar Permohonan <br>
												7. Cetak Bukti Pembayaran & Bayar di Kaunter
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>	<br>
                    
                    <div class="col-sm-12" style="<?php echo $verify; ?>">
                    <hr>
							<div class="col-md-8">
								<div class="form-horizontal form-bordered">
								<?php $doc = validate_doc_support($address[0]->home_type); ?>
											<div class="form-group">
												<label class="col-md-3 control-label" for="example-file-input">Supporting Documents <br><small>Dokumen Sokongan </small></label>
												<div class="col-md-9">
													<input type="file" id="doc_support" name="doc_support[]" multiple=""><br>
													<strong>NOTE : </strong> If you are living in condo/apartment, letter of authorization from JMB is required<br>
													<strong>NOTA : </strong> Jika anda tinggal di kondo/apartment, surat kebenaran JMB adalah wajib
												</div>
											</div>
											<!-- <div class="block full">
												<div class="block-title">
													<ul class="nav nav-tabs" data-toggle="tabs">
														<li class="active"><a href="#example-tabs2-eng">English</a></li>
														<li class=""><a href="#example-tabs2-bm">B.Melayu</a></li>
													</ul>
												</div>
												<div class="tab-content">
													<div class="tab-pane active" id="example-tabs2-eng">
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
													<div class="tab-pane" id="example-tabs2-bm">
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
											</div> -->
										
										<input type="hidden" name="doc_type" id="doc_type" value="<?php echo $doc; ?>" />
								</div>	
							
								<div class="form-horizontal form-bordered">
								<div class="form-group form-actions">
									<div class="col-md-12">
										<div class="checkbox">
											<label for="val_dogcolor_blk">
												<input type="checkbox" id="agreed_term" name="agreed_term" value="option1">  
I agree to abide by all the provisions under the Dog Licensing Law and the Dog Breeding House (WPKL) (Pindaan) 2011<br><small>Saya bersetuju mematuhi semua peruntukan dibawah Undang Undang Kecil Perlesenan Anjing dan Rumah Pembiakan Anjing (WPKL) (Pindaan) 2011</small>
											</label><br><br>
											<!--<input type="submit" />-->
											<button type="button" class="btn btn-square btn-md btn-primary" id="submit-dog" value="Simpan"><strong><i class="fa fa-save"></i> Send Application / Hantar Permohonan</strong></button>
										</div>
									</div>
								<!--<input type="submit" name="" />-->
								</div>
							</div>
							</div>	
							<div class="col-md-4">
								<div class="block full">
									<div class="block-title">
										<ul class="nav nav-tabs" data-toggle="tabs">
											<li class="active"><a href="#example-tabs2-eng">Instructions</a></li>
											<li class=""><a href="#example-tabs2-bm">Arahan</a></li>
										</ul>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="example-tabs2-eng">
											<div class="alert alert-warning">
												<small>
													Please upload your document file(s) with the following criteria:<br><br>
													1. File format accepted are:<br> .doc, .docx, .pdf, .jpg, .jpeg, .png, .odt, .xps<br>
													2. Maximum of total file size for all document is 2MB<br>
													3. File name cannot contain space or symbol (eg: &amp;, %, $ etc)<br>
													4. File will be uploaded after submitting the form <br>
												</small>
												</p>
											</div>
										</div>
										<div class="tab-pane" id="example-tabs2-bm">
											<div class="alert alert-warning">
												<small>
													Sila muat naik dokumen mengikut kriteria berikut:<br><br>
													1. Format fail yang dibenarkan:<br> .doc, .docx, .pdf, .jpg, .jpeg, .png, .odt, .xps<br>
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
						</div>
						<div class="col-sm-12" id="verification-opt" style="<?php echo $verify; ?>">

						</div>
							</div>

						</div>
						</div>
						</form>
                    </div>
            </section>
            <!-- END Company Info -->
			
					<!-- Modal Register License #1 -->
        <div id="update-renew-1" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
					<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Dog's Detail <small>/ Butiran Anjing Peliharaan</small><strong> #<span class="dogs"></span></strong></h4>
                    </div>
					<div class="modal-body">
						<form id="form-reg-dog" action="<?php echo base_url();?>index.php/new_license_app/save_temporary" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_dogtype">Type / Baka <small></small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<select id="dog_type" name="dog_type" class="form-control wizard-ignore" size="1">
										<option value="0">Please select</option>
										<?php 
										$dog_type = get_dog_type();
										
										foreach($dog_type as $dt)
										{	
											echo "<option value=\"".$dt->ddid."\">".$dt->detail."</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_dogcolor">Color <small>/ Warna</small> <span class="text-danger">*</span></label>
								
								<div class="col-md-6">
									<div class="checkbox">
										<label for="val_dogcolor_blk">
											<input type="checkbox" id="val_dogcolor_blk" name="val_dogcolor[]" value="Hitam" class="wizard-ignore"  > Black <small>/ Hitam</small>
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_wht">
											<input type="checkbox" id="val_dogcolor_wht" name="val_dogcolor[]" value="Putih" class="wizard-ignore"  > White <small>/ Putih</small>
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_brown">
											<input type="checkbox" id="val_dogcolor_brown" name="val_dogcolor[]" value="Coklat" class="wizard-ignore" > Brown <small>/ Coklat</small>
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_etc">
											<input type="checkbox" id="val_dogcolor_etc_opt" name="val_dogcolor_etc_opt" value="Lain" class="wizard-ignore" > Others <small>/ Lain-lain</small>
										</label>
									</div>
									<input type="text" id="val_dogcolor_etc" disabled="disabled" name="val_dogcolor[]" class="form-control wizard-ignore" placeholder="Please state / Sila nyatakan" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Gender <small>/ Jantina</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<label class="radio-inline" for="example-inline-radio3">
										<input type="radio" id="val_gender1" name="val_gender" value="Jantan" class="wizard-ignore" > Male <small>/ Jantan</small>
									</label>
									<label class="radio-inline" for="example-inline-radio4">
										<input type="radio" id="val_gender2" name="val_gender" value="Betina" class="wizard-ignore" > Female <small>/ Betina</small>
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="example-select">Weight <small>/ Berat</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<select id="val_weight" name="val_weight" class="form-control wizard-ignore" size="1">
										<option value="0">Please select</option>
										<?php 
										$dog_weight = get_dog_weight();
										foreach($dog_weight as $dw)
										{
											echo "<option value=\"".$dw->dwid."\">".$dw->dog_weight."</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Sterilization <small>/ Pemandulan</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<label class="radio-inline" for="example-inline-radio5">
										<input type="radio" id="val_mandul1" name="val_mandul" value="1" class="wizard-ignore" > Yes / Ya
									</label>
									<label class="radio-inline" for="example-inline-radio6">
										<input type="radio" id="val_mandul2" name="val_mandul" value="0" class="wizard-ignore"  > No / Tidak
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Microchip <small>/ Mikrocip</small></label>
								<div class="col-md-6">
									<input type="text" id="val_microchip" name="val_microchip" class="form-control wizard-ignore" placeholder="SIRI-9999-99" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-7 control-label col-md-offset-1">The owner has attended a training or animal preservation course.<br><small>Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</small> <span class="text-danger">*</span></label>
								<div class="col-md-3">
									<label class="radio-inline" for="example-inline-radio7">
										<input type="radio" id="owner_training1" name="owner_training" value="1" class="wizard-ignore" > Yes / Ya
									</label>
									<label class="radio-inline" for="example-inline-radio8">
										<input type="radio" id="owner_training2" name="owner_training" value="0" class="wizard-ignore" > No / Tidak
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-7 control-label col-md-offset-1">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small> <span class="text-danger">*</span></label>
								<div class="col-md-3">
									<label class="radio-inline" for="example-inline-radio9">
										<input type="radio" id="dog_training1" name="dog_training" value="1" class="wizard-ignore" > Yes / Ya
									</label>
									<label class="radio-inline" for="example-inline-radio10">
										<input type="radio" id="dog_training2" name="dog_training" value="0" class="wizard-ignore" > No / Tidak
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="example-file-input">Dog's Image <br><small>Gambar Anjing</small></label>
								<div class="col-md-7">
									<input type="file" id="pic_dog" name="pic_dog" /><br>
									Saiz gambar tidak melebihi 300Kb<br>
									<small>Maximum image size allowed is 300Kb</small>
								</div>
							</div>
							<input type="hidden" name="dogID" id="dogID" value="" />
							<input type="hidden" name="addrID" id="addrID" value="<?php echo $address[0]->addr_id; ?>" />
							<!-- Form Buttons -->
							<div class="form-group form-actions">
								<div class="col-md-8 col-md-offset-4">
									<button type="reset" class="btn btn-square btn-sm btn-warning" id="add-dog" value="Padam"><i class="fa fa-repeat"></i> Delete / Padam</button>
									<button type="button" class="btn btn-square btn-sm btn-primary" id="add-temp-dog" value="Simpan"><i class="fa fa-save"></i> Save / Simpan</button>
								</div>
							</div>
							<!-- END Form Buttons -->
						</form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal Register License #1-->
		
				<!-- Modal Update Details -->
        <div id="update-renew-2" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
					<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Dog's Details <small>/ Butiran Anjing Peliharaan</small><strong> #<span id="no-dog"></span></span></strong></h4>
                    </div>
					<div class="modal-body">
						<form id="form-not-renew" action="<?php echo base_url();?>index.php/new_license_app/update_temporary_dog" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_dogtype">Type / Baka <small>/ Jenis / Baka</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<select id="dog_type" name="dog_type" class="form-control wizard-ignore" size="1">
										<option value="0">Please select</option>
										<?php 
										$dog_type = get_dog_type();
										
										foreach($dog_type as $dt)
										{	
											echo "<option value=\"".$dt->ddid."\">".$dt->detail."</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_dogcolor">Color <small>/ Warna</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<div class="checkbox">
										<label for="val_dogcolor_blk">
											<input type="checkbox" id="val_dogcolor_blk" name="val_dogcolor[]" value="Hitam" class="wizard-ignore"> Black <small>/ Hitam</small>
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_wht">
											<input type="checkbox" id="val_dogcolor_wht" name="val_dogcolor[]" value="Putih" class="wizard-ignore"> White <small>/ Putih</small>
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_brown">
											<input type="checkbox" id="val_dogcolor_brown" name="val_dogcolor[]" value="Coklat" class="wizard-ignore"> Brown <small>/ Coklat</small>
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_etc">
											<input type="checkbox" id="val_dogcolor_etc_opt" name="val_dogcolor_etc_opt" value="Lain" class="wizard-ignore"> Others <small>/ Lain-lain</small>
										</label>
									</div>
									<input type="text" id="val_dogcolor_etc" disabled name="val_dogcolor[]" class="form-control wizard-ignore" placeholder="Sila nyatakan warna anjing, jika lain-lain..">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Gender <small>/ Jantina</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<label class="radio-inline" for="example-inline-radio3">
										<input type="radio" id="val_gender1" name="val_gender" value="Jantan" class="wizard-ignore"> Male <small>/ Jantan</small>
									</label>
									<label class="radio-inline" for="example-inline-radio4">
										<input type="radio" id="val_gender2" name="val_gender" value="Betina" class="wizard-ignore"> Female <small>/ Betina</small>
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="example-select">Weight <small>/ Berat</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<select id="val_weight" name="val_weight" class="form-control wizard-ignore" size="1">
										<option value="0">Please select</option>
										<?php 
										$dog_weight = get_dog_weight();
										foreach($dog_weight as $dw)
										{
											echo "<option value=\"".$dw->dwid."\">".$dw->dog_weight."</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Sterilization <small>/ Pemandulan</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<label class="radio-inline" for="example-inline-radio5">
										<input type="radio" id="val_mandul1" name="val_mandul" value="1" class="wizard-ignore"> Yes / Ya
									</label>
									<label class="radio-inline" for="example-inline-radio6">
										<input type="radio" id="val_mandul2" name="val_mandul" value="1" class="wizard-ignore"> No / Tidak
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Microchip <small>/ Mikrocip</small></label>
								<div class="col-md-6">
									<input type="text" id="val_microchip" name="val_microchip" class="form-control wizard-ignore" placeholder="SIRI-9999-99">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-7 control-label col-md-offset-1">
										<label class="col-md-8 control-label">The owner has attended a training or animal preservation course.<br><small>Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</small> <span class="text-danger">*</span></label>
								<div class="col-md-3">
									<label class="radio-inline" for="example-inline-radio7">
										<input type="radio" id="owner_training1" name="owner_training" value="1" class="wizard-ignore"> Ya
									</label>
									<label class="radio-inline" for="example-inline-radio8">
										<input type="radio" id="owner_training2" name="owner_training" value="0" class="wizard-ignore"> Tidak
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-7 control-label col-md-offset-1">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small> <span class="text-danger">*</span></label>
								<div class="col-md-3">
									<label class="radio-inline" for="example-inline-radio9">
										<input type="radio" id="dog_training1" name="dog_training" value="1" class="wizard-ignore"> Yes / Ya
									</label>
									<label class="radio-inline" for="example-inline-radio10">
										<input type="radio" id="dog_training2" name="dog_training" value="0" class="wizard-ignore"> No / Tidak
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="example-file-input">Dog's Image <br><small>Gambar Anjing</small></label>
								<div class="col-md-7">
									<img src="" id="imgDog" width="100" height="100" />
									<input type="hidden" name="loc_pic" id="loc_pic" value="" />
									<input type="file" id="pic_dog" name="pic_dog" />
								</div>
							</div>
							<input type="hidden" name="dogID" id="dogID" value="" />
							<input type="hidden" name="addrID" id="addrID" value="" />
							<!-- Form Buttons -->
							<div class="form-group form-actions">
								<div class="col-md-8 col-md-offset-4">
									<!--<button type="reset" class="btn btn-square btn-sm btn-warning" id="add-dog" value="Padam"><i class="fa fa-repeat"></i> Padam</button>-->
									<button type="submit" class="btn btn-square btn-sm btn-primary" id="add-dog" value="Simpan"><i class="fa fa-save"></i> Update / Kemaskini</button>
								</div>
							</div>
							<!-- END Form Buttons -->
						</form>
                    </div>

                </div>
                
            </div>

        </div>

        <!-- END Modal Update Details #2-->


        <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url();?>js/pages/formsWizard.js"></script>
        <script>$(function(){ FormsWizard.init(); });</script>