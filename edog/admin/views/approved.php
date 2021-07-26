<!-- Page Title -->
			<section class="site-heading site-section-top">
				<div class="header-section dashboard">
					<div class="container-fluid">
						<h1>Kelulusan</h1>
					</div>
				</div>
			</section>
			<!-- END Page Title -->

            <!-- Content -->
            <section class="site-section site-content-single">
                <div class="container-fluid">
                    <div class="row">
						<div class="col-sm-12">
							<!-- Datatables Content -->
							<div class="block bordered full">
								<!-- Block Tabs Title -->
								<div class="block-title">
									<div class="block-options pull-right">
										<span class="label label-info"><strong>No. Permohonan:</strong> <?php echo $info[0]->app_no; ?></span>
									</div>
								
									<ul class="nav nav-tabs" data-toggle="tabs">
										<li class="active"><a href="#tabs-user-details">Butiran Pemohon</a></li>
										<li><a href="#tabs-dog-details">Butiran Anjing</a></li>
										<li><a href="#tabs-action">Tindakan</a></li>
									</ul>
								</div>
								<!-- END Block Tabs Title -->
								<form id="update-approved" action="<?php echo base_url('admin');?>/index.php/approved/update_approved_license" method="post" class="form-horizontal">
								<!-- Tabs Content -->
								<div class="tab-content">
									<div class="tab-pane active" id="tabs-user-details">
										<div class="row">
											<div class="col-sm-6">
												<div class="block">
													<h4 class="sub-header">Profil Pemohon</h4>
													<div class="form-group">
														<label class="col-md-4 control-label" for="val_username">Nama Pemohon </label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo $info[0]->name; ?></p>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="val_resident">Kewarganegaraan </label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo $info[0]->citizenship;?></p>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="val_resident">Jenis Pengenalan </label>
														<div class="col-md-6">
															<p class="form-control-static">
															<?php 
															if( $info[0]->identity_type == 'IC' )
																echo "Kad Pengenalan";
															else if( $info[0]->identity_type == 'ARMY' )
																echo "No. Polis / Tentera";
															else if( $info[0]->identity_type == 'PASSPORT' )
																echo "No. Pasport";
															?>
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="val_resident">No. Pengenalan </label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo $info[0]->nric;?></p>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="masked_phone">No. Telefon Bimbit </label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo $info[0]->phone_no; ?></p>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="val_email">Emel </label>
														<div class="col-md-6">
															<p class="form-control-static"> <?php echo $info[0]->email;?></p>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-sm-6">
												<div class="block">
													<h4 class="sub-header">Alamat Tempat Peliharaan</h4>
													<div class="form-group">
														<label class="col-md-4 control-label" for="val_username">Alamat </label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo strtoupper($info[0]->no_unit.", ".$info[0]->home_name.", ".$info[0]->street_name.", ".$info[0]->town_name.", ".get_parlimen_name($info[0]->parlimen).", ".$info[0]->postcode." Kuala Lumpur.");?></p>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="val_resident">Jenis Rumah </label>
														<div class="col-md-6">
															<p class="form-control-static">
																<?php 
																	$homeType = get_home_type($info[0]->home_type);
																	echo $homeType[0]->name;
																?>
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="val_resident">Keluasan Rumah </label>
														<div class="col-md-6">
															<p class="form-control-static">
															<?php
															$homeSpace = get_home_space($info[0]->home_space);
															echo $homeSpace[0]->name;
															?>
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="val_resident">Rumah Anjing </label>
														<div class="col-md-6">
															<p class="form-control-static">
															<?php 
															if( $info[0]->dog_house == 1 )
																echo "Ya";
															else
																echo "Tidak";
															?>
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="masked_phone">Dokumen Sokongan </label>
														<div class="col-md-6">
															<p class="form-control-static">
															<?php 
													
															if( $info[0]->doc_support == "" )
															{
																	echo "Tidak diperlukan";
															}
															else
															{
																$dc = explode('|', $info[0]->doc_support);

																for($i=0; $i < count($dc); $i++){
																	$no = $i+1;

																	if($dc[$i] != '')
																	echo $no." . <a href=\"".base_url()."doc/support/".$dc[$i]."\" download>".$dc[$i]."</a><br>";
																}
																
															}
															?>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php 
									$dog = get_total_dog($info[0]->app_id);
									?>
									<div class="tab-pane" id="tabs-dog-details">
										<div class="row">
											<!-- Butiran Anjing #1 -->
											<div class="col-sm-6">
												<div class="block">
													<h4 class="sub-header">Butiran Anjing Peliharaan <strong>#1</strong></h4>
													<!-- Form Anjing #1 Content -->
													<div class="form-group">
														<label class="col-md-4 control-label" for="val_username">No Lencana <span class="text-danger">*</span></label>
														<div class="col-md-6">
															<input type="text" id="val_lencana" name="val_lencana[]" class="form-control" placeholder="Masukkan No. Lencana.." required>
														</div>
													
														<label class="col-md-4 control-label" for="val_username">Jenis / Baka </label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo get_dog_name($dog[0]->dog_type);?></p>
														</div>
														
														<label class="col-md-4 control-label" for="val_username">Warna </label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo $dog[0]->color; ?></p>
														</div>
														
														<label class="col-md-4 control-label">Jantina</label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo $dog[0]->gender; ?></p>
														</div>
														
														<label class="col-md-4 control-label" for="example-select">Berat</label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo get_dogs_weight($dog[0]->weight);?></p>
														</div>
														
														<label class="col-md-4 control-label">Pemandulan</label>
														<div class="col-md-6">
															<p class="form-control-static">
															<?php 
															if ( $dog[0]->sterilization == 1 )
																echo "Ya";
															else
																echo "Tidak";
															?>
															</p>
														</div>
														
														<label class="col-md-4 control-label">Mikrocip</label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo $dog[0]->microchip; ?></p>
														</div>
														
														<label class="col-md-8 control-label">Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</label>
														<div class="col-md-3">
															<p class="form-control-static">
															<?php 
															if ( $dog[0]->owner_training == 1 )
																echo "Ya";
															else
																echo "Tidak";
															?>
															</p>
														</div>
														<label class="col-md-8 control-label">Anjing telah menjalani latihan "good behaviour and obedience".</label>
														<div class="col-md-3">
															<p class="form-control-static">
															<?php 
															if ( $dog[0]->dog_training == 1 )
																echo "Ya";
															else
																echo "Tidak";
															?>
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Gambar Anjing</label>
														<div class="col-md-7">
															<p class="form-control-static"><img src="<?php echo base_url().$dog[0]->dog_pic; ?>" width="100" height="100"></p>
														</div>
													</div>
												</div>
											</div>
											<input type="hidden" name="dogID[]" value="<?php echo $dog[0]->dog_id; ?>" />
											<!-- END Butiran Anjing #1 -->
											
											<!-- Butiran Anjing #2 -->
											<div class="col-sm-6">
												<div class="block">
													<h4 class="sub-header">Butiran Anjing Peliharaan <strong>#2</strong></h4>
													<?php 
													if ( count($dog) > 1 )
													{
													?>
													<div class="form-group">
														<label class="col-md-4 control-label" for="val_username">No Lencana <span class="text-danger">*</span></label>
														<div class="col-md-6">
															<input type="text" id="val_lencana" name="val_lencana[]" class="form-control" placeholder="Masukkan No. Lencana.." required>
														</div>
													
														<label class="col-md-4 control-label" for="val_username">Jenis / Baka </label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo get_dog_name($dog[1]->dog_type);?></p>
														</div>
														
														<label class="col-md-4 control-label" for="val_username">Warna </label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo $dog[1]->color; ?></p>
														</div>
														
														<label class="col-md-4 control-label">Jantina</label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo $dog[1]->gender; ?></p>
														</div>
														
														<label class="col-md-4 control-label" for="example-select">Berat</label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo get_dogs_weight($dog[1]->weight);?></p>
														</div>
														
														<label class="col-md-4 control-label">Pemandulan</label>
														<div class="col-md-6">
															<p class="form-control-static">
															<?php 
															if ( $dog[1]->sterilization == 1 )
																echo "Ya";
															else
																echo "Tidak";
															?>
															</p>
														</div>
														
														<label class="col-md-4 control-label">Mikrocip</label>
														<div class="col-md-6">
															<p class="form-control-static"><?php echo $dog[1]->microchip; ?></p>
														</div>
														
														<label class="col-md-8 control-label">Pemilik telah menghadiri latihan atau kursus pemeliharaan haiwan.</label>
														<div class="col-md-3">
															<p class="form-control-static">
															<?php 
															if ( $dog[1]->owner_training == 1 )
																echo "Ya";
															else
																echo "Tidak";
															?>
															</p>
														</div>
														<label class="col-md-8 control-label">Anjing telah menjalani latihan "good behaviour and obedience".</label>
														<div class="col-md-3">
															<p class="form-control-static">
															<?php 
															if ( $dog[1]->dog_training == 1 )
																echo "Ya";
															else
																echo "Tidak";
															?>
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Gambar Anjing</label>
														<div class="col-md-7">
															<p class="form-control-static"><img src="<?php echo base_url().$dog[1]->dog_pic; ?>" width="100" height="100"></p>
														</div>
													</div>
													<input type="hidden" name="dogID[]" value="<?php echo $dog[1]->dog_id; ?>" />
													<?php 
													}
													else
													{
														echo "<b>Tidak didaftarkan</b>";
													}
													?>
												</div>
											</div>
											<!-- END Butiran Anjing #2 -->
										</div>
									</div>
									
									<div class="tab-pane" id="tabs-action">
										<!-- <form action="renew_license_yes.html" method="post" class="form-horizontal"> -->
											<div class="row">
												<div class="block">
													<div class="col-sm-6">
														<!-- Form Status Bayaran Pemohon -->
														<h4 class="sub-header">Status Bayaran Pemohon</h4>
														<div class="form-group">
															<label class="col-md-4 control-label" for="example-timepicker">Tarikh Permohonan Diterima <span class="text-danger">*</span></label>
															<div class="col-md-4">
																<input type="text" id="date-accepted" name="date-accepted" class="form-control input-datepicker" value="<?php echo date('d/m/Y', strtotime($info[0]->date_accept));?>" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="example-timepicker">Tarikh Mula Lesen <span class="text-danger">*</span></label>
															<div class="col-md-4">
																<input type="text" id="date-start-license" name="date-start-license" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="example-timepicker">Tarikh Bayaran Diterima <span class="text-danger">*</span></label>
															<div class="col-md-4">
																<input type="text" id="date-payment" name="date-payment" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
															</div>
														</div>
														<div class="form-group">	
															<label class="col-md-4 control-label" for="example-select">Kaunter Bayaran <span class="text-danger">*</span></label>
															<div class="col-md-6">
																<select id="counter-payment" name="counter-payment" class="form-control wizard-ignore" size="1">
																	<option value="0">Please select</option>
																	<?php 
																	$counter = get_counter_payment();
																	foreach($counter as $Counter)
																	{
																			echo "<option value=\"".$Counter->place_id."\">".$Counter->place_name."</option>";
																	}
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">	
															<label class="col-md-4 control-label" for="example-select">Mod Bayaran <span class="text-danger">*</span></label>
															<div class="col-md-6">
																<select id="mode-payment" name="mode-payment" class="form-control wizard-ignore" size="1">
																	<option value="0">Please select</option>
																	<?php 
																	$mod = get_mode_payment();
																	foreach($mod as $Mod)
																	{
																			echo "<option value=\"".$Mod->mode_id."\">".$Mod->mode_name."</option>";
																	}
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="val_username">Jumlah Bayaran Diterima <span class="text-danger">*</span></label>
															<div class="col-md-6">
																<input type="text" id="total-payment" name="total-payment" class="form-control" placeholder="00.00" required>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="val_username">No. Resit <span class="text-danger">*</span></label>
															<div class="col-md-6">
																<input type="text" id="receipt-payment" name="receipt-payment" class="form-control" placeholder="Masukkan No. Resit.." required>
															</div>
														</div>
														</div><!-- .row #tab-action -->
														
														<!-- Form Status Kelulusan -->
														<!--<h4 class="sub-header">Status Bayaran Pemohon</h4>
														<div class="for	m-group">
															<label class="col-md-4 control-label" for="example-timepicker">Tarikh Diterima</label>
															<div class="col-md-4">
																<p class="static-input"><?php echo date('d/m/Y', strtotime($info[0]->date_accept));?></p>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="example-timepicker">Tarikh Diluluskan</label>
															<div class="col-md-4">
																<input type="text" id="example-datepicker3" name="example-datepicker3" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="example-timepicker">Tarikh Lesen Mula</label>
															<div class="col-md-4">
																<input type="text" id="example-datepicker3" name="example-datepicker3" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
															</div>
														</div><div class="form-group">
															<label class="col-md-4 control-label" for="example-timepicker">Tarikh Lesen Tamat</label>
															<div class="col-md-4">
																<input type="text" id="example-datepicker3" name="example-datepicker3" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
															</div>
														</div>
													</div>-->
													<!-- .col-sm-6 END Status Bayaran Pemohon, Status Kelulusan -->
												
													<div class="col-sm-6">
														<h4 class="sub-header">Sejarah Permohonan / Kelulusan</h4>		
														<div class="table-responsive">	
															<table class="table table-vcenter table-striped table-bordered">
																<thead>
																	<tr class="warning">
																		<td><strong>Tarikh</strong></td>
																		<td><strong>Status Permohonan</strong></td>
																		<td><strong>Kenyataan/Ulasan</strong></td>
																		<td><strong>Nama Pentadbir</strong></td>
																	</tr>
																</thead>
																<tbody>
																	<?php 
																	if ( count($history) > 0 )
																{
																	foreach($history as $his)
																	{
																	//echo $his->staff_id;
																		$staff = get_users_by_userid($his->staff_id);
																		
																		if ( count($staff) > 0 )
																		{
																				$staff_name = $staff[0]->name;
																		}
																		else
																		{
																				$staff_name = "Sistem";
																		}
																		
																  		echo "<tr>
																							<td>".date('d/m/Y', strtotime($his->date_history))."</td>
																							<td><span class=\"label btn-info\"> ".$his->status."</span></td>
																							<td>".$his->description."</td>
																							<td>".$staff_name."</td>
																						</tr>";
																  }
																}
															  else
															  {
															  		echo "<tr>
															  						<td colspan=\"4\">Tiada sejarah permohonan</td>
															  					</tr>";
															  }
																	?>
																</tbody>
															</table>
														</div>
													</div><!-- .col-sm-6 END Sejarah Permohonan / Kelulusan -->
												
												</div>
											</div><!-- .row #tab-action -->
									</div><!-- #tab-action -->
									<input type="hidden" name="appID" value="<?php echo $info[0]->app_id; ?>" />
									<div class="form-group form-actions text-center">
                                        <div class="col-xs-12">
										<!--<input type="submit" />-->
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            <button type="button" id="update-license-no" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                        </div>
                                    </div>
									
								</div><!-- END Tabs Content -->
								</form><!-- END Form Anjing #1 Content -->
							</div>
							<!-- END Datatables Content -->
                            
						</div>
                    </div>
                </div>
            </section>
            <!-- END Company Info -->
			
						<!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url();?>js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>