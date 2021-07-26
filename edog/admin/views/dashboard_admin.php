<!-- Page Title -->
<section class="site-heading site-section-top">
				<div class="header-section dashboard">
					<div class="container-fluid">
						<h1>Dashboard Admin</h1>
					</div>
				</div>
			</section>
			<!-- END Page Title -->

            <!-- Content -->
            <section class="site-section site-content-single">
                <div class="container-fluid">
                    <div class="row">
						<div class="col-sm-12">
							<!-- Welcome User -->
                            <div class="site-block">
                                <h3 class="site-heading"><strong>HAI!</strong>
                                <?php 
                                if( get_count_log($this->session->userdata('userid')) > 0 )
                                {
                                ?>	
                                <small><p>Selamat datang, <strong><?php echo $this->session->userdata('name');?></strong>. Kali terakhir daftar masuk anda adalah pada hari <?php echo get_day_malay(date('l', strtotime( get_log($this->session->userdata('userid')))))." , ".get_month_malay(date('F', strtotime( get_log($this->session->userdata('userid'))))).date(' d, Y', strtotime( get_log($this->session->userdata('userid'))) )." pada ".date('h:i A', strtotime(get_log($this->session->userdata('userid'))));?></p></small></h3>
									<?php 
									}
									else
									{
									?>
									<small><p>Selamat datang, <strong><?php echo $this->session->userdata('name');?></strong>. Kali terakhir daftar masuk anda adalah pada hari <?php echo get_day_malay(date('l', strtotime( get_log($this->session->userdata('userid')))))." , ".get_month_malay(date('F')).date(' d, Y')." pada ".date('h:s A');?></p></small></h3>
									<?php
									}
									?>
                                </h3>
								<hr>
                            </div>
						</div>
						<?php 

                        $datefrom='01/01/'.date('Y');
                        $datetos=date('d/m/Y');
                        ?>
						<div class="col-sm-12">
								<div class="col-sm-6 col-lg-3">
									<!-- Widget -->
									<a href="<?php echo base_url('admin');?>/index.php/report/index?date-type=Semua&date-from=<?php echo $datefrom; ?>&date-tos=<?php echo $datetos; ?>" class="widget widget-hover-effect1">
										<div class="widget-simple">
											<div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
												<i class="fa fa-user"></i>
											</div>
											<h3 class="widget-content text-right animation-pullDown">
												<strong><?php echo $sum_of_user; ?></strong><br>
												<small>Jumlah Permohonan Tahun Semasa</small>
											</h3>
										</div>
									</a>
									<!-- END Widget -->
								</div>
								<div class="col-sm-6 col-lg-3">
									<!-- Widget -->
									<a href="<?php echo base_url('admin');?>/index.php/new_app_list" class="widget widget-hover-effect1">
										<div class="widget-simple">
											<div class="widget-icon pull-left themed-background-spring animation-fadeIn">
												<i class="fa fa-file-text"></i>
											</div>
											<h3 class="widget-content text-right animation-pullDown">
												<strong><?php echo number_format(count($approved_app)); ?></strong><br>
												<small>Permohonan Baru Belum Disemak</small>
											</h3>
										</div>
									</a>
									<!-- END Widget -->
								</div>
								<div class="col-sm-6 col-lg-3">
									<!-- Widget -->
									<a href="<?php echo base_url('admin');?>/index.php/appeal_list" class="widget widget-hover-effect1">
										<div class="widget-simple">
											<div class="widget-icon pull-left themed-background-fire animation-fadeIn">
												<i class="fa fa-files-o"></i>
											</div>
											<h3 class="widget-content text-right animation-pullDown">
												<strong><?php echo number_format(count($sum_of_appeal)); ?></strong>
												<small>Permohonan Rayuan Belum Disemak</small>
											</h3>
										</div>
									</a>
									<!-- END Widget -->
								</div>
								<div class="col-sm-6 col-lg-3">
								
									<!-- Widget -->
									<a href="<?php echo base_url('admin');?>/index.php/report/index?date-type=Pembaharuan" class="widget widget-hover-effect1">
										<div class="widget-simple">
											<div class="widget-icon pull-left themed-background-fire animation-fadeIn">
												<i class="fa fa-times"></i>
											</div>
											<h3 class="widget-content text-right animation-pullDown">
												<strong><?php echo number_format(count($sum_of_not_renew)); ?></strong>
												<small>Lesen Tak Diperbaharui</small>
											</h3>
										</div>
									</a>
									<!-- END Widget -->
								</div>
						</div>						
						<div class="col-md-12">
							<!-- Datatables Content -->
							<div class="block bordered full">
								<!-- Block Tabs Title -->
								<div class="block-title">
									<ul class="nav nav-tabs" data-toggle="tabs">
										<li class="active"><a href="#tabs-new-application">Permohonan Baru</a></li>
										<li><a href="#tabs-appeal">Permohonan Rayuan</a></li>
										<li><a href="#tabs-accepted">Diterima / Kelulusan</a></li>	
										<li><a href="#tabs-existing">Lesen Sedia Ada</a></li>
										<li><a href="#tabs-address">Semakan Permohonan</a></li>

									</ul>
								</div>
								<!-- END Block Tabs Title -->
								
								<!-- Tabs Content -->
								<div class="tab-content">
									<div class="tab-pane active" id="tabs-new-application">
									<small>
										<div class="table-responsive ">
										<table class="table table-bordered table-vcenter table-striped">
											<thead>
												<tr class="warning">
													<td width="5%" class="text-center"><strong>Bil</strong></td>
													<td class="text-center"><strong>Nombor Permohonan</strong></td>
													<td class="text-center"><strong>Tarikh Permohonan</strong></td>
													<td><strong>Nama Pemohon</strong></td>
													<td class="text-center"><strong>No. Pengenalan Pemohon</strong></td>
													<td class="text-center"><strong>Status</strong></td>
												</tr>
											</thead>
											<tbody>
												<?php 
                                                $n = 1;
                                                //print_r($sum_of_new_app);
                                                if(count($sum_of_new_app) > 0){
												foreach($sum_of_new_app as $new)
												{
													if ( $n < 6 )
													{
															echo "<tr>
																	<td class=\"text-center\">".$n."</td>
																	<td class=\"text-center\"><a href=\"".base_url('admin')."/index.php/view_app/index/".$new->app_id."\"><b>".$new->app_no."</b></a></td>
																	<td class=\"text-center\">".date('d/m/Y h:i A', strtotime($new->date_apply))."</td>
																	<td>".strtoupper(get_users_name($new->addr_id))." </td>
																	<td class=\"text-center\">".get_users_ic($new->addr_id)."</td>
																	<td class=\"text-center\">";
																	if( $new->status == "Ditolak" )
																		echo "<font color=red><b>Permohonan ditolak</b></font>";
																	else
																		echo "<a href=\"".base_url('admin')."/index.php/new_app/index/".$new->app_id."\" class=\"btn btn-square btn-sm btn-success\">Semak Permohonan</a>";
															echo "</td>
																	</tr>";
													$n++;
													}
												}
												}
												else
												{
													echo "<tr>
																<td colspan=\"6\">Tiada rekod dijumpai</td>
															</tr>";
												}
												?>
											</tbody>
										</table>
										<?php 
										if ( $n == 6 )
											echo "<div class=\"text-right\"><a href=\"".base_url('admin')."/index.php/new_app_list\"><b>Senarai Permohonan Baru >></b></a></div>";
										?>
										</div>
										</small>
									</div>
								<!-- Tabs Content --------------------------------------------------------------------------->
								<div class="tab-pane" id="tabs-appeal">
									<small>
										<div class="table-responsive ">
										<table class="table table-bordered table-vcenter table-striped">
											<thead>
												<tr class="warning">
													<td width="5% text-center"><strong>Bil</strong></td>
													<td class="text-center"><strong>Nombor Permohonan</strong></td>
													<td class="text-center"><strong>Tarikh Permohonan</strong></td>
													<td><strong>Nama Pemohon</strong></td>
													<td class="text-center"><strong>No. Pengenalan Pemohon</strong></td>
													<td class="text-center"><strong>Status</strong></td>
												</tr>
											</thead>
											<tbody>
												<?php
												$a = 1; 
												if(count($sum_of_appeal) > 0){
													foreach($sum_of_appeal as $appeal)
													{
														if ( $a < 6 )
														{
															echo "<tr>
																			<td class=\"text-center\">".$a."</td>
																			<td class=\"text-center\"><a href=\"".base_url('admin')."/index.php/view_app/index/".$appeal->app_id."\"><b>".$appeal->app_no."</b></a></td>
																			<td class=\"text-center\">".date('d/m/Y h:i A', strtotime($appeal->date_apply))."</td>
																			<td>".strtoupper(get_users_name($appeal->addr_id))." </td>
																			<td class=\"text-center\">".get_users_ic($appeal->addr_id)."</td>
																			<td class=\"text-center\">";
																			if( $appeal->appeal == 1 && $appeal->status == "Ditolak" || $appeal->status == "Diterima")
																			{
																				echo "Rayuan telah dibuat";
																			}
																			else
																			{
																				echo "<a href=\"".base_url('admin')."/index.php/new_app/index/".$appeal->app_id."\" class=\"btn btn-square btn-sm btn-success\">Semak Permohonan</a>";
																			}
																		echo "</td>
																		</tr>";
															$a++;
														}
													}
												}
												else
												{
													echo "<tr>
																<td colspan=\"6\">Tiada rekod dijumpai</td>
															</tr>";
												}
												
												?>
											</tbody>
										</table>
										<?php 
								
										if ( $a == 6 )
											echo "<div class=\"text-right\"><a href=\"".base_url('admin')."/index.php/appeal_list\"><b>Senarai Permohonan Rayuan >></b></a></div>";
										?>
										</div>
										</small>
									</div>
								<!-- Tabs Content --------------------------------------------------------------------------->
								<div class="tab-pane" id="tabs-accepted">
									<small>
										<div class="table-responsive ">
										<table class="table table-bordered table-vcenter table-striped">
											<thead>
												<tr class="warning">
													<td width="5% text-center"><strong>Bil</strong></td>
													<td class="text-center"><strong>Nombor Permohonan</strong></td>
													<td class="text-center"><strong>Tarikh Permohonan</strong></td>
													<td><strong>Nama Pemohon</strong></td>
													<td class="text-center"><strong>No. Pengenalan Pemohon</strong></td>
													<td class="text-center"><strong>Status</strong></td>
													<td class="text-center"><strong>Remarks</strong></td>
												</tr>
											</thead>
											<tbody>
												<?php 
												$ar = 1;
												foreach($accepted_app as $appr)
												{
													if( $ar < 6 )
													{
														echo "<tr>
																		<td class=\"text-center\">".$ar."</td>
																		<td class=\"text-center\"><a href=\"".base_url('admin')."/index.php/view_app/index/".$appr->app_id."\"><b>".$appr->app_no."</b></a></td>
																		<td class=\"text-center\">".date('d/m/Y h:i A', strtotime($appr->date_apply))."</td>
																		<td>".strtoupper(get_users_name($appr->addr_id))." </td>
																		<td class=\"text-center\">".get_users_ic($appr->addr_id)."</td>
																		<td class=\"text-center\">
																			<a href=\"".base_url('admin')."/index.php/approved/index/".$appr->app_id."\" class=\"btn btn-square btn-sm btn-success\">Semak Permohonan</a>
																		</td>
																		<td class=\"text-center\">
																		<a class=\"btn btn-square btn-sm btn-primary\">Dalam Proses</a>
																	</td>
																	</tr>";
														$ar++;
													}
												}
												?>
											</tbody>
										</table>
										<?php 
										if ( $ar == 6 )
											echo "<div class=\"text-right\"><a href=\"".base_url('admin')."/index.php/approved_list\"><b>Senarai Kelulusan >></b></a></div>";
										?>
										</div>
										</small>
									</div>
						        <!-- Tabs Content --------------------------------------------------------------------------->
								<div class="tab-pane" id="tabs-existing">
										
										<div class="row">
											<!--<form action="renew_license_yes.html" method="post" class="form-horizontal form-bordered">
											<div class="col-sm-6">
											
												<div class="block">
													
													<div class="form-group">
														<label class="col-md-5 control-label" for="example-text-input">No. Permohonan</label>
														<div class="col-md-6">
															<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-5 control-label" for="example-text-input">No. Lencana</label>
														<div class="col-md-6">
															<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-5 control-label" for="example-text-input">No. Rumah / No. Unit</label>
														<div class="col-md-6">
															<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-5 control-label" for="example-text-input">Apartment/Kondo/Taman/Kampung</label>
														<div class="col-md-6">
															<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
														</div>
													</div>
												</div>
											</div>

											<div class="col-sm-6">
												<div class="block">
													<div class="form-group">
														<label class="col-md-5 control-label" for="example-text-input">Jalan / Lorong</label>
														<div class="col-md-6">
															<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-5 control-label" for="example-text-input">Kawasan / Bandar</label>
														<div class="col-md-6">
															<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-5 control-label" for="example-text-input">Poskod</label>
														<div class="col-md-6">
															<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-5 control-label" for="example-select">Parlimen</label>
														<div class="col-md-6">
															<select id="example-select" name="example-select" class="form-control" size="1">
																<option value="0">Sila Pilih Parlimen</option>
																<option value="1">P114 Kepong</option>
																<option value="2">P115 Batu</option>
																<option value="3">P116 Wangsa Maju</option>
																<option value="4">P117 Segambut</option>
																<option value="5">P118 Setiawangsa</option>
																<option value="6">P119 Titiwangsa</option>
																<option value="7">P120 Bukit Bintang</option>
																<option value="8">P121 Lembah Pantai</option>
																<option value="9">P122 Seputeh</option>
																<option value="10">P123 Cheras</option>
																<option value="11">P124 Bandar Tun Razak</option>
															</select>
														</div>
													</div>
												</div>
											</div>

										</div>
										<div class="form-group form-actions text-center">
											<button type="submit" class="btn btn-sm btn-primary"> Cari</button>
											<button type="reset" class="btn btn-sm btn-warning"> Batal</button>
										</div>
									</form>-->
									<!--<hr>-->
									<small>
									<div class="table-responsive">
										<table class="table table-bordered table-vcenter table-striped">
											<thead>
												<tr class="warning">
													<td width="5% text-center"><strong>Bil</strong></td>
													<td class="text-center"><strong>Nombor Permohonan</strong></td>
													<td class="text-center"><strong>Bil Anjing</strong></td>
													<td class="text-center"><strong>No. Lencana</strong></td>
													<td><strong>Nama Pemohon</strong></td>
													<td class="text-center"><strong>No. Pengenalan Pemohon</strong></td>
													<td><strong>Alamat</strong></td>
												</tr>
											</thead>
											<tbody>
												<?php 
												$al = 1;
												
												foreach($already_license as $ready)
												{
													if ( $al < 6 )
													{

														$dog = get_total_dog($ready->app_id);
														
														$dog_view = NULL;

														if(count($dog) > 0)
														{
															if( count($dog) > 1 )
															{
																
																	$dogfirst = get_dog_license($dog[0]->dog_id);
																	$dogsecond = get_dog_license($dog[1]->dog_id);
																	
																	//DOG FIRST
																	if(strlen($dogfirst[0]->license_no) == 1)
																		$dog1 = '0000'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 2)
																		$dog1 = '000'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 3)
																		$dog1 = '00'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 4)
																		$dog1 = '0'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 5)
																		$dog1 = $dogfirst[0]->license_no;

																	//DOG SECOND
																	if(strlen($dogsecond[0]->license_no) == 1)
																		$dog2 = '0000'.$dogsecond[0]->license_no;
																	elseif(strlen($dogsecond[0]->license_no) == 2)
																		$dog2 = '000'.$dogsecond[0]->license_no;
																	elseif(strlen($dogsecond[0]->license_no) == 3)
																		$dog2 = '00'.$dogsecond[0]->license_no;
																	elseif(strlen($dogsecond[0]->license_no) == 4)
																		$dog2 = '0'.$dogsecond[0]->license_no;
																	elseif(strlen($dogsecond[0]->license_no) == 5)
																		$dog2 = $dogsecond[0]->license_no;

																	$dog_view = $dog1."<br>".$dog2;
															}
															else
															{
																	$dogfirst = get_dog_license($dog[0]->dog_id);
																	
																	//DOG FIRST
																	if(strlen($dogfirst[0]->license_no) == 1)
																		$dog1 = '0000'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 2)
																		$dog1 = '000'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 3)
																		$dog1 = '00'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 4)
																		$dog1 = '0'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 5)
																		$dog1 = $dogfirst[0]->license_no;

																	$dog_view = $dog1;
															}
														}
														
														$addr = get_address_by_addr_id($ready->addr_id);
														//$dog_view = NULL;

														echo "<tr>
																		<td class=\"text-center\">".$al."</td>
																		<td class=\"text-center\"><a href=\"".base_url('admin')."/index.php/view_app/index/".$ready->app_id."\"><b>".$ready->app_no."</b></a></td>
																		<td align=\"center\">".count($dog)."</td>
																		<td align=\"center\">".$dog_view."</td>
																		<td>".strtoupper(get_users_name($ready->addr_id))." </td>
																		<td class=\"text-center\">".get_users_ic($ready->addr_id)."</td>
																		<td>";
																			echo strtoupper($addr[0]->no_unit);
																			if($addr[0]->home_name)
																			echo ", ".strtoupper($addr[0]->home_name);
																			if($addr[0]->street_name)
																			echo ", ".strtoupper($addr[0]->street_name);
																			if($addr[0]->town_name)
																			echo ", ".strtoupper($addr[0]->town_name);
																			echo ", ".strtoupper(get_parlimen_name($addr[0]->parlimen)).", <br>".$addr[0]->postcode." KUALA LUMPUR.</td>
																	</tr>";
																	
														$al++;
													}
												}
												?>
											</tbody>
										</table>
										<?php 
										if ( $al == 6 )
											echo "<div class=\"text-right\"><a href=\"".base_url('admin')."/index.php/already_list\"><b>Senarai Lesen Sedia Ada >></b></a></div>";
										?>
										</div>
										</small>
									</div>
								</div>

								<!-- Tabs Content --------------------------------------------------------------------------->
								<div class="tab-pane" id="tabs-address">
										<div class="row">
									<small>
									<div class="table-responsive">
										<table class="table table-bordered table-vcenter table-striped">
											<thead>
												<tr class="warning">
													<td width="5% text-center"><strong>Bil</strong></td>
													<td><strong>Nama Pemohon</strong></td>
													<td class="text-center"><strong>No. Pengenalan Pemohon</strong></td>
													<td><strong>Alamat</strong></td>
												</tr>
											</thead>
											<tbody>
												<?php 
												$al = 1;
												
												foreach($already_license as $ready)
												{
													if ( $al < 6 )
													{

														$dog = get_total_dog($ready->app_id);
														
														$dog_view = NULL;

														if(count($dog) > 0)
														{
															if( count($dog) > 1 )
															{
																
																	$dogfirst = get_dog_license($dog[0]->dog_id);
																	$dogsecond = get_dog_license($dog[1]->dog_id);
																	
																	//DOG FIRST
																	if(strlen($dogfirst[0]->license_no) == 1)
																		$dog1 = '0000'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 2)
																		$dog1 = '000'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 3)
																		$dog1 = '00'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 4)
																		$dog1 = '0'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 5)
																		$dog1 = $dogfirst[0]->license_no;

																	//DOG SECOND
																	if(strlen($dogsecond[0]->license_no) == 1)
																		$dog2 = '0000'.$dogsecond[0]->license_no;
																	elseif(strlen($dogsecond[0]->license_no) == 2)
																		$dog2 = '000'.$dogsecond[0]->license_no;
																	elseif(strlen($dogsecond[0]->license_no) == 3)
																		$dog2 = '00'.$dogsecond[0]->license_no;
																	elseif(strlen($dogsecond[0]->license_no) == 4)
																		$dog2 = '0'.$dogsecond[0]->license_no;
																	elseif(strlen($dogsecond[0]->license_no) == 5)
																		$dog2 = $dogsecond[0]->license_no;

																	$dog_view = $dog1."<br>".$dog2;
															}
															else
															{
																	$dogfirst = get_dog_license($dog[0]->dog_id);
																	
																	//DOG FIRST
																	if(strlen($dogfirst[0]->license_no) == 1)
																		$dog1 = '0000'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 2)
																		$dog1 = '000'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 3)
																		$dog1 = '00'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 4)
																		$dog1 = '0'.$dogfirst[0]->license_no;
																	elseif(strlen($dogfirst[0]->license_no) == 5)
																		$dog1 = $dogfirst[0]->license_no;

																	$dog_view = $dog1;
															}
														}
														
														$addr = get_address_by_addr_id($ready->addr_id);
														//$dog_view = NULL;

														echo "<tr>
																		<td class=\"text-center\">".$al."</td>
																		<td>".strtoupper(get_users_name($ready->addr_id))." </td>
																		<td class=\"text-center\">".get_users_ic($ready->addr_id)."</td>
																		<td>";
																			echo strtoupper($addr[0]->no_unit);
																			if($addr[0]->home_name)
																			echo ", ".strtoupper($addr[0]->home_name);
																			if($addr[0]->street_name)
																			echo ", ".strtoupper($addr[0]->street_name);
																			if($addr[0]->town_name)
																			echo ", ".strtoupper($addr[0]->town_name);
																			echo ", ".strtoupper(get_parlimen_name($addr[0]->parlimen)).", <br>".$addr[0]->postcode." KUALA LUMPUR.</td>
																	</tr>";
																	
														$al++;
													}
												}
												?>
											</tbody>
										</table>
										<?php 
										if ( $al == 6 )
											echo "<div class=\"text-right\"><a href=\"".base_url('admin')."/index.php/address_list\"><b>Semak Permohonan>></b></a></div>";
										?>
										</div>
										</small>
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