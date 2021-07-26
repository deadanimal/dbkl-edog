<script>
	function getUrlParameter(sParam) {
		var sPageURL = window.location.search.substring(1);
		var sURLVariables = sPageURL.split('&');
		for (var i = 0; i < sURLVariables.length; i++) {
			var sParameterName = sURLVariables[i].split('=');
			if (sParameterName[0] == sParam) {
				return sParameterName[1];
			}
		}
	}

	$(document).ready(function() {
		var act = getUrlParameter('action');

		if (act == "addr") {
			$("#first").removeClass("active");
			$("#second").addClass("active");

			$("#profile").removeClass("active");
			$("#address").addClass("active");
		}
	});
</script>
<!-- Page Title -->
<div class="media-container">
	<!-- Intro -->
	<section class="site-section site-section-light site-section-top">
		<div class="container text-center">
			<h1 class="animation-slideDown"><strong>Profile</strong></h1>
		</div>
	</section>
	<!-- END Intro -->

	<!-- For best results use an image with a resolution of 2560x279 pixels -->
	<img src="<?php echo base_url(); ?>img/placeholders/headers/login_header01.jpg" alt="" class="media-image animation-pulseSlow">
</div>
<!-- END Page Title -->
<?php
if (count($PROFILE) > 0) {
	$tab_disabled = "class=''";
	$data_toggle = "tabs";
} else {
	$tab_disabled = "class='disabled'";
	$data_toggle = "";
}
?>
<!-- Form Urus Profil -->
<section class="site-section site-content-single">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-9">
				<!-- Default Tabs -->
				<ul class="nav nav-pills nav-justified">
					<li class="active" id="first" data-toggle="tabs"><a href="#profile"><strong>1.Profile Details </strong><br><small>1. Butiran Pengenalan Diri</small></a></li>
					<li <?php echo $tab_disabled; ?> id="second" data-toggle="<?php echo $data_toggle; ?>"><a href="#address"><strong>2. Register Dog's Address</strong><br><small>2. Daftar Alamat Tempat Peliharaan</small></a></li>
				</ul>
				<div class="small-gap"></div>
				<div class="tab-content small-gap">
					<div class="tab-pane active" id="profile">
						<!-- User Details -->
						<form id="user-details" action="<?php echo base_url(); ?>index.php/manage_profile/save_profile" method="post" class="form-horizontal form-bordered">
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_username">Applicant Name / <small>Nama Pemohon</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<input type="text" disabled id="val_name_view" name="val_name_view" class="form-control" value="<?php echo $this->session->userdata('name'); ?>" required>
									<input type="hidden" id="val_name" name="val_name" value="<?php echo $this->session->userdata('name'); ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_resident">Nationality / <small>Kewarganegaraan</small></label>
								<div class="col-md-6">
									<?php
									$my = null;
									$ttp = null;
									$asg = null;
									$phone_no = null;

									if (count($PROFILE) > 0) {
										$phone_no = $PROFILE[0]->phone_no;
										if ($PROFILE[0]->citizenship == 'Malaysia')
											$my = 'checked';
										elseif ($PROFILE[0]->citizenship == 'Tetap')
											$ttp = 'checked';
										elseif ($PROFILE[0]->citizenship == 'Asing')
											$asg = 'checked';
									}
									?>
									<label class="radio-inline" for="example-inline-radio1">
										<input type="radio" <?php echo $my; ?> id="val_resident_my1" name="val_resident_my" value="Malaysia"> Malaysian / <small>Malaysia</small>
									</label><br>
									<label class="radio-inline" for="example-inline-radio2">
										<input type="radio" <?php echo $ttp; ?> id="val_resident_my2" name="val_resident_my" value="Tetap"> Permanent Resident / <small>Penduduk Tetap</small>
									</label><br>

									<label class="radio-inline" for="example-inline-radio2">
										<input type="radio" <?php echo $asg; ?> id="val_resident_my2" name="val_resident_my" value="Asing"> Foreigners / <small>Warga Asing</small>
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_resident">Identity Type / <small>Jenis Pengenalan</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<?php
									$ic = null;
									$army = null;
									$passport = null;

									if ($this->session->userdata('id_type') == 'IC') {
										$ic = 'checked';
									} elseif ($this->session->userdata('id_type') == 'ARMY') {
										$army = 'checked';
									} elseif ($this->session->userdata('id_type') == 'PASSPORT') {
										$passport = 'checked';
									}
									?>
									<input type="hidden" name="val_type_id" value="<?php echo $this->session->userdata('id_type'); ?>" />
									<label class="radio-inline" for="example-inline-radio1">
										<input type="radio" disabled <?php echo $ic; ?> id="val_type_id1" name="val_type_ids" value="IC"> IC No / <small>Kad Pengenalan</small>
									</label><br>
									<label class="radio-inline" for="example-inline-radio2">
										<input type="radio" disabled <?php echo $army; ?> id="val_type_id2" name="val_type_ids" value="ARMY"> Army/Police No. / <small>No. Tentera/Polis</small>
									</label><br>
									<label class="radio-inline" for="example-inline-radio2">
										<input type="radio" disabled <?php echo $passport; ?> id="val_type_id2" name="val_type_ids" value="PASSPORT	"> No. Passport / <small>No. Pasport</small>
									</label>
								</div>
								<div class="col-sm-6 col-sm-offset-4">
									<input type="text" disabled id="val_id_view" name="val_id_view" class="form-control" value="<?php echo $this->session->userdata('nric'); ?>" />
									<input type="hidden" name="val_ids" value="<?php echo $this->session->userdata('nric'); ?>" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="masked_phone">Mobile No. / <small>No. Telefon Bimbit</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<input type="text" id="masked_phone" name="masked_phone" class="form-control" placeholder="" value="<?php echo $phone_no; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_email">Email / <small>Emel</small> <span class="text-danger">*</span></label>
								<div class="col-md-6">
									<!-- <input type="hidden" name="val_email" value="<?php echo get_email_users($this->session->userdata('userid')); ?>" /> -->
									<input type="text" id="val_email" name="val_email" class="form-control" value="<?php echo get_email_users($this->session->userdata('userid')); ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="val_password">Update Password (if needed) / <br><small>Kata Laluan Baru (Sekiranya perlu)</small></label>
								<div class="col-md-6">
									<input type="password" id="val_password_view" name="val_password_view" class="form-control" value="" placeholder="">
								</div>
							</div>
							<div class="form-group form-actions">
								<div class="col-md-8 col-md-offset-4">
									<button type="reset" class="btn btn-square btn-sm btn-warning" id="add-dog" value="Padam"><i class="fa fa-repeat"></i> Delete / Padam</button>
									<button type="button" class="btn btn-square btn-sm btn-primary" id="update-profile" value="Simpan"><i class="fa fa-save"></i> Save / Simpan</button>
								</div>
							</div>
						</form>
					</div>

					<!-- Address Details -->
					<div class="tab-pane" id="address">
						<div class="site-block">
							<div class="table-responsive">
								<small>
									<table class="table table-striped table-vcenter table-bordered">
										<thead>
											<tr>
												<th>Address / <small>Alamat</small></th>
												<th class="text-center" width="30%">Action / <small>Tindakan</small></th>
											</tr>
										</thead>
										<tbody>
											<?php

											if ($PROFILE[0]->profile_id > 0)
												$info_address = get_address_users($PROFILE[0]->profile_id);
											else
												$info_address = 0;

											if (count($info_address) > 0) {
												$no = 1;
												foreach ($info_address as $row) {
													$addr = '';

													$addr .= $row->no_unit;
													if ($row->home_name)
														$addr .= ",&nbsp;" . ucwords(strtoupper($row->home_name));
													if ($row->street_name)
														$addr .= ",&nbsp;" . ucwords(strtoupper($row->street_name));
													if ($row->town_name != '')
														$addr .= ",&nbsp;" . ucwords(strtoupper($row->town_name));
													$addr .= ",&nbsp;" . ucwords(strtoupper(get_parlimen_name($row->parlimen))) . ",&nbsp" . $row->postcode . " KUALA LUMPUR";

													$totalLicense = get_available_license($row->addr_id);
													$appealTotal = get_available_appeal_license($row->addr_id);
													$totalDogAvai = get_license_quota($row->home_space);
													$homeType = get_home_type($row->home_type);

													if ($homeType[0]->doc == 0) {
														$totalDog = $totalLicense[0]->totalLicense;
														$totals = $totalLicense[0]->totalLicense;
														$totalQuota = $totalDogAvai;
													} else {
														$totals = $totalLicense[0]->totalLicense;
														$totalDog = 1;
														$totalQuota = 1;
														//$totalDogAvai = 1;
													}
													//echo $total;
													$totalAvailable = $totalQuota - $totals - $appealTotal[0]->totalLicenseAppeal;
													//echo $appealTotal[0]->totalLicenseAppeal;
													//echo $total;
													//echo $totalAvailable;
													echo "<tr>
																			<td>" . $addr . "</td>
																			<td class=\"text-center\">
																				<div class=\"btn-group btn-group-xs\">
																					<a href=\"javascript:void(0)\" data-toggle=\"modal\" onclick=\"view_address('" . $row->addr_id . "')\" title=\"View / Papar\" class=\"btn btn-info\"><i class=\"fa fa-eye\"></i>  </a>
																					<a href=\"javascript:void(0)\" data-toggle=\"modal\" onclick=\"edit_address('" . $row->addr_id . "')\" title=\"Update / Kemaskini\" class=\"btn btn-success\"><i class=\"fa fa-pencil\"></i></a>
																					<a href=\"javascript:void(0)\" data-toggle=\"modal\" onclick=\"del_address('" . $row->addr_id . "')\" title=\"Delete aaaa / Padam aaa\" class=\"btn btn-danger\"><i class=\"fa fa-times\"></i></a>
																				</div>&nbsp;";
													//echo $totals;
													if ($totalAvailable > 0) {
														//echo $totalQuota;
														echo "<div class=\"btn-group btn-group-xs\">
																					<a href=\"" . base_url() . "index.php/new_license_app/index/" . $row->addr_id . "\" title=\"Permohonan Lesen Baru\" class=\"btn btn-success\"><strong><i class=\"fa fa-file\"></i> Apply / Mohon</strong></a>
																				</div>";
													} elseif ($totalAvailable == 0) {
														//echo $totalQuota;
														echo "<div class=\"btn-group btn-group-xs\">
																					<a href=\"" . base_url() . "index.php/new_license_app/index/" . $row->addr_id . "\" title=\"Permohonan Lesen Baru\" disabled=\"disabled\" class=\"btn btn-success\"><strong><i class=\"fa fa-file\"></i> Apply / Mohon</strong></a>
																				</div>";
													}

													echo "</td>
																		</tr>";

													$no++;
												}
											} else {
												echo "<tr>
																		<td colspan=\"3\">Tiada alamat didaftarkan</td>
																	</tr>";
											}
											?>
											<tr>
												<td>
													<a href="#add-address" data-toggle="modal" title="" class="btn btn-md btn-primary btn-square" data-original-title="Tambah Alamat"><i class="fa fa-plus"></i> Register Dog's Address / Daftar Alamat</a></strong>
												</td>
												<td class="text-center">
													<div class="btn-group btn-group-xs">

													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</small>
							</div>
						</div>
					</div>
					<!-- END Form Buttons -->
					</form>
					<!-- END Wizard with Validation Content -->
				</div>
				<!-- END Wizard with Validation Block -->
			</div>

			<div class="col-md-3">
				<div class="site-block">

					<!-- <blockquote> -->
					<p>
						<strong>Hi,<?php echo $this->session->userdata('name'); ?></strong><br>
						User ID : <?php echo $this->session->userdata('nric'); ?><br>
						<a href="#" class="btn btn-sm btn-info"><strong>Change Password</strong></a>
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
			</div>
		</div>
	</div>
