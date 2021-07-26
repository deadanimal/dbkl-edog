<!-- Page Title -->
			<section class="site-heading site-section-top">
				<div class="header-section dashboard">
					<div class="container-fluid">
						<?php 
						if( $info[0]->appeal == 1 )
						{
							echo "<h1>Permohonan Rayuan</h1>";
						}
						else
						{
							echo "<h1>Permohonan Lesen Baru</h1>";
						}
						?>
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
										<span class="label label-info"><strong>No. Permohonan:</strong> <?php echo $info[0]->app_no;?></span>
									</div>
								
									<ul class="nav nav-tabs" data-toggle="tabs">
										<li class="active"><a href="#tabs-user-details">Butiran Pemohon</a></li>
										<li><a href="#tabs-dog-details">Butiran Anjing</a></li>
										<li><a href="#tabs-action">Tindakan</a></li>
									</ul>
								</div>
								<!-- END Block Tabs Title -->
								
								<!-- Tabs Content -->
								<div class="tab-content">
									<div class="tab-pane active" id="tabs-user-details">
									<div class="row">
										<form id="user-details" action="page_forms_wizard.html" method="post" class="form-horizontal">
										<div class="col-sm-6">
											<h4 class="sub-header">Profil Pemohon</h4>
											<div class="form-group">
												<label class="col-md-4 control-label" for="val_username">Nama Pemohon </label>
												<div class="col-md-6">
													<p class="form-control-static"><?php echo $info[0]->name;?></p>
													
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
														{
																echo "Kad Pengenalan";
														}
														elseif( $info[0]->identity_type == 'ARMY' )
														{
																echo "No. Polis / Tentera";
														}
														elseif( $info[0]->identity_type == 'PASSPORT' )
														{
																echo "No. Pasport";
														}
														?>
														</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label" for="val_resident">No. Pengenalan </label>
												<div class="col-md-6">
													<p class="form-control-static"><?php echo $info[0]->nric; ?></p>
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
													<p class="form-control-static"><?php echo $info[0]->email;?></p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label">Lampiran Bil <br></label>
												<div class="col-md-6">
													<p class="form-control-static">
														<?php
														$pic_dog = $info[0]->doc_bill;
														if ($pic_dog == "") {
														?>
															<img src="<?php echo base_url() . "images/no_picture.gif"; ?> " width="100" height="100">
														<?php
														} else {
															
																$file_format = explode('.',$pic_dog);
																$file_format = $file_format[1];
																if( in_array($file_format,array("docx","doc","pdf","DOCX","DOC","PDF") ) ){
																	echo "<div class='col-md-6'>";
																	echo "<a href='".base_url().$pic_dog."' target='_blank'><i class='fa fa-file fa-2x text-dark pt-4 mt-4'></i>";
																	echo "</a>";
																	echo "</div>";
																}else{
																	echo "<div class='col-md-6'>";
																	echo "<a href='".base_url().$pic_dog."' target='_blank'>";
																	echo "<img src=".base_url().$pic_dog." width=\"100%\" height=\"200\">";
																	echo "</a>";
																	echo "</div>";
																}
															}  ?>
															<!-- <a href="<?php // echo base_url() . $pic_dog; ?>" target="_blank">
																<img src="<?php // echo base_url() . $pic_dog; ?>" width="100" height="100">
															</a> -->
														
													</p>
												</div>
											</div>
										
										</div>
										
										<div class="col-sm-6">
											<h4 class="sub-header">Alamat Tempat Peliharaan</h4>
											<div class="form-group">
												<label class="col-md-4 control-label" for="val_username">Alamat </label>
												<div class="col-md-6">
													<p class="form-control-static"><?php echo strtoupper($info[0]->no_unit.", ".ucfirst($info[0]->home_name).", ".ucfirst($info[0]->street_name).", ".ucfirst($info[0]->town_name).", ".ucfirst(get_parlimen_name($info[0]->parlimen)).", ".$info[0]->postcode." Kuala Lumpur"); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label" for="val_resident">Jenis Rumah </label>
												<div class="col-md-6">
													<p class="form-control-static">
													<?php 
													$home = get_home_type($info[0]->home_type);
													
													echo $home[0]->name;
													?>	
													</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label" for="val_resident">Keluasan Rumah </label>
												<div class="col-md-6">
													<p class="form-control-static">
													<?php 
													$home = get_home_space($info[0]->home_space);
													
													echo $home[0]->name;
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
										</div></form>
									</div>
									<?php 
									$dog = get_total_dog($info[0]->app_id);
									?>	
									</div>
									<div class="tab-pane" id="tabs-dog-details">
										<div class="row">
											<!-- Butiran Anjing #1 -->
											<div class="col-sm-6">
												<h4 class="sub-header">Butiran Anjing Peliharaan <strong>#1</strong></h4>
												<div class="block">
													<!-- Form Anjing #1 Content -->
													<form action="renew_license_yes.html" method="post" class="form-horizontal form-bordered">
														<div class="form-group">
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
																<p class="form-control-static"><?php echo $dog[0]->gender;?></p>
															</div>
															
															<label class="col-md-4 control-label" for="example-select">Berat</label>
															<div class="col-md-6">
																<p class="form-control-static"><?php echo get_dogs_weight($dog[0]->weight);?></p>
															</div>
															
															<label class="col-md-4 control-label">Pemandulan</label>
															<div class="col-md-6">
																<p class="form-control-static">
																<?php 
																if( $dog[0]->sterilization == 1 )
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
																if( $dog[0]->owner_training == 1 )
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
																if( $dog[0]->dog_training == 1 )
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
																<p class="form-control-static">
																<?php 
																if( $dog[0]->dog_pic == "" )
																{
																	echo "<img src='".base_url()."images/no_picture.gif' width=\"100\" height=\"100\">";
																}
																else
																{
																	echo "<img src=". base_url().$dog[0]->dog_pic." width=\"100\" height=\"100\">";
																}
																?>
																	
																</p>
															</div>
														</div>
													</form>
													<!-- END Form Anjing #1 Content -->
												</div>
											</div>
											<!-- END Butiran Anjing #1 -->
											
											<!-- Butiran Anjing #2 -->
											<div class="col-sm-6">
												<h4 class="sub-header">Butiran Anjing Peliharaan <strong>#2</strong></h4>
												<div class="block">
													<?php 
													if( count($dog) > 1 )
													{
													?>
													<!-- Form Anjing #2 Content -->
													<form action="renew_license_yes.html" method="post" class="form-horizontal form-bordered">
														<div class="form-group">
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
																<p class="form-control-static"><?php echo $dog[1]->gender;?></p>
															</div>
															
															<label class="col-md-4 control-label" for="example-select">Berat</label>
															<div class="col-md-6">
																<p class="form-control-static"><?php echo get_dogs_weight($dog[1]->weight);?></p>
															</div>
															
															<label class="col-md-4 control-label">Pemandulan</label>
															<div class="col-md-6">
																<p class="form-control-static">
																<?php 
																if( $dog[1]->sterilization == 1 )
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
																if( $dog[1]->owner_training == 1 )
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
																if( $dog[1]->dog_training == 1 )
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
																<p class="form-control-static">
																	<?php 
																	if( $dog[0]->dog_pic == "" )
																	{
																		echo "<img src='".base_url()."images/no_picture.gif' width=\"100\" height=\"100\">";
																	}
																	else
																	{
																		echo "<img src=". base_url().$dog[1]->dog_pic." width=\"100\" height=\"100\">";
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
														 echo "<b>Tidak didaftarkan</b>";
													}
													?>
												</div>
											</div>
											<!-- END Butiran Anjing #2 -->
										</div>
									</div>
									
									<?php 
									$reject = get_reason_admin();
									?>
									<div class="tab-pane" id="tabs-action">
										<div class="row">
											<!-- Status Permohonan -->
											<div class="col-sm-6">
												<h4 class="sub-header">Status Permohonan</h4>
												<div class="block">
													<!-- Form Status Permohonan -->
													<form action="<?php echo base_url('admin');?>/index.php/new_app/save_new_app" id="save-new-app" method="post" class="form-horizontal form-bordered">
														<?php 
														if ( $info[0]->appeal == 1 )
														{
																echo "<div class=\"form-group\">
																				<label class=\"col-md-6 control-label left\">Sebab-sebab rayuan</label>
																				<div class=\"col-md-4\">".$info[0]->appeal_desc."</div>
																			</div>";
														}
														?>
														<div class="form-group">
															<label class="col-md-6 control-label left">Adakah menerima permohonan ini?</label>
															<div class="col-md-4">
																<label class="radio-inline" for="example-inline-radio1">
																	<input type="radio" id="decision1" name="decision" value="Diterima"> Diterima
																</label>
																<label class="radio-inline" for="example-inline-radio2">
																	<input type="radio" id="decision2" name="decision" value="Ditolak"> Ditolak
																</label>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label left">Sebab - sebab permohonan ditolak</label>
															<div class="col-md-6">
																	<select id="reject-cause" name="reject-cause" disabled class="form-control wizard-ignore" size="1">
																	<option value="0">Please select</option>
																	<?php 
																	
																	foreach($reject as $rjt)
																	{
																			echo "<option value=\"".$rjt->reason_id."\">".$rjt->reason."</option>";
																	}
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-12 control-label left" for="example-textarea-input">Kenyataan / Ulasan</label>
															<div class="col-md-12">
																<textarea id="decision-description" name="decision-description" rows="9" class="form-control" placeholder="Sila isi ulasan disini.."></textarea>
															</div>
														</div>
														<input type="hidden" name="appID" value="<?php echo $info[0]->app_id; ?>" />
														<input type="hidden" name="appealID" id="appealID" value="<?php echo $info[0]->appeal; ?>" />
													</form>
													<!-- END Status Permohonan -->
												</div>
											</div>
											<!-- END Butiran Anjing #1 -->
											
											<!-- Sejarah Permohonan/Kelulusan -->
											<div class="col-sm-6">
												<h4 class="sub-header">Sejarah Permohonan/Kelulusan</h4>
												<div class="block">
													<div class="table-responsive">
														<table class="table table-vcenter table-condensed table-striped table-bordered">
															<thead>
																<tr class="warning">
																	<td><strong>Tarikh</strong></td>
																	<td><strong>Status Permohonan</strong></td>
																	<td><strong>Kenyataan / Ulasan</strong></td>
																	<td><strong>Nama Pentadbir</strong></td>
																</tr>
															</thead>
															<tbody>
																<?php 
																if ( count($history) > 0 )
																{
																	foreach($history as $his)
																	{
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
												</div>
											</div>
											<!-- END Sejarah Permohonan/Kelulusan -->
										</div>
										<div class="text-right">
											<button type="button" id="new-app-submit" class="btn btn-square btn-success ">Hantar</button>
											<a href="javascript:history.go(-1)" type="button" class="btn btn-square btn-warning" >Kembali</a>
										</div>
									</div>
								</div>
								<!-- END Tabs Content -->
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