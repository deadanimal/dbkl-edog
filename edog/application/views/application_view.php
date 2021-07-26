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
                <div class="container">
                <div class="row">
                	<div class="col-sm-7">
	                	No Permohonan / Application No :
	                	<h1><strong><?php echo $info[0]->app_no; ?></strong></h1>
	                </div>
	                <div class="col-sm-5">
	                	Status Permohonan / Application Status :
	                	<h1><strong>
	                	<?php 
	                		if( $info[0]->app_type == "NOT_RENEW" )
								echo "Tidak Diperbaharui";
	                		else if( $info[0]->status == "Ditolak" )
								echo "<font color=red>Rejected / Ditolak</font>";
							else if( $info[0]->status == 'Dalam proses' && $info[0]->appeal == 1 )
								echo "Appeal Process / Rayuan Dalam Proses";
							else if( $info[0]->status == 'Dalam proses')
								echo "In Process / Dalam Proses";
							else if( $info[0]->status == 'Diterima')
								echo "Received / Diterima";
							else if( $info[0]->status == 'Lulus')
								echo "<font color=green>Approved / Lulus</font>";
							?>	
						</strong></h1>
	                </div>
                </div>
                <hr>
                    <div class="row">
						
						<?php 
						$profile = get_users_by_userid($this->session->userdata('userid'));
						?>
						<!-- Butiran Pemohon -->
						<div class="col-sm-7">

							<h3>Applicant Details <br><small>Butiran Pemohon</small></h3>
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
										<?php 
											echo strtoupper($info[0]->no_unit);
											if($info[0]->home_name)
											echo ', '.strtoupper($info[0]->home_name);
											if($info[0]->street_name)
											echo ', '.strtoupper($info[0]->street_name);
											echo '<br>';
											if($info[0]->town_name)
											echo strtoupper($info[0]->town_name);
											 echo ', '.strtoupper(get_parlimen_name($info[0]->parlimen));
											echo '<br>'.$info[0]->postcode.' KUALA LUMPUR.'; 
										?> </p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="example-file-input">Supporting Documents / Dokumen Sokongan</label>
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
													$doc .= $no." . <a href='/doc/support/".$dc[$i]."' download>".$dc[$i]."</a><br>";
												}

											}
										?>
										<p class="form-control-static"><?php echo $doc;?> </p>
									</div>
								</div>
							</form>
						</div>
						<?php 
						$comment = get_staff_comment($info[0]->app_id);
						?>
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
										<strong>License Details <br><small>Butiran Pengesahan dan Lesen</small></strong>
									</h5>
								</div>
								<div class="widget-extra themed-background-light-sand">
									<!-- <div class="row"></div> -->
										<form class="form-horizontal">
											<div class="form-group">
												<!-- <label class="col-md-7 control-label" for="address-select">Status Permohonan</label>
												<div class="col-md-5">
													<p class="form-control-static">
														<?php 
														if( $info[0]->app_type == "NOT_RENEW" )
															echo "Tidak Diperbaharui";
														else
															echo $info[0]->status; 
														?>
														</p>
												</div> -->
												<?php 
												if( $info[0]->app_type == "NOT_RENEW" )
												{
												?>
												<label class="col-md-7 control-label" for="address-select">
												Reason Not Renew <br><small>Sebab Tidak Perbaharui</small></label>
												<div class="col-md-5">
													<p class="form-control-static">
														<?php 
														echo get_reason($info[0]->renew_cause);
														?>
														</p>
												</div>
												<?php
											}
												?>
												<?php 
												if( $info[0]->status == 'Ditolak' )
												{
												?>
													<label class="col-md-7 control-label" for="address-select">Allow for Appeal? <br><small>Permohonan Rayuan Dibenarkan?</small></label>
													<div class="col-md-5">
														<p class="form-control-static themed-color-spring"><strong>
														<?php 
														if( $info[0]->appeal == 0)
															echo 'Yes / Ya';
														else
															echo '<font color=red>No / Tidak</font>';
														?>	
														</strong></p>
													</div>
												<?php 
												}
												?>
												<label class="col-md-7 control-label" for="address-select">Date Accepted <br><small>Tarikh Diterima</small></label>
												<div class="col-md-5">
													<p class="form-control-static"><?php echo date('d/m/Y', strtotime($info[0]->date_apply));?></p>
												</div>
												<label class="col-md-7 control-label" for="address-select">Approval Date <br><small>Tarikh Diluluskan</small></label>
												<div class="col-md-5">
													<?php 
													
													if( $info[0]->statusApp == 'Lulus' )
															$date_app = date('d/m/Y', strtotime($info[0]->date_start));
													else
															$date_app = 'Tiada';
													?>
													<p class="form-control-static"><?php echo $date_app;?></p>
												</div>
											
												<label class="col-md-7 control-label" for="address-select">License Start Date <br><small>Tarikh Lesen Mula</small></label>
												<div class="col-md-5">
													<p class="form-control-static"><?php echo $date_app; ?></p>
												</div>
												<label class="col-md-7 control-label" for="address-select">Officer's Review (if any)<br><small>Ulasan Pegawai (Jika Ada)</small></label>
												<div class="col-md-5">
													<p class="form-control-static">
														<?php 
															if( $info[0]->status == "Ditolak" && $info[0]->reason_reject > 0 )
															{
																	echo get_reason($info[0]->reason_reject)."<br>";
															}
																echo $info[0]->decision_desc;
																
															/*if( count($comment) > 0 )
															{
																echo $comment->description; 
															}*/
															
															?>
													</p>
												</div>
											</div>
										</form>
								</div>
							</div>
						</div>
						<?php
						//if( $info[0]->status == "Ditolak" )
						//{
							$dog_detail = get_dog_detail($info[0]->app_id);
						//}
						//else
						//{ 
							//$dog_detail = get_total_dog($info[0]->app_id);
						//}
						?>
						<!-- Butiran Anjing #1 -->
						<div class="col-sm-6">
							<div class="block bordered">
                                <!-- Anjing #1 Title -->
                                <div class="block-title">
                                    <h2>Dog's Details <strong>#1</strong> <small>/ Butiran Anjing Peliharaan <strong>#1</strong></small></h2>
                                </div>
                                <!-- END Title -->

                                <!-- Form Anjing #1 Content -->
                                <form action="/index.php/application_view/update_status" id="update-status1" method="post" class="form-horizontal form-bordered">
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
											<p class="form-control-static">
												<?php 
													if($dog_detail[0]->gender == 'Jantan')
														echo "Male / ".$dog_detail[0]->gender; 
													elseif($dog_detail[0]->gender == 'Betina')
														echo "Female / ".$dog_detail[0]->gender; 
												?>
											</p>
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
													echo "Yes / Ya";
												else
													echo "No / Tidak";
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
													echo "Yes / Ya";
												else
													echo "No / Tidak";
											?>	
											</p>
										</div>
										<label class="col-md-8 control-label">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small></label>
										<div class="col-md-3">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[0]->dog_training == 1 )
													echo "Yes / Ya";
												else
													echo "No / Tidak";
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
									<?php 
									if( $dog_detail[0]->status == 'Invalid' && $dog_detail[0]->reason == 0 )
									{
									?>
									<div class="form-group">
                                        <label class="col-md-4 control-label">Dog's status <small><br> Status Anjing</small></label>
										<div class="col-md-7">
											<p class="form-control-static">
												Rejected because the dog is not allowed<br>
												<small>Ditolak kerana anjing tidak dibenarkan.</small>
											</p>
										</div>
                                    </div>
									<?php
									}
									elseif( $dog_detail[0]->status == 'Invalid' && $dog_detail[0]->reason > 0 )
									{
									?>
									<div class="form-group">
                                        <label class="col-md-4 control-label">Dog's status <small><br> Status Anjing</small></label>
										<div class="col-md-7">
											<p class="form-control-static">
												<?php 
													echo get_reason($dog_detail[0]->reason); 
												?>
											</p>
										</div>
                                    </div>
									<?php	
									}
									else
									{
										if($info[0]->status == 'Lulus')
										{


									?>
									<div class="form-group">
                                        <label class="col-md-4 control-label">Dog's status <small><br> Status Anjing</small></label>
										<div class="col-md-7">
											<p class="form-control-static">
												<select class="form-control" name="status" id="status">
													<option value="0">Sila pilih status</option>
													<?php foreach($reason as $row){ ?>
														<option value="<?php echo $row->reason_id; ?>"><?php echo $row->reason; ?></option>
													<?php } ?>
												</select>
											</p>
										</div>
                                    </div>
                                    <div class="form-group form-actions">
                                        <div class="col-md-8 col-md-offset-4">
                                        	<button type="button" class="btn btn-square btn-sm btn-primary btn-status-update1"><i class="fa fa-refresh"></i> Kemaskini Maklumat</button>
                                        </div>
                                    </div>
									<?php	
										}
									}
									?>
									<input type="hidden" name="dogid" value="<?php echo $dog_detail[0]->dog_id; ?>">
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
                                    <h2>Dog's Details <strong>#2</strong> <small>/ Butiran Anjing Peliharaan <strong>#2</strong></small></h2>
                                </div>
                                <!-- END Anjing #2 Title -->
								<?php 
										if( count($dog_detail) == 2 )
										{
								?>
                  <!-- Form Anjing #2 Content -->
                  <form action="/index.php/application_view/update_status" id="update-status2" method="post" class="form-horizontal form-bordered">
									<div class="form-group">
										<label class="col-md-4 control-label" for="val_username">Type / Baka</label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo get_dog_name($dog_detail[1]->dog_type); ?></p>
										</div>
										
										<label class="col-md-4 control-label" for="val_username">Color <small>/ Warna</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog_detail[1]->color;?></p>
										</div>
										
										<label class="col-md-4 control-label">Gender <small>/ Jantina</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog_detail[1]->gender; ?></p>
										</div>
										
										<label class="col-md-4 control-label" for="example-select">Weight <small>/ Berat</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo get_dogs_weight($dog_detail[1]->weight);?></p>
										</div>
										
										<label class="col-md-4 control-label">Sterilization <small>/ Pemandulan</small></label>
										<div class="col-md-6">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[1]->sterilization == 1 )
													echo "Yes / Ya";
												else
													echo "No / Tidak";
											?>	
											</p>
										</div>
										
										<label class="col-md-4 control-label">Microchip <small>/ Mikrocip</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog_detail[1]->microchip; ?></p>
										</div>
										
										<label class="col-md-8 control-label">The owner has attended a training or animal preservation course.<br><small>Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</small></label>
										<div class="col-md-3">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[1]->owner_training == 1 )
													echo "Yes / Ya";
												else
													echo "No / Tidak";
											?>	
											</p>
										</div>
										<label class="col-md-8 control-label">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small></label>
										<div class="col-md-3">
											<p class="form-control-static">
											<?php 
												if( $dog_detail[1]->dog_training == 1 )
													echo "Yes / Ya";
												else
													echo "No / Tidak";
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
													echo "<img src=".base_url().$dog_detail[1]->dog_pic." width=\"100\" height=\"100\">";
												}
												?>
											</p>
										</div>
                   </div>
				   <?php 
									if( $dog_detail[1]->status == 'Invalid' && $dog_detail[1]->reason == 0 )
									{
									?>
									<div class="form-group">
                                        <label class="col-md-4 control-label">Dog's status <small><br> Status Anjing</small></label>
										<div class="col-md-7">
											<p class="form-control-static">
												Ditolak kerana anjing tidak dibenarkan.
											</p>
										</div>
                                    </div>
									<?php
									}
									elseif( $dog_detail[1]->status == 'Invalid' && $dog_detail[1]->reason > 0 )
									{
									?>
									<div class="form-group">
                                        <label class="col-md-4 control-label">Dog's status <small><br> Status Anjing</small></label>
										<div class="col-md-7">
											<p class="form-control-static">
												<?php echo get_reason($dog_detail[1]->reason); ?>
											</p>
										</div>
                                    </div>
									<?php	
									}
									else
									{
										if($info[0]->status == 'Lulus')
										{
									?>
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Dog's status <small><br> Status Anjing</small></label>
										<div class="col-md-7">
											<p class="form-control-static">
												<select class="form-control">
													<option value="0">Sila pilih status</option>
													<?php foreach($reason as $row){ ?>
														<option value="<?php echo $row->reason_id; ?>"><?php echo $row->reason; ?></option>
													<?php } ?>
												</select>
											</p>
										</div>
                                    </div>
                                    <div class="form-group form-actions">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="button" class="btn btn-square btn-sm btn-primary btn-status-update2"><i class="fa fa-refresh"></i> Kemaskini Maklumat</button>
                                        </div>
                                    </div>
									<?php	
										}
									}
									?>
					<input type="hidden" name="dogid" value="<?php echo $dog_detail[1]->dog_id; ?>">
                </form>
                <!-- END Form Anjing #2 Content -->
                <?php 
              	}
              	else
              	{
              	?>
              	<form action="#" method="post" class="form-horizontal form-bordered">
              		<div class="form-group">
										<label class="col-md-7 control-label">Not registered / Tidak didaftarkan</label>
									</div>
              	</form>
              	<?php
              	}
                ?>
                            </div>
						</div>
						<!-- END Butiran Anjing #2 -->

						<div class="col-sm-12">
							<hr>
							<a href="<?php echo base_url();?>index.php/dashboard_user" class="btn btn-square btn-sm btn-warning" id="add-dog" value="Simpan"><i class="fa fa-long-arrow-left"></i>   Back / Kembali</a>
						</div>
						
                    </div>
                </div>
            </section>
            <!-- END Company Info -->