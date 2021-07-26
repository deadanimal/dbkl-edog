
			<div class="media-container">
                <!-- Intro -->
                <section class="site-section site-section-light site-section-top">
                    <div class="container text-center">
                        <h1 class="animation-slideDown"><strong>Dashboard</strong></h1>
                    </div>
                </section>
                <!-- END Intro -->

                <!-- For best results use an image with a resolution of 2560x279 pixels -->
                <img src="<?php echo base_url(); ?>img/placeholders/headers/login_header01.jpg" alt="" class="media-image animation-pulseSlow">
            </div>

            
            <!-- Company Info -->
            <section class="site-section site-content-single">
                <div class="container-fluid">
                    <!-- <div class="row"> --> 
						<div class="col-md-9">
						<!-- <div class="col-md-12">
                    		<div class="alert alert-info alert-dismissable">
							<i class="fa fa-info-circle"></i> Announcement : New license fee structure starting June 2018. <a href="/edog2017/pengumuman-kadar-baru-lesen-anjing-2018.php" target="_blank" class="alert-link">Read More</a>!

							</div>
                    	</div> -->
						<small>   
                           	<div class="col-sm-3 site-block">
	                            <h4 class="site-heading"><i class="fa fa-arrow-right text-success animation-floatingHor"></i> <strong>Getting</strong> Started</h4>
	                            <p class="remove-margin">
	                            	Please read our user manual or frequently asked questions (FAQ) before using this system
	                            	<br><br>
	                            	<a href="/edog2017/DBKL-eDog-User-Manual-v1.0.pdf" target="_blank" class="btn btn-sm btn-info"><strong>User Manual</strong></a>
	                            	<a href="/edog2017/faq.php" target="_blank" class="btn btn-sm btn-info"><strong>FAQ</strong></a>
	                            </p>
	                        </div>
	                        <div class="col-sm-3 site-block">
	                            <h4 class="site-heading"><i class="fa fa-arrow-right text-success animation-floatingHor"></i> <strong>Profile &</strong> Address</h4>
	                            <p class="remove-margin">
	                            	Update your profile & dog's address here
	                            	<br><br>
	                            	<a href="<?php echo base_url()?>index.php/manage_profile" class="btn btn-sm btn-info"><strong>Update Profile</strong></a>
	                            </p>
	                        </div>
	                        <div class="col-sm-3 site-block">
	                            <h4 class="site-heading"><i class="fa fa-arrow-right text-success animation-floatingHor"></i> <strong>New</strong> License</h4>
	                            <p class="remove-margin">
	                            	Apply new dog license by completing the form
	                            	<br><br>
	                            	<a href="<?php echo base_url()?>index.php/new_license" class="btn btn-sm btn-info"><strong>Apply New License</strong></a>
	                            </p>
	                        </div>
	                        <div class="col-sm-3 site-block">
	                            <h4 class="site-heading"><i class="fa fa-arrow-right text-success animation-floatingHor"></i> <strong>Renew</strong> License</h4>
	                            <p class="remove-margin">
	                            	Renew your dog license by completing the form
	                            	<br><br>
	                            	<a href="<?php echo base_url()?>index.php/renew" class="btn btn-sm btn-info"><strong>Renew License</strong></a>
	                            </p>
	                        </div>
	                    </small>

							<div class="col-md-12 site-block">
                			<h4 class="site-heading"><strong>Pending Items</strong> / <small>Perkara Belum Selesai</small></h4>
								<div class="table-responsive">
									<small>
									<table class="table table-bordered table-striped">
										<thead>
											<tr class="warning">
												<td align="center"><strong>No /<br><small>Bil</small></strong></td>
												<td><strong>Application No /<br><small>Nombor Permohonan</small></strong></td>
												<td align="center"><strong>Application Date /<br><small>Tarikh Permohonan</small></strong></td>
												<td align="center"><strong>Address /<br><small>Alamat Tempat Permohonan</small></strong></td>
												<td align="center"><strong>Status /<br><small>Status</small></strong></td>
												<td align="center"><strong>Action /<br><small>Tindakan</small></strong></td>
												<td></td>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no = 1;
											if( count($DASH_NEW) > 0 )
											{
												

												foreach($DASH_NEW as $ROW)
												{
													unset($status);

													if( $ROW->status == "Ditolak" )
														$status = "<font color=red>Rejected <br> <small>Ditolak</small></font>";
													else if( ($ROW->status == 'Dalam proses' || $ROW->status == 'Dalam proses') && $ROW->appeal == 1 )
														$status = "Appeal Process <br> <small>Rayuan Dalam Proses</small>";
													else if( $ROW->status == 'Dalam proses' || $ROW->status == 'Dalam Proses')
														$status = "In Process <br> <small>Dalam Proses</small>";
													else if( $ROW->status == 'Diterima')
														$status = "Received <br> <small>Diterima</small>";
													else if( $ROW->status == 'Lulus')
														$status = "Pass <br> <small>Lulus</small>";

													echo "<tr>
																	<td align=\"center\">".$no."</td>
																	<td><a href=\"".base_url()."index.php/application_view/index/".$ROW->app_id."\"><strong>".$ROW->app_no."</strong></a></td>
																	<td align=\"center\">".date('d/m/Y h:i A', strtotime($ROW->date_apply))."</td>
																	<td>".strtoupper($ROW->no_unit);
																	if($ROW->home_name)
																	echo ", ".ucwords(strtoupper($ROW->home_name));
																	if($ROW->street_name)
																	echo ", ".ucwords(strtoupper($ROW->street_name));
																	if($ROW->town_name)
																	echo ",".ucwords(strtoupper($ROW->town_name));
																	echo "<br>".$ROW->postcode." ".ucwords(strtoupper(get_parlimen_name($ROW->parlimen))).", KUALA LUMPUR.</td>
																	
																	<td align=\"center\"><b>".$status."</b></td>";
																
																if($ROW->status == 'Diterima')
																{
																	echo "<td align=\"center\"><a href=\"".base_url()."index.php/receipt/index/".$ROW->app_id."\" target=\"_blank\">Print Payment Bill</a></td>";
																}
																elseif($ROW->status == 'Ditolak')
																{
																	if($ROW->appeal == 0)
																	{
																		echo "<td align=\"center\"><a href=\"".base_url()."index.php/appeal/index/".$ROW->app_id."\">Appeal</a></td>";
																	}
																	else
																	{
																		echo "<td align=\"center\">-</td>";
																	}
																}
																else
																{
																	echo "<td align=\"center\"> Not required <br> Tidak perlu</td>";
																}
																
													if($ROW->status == 'Diterima')	
													echo "<td class=\"text-center\"><a href=\"#modal-regular2\" class=\"text-warning\" data-toggle=\"modal\"><i class=\"fa fa-info-circle fa-2x\"></i></a></td></tr>";
													else
													echo "<td></td>";
			
													$no++;
												}
											}
											else
											{
													echo "<tr>
																	<td colspan=\"6\">No application applied / Tiada permohonan baru dibuat</td>
																</tr>";
											}
											?>
										</tbody>
									</table>
									</small>
									<h4 class="site-heading"><strong>Existing Licenses</strong> / <small>Senarai Lesen Sedia Ada</small></h4>
								<div class="table-responsive">
									<?php 
									$no_addr = 1;
									if( count($ADDRESS) > 0 )
									{
										foreach($ADDRESS as $ADDR)
										{
											echo "<div><p><strong>Address #".$no_addr." / <small>Alamat #".$no_addr."</small></strong> :  ";
												echo strtoupper($ADDR->no_unit);
											if($ADDR->home_name)
												echo ",&nbsp; ".ucwords(strtoupper($ADDR->home_name));
											if($ADDR->street_name)
												echo ",&nbsp; ".ucwords(strtoupper($ADDR->street_name));
											if($ADDR->town_name)
												echo ",&nbsp; ".ucwords(strtoupper($ADDR->town_name));
												echo ",&nbsp; ".strtoupper(get_parlimen_name($ADDR->parlimen)).",&nbsp".$ADDR->postcode." KUALA LUMPUR.</p></div>";
												
												echo "<small><table class=\"table table-bordered table-striped\">
																<thead>
																	<tr class=\"warning\">
																		<td align=\"center\"><strong>No /<br><small>Bil</small></strong></td>
																		<td><strong>Application No /<br><small>Nombor Permohonan</small></strong></td>
																		<td align=\"center\"><strong>License Date Start /<br><small>Tarikh Lesen Mula</small></strong></td>
																		<td align=\"center\"><strong>License Date End /<br><small>Tarikh Lesen Tamat</small></strong></td>
																		<td align=\"center\"><strong>Total Dog /<br><small>Bilangan Anjing Peliharaan</small></strong></td>
																		<td align=\"center\"><strong>Tag No / <br><small>No Lencana</small></strong></td>
																	</tr>
																</thead>
																<tbody>";
																$DETAILS_BY_ADDRESS = get_dashboard_already_license($ADDR->addr_id);
																
																if( count($DETAILS_BY_ADDRESS) > 0 )
																{
																	$no=1;
																	foreach($DETAILS_BY_ADDRESS as $DTL)
																	{
																		$total_dog = get_total_dog($DTL->app_id);
																		$lic = array();
																		
																		foreach($total_dog as $tdg)
																		{
																				$arrLic = get_dog_license($tdg->dog_id);
																				$lic[] = $arrLic[0]->license_no; 
																		}
																		
																		$lic0 = '';
																		$lic1 = '';

																		if(strlen($lic[0]) == 1)
																			$lic0 = '0000'.$lic[0];
																		elseif(strlen($lic[0]) == 2)
																			$lic0 = '000'.$lic[0];
																		elseif(strlen($lic[0]) == 3)
																			$lic0 = '00'.$lic[0];
																		elseif(strlen($lic[0]) == 4)
																			$lic0 = '0'.$lic[0];
																		elseif(strlen($lic[0]) == 5)
																			$lic0 = $lic[0];

																		if(strlen($lic[1]) == 1)
																			$lic1 = '0000'.$lic[1];
																		elseif(strlen($lic[1]) == 2)
																			$lic1 = '000'.$lic[1];
																		elseif(strlen($lic[1]) == 3)
																			$lic1 = '00'.$lic[1];
																		elseif(strlen($lic[1]) == 4)
																			$lic1 = '0'.$lic[1];
																		elseif(strlen($lic[1]) == 5)
																			$lic1 = $lic[1];
																		
																			echo "<tr>
																							<td align=\"center\">".$no."</td>
																							<td><a href=\"".base_url()."index.php/application_view/index/".$DTL->app_id."\"><strong>".$DTL->app_no."</strong></a></td>
																							<td align=\"center\">".date('d/m/Y', strtotime($DTL->date_start))."</td>
																							<td align=\"center\">31/12/".date('Y', strtotime($DTL->date_start))."</td>
																							<td align=\"center\">".count($total_dog)."</td>
																							<td align=\"center\">";
																							if(count($lic) > 1)
																								echo $lic0."<br>".$lic1;
																							else
																								echo $lic0;
																				echo "</td>
																						</tr>";
																			$no++;
																	
																	}
																}
																else
																{
																			echo "<tr>
																							<td colspan=\"6\">No license available / Tidak mempunyai lesen</td>
																						</tr>";
																}
																		
														echo "</tbody>
															</table></small>";
											
											$no_addr++;
										}
									}
									else
									{
										echo "Anda tidak memegang sebarang lesen anjing.";
									}
									?>
								</div>
              </div>
							<hr>
						</div>
						<div id="modal-regular2" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 15px;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3 class="modal-title">Information<br><small>Makluman</small></h3>
									</div>
									<div class="modal-body">
										Kindly print the payment bill and proceed with payment at the counter below :<br>
										<small>Sila cetak bil pembayaran dan bayar di kaunter berikut :</small>
										<br><br>

										1. Kaunter Bayaran Menara DBKL 1, Jalan Raja Laut or<br>
										2. Semua Kaunter Bayaran Pejabat Cawangan DBKL or<br>
										3. <a href="https://goo.gl/maps/ssjgeYYKmnG2">Unit Kawalan PEST, DBKL</a>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-md-3">
                    	<div class="site-block">
						
							<!-- <blockquote> -->
								<p>
									<strong>Hi,<?php echo $this->session->userdata('name');?></strong><br>
									User ID : <?php echo $this->session->userdata('nric');?><br>
									<a href="<?php echo base_url()?>index.php/manage_profile" class="btn btn-sm btn-info"><strong>Change Password</strong></a>
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
											<h4><i class="fa fa-hand-o-right"></i> <strong>Apply New License Steps</strong></h4>
											<p>
												Please complete the steps below in order to apply your dog license<br><br>
												1. Create Account<br>
												2. Update Profile<br>
												3. Add Dog's Address<br>
												4. Add Dog's Detail #1 <br>
												5. Add Dog's Detail #2 (If any)<br>
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
												5. Tambah Info Anjing #2 (Jika ada)<br>
												6. Setuju & Hantar Permohonan <br>
												7. Cetak Bukti Pembayaran & Bayar di Kaunter
											</p>
										</div>
									</div>
								</div>
							</div>
							
						</div>
                    </div>
               <!--  </div> -->

            </section>
            
            <!-- END Company Info -->