<!-- Page Title -->
			<div class="media-container">
                <!-- Intro -->
                <section class="site-section site-section-light site-section-top">
                    <div class="container text-center">
                        <h1 class="animation-slideDown"><strong>Renew License</strong></h1>
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
                    	<form action="<?php echo base_url();?>index.php/renewal/save_renew_app" method="post" id="renew-application" class="form-horizontal" enctype="multipart/form-data">         
						<div class="col-sm-12">
							<div class="table-responsive">
								<h3>Dog's Address Detail <br><small>Butiran Alamat Tempat Peliharaan</small></h3>
								<hr>
								<table class="table table-borderless table-vcenter">
									<tbody>
										<tr>
											<td style="width: 170px;"><strong>Address / Alamat</strong></td>
											<td><?php echo $address[0]->no_unit.", ".ucwords(strtolower($address[0]->home_name)).", ".ucwords(strtolower($address[0]->street_name)).", ".ucwords(strtolower($address[0]->town_name)).", ".ucwords(strtolower(get_parlimen_name($address[0]->parlimen))).", ".$address[0]->postcode." Kuala Lumpur"; ?> </td>
										</tr>
										<tr>
											<td><strong>Support Document / Dokumen Sokongan</strong></td>
											<!-- <?php 
											if( $address[0]->doc_support == "" )
											{
											?>
											<td>
												Tidak diperlukan 
												<input type="hidden" name="doc_type" id="doc_type" value="2" />
											</td>
											<?php
											}
											else
											{
											?> -->
											<td>
												<input type="file" id="doc_support" name="doc_support[]" multiple="" />
												<input type="hidden" name="doc_type" id="doc_type" value="1" />
											</td>
											<!-- <?php
											}
											?> -->
										</tr>
									</tbody>
								</table>
								<hr>
							</div>
						</div>
						<?php 
						$dog_already = get_total_dog($address[0]->app_id);
						
						$dog_temp = get_temp_renew_dog($address[0]->addr_id, 1, $dog_already[0]->dog_id, 'RENEW');
						
						if( count($dog_temp) > 0 )
						{
							$dog = $dog_temp;
						}
						else
						{
							$dog = $dog_already;
						}
						?>
						<!-- Butiran Anjing #1 -->
						<div class="col-sm-6">
							<div class="block bordered">
                                <!-- Anjing #1 Title -->
                                <div class="block-title">
                                    <h2>Dog's Details <strong>#1</strong><small> / Butiran Anjing Peliharaan <strong>#1</strong></small></h2>
                                </div>
                                <!-- END Title -->

                                <!-- Form Anjing #1 Content -->
                                <div class="form-horizontal form-bordered">
                                    <div class="form-group">
										<label class="col-md-6 control-label" for="val_username">Type / Baka <small></small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo get_dog_name($dog[0]->dog_type);?></p>
										</div>
										
										<label class="col-md-6 control-label" for="val_username">Color <small>/ Warna</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog[0]->color;?></p>
										</div>
										
										<label class="col-md-6 control-label">Gender <small>/ Jantina</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog[0]->gender;?> </p>
										</div>
										
										<label class="col-md-6 control-label" for="example-select">Weight <small>/ Berat</small></label>
										<div class="col-md-6">
											<p class="form-control-static" id="weight-dog"><?php echo get_dogs_weight($dog[0]->weight);?></p>
											<input type="hidden" name="weight-val" id="weight-val" value="" />
										</div>
										
										<label class="col-md-6 control-label">Sterilization <small>/ Pemandulan</small></label>
										<div class="col-md-6">
											<p class="form-control-static" id="mandul-dog">
											<?php 
											if( $dog[0]->sterilization == 1 )
												echo "Ya";
											else
												echo "Tidak";
											?>	
											</p>
											<input type="hidden" name="mandul-val" id="mandul-val" value="" />
										</div>
										
										<label class="col-md-6 control-label">Microchip <small>/ Mikrocip</small></label>
										<div class="col-md-6">
											<p class="form-control-static" id="microchip-dog"><?php echo $dog[0]->microchip;?></p>
											<input type="hidden" name="microchip-val" id="microchip-val" value="" />
										</div>
										
										<label class="col-md-8 control-label">The owner has attended a training or animal preservation course.<br><small>Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</small></label>
										<div class="col-md-3">
											<p class="form-control-static" id="owner-training-dog">
											<?php 
											if( $dog[0]->owner_training == 1 )
												echo "Ya";
											else
												echo "Tidak";
											?>
											</p>
											<input type="hidden" name="owner-training-val" id="owner-training-val" value="" />
										</div>
										<label class="col-md-8 control-label">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small></label>
										<div class="col-md-3">
											<p class="form-control-static" id="dog-training-dog">
											<?php 
											if( $dog[0]->dog_training == 1 )
												echo "Ya";
											else
												echo "Tidak";
											?>	
											</p>
											<input type="hidden" name="dog-training-val" id="dog-training-val" value="" />
										</div>
									</div>
									<div class="form-group">
                                        <label class="col-md-4 control-label">Dog's Image <br><small>Gambar Anjing</small></label>
										<div class="col-md-7">
											<p class="form-control-static"><img src="<?php echo base_url().$dog[0]->dog_pic;?>" width="100" height="100"></p>
											<input type="file" id="dog_pic" name="dog_pic" />
										</div>
                                    </div>
									<div class="form-group form-actions">
                                        <div class="col-md-8 col-md-offset-4">
                                            <a href="#update-renew-1" id="update-renew1" data-id="<?php echo $dog[0]->dog_id;?>" class="btn btn-square btn-sm btn-primary" data-toggle="modal" value="Update"><strong><i class="fa fa-refresh"></i> Update Info / Kemaskini Maklumat</strong></a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="dog-id-1" id="dog-id-1" value="<?php echo $dog[0]->dog_id;?>" />
                  <?php 
                  if( count($dog) > 1 )
                  {
                  ?>
									<!-- Checkbox -->
									<div class="form-group form-footer">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label for="example-checkbox2">
                                                    <input type="checkbox" id="tick-not-renew1" name="tick-not-renew1" value="option1"> 
													Click to discontinue the license renewal of the dog <br>Klik untuk tidak meneruskan pembaharuan lesen atas anjing tersebut.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="list-reason1" style="display:none">
                                    	<div class="col-md-12">
																				<label class="control-label" for="example-select">Nyatakan sebab untuk tidak perbaharui lesen bagi anjing ini.</label>
																			</div>
																			<div class="col-md-12">
																				<select id="reasons" name="reasons" class="form-control" size="1">
																					<option value="0">Please select</option>
																					<?php 
																					foreach($reason as $reasons)
																					{
																						echo "<option value=\"".$reasons->reason_id."\">".$reasons->reason."</option>";
																					}
																					?>
																				</select>
																			</div>
																		</div>	
																		<?php
																		}
																		?>																	
                                </div>
                                <!-- END Form Anjing #2 Content -->
                            </div>
						</div>
						<!-- END Butiran Anjing #1 -->
						
						<!-- Butiran Anjing #2 -->
						<div class="col-sm-6">
							<div class="block bordered">
                                <!-- Anjing #2 Title -->
                                <div class="block-title">
                                    <h2>Dog's Detail <strong>#2</strong><small> / Butiran Anjing Peliharaan <strong>#2</strong></small></h2>
                                </div>
                                <!-- END Anjing #2 Title -->
											<?php 
											if( count($dog) > 1 )
											{
											?>
                    <!-- Form Anjing #1 Content -->
                                <div class="form-horizontal form-bordered">
                                    <div class="form-group">
										<label class="col-md-4 control-label" for="val_username">Type / Baka <small></small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo get_dog_name($dog[1]->dog_type);?></p>
										</div>
										
										<label class="col-md-4 control-label" for="val_username">Color <small>/ Warna</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog[1]->color;?></p>
										</div>
										
										<label class="col-md-4 control-label">Gender <small>/ Jantina</small></label>
										<div class="col-md-6">
											<p class="form-control-static"><?php echo $dog[1]->gender;?> </p>
										</div>
										
										<label class="col-md-4 control-label" for="example-select">Weight <small>/Berat</small></label>
										<div class="col-md-6">
											<p class="form-control-static" id="weight-dog-2"><?php echo get_dogs_weight($dog[1]->weight);?></p>
											<input type="hidden" name="weight-val-2" id="weight-val-2" value="" />
										</div>
										
										<label class="col-md-4 control-label">Sterilization <small>/ Pemandulan</small></label>
										<div class="col-md-6">
											<p class="form-control-static" id="mandul-dog-2">
											<?php 
											if( $dog[1]->sterilization == 1 )
												echo "Ya";
											else
												echo "Tidak";
											?>	
											</p>
											<input type="hidden" name="mandul-val-2" id="mandul-val-2" value="" />
										</div>
										
										<label class="col-md-4 control-label">Microchip <small>/ Mikrocip</small></label>
										<div class="col-md-6">
											<p class="form-control-static" id="microchip-dog-2"><?php echo $dog[1]->microchip;?></p>
											<input type="hidden" name="microchip-val-2" id="microchip-val-2" value="" />
										</div>
										
										<label class="col-md-8 control-label">The owner has attended a training or animal preservation course.<br><small>Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</small> <span class="text-danger">*</span></label>
										<div class="col-md-3">
											<p class="form-control-static" id="owner-training-dog-2">
											<?php 
											if( $dog[1]->owner_training == 1 )
												echo "Ya";
											else
												echo "Tidak";
											?>
											</p>
											<input type="hidden" name="owner-training-val-2" id="owner-training-val-2" value="" />
										</div>
										<label class="col-md-8 control-label">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small> <span class="text-danger">*</span></label>
										<div class="col-md-3">
											<p class="form-control-static" id="dog-training-dog-2">
											<?php 
											if( $dog[1]->dog_training == 1 )
												echo "Ya";
											else
												echo "Tidak";
											?>	
											</p>
											<input type="hidden" name="dog-training-val-2" id="dog-training-val-2" value="" />
										</div>
									</div>
									<div class="form-group">
                                        <label class="col-md-4 control-label">Dog's Image <br><small>Gambar Anjing</small></label>
										<div class="col-md-7">
											<p class="form-control-static"><img src="<?php echo base_url().$dog[1]->dog_pic;?>" width="100" height="100"></p>
											<input type="file" name="dog_pic-2" />
										</div>
                                    </div>
									<div class="form-group form-actions">
                                        <div class="col-md-8 col-md-offset-4">
                                            <a href="#update-renew-2" id="update-renew2" data-id="<?php echo $dog[1]->dog_id;?>" class="btn btn-square btn-sm btn-primary" data-toggle="modal" value="Update"><i class="fa fa-refresh"></i> Update / Kemaskini</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="dog-id-2" id="dog-id-2" value="<?php echo $dog[1]->dog_id;?>" />
									<!-- Checkbox -->
									<div class="form-group form-footer">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label for="example-checkbox2">
                                                    <input type="checkbox" id="tick-not-renew2" name="tick-not-renew2" value="option1"> Click if not renew this license / Klik untuk tidak meneruskan pembaharuan lesen atas anjing tersebut.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="list-reason2" style="display:none">
                                    	<div class="col-md-12">
																				<label class="control-label" for="example-select">Please state your reason to not renew the license / Nyatakan sebab untuk tidak perbaharui lesen bagi anjing ini.</label>
																			</div>
																			<div class="col-md-12">
																				<select id="reasons2" name="reasons2" class="form-control" size="1">
																					<option value="0">Please select</option>
																					<?php 
																					foreach($reason as $reasons)
																					{
																						echo "<option value=\"".$reasons->reason_id."\">".$reasons->reason."</option>";
																					}
																					?>
																				</select>
																			</div>
																		</div>																		
                                </div>
                                <!-- END Form Anjing #2 Content -->
                             <?php
															}
															else
															{
															?>
															<div class="form-group">
																<div class="col-md-12">
																	<p class="form-control-static"><b>Not registered / Tidak didaftarkan</b></p>
																</div>
															</div>
															<?php
															}
															?>
                            </div>
						</div>
						<!-- END Butiran Anjing #2 -->
						
						<!-- END Hantar Permohonan -->
						<div class="col-sm-12">
							<hr>

								<div class="form-group">
									<div class="col-md-12">
										<div class="checkbox">
											<label for="val_dogcolor_blk">
												<input type="checkbox" id="val_agree" name="val_agree" value="option1" >  I agree to abide by all the provisions under the Dog Licensing Law and the Dog Breeding House (WPKL) (Pindaan) 2011<br><small>Saya bersetuju mematuhi semua peruntukan dibawah Undang Undang Kecil Perlesenan Anjing dan Rumah Pembiakan Anjing (WPKL) (Pindaan) 2011</small>
											</label>
											<!--<input type="submit" />-->
											<button type="button" class="btn btn-square btn-sm btn-primary pull-right" id="renew-app-dog" value="Simpan"><i class="fa fa-save"></i> Submit Application / Hantar Permohonan</button>
										</div>
									</div>
								</div>
								<input type="hidden" name="appID" id="appID" value="<?php echo $address[0]->app_id;?>" />
								<!-- <input type="submit" name=""> -->
						</div>
						<!-- <input type="submit" /> -->
						</form>
                    </div>
                </div>
            </section>
            <!-- END Company Info -->
            
            <!-- Modal Update Details -->
        <div id="update-renew-1" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
					<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Dog's Details<strong> #1</strong> / Butiran Anjing Peliharaan<strong> #1</strong></h4>
                    </div>
					<div class="modal-body">
						<form id="form-not-renew" action="<?php echo base_url();?>index.php/renewal/temp" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_dogtype">Type / Baka</label>
								<div class="col-md-6">
									<select id="dog_list" name="dog_list" class="form-control wizard-ignore" size="1" disabled>
										<option value="0">Please select</option>
										<?php 
										$dog_type = get_dog_type();
										
										foreach($dog_type as $dogs)
										{
											echo "<option value=\"".$dogs->ddid."\">".$dogs->detail."</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_dogcolor">Color <small>/ Warna</small></label>
								
								<div class="col-md-6">
									<div class="checkbox">
										<label for="val_dogcolor_blk">
											<input type="checkbox" id="val_dogcolor_blk" name="val_dogcolor[]" value="Black" class="wizard-ignore" disabled> Black / Hitam
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_wht">
											<input type="checkbox" id="val_dogcolor_wht" name="val_dogcolor[]" value="White" class="wizard-ignore" disabled> White / Putih
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_brown">
											<input type="checkbox" id="val_dogcolor_brown" name="val_dogcolor[]" value="Brown" class="wizard-ignore" disabled> Brown / Coklat
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_etc">
											<input type="checkbox" id="val_dogcolor_etc_opt" name="val_dogcolor_etc_opt" value="Lain" class="wizard-ignore" disabled> Others / Lain-lain
										</label>
									</div>
									<input type="text" id="val_dogcolor_etc" name="val_dogcolor[]" class="form-control wizard-ignore" placeholder="Sila nyatakan warna anjing, jika lain-lain.." disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Gender / Jantina</label>
								<div class="col-md-6">
									<label class="radio-inline" for="example-inline-radio3">
										<input type="radio" id="gender1" name="val_gender" value="Jantan" class="wizard-ignore" disabled> Jantan
									</label>
									<label class="radio-inline" for="example-inline-radio4">
										<input type="radio" id="gender2" name="val_gender" value="Betina" class="wizard-ignore" disabled> Betina
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="example-select">Weight / Berat</label>
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
								<label class="col-md-4 control-label">Sterilization <small>/ Pemandulan</small></label>
								<div class="col-md-6">
									<label class="radio-inline" for="example-inline-radio5">
										<input type="radio" id="val_mandul1" name="val_mandul" value="1" class="wizard-ignore"> Yes / Ya
									</label>
									<label class="radio-inline" for="example-inline-radio6">
										<input type="radio" id="val_mandul2" name="val_mandul" value="0" class="wizard-ignore"> No / Tidak
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
								<label class="col-md-7 control-label col-md-offset-1">The owner has attended a training or animal preservation course.<br><small>Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</small></label>
								<div class="col-md-3">
									<label class="radio-inline" for="example-inline-radio7">
										<input type="radio" id="owner_training1" name="owner_training" value="1" class="wizard-ignore"> Yes / Ya
									</label>
									<label class="radio-inline" for="example-inline-radio8">
										<input type="radio" id="owner_training2" name="owner_training" value="0" class="wizard-ignore"> No / Tidak
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-7 control-label col-md-offset-1">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small></label>
								<div class="col-md-3">
									<label class="radio-inline" for="example-inline-radio9">
										<input type="radio" id="dog_training1" name="dog_training" value="1" class="wizard-ignore"> Yes / Ya
									</label>
									<label class="radio-inline" for="example-inline-radio10">
										<input type="radio" id="dog_training2" name="dog_training" value="0" class="wizard-ignore"> No / Tidak
									</label>
								</div>
							</div>
							<!--<div class="form-group">
								<label class="col-md-4 control-label" for="example-file-input">Gambar Anjing</label>
								<div class="col-md-7">
									<img src="" id="imgDog" width="100" height="100" />
									<input type="hidden" name="loc_pic" id="loc_pic" value="" />
									<input type="file" id="dog_pic" name="dog_pic" />
								</div>
							</div>-->
							<!-- Form Buttons -->
							<div class="form-group form-actions">
								<div class="col-md-8 col-md-offset-4">
									<button type="reset" class="btn btn-square btn-sm btn-warning" id="add-dog" value="Padam"><i class="fa fa-repeat"></i> Padam</button>
									<button type="button" data-dismiss="modal" class="btn btn-square btn-sm btn-primary" id="update-renew-dog" value="Simpan"><i class="fa fa-save"></i> Simpan</button>
								</div>
							</div>
							<!-- END Form Buttons -->
						</form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal Update Details #1-->
		
		<!-- Modal Update Details -->
        <div id="update-renew-2" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
					<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Dog's Details <stong></strong> <small>/ Butiran Anjing Peliharaan<strong> #1</strong></small></h4>
                    </div>
					<div class="modal-body">
						<form id="form-not-renew" action="<?php echo base_url();?>index.php/renewal/temp" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_dogtype">Type / Baka</label>
								<div class="col-md-6">
									<select id="dog_list" name="dog_list" class="form-control wizard-ignore" size="1" disabled>
										<option value="0">Please select</option>
										<?php 
										$dog_type = get_dog_type();
										
										foreach($dog_type as $dogs)
										{
											echo "<option value=\"".$dogs->ddid."\">".$dogs->detail."</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_dogcolor">Color <small>/ Warna</small></label>
								
								<div class="col-md-6">
									<div class="checkbox">
										<label for="val_dogcolor_blk">
											<input type="checkbox" id="val_dogcolor_blk" name="val_dogcolor[]" value="Black" class="wizard-ignore" disabled> Black / Hitam
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_wht">
											<input type="checkbox" id="val_dogcolor_wht" name="val_dogcolor[]" value="White" class="wizard-ignore" disabled> White / Putih
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_brown">
											<input type="checkbox" id="val_dogcolor_brown" name="val_dogcolor[]" value="Brown" class="wizard-ignore" disabled> Brown / Coklat
										</label>
									</div>
									<div class="checkbox">
										<label for="val_dogcolor_etc">
											<input type="checkbox" id="val_dogcolor_etc_opt" name="val_dogcolor_etc_opt" value="Lain" class="wizard-ignore" disabled> Others / Lain-lain
										</label>
									</div>
									<input type="text" id="val_dogcolor_etc" name="val_dogcolor[]" class="form-control wizard-ignore" placeholder="Sila nyatakan warna anjing, jika lain-lain.." disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Gender / Jantina</label>
								<div class="col-md-6">
									<label class="radio-inline" for="example-inline-radio3">
										<input type="radio" id="gender1" name="val_gender" value="Jantan" class="wizard-ignore" disabled> Jantan
									</label>
									<label class="radio-inline" for="example-inline-radio4">
										<input type="radio" id="gender2" name="val_gender" value="Betina" class="wizard-ignore" disabled> Betina
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="example-select">Weight / Berat</label>
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
								<label class="col-md-4 control-label">Sterilization <small>/ Pemandulan</small></label>
								<div class="col-md-6">
									<label class="radio-inline" for="example-inline-radio5">
										<input type="radio" id="val_mandul1" name="val_mandul" value="1" class="wizard-ignore"> Yes / Ya
									</label>
									<label class="radio-inline" for="example-inline-radio6">
										<input type="radio" id="val_mandul2" name="val_mandul" value="0" class="wizard-ignore"> No / Tidak
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
								<label class="col-md-7 control-label col-md-offset-1">The owner has attended a training or animal preservation course.<br><small>Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</small></label>
								<div class="col-md-3">
									<label class="radio-inline" for="example-inline-radio7">
										<input type="radio" id="owner_training1" name="owner_training" value="1" class="wizard-ignore"> Yes / Ya
									</label>
									<label class="radio-inline" for="example-inline-radio8">
										<input type="radio" id="owner_training2" name="owner_training" value="0" class="wizard-ignore"> No / Tidak
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-7 control-label col-md-offset-1">The dog has attended a training "good behaviour and obedience". <br><small>Anjing telah menjalani latihan "good behaviour and obedience".</small></label>
								<div class="col-md-3">
									<label class="radio-inline" for="example-inline-radio9">
										<input type="radio" id="dog_training1" name="dog_training" value="1" class="wizard-ignore"> Yes / Ya
									</label>
									<label class="radio-inline" for="example-inline-radio10">
										<input type="radio" id="dog_training2" name="dog_training" value="0" class="wizard-ignore"> No / Tidak
									</label>
								</div>
							</div>
							<!--<div class="form-group">
								<label class="col-md-4 control-label" for="example-file-input">Gambar Anjing</label>
								<div class="col-md-7">
									<img src="" id="imgDog" width="100" height="100" />
									<input type="hidden" name="loc_pic" id="loc_pic" value="" />
									<input type="file" id="dog_pic" name="dog_pic" />
								</div>
							</div>-->
							<!-- Form Buttons -->
							<div class="form-group form-actions">
								<div class="col-md-8 col-md-offset-4">
									<button type="reset" class="btn btn-square btn-sm btn-warning" id="add-dog" value="Padam"><i class="fa fa-repeat"></i> Delete / Padam</button>
									<button type="button" data-dismiss="modal" class="btn btn-square btn-sm btn-primary" id="update-renew-dog" value="Simpan"><i class="fa fa-save"></i> Save / Simpan</button>
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
        <script src="<?php echo base_url(); ?>js/pages/formsWizard.js"></script>
        <script>$(function(){ FormsWizard.init(); });</script>