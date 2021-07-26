<!-- Page Title -->
			<section class="site-heading site-section-top">
				<div class="header-section dashboard">
					<div class="container-fluid">
						<h1>Data Rujukan Sistem</h1>
					</div>
				</div>
			</section>
			<!-- END Page Title -->

            <!-- Content -->
            <section class="site-section site-content-single">
                <div class="container-fluid">
                    <div class="row">
					
						<div class="col-md-10">
							<!-- Datatables Content -->
							<div class="block bordered full">
								<!-- Block Tabs Title -->
								<div class="block-title">
									<ul class="nav nav-tabs" data-toggle="tabs">
										<li class="active"><a href="#tabs-parliament">Parlimen</a></li>
										<li><a href="#tabs-home">Jenis Rumah</a></li>
										<li><a href="#tabs-home-capacity">Keluasan Rumah</a></li>
										<li><a href="#tabs-dog-type">Jenis/Baka Anjing</a></li>
										<li><a href="#tabs-dog-weight">Berat Anjing</a></li>
										<li><a href="#tabs-reason">Sebab Tidak Perbaharui Anjing</a></li>
										<li><a href="#tabs-payment-counter">Kaunter Bayaran</a></li>
										<li><a href="#tabs-payment-mode">Mod Bayaran</a></li>
									</ul>
								</div>
								<!-- END Block Tabs Title -->
								
								<!-- Tabs Content -->
								<div class="tab-content">
									<!-- #tab-parliament -->
									<div class="tab-pane active" id="tabs-parliament">
										<div class="table-responsive">
										<form action="<?php echo base_url('admin');?>/index.php/data_reference/delete_parlimen" method="post" id="parlimen-table" enctype="multipart/form-data">
											<table class="table table-vcenter table-striped table-condensed table-bordered">
												<thead>
													<tr class="warning">
														<td class="col-md-3"><strong>Nama Parlimen</strong></td>
														<!--<td><strong>Kod Parlimen</strong></td>-->
														<td class="col-md-4"><strong>Deskripsi Data</strong></td>
														<td class="text-center"><strong>Status</strong></td>
														<td class="text-center"><strong>Tindakan</strong></td>
													</tr>
												</thead>
												<tbody>
													<?php 
														if( count( $parlimen ) > 0 )
														{
															$p = 1;
																foreach( $parlimen as $par )
																{
																		echo "<tr>
																						<td><input type=\"checkbox\" name=\"_par[]\" id=\"_par\" value=\"".$par->par_id."\"> ".get_parlimen_name($par->par_id)."</td>
																						<td>".$par->par_description."</td>
																						<td class=\"text-center\">".get_status( $par->par_status )."</td>
																						<td class=\"text-center\"><a href=\"#modal-parlimen-edit\" data-toggle=\"modal\" data-id=\"".$par->par_id."\"><strong>Semak / Kemaskini</strong></a></td>
																					</tr>";
																					
																	$p++;
																}
														}
													?>
												</tbody>
											</table>
											</form>
											<div class="text-center">
												<a href="#modal-parlimen" class="btn btn-square btn-success" data-toggle="modal">Tambah Parlimen</a>
												<a class="btn btn-square btn-success" id="delete-parlimen">Hapus Parlimen</a>
											</div>
										</div>
										
										<!-- Regular Modal 2 -->
										<div id="modal-parlimen" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Tambah Parlimen</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/new_parlimen" method="post" id="parlimen-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Nama Parlimen <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-parlimen" name="name-parlimen" class="form-control" placeholder="Name Parlimen">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Data <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-parlimen" name="deskripsi-parlimen" class="form-control" placeholder="Deskripsi Parlimen">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Status <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="status1">
																		<input type="radio" id="status1" name="status-parlimen" value="1"> Aktif
																	</label>
																	<label class="radio-inline" for="status2">
																		<input type="radio" id="status2" name="status-parlimen" value="0"> Tidak Aktif
																	</label>
																</div>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-sm btn-primary" id="parlimen-setting">Save changes</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 -->
										
										<!-- Regular Modal 2 Edit -->
										<div id="modal-parlimen-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Kemaskini Parlimen</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/edit_parlimen" method="post" id="parlimen-edit-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Nama Parlimen <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-parlimen" name="name-parlimen" class="form-control" placeholder="Name Parlimen">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Data <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-parlimen" name="deskripsi-parlimen" class="form-control" placeholder="Deskripsi Parlimen">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Status <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="status1">
																		<input type="radio" id="status1" name="status-parlimen" value="1"> Aktif
																	</label>
																	<label class="radio-inline" for="status2">
																		<input type="radio" id="status2" name="status-parlimen" value="0"> Tidak Aktif
																	</label>
																</div>
															</div>
															<input type="hidden" name="par_id" id="par_id" value="" />
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-sm btn-primary" id="parlimen-edit-setting">Update</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 Edit -->
										
									</div>
									
									<!-- #tab-user-home -->
									<div class="tab-pane" id="tabs-home">
										<div class="table-responsive">
										<form action="<?php echo base_url('admin');?>/index.php/data_reference/delete_house_type" method="post" id="house-type-table" enctype="multipart/form-data">
											<table class="table table-vcenter table-condensed table-bordered">
												<thead>
													<tr class="warning">
														<td><strong>Jenis Rumah</strong></td>
														<td class="text-center"><strong>Kod Rumah</strong></td>
														<td><strong>Deskripsi Data</strong></td>
														<td><strong>Status</strong></td>
														<td class="text-center"><strong>Tindakan</strong></td>
													</tr>
												</thead>
												<tbody>
													<?php 
													if( count($house_type) > 0 )
													{
															foreach( $house_type as $ht )
															{
																	echo "<tr>
																					<td><input type=\"checkbox\" name=\"_ht[]\" id=\"_ht\" value=\"".$ht->hid."\"> ".$ht->name."</a></td>
																					<td>".$ht->code."</td>
																					<td>".$ht->desc."</td>
																					<td class=\"text-center\">".get_status($ht->status)."</td>
																					<td class=\"text-center\"><a href=\"#modal-house-type-edit\" data-toggle=\"modal\" data-id=\"".$ht->hid."\"><strong>Semak / Kemaskini</strong></a></td>
																				</tr>";
															}
													}
													?>
													
													
												</tbody>
											</table>
											</form>
											<div class="text-center"><a href="#modal-house-type" class="btn btn-square btn-success " data-toggle="modal">Tambah Jenis Rumah</a>
											<a class="btn btn-square btn-success" id="delete-house-type">Hapus Jenis Rumah</a>
											</div>

										</div>
										
										<!-- Regular Modal 2 -->
										<div id="modal-house-type" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Tambah Jenis Rumah</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/new_house_type" method="post" id="house-type-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Jenis Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-house-type" name="name-house-type" class="form-control" placeholder="Jenis Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Kod Jenis Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="code-house-type" name="code-house-type" class="form-control col-sm-3" placeholder="Kod Jenis Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Jenis Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-house-type" name="deskripsi-house-type" class="form-control" placeholder="Deskripsi Jenis Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Dokumen Sokongan ? <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="doc1">
																		<input type="radio" id="doc1" name="doc-support" value="1"> Ya
																	</label>
																	<label class="radio-inline" for="doc2">
																		<input type="radio" id="doc2" name="doc-support" value="0"> Tidak
																	</label>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Status <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="status1">
																		<input type="radio" id="status1" name="status-house-type" value="1"> Aktif
																	</label>
																	<label class="radio-inline" for="status2">
																		<input type="radio" id="status2" name="status-house-type" value="0"> Tidak Aktif
																	</label>
																</div>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="house-type-setting">Simpan</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 -->
										
										<!-- Regular Modal 2 House Type Edit-->
										<div id="modal-house-type-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Kemaskini Jenis Rumah</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/update_house_type" method="post" id="house-type-edit-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Jenis Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-house-type" name="name-house-type" class="form-control" placeholder="Jenis Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Kod Jenis Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="code-house-type" name="code-house-type" class="form-control col-sm-3" placeholder="Kod Jenis Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Jenis Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-house-type" name="deskripsi-house-type" class="form-control" placeholder="Deskripsi Jenis Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Dokumen Sokongan ? <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="doc1">
																		<input type="radio" id="doc1" name="doc-support" value="1"> Ya
																	</label>
																	<label class="radio-inline" for="doc2">
																		<input type="radio" id="doc2" name="doc-support" value="0"> Tidak
																	</label>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Status <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="status1">
																		<input type="radio" id="status1" name="status-house-type" value="1"> Aktif
																	</label>
																	<label class="radio-inline" for="status2">
																		<input type="radio" id="status2" name="status-house-type" value="0"> Tidak Aktif
																	</label>
																</div>
															</div>
															<input type="hidden" name="hid" id="hid" value="" />
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="house-type-edit-setting">Kemaskini</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 House Type Edit-->
									</div>
									
									<!-- #tab-home-capacity -->
									<div class="tab-pane" id="tabs-home-capacity">
										<div class="table-responsive">
										<form action="<?php echo base_url('admin');?>/index.php/data_reference/delete_house_space" method="post" id="house-space-table" enctype="multipart/form-data">
											<table class="table table-vcenter table-condensed table-bordered">
												<thead>
													<tr class="warning">
														<td><strong>Luas Rumah</strong></td>
														<td class="text-center"><strong>Kod Luas</strong></td>
														<td><strong>Deskripsi Data</strong></td>
														<td class="text-center"><strong>Status</strong></td>
														<td class="text-center col-sm-1"><strong>Bil. Anjing Dibenarkan</strong></td>
														<td class="text-center"><strong>Tindakan</strong></td>
													</tr>
												</thead>
												<tbody>
													<?php 
													if( count($house_space) > 0 )
													{
														foreach($house_space as $hs)
														{
															echo "<tr>
																			<td><input type=\"checkbox\" name=\"_hs[]\" id=\"_hs\" value=\"".$hs->hsid."\"> ".$hs->name."</td>
																			<td class=\"text-center\">".$hs->code."</td>
																			<td>".$hs->desc."</td>
																			<td class=\"text-center\">".get_status($hs->status)."</td>
																			<td class=\"text-center\">".$hs->quota."</td>
																			<td class=\"text-center\"><a href=\"#modal-house-space-edit\" data-toggle=\"modal\" data-id=\"".$hs->hsid."\"><strong>Semak / Kemaskini</strong></a></td>
																		</tr>";
														}
													}
													?>
												</tbody>
											</table>
											</form>
											<div class="text-center">
												<a class="btn btn-square btn-success" href="#modal-house-space" data-toggle="modal">Tambah Keluasan Rumah</a>
												<a class="btn btn-square btn-success" id="delete-house-space">Hapus Keluasan Rumah</a>
											</div>
										</div>
										
										<!-- Regular Modal 2 House Space -->
										<div id="modal-house-space" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Tambah Keluasan Rumah</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/new_house_space" method="post" id="house-space-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Keluasan Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-house-space" name="name-house-space" class="form-control" placeholder="Keluasan Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Kod Keluasan Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="code-house-space" name="code-house-space" class="form-control col-sm-3" placeholder="Kod Keluasan Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Keluasan Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-house-space" name="deskripsi-house-space" class="form-control" placeholder="Deskripsi Keluasan Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Bilangan Anjing Dibenarkan ? <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="doc1">
																		<input type="radio" id="dog1" name="dog" value="1"> 1
																	</label>
																	<label class="radio-inline" for="doc2">
																		<input type="radio" id="dog2" name="dog" value="2"> 2
																	</label>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Status <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="status1">
																		<input type="radio" id="status1" name="status-house-space" value="1"> Aktif
																	</label>
																	<label class="radio-inline" for="status2">
																		<input type="radio" id="status2" name="status-house-space" value="0"> Tidak Aktif
																	</label>
																</div>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="house-space-setting">Simpan</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 House Space-->
										
										<!-- Regular Modal 2 House Space Edit-->
										<div id="modal-house-space-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Kemaskini Keluasan Rumah</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/update_house_space" method="post" id="house-space-edit-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Keluasan Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-house-space" name="name-house-space" class="form-control" placeholder="Keluasan Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Kod Keluasan Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="code-house-space" name="code-house-space" class="form-control col-sm-3" placeholder="Kod Keluasan Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Keluasan Rumah <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-house-space" name="deskripsi-house-space" class="form-control" placeholder="Deskripsi Keluasan Rumah">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Bilangan Anjing Dibenarkan ? <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="doc1">
																		<input type="radio" id="dog1" name="dog" value="1"> 1
																	</label>
																	<label class="radio-inline" for="doc2">
																		<input type="radio" id="dog2" name="dog" value="2"> 2
																	</label>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Status <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="status1">
																		<input type="radio" id="status1" name="status-house-space" value="1"> Aktif
																	</label>
																	<label class="radio-inline" for="status2">
																		<input type="radio" id="status2" name="status-house-space" value="0"> Tidak Aktif
																	</label>
																</div>
															</div>
															<input type="hidden" name="hsid" id="hsid" value="" />
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="house-space-edit-setting">Kemaskini</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 House Space Edit-->										
									</div>
									
									<!-- #tab-dog-type -->
									<div class="tab-pane" id="tabs-dog-type">
										<div class="table-responsive">
										<form action="<?php echo base_url('admin');?>/index.php/data_reference/delete_dog_list" method="post" id="dog-list-table" enctype="multipart/form-data">
											<table class="table table-vcenter table-condensed table-bordered">
												<thead>
													<tr class="warning">
														<td><strong>Nama Anjing</strong></td>
														<td class="text-center"><strong>Jenis Anjing</strong></td>
														<td class="text-center"><strong>Status</strong></td>
														<td class="text-center"><strong>Tindakan</strong></td>
													</tr>
												</thead>
												<tbody>
												<?php 
												foreach($dog_list as $dl)
												{
													echo "<tr>
															<td><input type=\"checkbox\" name=\"_dl[]\" id=\"_dl\" value=\"".$dl->ddid."\"> ".$dl->detail."</td>
															<td>".get_data($dl->dtid, 'dtid', 'dog_type', 'types')."</td>
															<td class=\"text-center\">".get_status($dl->status)."</td>
															<td class=\"text-center\"><a href=\"#modal-dog-list-edit\" data-toggle=\"modal\" data-id=\"".$dl->ddid."\"><strong>Semak / Kemaskini</strong></a></td>
														</tr>";
												}
												?>
												</tbody>
											</table>
											</form>
											<div class="text-center">
												<a class="btn btn-square btn-success" href="#modal-dog-list" data-toggle="modal">Tambah Jenis/Baka Anjing</a>
												<a class="btn btn-square btn-success" id="delete-dog-list">Hapus Jenis/Baka Anjing</a>
											</div>	
										</div>
										
										<!-- Regular Modal 2 Dog List -->
										<div id="modal-dog-list" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Tambah Jenis Anjing</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/new_dog_list" method="post" id="dog-list-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Nama Anjing <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-dog" name="name-dog" class="form-control" placeholder="Nama Anjing">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Jenis Anjing <font color="red">*</font></label>
																<div class="col-md-9">
																<?php 
																$dogType = get_dog_types();
																
																foreach($dogType as $dogtype)
																{
																	echo "<label class=\"radio-inline\">
																				<input type=\"radio\" id=\"dog-types\" name=\"dog-types\" value=\"".$dogtype->dtid."\"> ".$dogtype->types."
																			</label>";
																}
																?>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Status <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="status1">
																		<input type="radio" id="status1" name="status-dog" value="1"> Aktif
																	</label>
																	<label class="radio-inline" for="status2">
																		<input type="radio" id="status2" name="status-dog" value="0"> Tidak Aktif
																	</label>
																</div>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="dog-list-setting">Simpan</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 Dog List-->
										
										<!-- Regular Modal 2 Dog List Edit-->
										<div id="modal-dog-list-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Kemaskini Jenis Anjing</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/update_dog_list" method="post" id="dog-list-edit-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Nama Anjing <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-dog" name="name-dog" class="form-control" placeholder="Nama Anjing">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Jenis Anjing <font color="red">*</font></label>
																<div class="col-md-9">
																<?php 
																$dogType = get_dog_types();
																
																foreach($dogType as $dogtype)
																{
																	echo "<label class=\"radio-inline\">
																				<input type=\"radio\" id=\"dog-types".$dogtype->dtid."\" name=\"dog-types\" value=\"".$dogtype->dtid."\"> ".$dogtype->types."
																			</label>";
																}
																?>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-email-input">Status <font color="red">*</font></label>
																<div class="col-md-9">
																	<label class="radio-inline" for="status1">
																		<input type="radio" id="status1" name="status-dog" value="1"> Aktif
																	</label>
																	<label class="radio-inline" for="status2">
																		<input type="radio" id="status2" name="status-dog" value="0"> Tidak Aktif
																	</label>
																</div>
															</div>
															<input type="hidden" name="ddid" id="ddid" value="" />
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="dog-list-edit-setting">Kemaskini</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 Dog List Edit-->
										
									</div>
									
									<!-- #tab-dog-weight -->
									<div class="tab-pane" id="tabs-dog-weight">
										<div class="table-responsive">
										<form action="<?php echo base_url('admin');?>/index.php/data_reference/delete_dog_weight" method="post" id="dog-weight-table" enctype="multipart/form-data">
											<table class="table table-vcenter table-condensed table-bordered">
												<thead>
													<tr class="warning">
														<td><strong>Berat Anjing</strong></td>
														<td><strong>Deskripsi Berat Anjing</strong></td>
														<td class="text-center"><strong>Tindakan</strong></td>
													</tr>
												</thead>
												<tbody>
												<?php 
												foreach($dog_weight as $dw)
												{
													echo "<tr>
																<td><input type=\"checkbox\" name=\"_dw[]\" id=\"_dw\" value=\"".$dw->dwid."\"> ".$dw->dog_weight."</td>
																<td>".$dw->desc."</td>
																<td class=\"text-center\"><a href=\"#modal-dog-weight-edit\" data-toggle=\"modal\" data-id=\"".$dw->dwid."\"><strong>Semak / Kemaskini</strong></a></td>
															</tr>";
												}
												?>
												</tbody>
											</table>
											</form>
											<div class="text-center">
												<a class="btn btn-square btn-success" data-toggle="modal" href="#modal-dog-weight">Tambah Berat Anjing</a>
												<a class="btn btn-square btn-success" id="delete-dog-weight">Hapus Berat Anjing</a>
											</div>
										</div>
										
										<!-- Regular Modal 2 Dog Weight -->
										<div id="modal-dog-weight" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Tambah Berat Anjing</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/new_dog_weight" method="post" id="dog-weight-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Berat Anjing <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-dog-weight" name="name-dog-weight" class="form-control" placeholder="Berat Anjing">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Berat Anjing <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-dog-weight" name="deskripsi-dog-weight" class="form-control" placeholder="Deskripsi Berat Anjing">
																</div>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="dog-weight-setting">Simpan</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 Dog Weight-->
										
										<!-- Regular Modal 2 Dog Weight Edit-->
										<div id="modal-dog-weight-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Tambah Berat Anjing</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/update_dog_weight" method="post" id="dog-weight-edit-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Berat Anjing <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-dog-weight" name="name-dog-weight" class="form-control" placeholder="Berat Anjing">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Berat Anjing <font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-dog-weight" name="deskripsi-dog-weight" class="form-control" placeholder="Deskripsi Berat Anjing">
																</div>
															</div>
															<input type="hidden" name="dwid" id="dwid" value="" />
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="dog-weight-edit-setting">Simpan</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 Dog Weight Edit-->
									</div>
									
									<!-- #tab-reason -->
									<div class="tab-pane" id="tabs-reason">
										<div class="table-responsive">
										<form action="<?php echo base_url('admin');?>/index.php/data_reference/delete_dog_reason" method="post" id="dog-reason-table" enctype="multipart/form-data">
											<table class="table table-vcenter table-condensed table-bordered">
												<thead>
													<tr class="warning">
														<td class="col-sm-5"><strong>Sebab</strong></td>
														<td><strong>Deskripsi Data</strong></td>
														<td class="col-sm-2"><strong>Tindakan</strong></td>
													</tr>
												</thead>
												<tbody>
												<?php 
													foreach($reason as $rsn)
													{
														echo "<tr>
																<td><input type=\"checkbox\" name=\"_rn[]\" id=\"_rn\" value=\"".$rsn->reason_id."\"> ".$rsn->reason."</td>
																<td>".$rsn->desc."</td>
																<td class=\"text-center\"><a href=\"#modal-dog-reason-edit\" data-toggle=\"modal\" data-id=\"".$rsn->reason_id."\"><strong>Semak / Kemaskini</strong></a></td>
															</tr>";
													}
												?>
												</tbody>
											</table>
											</form>
											<div class="text-center">
												<a class="btn btn-square btn-success" data-toggle="modal" href="#modal-dog-reason">Tambah Sebab</a>
												<a class="btn btn-square btn-success" id="delete-dog-reason">Buang Sebab</a>
											</div>
										</div>
										
										<!-- Regular Modal 2 Dog Reason -->
										<div id="modal-dog-reason" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Tambah Sebab Tidak Perbaharui Anjing</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/new_dog_reason" method="post" id="dog-reason-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Sebab<font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-dog-reason" name="name-dog-reason" class="form-control" placeholder="Sebab Tidak Perbaharui Anjing">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Sebab<font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-dog-reason" name="deskripsi-dog-reason" class="form-control" placeholder="Deskripsi Sebab Tidak Perbaharui">
																</div>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="dog-reason-setting">Simpan</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 Dog Reason-->
										
										<!-- Regular Modal 2 Dog Reason Edit-->
										<div id="modal-dog-reason-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Kemaskini Sebab Tidak Perbaharui Anjing</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/update_dog_reason" method="post" id="dog-reason-edit-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Sebab<font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-dog-reason" name="name-dog-reason" class="form-control" placeholder="Sebab Tidak Perbaharui Anjing">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Sebab<font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-dog-reason" name="deskripsi-dog-reason" class="form-control" placeholder="Deskripsi Sebab Tidak Perbaharui">
																</div>
															</div>
															<input type="hidden" name="reason_id" id="reason_id" value="" />
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="dog-reason-edit-setting">Kemaskini</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 Dog Reason Edit-->
									</div>
									
									<!-- #tab-payment-counter -->
									<div class="tab-pane" id="tabs-payment-counter">
										<div class="table-responsive">
										<form action="<?php echo base_url('admin');?>/index.php/data_reference/delete_pay_counter" method="post" id="pay-counter-table" enctype="multipart/form-data">
											<table class="table table-vcenter table-condensed table-bordered">
												<thead>
													<tr class="warning">
														<td><strong>Kaunter Bayaran</strong></td>
														<td><strong>Deskripsi Data</strong></td>
														<td class="col-sm-3"><strong>Tindakan</strong></td>
													</tr>
												</thead>
												<tbody>
												<?php 
												 foreach($place as $plc)
												 {
													 echo "<tr>
																<td><input type=\"checkbox\" name=\"_pc[]\" id=\"_pc\" value=\"".$plc->place_id."\"> ".$plc->place_name."</td>
																<td>".$plc->place_description."</td>
																<td><a href=\"#modal-pay-counter-edit\" data-toggle=\"modal\" data-id=\"".$plc->place_id."\"><strong>Semak / Kemaskini</strong></a></td>
															</tr>";
												 }			
												?>
												</tbody>
											</table>
											</form>
											<div class="text-center">
												<a class="btn btn-square btn-success" data-toggle="modal" href="#modal-pay-counter">Tambah Kaunter Bayaran</a>
												<a class="btn btn-square btn-success" id="delete-pay-counter">Buang Kaunter Bayaran</a>
											</div>
										</div>
										
										<!-- Regular Modal 2 Pay Counter -->
										<div id="modal-pay-counter" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Tambah Kaunter Bayaran</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/new_pay_counter" method="post" id="pay-counter-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Kaunter Bayaran<font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-pay-counter" name="name-pay-counter" class="form-control" placeholder="Kaunter Bayaran">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Kaunter Bayaran<font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-pay-counter" name="deskripsi-pay-counter" class="form-control" placeholder="Deskripsi Kaunter Bayaran">
																</div>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="pay-counter-setting">Simpan</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 Pay Counter -->
										
										<!-- Regular Modal 2 Pay Counter Edit-->
										<div id="modal-pay-counter-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header text-center">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h3 class="modal-title"><i class="fa fa-pencil"></i> Kemaskini Kaunter Bayaran</h3>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('admin');?>/index.php/data_reference/update_pay_counter" method="post" id="pay-counter-edit-form" enctype="multipart/form-data" class="form-horizontal form-bordered">
															<div class="form-group">
																<label class="col-md-3 control-label">Kaunter Bayaran<font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="name-pay-counter" name="name-pay-counter" class="form-control" placeholder="Kaunter Bayaran">
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label" for="example-text-input">Deskripsi Kaunter Bayaran<font color="red">*</font></label>
																<div class="col-md-9">
																	<input type="text" id="deskripsi-pay-counter" name="deskripsi-pay-counter" class="form-control" placeholder="Deskripsi Kaunter Bayaran">
																</div>
															</div>
															<input type="hidden" name="place_id" id="place_id" value="" />
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-sm btn-primary" id="pay-counter-edit-setting">Kemaskini</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Regular Modal 2 Pay Counter Edit-->
									</div>
									
									<!-- #tab-payment-mode -->
									<div class="tab-pane" id="tabs-payment-mode">
										<p class="text-center">Hanya bayaran TUNAI buat masa sekarang.</p>
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
        <script>$(function(){ TablesDatatables.init(); });</script>