</section>
<!-- END Form Urus Profil -->

<!-- Modal Add Address -->
<div id="add-address" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Dog's Address <small>/ Alamat Tempat Peliharaan</small></h4>
			</div>
			<div class="modal-body">
				<form id="form-validation" action="<?php echo base_url(); ?>index.php/manage_profile/save_address" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-md-4 control-label" for="val_email">Address <small><br> Alamat </small><span class="text-danger">*</span></label>
						<div class="col-md-8">
							<input type="text" id="val_no_unit" name="val_no_unit" class="form-control" value="" placeholder="No.Rumah / No.Unit" required>
						</div>
						<div class="col-md-8  col-md-offset-4">
							<input type="text" id="val_name_house" name="val_name_house" class="form-control" value="" placeholder="Apartment/ Kondo / Taman / Kampung" required>
						</div>
						<div class="col-md-8  col-md-offset-4">
							<input type="text" id="val_street" name="val_street" class="form-control" placeholder="Jalan / Lorong" required>
						</div>

						<div class="col-md-8  col-md-offset-4">
							<input type="text" id="val_town" name="val_town" class="form-control" placeholder="Kawasan / Bandar" required>
						</div>
						<div class="col-md-8  col-md-offset-4">
							<input type="number" id="val_postcode" name="val_postcode" class="form-control" placeholder="Poskod" required>
						</div>
						<div class="col-md-8  col-md-offset-4">
							<select id="val_parlimen" name="val_parlimen" class="form-control" size="1">
								<option value="0">Choose parliament / Sila pilih parlimen</option>
								<?php
								foreach ($PARLIMEN as $PAR) {
									echo "<option value='" . $PAR->par_id . "'>" . $PAR->par_name . "</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="example-select">House Type <small><br> Jenis Rumah</small><span class="text-danger">*</span></label>
						<div class="col-md-8">
							<select id="val_house_type" name="val_house_type" class="form-control" size="1">
								<option value="0">Please choose house type / Sila pilih jenis rumah</option>
								<?php
								foreach ($HOUSE_TYPE as $HT) {
									echo "<option value='" . $HT->hid . "'>" . $HT->name . "</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="example-select">House Space <small><br> Keluasan Rumah</small><span class="text-danger">*</span></label>
						<div class="col-md-8">
							<select id="house_space" name="house_space" class="form-control" size="1">
								<option value="0">Please choose house space / Sila pilih keluasan rumah</option>
								<?php
								foreach ($HOUSE_SPACE as $HS) {
									echo "<option value='" . $HS->hsid . "'>" . $HS->name . "</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Dog House <small><br> Rumah Anjing</small></label>
						<div class="col-md-6">
							<label class="radio-inline" for="example-inline-radio1">
								<input type="radio" id="house_dog1" name="house_dog" value="1"> Exist / Ada
							</label>
							<label class="radio-inline" for="example-inline-radio2">
								<input type="radio" id="house_dog2" name="house_dog" value="0"> Not Exist / Tiada
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="masked_phone"> Bill Attachments / Lampiran Bil Utiliti </label>
						<div class="col-md-6">
							<input type="file" name="billAnjing">
						</div>
					</div>
					<!-- Form Buttons -->
					<div class="form-group form-actions">
						<div class="col-md-8 col-md-offset-4">
							<button type="reset" class="btn btn-square btn-sm btn-warning" id="add-dog" value="Padam"><i class="fa fa-repeat"></i> Delete / Padam</button>
							<button 	type="button" class="btn btn-square btn-sm btn-primary" id="add-address-new" value="Simpan"><i class="fa fa-save"></i> Save / Simpan</button>
						</div>
					</div>
					<!-- END Form Buttons -->
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END Modal Add Address -->

<!-- Modal Edit Address -->
<div id="edit-address" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Dog's Address <small> / Alamat Tempat Peliharaan</small></h4>
			</div>
			<div class="modal-body">
				<form id="form-validation-update" action="<?php echo base_url(); ?>index.php/manage_profile/update_address" method="post" class="form-horizontal form-bordered">
					<div class="form-group">
						<label class="col-md-4 control-label" for="val_email">Address <small><br>Alamat</small> <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="text" id="val_no_unit" name="val_no_unit" class="form-control" value="" placeholder="No.Rumah / No.Unit" required>
						</div>
						<div class="col-md-6  col-md-offset-4">
							<input type="text" id="val_name_house" name="val_name_house" class="form-control" value="" placeholder="Apartment/ Kondo / Taman / Kampung" required>
						</div>
						<div class="col-md-6  col-md-offset-4">
							<input type="text" id="val_street" name="val_street" class="form-control" placeholder="Jalan / Lorong" required>
						</div>

						<div class="col-md-6  col-md-offset-4">
							<input type="text" id="val_town" name="val_town" class="form-control" placeholder="Kawasan / Bandar" required>
						</div>
						<div class="col-md-6  col-md-offset-4">
							<input type="text" id="val_postcode" name="val_postcode" class="form-control" placeholder="Poskod" required>
						</div>
						<div class="col-md-6  col-md-offset-4">
							<select id="val_parlimen-upd" name="val_parlimen" class="form-control" size="1">
								<option value="0">Please choose parliament / Sila pilih parlimen</option>
								<?php
								foreach ($PARLIMEN as $PAR) {
									echo "<option value='" . $PAR->par_id . "'>" . $PAR->par_name . "</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="example-select">House Type <small><br>Jenis Rumah</small><span class="text-danger">*</span></label>
						<div class="col-md-6">
							<select id="val_house_type-upd" name="val_house_type" class="form-control" size="1">
								<option value="0">Please choose house type / Sila pilih jenis rumah</option>
								<?php
								foreach ($HOUSE_TYPE as $HT) {
									echo "<option value='" . $HT->hid . "'>" . $HT->name . "</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="example-select">House Space <small><br>Keluasan Rumah</small><span class="text-danger">*</span></label>
						<div class="col-md-6">
							<select id="house_space-upd" name="house_space" class="form-control" size="1">
								<option value="0">Please choose house space / Sila pilih keluasan rumah</option>
								<?php
								foreach ($HOUSE_SPACE as $HS) {
									echo "<option value='" . $HS->hsid . "'>" . $HS->name . "</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Dog's Address <small><br>Rumah Anjing</small></label>
						<div class="col-md-6">
							<label class="radio-inline" for="example-inline-radio1">
								<input type="radio" id="house_dog1" name="house_dog" value="1"> Exist / Ada
							</label>
							<label class="radio-inline" for="example-inline-radio2">
								<input type="radio" id="house_dog2" name="house_dog" value="0"> Not Exist / Tiada
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label">Lampiran Bil / Utilities Bill</label>
						<div class="col-md-6  col-md-offset-4">
							<span id="gambar_anjing"></span>

							<input type="file" name="billAnjing" /><br>
									Saiz gambar tidak melebihi 300Kb<br>
									<small>Maximum image size allowed is 300Kb</small>
						</div>

						</label>
					</div>
					
					<input type="hidden" name="addressID" id="addressID" value="" />
					<!-- Form Buttons -->
					<div class="form-group form-actions">
						<div class="col-md-8 col-md-offset-4">

							<button type="button" class="btn btn-square btn-sm btn-primary" id="update-dog" value="Kemaskini"><i class="fa fa-save"></i> Update / Kemaskini</button>
						</div>
					</div>
					<!-- END Form Buttons -->
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END Modal Edit Address -->

<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo base_url(); ?>js/pages/formsWizard.js"></script>
<script>
	$(function() {
		FormsWizard.init();
	});
</script>