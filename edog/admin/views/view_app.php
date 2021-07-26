<style>
.text-dark {
	color:#343A40;
}
</style>
<!-- Page Title -->
<section class="site-heading site-section-top">
	<div class="header-section dashboard">
		<div class="container-fluid">
			<h1>Status Permohonan</h1>
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
							<li><a href="#tabs-action">Status</a></li>
							<li><a href="#tabs-reject">Pembatalan Lesen</a></li>
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
												<p class="form-control-static"><?php echo $info[0]->name; ?></p>

											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="val_resident">Kewarganegaraan </label>
											<div class="col-md-6">
												<p class="form-control-static"><?php echo $info[0]->citizenship; ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="val_resident">Jenis Pengenalan </label>
											<div class="col-md-6">
												<p class="form-control-static">
													<?php
													if ($info[0]->identity_type == 'IC') {
														echo "Kad Pengenalan";
													} elseif ($info[0]->identity_type == 'ARMY') {
														echo "No. Polis / Tentera";
													} elseif ($info[0]->identity_type == 'PASSPORT') {
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
												<p class="form-control-static"><?php echo $info[0]->email; ?></p>
											</div>
										</div>

									</div>

									<div class="col-sm-6">
										<h4 class="sub-header">Alamat Tempat Peliharaan</h4>
										<div class="form-group">
											<label class="col-md-4 control-label" for="val_username">Alamat </label>
											<div class="col-md-6">
												<p class="form-control-static"><?php echo strtoupper($info[0]->no_unit . ", " . ucwords(strtolower($info[0]->home_name)) . ", " . ucwords(strtolower($info[0]->street_name)) . ", " . ucwords(strtolower($info[0]->town_name)) . ", " . ucwords(strtolower(get_parlimen_name($info[0]->parlimen))) . ", " . $info[0]->postcode . " Kuala Lumpur"); ?></p>
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
													if ($info[0]->dog_house == 1)
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

													if ($info[0]->doc_support == "") {
														echo "Tidak diperlukan";
													} else {
														$dc = explode('|', $info[0]->doc_support);

														for ($i = 0; $i < count($dc); $i++) {
															$no = $i + 1;

															if ($dc[$i] != '')
																echo $no . " . <a href=\"" . base_url() . "doc/support/" . $dc[$i] . "\" download>" . $dc[$i] . "</a><br>";
														}
													}
													?>
												</p>
											</div>
										</div>
									</div>
								</form>
							</div>
							<?php
							$dog = get_dog_detail($info[0]->app_id);
							?>
						</div>
						<div class="tab-pane" id="tabs-dog-details">
							<div class="row">
								<!-- Butiran Anjing #1 -->
								<div class="col-sm-6">
									<h4 class="sub-header">Butiran Anjing Peliharaan <strong>#1</strong></h4>
									<div class="block">
										<!-- Form Anjing #1 Content -->
										<form action="<?php echo base_url('admin'); ?>/index.php/view_app/save_comment" id="dog-one" method="post" class="form-horizontal form-bordered">
											<div class="form-group">
												<?php
												if ($info[0]->status == 'Lulus') {
													$license = get_dog_license($dog[0]->dog_id);

													if (strlen($license[0]->license_no) == 1)
														$dog1 = '0000' . $license[0]->license_no;
													elseif (strlen($license[0]->license_no) == 2)
														$dog1 = '000' . $license[0]->license_no;
													elseif (strlen($license[0]->license_no) == 3)
														$dog1 = '00' . $license[0]->license_no;
													elseif (strlen($license[0]->license_no) == 4)
														$dog1 = '0' . $license[0]->license_no;
													elseif (strlen($license[0]->license_no) == 5)
														$dog1 = $license[0]->license_no;


												?>
													<label class="col-md-4 control-label" for="val_username">No Lencana </label>
													<div class="col-md-6">
														<input type="text" id="val_lencana" name="val_lencana" class="form-control" value="<?php echo $dog1; ?>" placeholder="Masukkan No. Lencana.." required>
													</div>
												<?php
												}
												?>
												<label class="col-md-4 control-label" for="val_username">Jenis / Baka </label>
												<div class="col-md-6">
													<p class="form-control-static"><?php echo get_dog_name($dog[0]->dog_type); ?></p>
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
													<p class="form-control-static"><?php echo get_dogs_weight($dog[0]->weight); ?></p>
												</div>

												<label class="col-md-4 control-label">Pemandulan</label>
												<div class="col-md-6">
													<p class="form-control-static">
														<?php
														if ($dog[0]->sterilization == 1)
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
														if ($dog[0]->owner_training == 1)
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
														if ($dog[0]->dog_training == 1)
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
														if ($dog[0]->dog_pic == "") {
															echo "<img src='" . base_url() . "images/no_picture.gif' width=\"100\" height=\"100\">";
														} else {
															echo "<img src=" . base_url() . $dog[0]->dog_pic . " width=\"100\" height=\"100\">";
														}
														?>
													</p>
												</div>
												<?php
												if ($dog[0]->status == "Invalid") {
												?>
													<label class="col-md-4 control-label">Status</label>
													<div class="col-md-7">
														<p class="form-control-static">
															<?php echo get_reason_admin_by_id($dog[0]->reason); ?>
														</p>
													</div>
												<?php } ?>
												<?php
												if ($info[0]->status == "Lulus") {
												?>
													<label class="col-md-4 control-label">Ulasan</label>
													<div class="col-md-8">
														<?php
														$comm = get_dog_comment($dog[0]->dog_id);
														if (count($comm) > 0) {
															$no = 1;
															foreach ($comm as $com) {
																echo "<p class=\"form-control-static\">" . $no . ". " . $com->comment . "</p>";
																$no++;
															}
														}

														?>
														<textarea name="comment" class="form-control" rows="5" cols="20" placeholder="Isikan ulasan anda"></textarea>
													</div>
												<?php
												}
												?>
											</div>

											<?php
											if ($info[0]->status == "Lulus") {
											?>
												<div>
													<div class="text-right"><button type="button" id="comment-update-dog1" class="btn btn-success btn-sm">Kemaskini</button></div>
												</div>
												<input type="hidden" name="dog-id" value="<?php echo $dog[0]->dog_id; ?>" />
											<?php  } ?>
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
										if (count($dog) > 1) {
										?>
											<!-- Form Anjing #2 Content -->
											<form action="<?php echo base_url('admin'); ?>/index.php/view_app/save_comment" id="dog-two" method="post" class="form-horizontal form-bordered">
												<div class="form-group">
													<?php
													if ($info[0]->status == 'Lulus') {
														$license = get_dog_license($dog[1]->dog_id);

														if (strlen($license[0]->license_no) == 1)
															$dog2 = '0000' . $license[0]->license_no;
														elseif (strlen($license[0]->license_no) == 2)
															$dog2 = '000' . $license[0]->license_no;
														elseif (strlen($license[0]->license_no) == 3)
															$dog2 = '00' . $license[0]->license_no;
														elseif (strlen($license[0]->license_no) == 4)
															$dog2 = '0' . $license[0]->license_no;
														elseif (strlen($license[0]->license_no) == 5)
															$dog2 = $license[0]->license_no;
													?>
														<label class="col-md-4 control-label" for="val_username">No Lencana </label>
														<div class="col-md-6">
															<input type="text" id="val_lencana" name="val_lencana" class="form-control" value="<?php echo $dog2; ?>" placeholder="Masukkan No. Lencana.." required>
														</div>
													<?php
													}
													?>
													<label class="col-md-4 control-label" for="val_username">Jenis / Baka </label>
													<div class="col-md-6">
														<p class="form-control-static"><?php echo get_dog_name($dog[1]->dog_type); ?></p>
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
														<p class="form-control-static"><?php echo get_dogs_weight($dog[1]->weight); ?></p>
													</div>

													<label class="col-md-4 control-label">Pemandulan</label>
													<div class="col-md-6">
														<p class="form-control-static">
															<?php
															if ($dog[1]->sterilization == 1)
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
															if ($dog[1]->owner_training == 1)
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
															if ($dog[1]->dog_training == 1)
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
															if ($dog[0]->dog_pic == "") {
																echo "<img src='" . base_url() . "images/no_picture.gif' width=\"100\" height=\"100\">";
															} else {
																echo "<img src=" . base_url() . $dog[1]->dog_pic . " width=\"100\" height=\"100\">";
															}
															?>
														</p>
													</div>
													<?php
													if ($info[0]->status == "Lulus") {
													?>
														<label class="col-md-4 control-label">Ulasan</label>
														<div class="col-md-8">
															<?php
															$comm = get_dog_comment($dog[1]->dog_id);
															if (count($comm) > 0) {
																$no = 1;
																foreach ($comm as $com) {
																	echo "<p class=\"form-control-static\">" . $no . ". " . $com->comment . "</p>";
																	$no++;
																}
															}

															?>
															<textarea name="comment" class="form-control" rows="5" cols="20" placeholder="Isikan ulasan anda"></textarea>
														</div>

														<div>
															<div class="text-right"><button type="button" id="comment-update-dog2" class="btn btn-success btn-sm">Kemaskini</button></div>
														</div>
														<input type="hidden" name="dog-id" value="<?php echo $dog[1]->dog_id; ?>" />
													<?php
													}
													?>
												</div>

											</form>
											<!-- END Form Anjing #2 Content -->
										<?php
										} else {
											echo "<b>Tidak didaftarkan</b>";
										}
										?>
									</div>
								</div>
							</div>
							<!-- END Butiran Anjing #2 -->
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
										<div class="form-group">
											<label class="col-md-6 control-label left">Status Permohonan</label>
											<div class="col-md-4">
												<?php
												if ($info[0]->app_type == 'BARU' || $info[0]->app_type == 'RENEW') {
													echo $info[0]->status;
												} else {
													echo "Tidak diperbaharui";
												}
												?>
											</div>
										</div>

										<!-- END Status Permohonan -->
									</div>
									<?php
									if ($info[0]->status == "Lulus") {
										$payment = get_data_payment($info[0]->app_id);
										$counter = get_counter_payment($payment[0]->counter);
										$mode = get_mode_payment($payment[0]->mode);
									?>
										<div class="block">
											<div class="form-group">
												<label class="col-md-6 control-label left">Tarikh Lesen Mula</label>
												<div class="col-md-4">
													<?php
													echo date('d/m/Y', strtotime($info[0]->date_start));
													?>
												</div>
											</div>
										</div>
										<div class="block">
											<div class="form-group">
												<label class="col-md-6 control-label left">Tarikh Permohonan Diterima</label>
												<div class="col-md-4">
													<?php
													echo date('d/m/Y', strtotime($info[0]->date_apply));
													?>
												</div>
											</div>
										</div>
										<div class="block">
											<div class="form-group">
												<label class="col-md-6 control-label left">Tarikh Bayaran Diterima</label>
												<div class="col-md-4">
													<?php
													echo date('d/m/Y', strtotime($payment[0]->date_payment));
													?>
												</div>
											</div>
										</div>
										<div class="block">
											<div class="form-group">
												<label class="col-md-6 control-label left">Kaunter Bayaran</label>
												<div class="col-md-4">
													<?php
													echo $counter[0]->place_name;
													?>
												</div>
											</div>
										</div>
										<div class="block">
											<div class="form-group">
												<label class="col-md-6 control-label left">Mod Bayaran</label>
												<div class="col-md-4">
													<?php
													echo $mode[0]->mode_name;
													?>
												</div>
											</div>
										</div>
										<div class="block">
											<div class="form-group">
												<label class="col-md-6 control-label left">Jumlah Bayaran (RM)</label>
												<div class="col-md-4">
													<input type="text" id="payment-val" name="payment-val" class="form-control" value="<?php echo number_format($payment[0]->amount, 2, '.', ','); ?>" />
												</div>
											</div>
										</div>
										<div class="block">
											<div class="form-group">
												<label class="col-md-6 control-label left">No Resit</label>
												<div class="col-md-4">
													<input type="text" id="no-receipt" name="no-receipt" class="form-control" value="<?php echo $payment[0]->receipt; ?>" placeholder="Masukkan No. Lencana.." required>
												</div>
											</div>
										</div>
										<div class="block">
											<div class="form-group">
												<div class="col-md-10">
													<div class="text-right"><button type="button" id="update-receipt-no" class="btn btn-success btn-sm">Kemaskini</button></div>
												</div>
											</div>
										</div>
										<input type="hidden" name="app-id" id="app-id" value="<?php echo $info[0]->app_id; ?>" />
									<?php
									}
									?>
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
													if (count($history) > 0) {
														foreach ($history as $his) {
															$staff = get_users_by_userid($his->staff_id);
															if (count($staff) > 0) {
																$staff_name = $staff[0]->name;
															} else {
																$staff_name = "Sistem";
															}

															echo "<tr>
																							<td>" . date('d/m/Y', strtotime($his->date_history)) . "</td>
																							<td><span class=\"label btn-info\"> " . $his->status . "</span></td>
																							<td>" . $his->description . "</td>
																							<td>" . $staff_name . "</td>
																						</tr>";
														}
													} else {
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
						</div>
						<?php
						$dog = get_dog_detail($info[0]->app_id);
						?>
						<div class="tab-pane" id="tabs-reject">
							<div class="row">
								<!-- <form id="user-details" action="page_forms_wizard.html" method="post" class="form-horizontal"> -->
									<div class="col-sm-6">
										<h4 class="sub-header">Profil Pemohon</h4>
										<div class="form-group">
											<label class="col-md-4 control-label" for="val_username">Nama Pemohon </label>
											<div class="col-md-6">
												<p class="form-control-static"><?php echo $info[0]->name; ?></p>

											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="val_username">Alamat </label>
											<div class="col-md-6">
												<p class="form-control-static"><?php echo strtoupper($info[0]->no_unit . ", " . ucwords(strtolower($info[0]->home_name)) . ", " . ucwords(strtolower($info[0]->street_name)) . ", " . ucwords(strtolower($info[0]->town_name)) . ", " . ucwords(strtolower(get_parlimen_name($info[0]->parlimen))) . ", " . $info[0]->postcode . " Kuala Lumpur"); ?></p>
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
												<p class="form-control-static"><?php echo $info[0]->email; ?></p>
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
													?>
														<a href="<?php echo base_url() . $pic_dog; ?>" target="_blank">
														<img src="<?php echo base_url() . $pic_dog; ?>" width="100" height="100">
														</a>
													<?php
													}
													?>
												</p>
											</div>
										</div>
									</div>
									<?php if($doc_cancel == 0){ ?>
									<div class="col-sm-6">
										<h4 class="sub-header">Pembatalan Lesen</h4>
										
										<div class="row">
											<div class="col-md-12">
											
												<form action="<?php echo base_url('admin'); ?>/index.php/validate_apps/batalLesen" enctype="multipart/form-data" method="post">
													<div class="form-group row">
														<label class="col-md-4 control-label" for="val_resident">Catatan</label>
														<div class="col-md-6">
															<textarea name="commentBatal" class="form-control" rows="5" cols="20" placeholder="Isikan ulasan anda"></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 control-label" for="example-file-input">Attachment</label>
														<div class="col-md-7">
															<p>
																Pilih Fail Untuk Dimuat Masuk:
																<!-- <input type="file" name="gambarAnjing" /> -->
																<input type="file" name="gambarAnjing[]" multiple>
															</p>
														</div>
														<?php $pembatalan_id = $info[0]->app_id; ?>
														<input type="hidden" name="app_id" value="<?php echo $pembatalan_id; ?>" />
													</div>
													
													<div class="row text-right">
														<button class="btn btn-info" type="submit" name="submit" onclick="return confirm('Batal Lesen ?')">
															<i class="fa fa-save pr-2"></i> Simpan 
														</button>
													</div>
												</form>

											</div>
										</div>

										<div class="text-center">
										</div>
									</div>
									<?php }else{ ?>
									<div class="col-sm-6">
										<h4 class="sub-header">Pembatalan Lesen</h4>										
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-4 control-label" for="val_email">Catatan Pembatalan Lesen </label>
													<div class="col-md-6">
														<p class="form-control-static"><?php echo ucwords ($info[0]->catatan); ?></p>
													</div>

													<div class="form-group">	
													<label class="col-md-12 control-label" for="val_email">Lampiran </label>
													<?php 
													foreach($doc_cancel as $key => $val){
														$file_format = explode('.',$val->filename);
														$file_format = $file_format[1];
														if( in_array($file_format,array("docx","doc","pdf","DOCX","DOC","PDF") ) ){
															echo "<div class='col-md-6'>";
															echo "<a href='".base_url().$val->filename."' target='_blank'><i class='fa fa-file fa-5x text-dark pt-4 mt-4'></i>";
															echo "</a>";
															echo "</div>";
														}else{
															echo "<div class='col-md-6'>";
															echo "<a href='".base_url().$val->filename."' target='_blank'>";
															echo "<img src=".base_url().$val->filename." width=\"100%\" height=\"200\">";
															echo "</a>";
															echo "</div>";
														}
													} ?>
												</div>
												
											</div>
										</div>

										<div class="text-center">
										</div>
									</div>
									<?php } ?>
								<!-- </form> -->
							</div>
							<?php
							$dog = get_dog_detail($info[0]->app_id);
							?>
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
<script src="<?php echo base_url(); ?>js/pages/tablesDatatables.js"></script>
<script>
	$(function() {
		TablesDatatables.init();
	});
</script>