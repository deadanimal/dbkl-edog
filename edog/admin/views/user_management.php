
<!-- Page Title -->
			<section class="site-heading site-section-top">
				<div class="header-section dashboard">
					<div class="container-fluid">
						<h1>Pengurusan Pengguna</h1>
					</div>
				</div>
			</section>
			<!-- END Page Title -->

            <!-- Content -->
            <section class="site-section site-content-single">
                <div class="container-fluid">
                    <div class="row">
					
						<div class="col-md-12">
							<!-- Datatables Content -->
							<div class="block bordered full">
								<!-- Block Tabs Title -->
								<div class="block-title">
									<ul class="nav nav-tabs" data-toggle="tabs">
										<li class="active"><a href="#tabs-user-portal">Urus Pengguna Portal</a></li>
										<?php if( $this->session->userdata('roles') == 3 ){?>
										<li><a href="#tabs-user-admin">Tambah Pengguna Admin</a></li>
									<?php } ?>
									</ul>
								</div>
								<!-- END Block Tabs Title -->
								
								<!-- Tabs Content -->
								<div class="tab-content">
									<!-- #tab-user-portal -->
									<div class="tab-pane active" id="tabs-user-portal">
									    <small>
									    <form action="<?php echo base_url('admin'); ?>/index.php/user_management/index" name="search-form" id="search-form" method="get">
									    	<div class="col-md-3">
										    	<strong>Carian : </strong><br><br>
											    <div class="input-group">
												   <input type="text" name="search-data" class="form-control">
												   <span class="input-group-btn">
												        <button class="btn btn-info search-user-btn" type="button"><i class="fa fa-search"></i> Cari</button>
												   </span>
												</div>
												 <br><br>
										    </div>
									    </form>
										<div class="table-responsive ">
											<table class="table table-vcenter table-condensed table-bordered">
												<thead>
													<tr class="warning">
														<td class="text-center"><strong>Bil.</strong></td>
														<td><strong>Nama Pemohon</strong></td>
														<td><strong>ID Pengguna</strong></td>
														<td><strong>Status</strong></td>
														<td><strong>Peranan Pengguna</strong></td>
														<td class="text-center"><strong>Tindakan</strong></td>
													</tr>
												</thead>
												<tbody>
													<?php
													$user = 1;
													foreach($users as $row)
													{
														if ( $row->status == 1 )
														{
															$stat = "Aktif";
															$class_active = "selected";
														}
														else
														{
															$stat = "Tidak Aktif";
															$class_disactive = "selected";
														}
														
														if( $row->roles == 1 )	
														 	echo "<tr class=\"info\">";
														else if( $row->roles == 3 )
															echo "<tr class=\"success\">";
														else
															echo "<tr class=\"active\">";
														 
															echo "<td class=\"text-center\">".$user."</td>
																		<td><a href=\"#\" id=\"modal-user\" onclick=\"user_setting(".$row->uid.")\" data-toggle=\"modal\"><strong>".$row->name."</strong></a></td>
																		<td>".$row->username."</td>
																		<td>".$stat."</td>
																		<td>".get_name_roles($row->roles)."</td>
																		<td class=\"text-center\">
																			<select id=\"change-roles\" name=\"change-roles\" onchange=\"change_roles(".$row->uid.", this.value)\" class=\"form-control\" size=\"1\">
																				<option value=\"\">Please select</option>";
																				if ( $row->status == 1 )
																				{
																						echo "<option value=\"1\" selected>Aktif</option>
																									<option value=\"0\">Menyahaktifkan</option>";									
																				}
																				else
																				{
																						echo "<option value=\"1\">Aktif</option>
																									<option value=\"0\" selected>Menyahaktifkan</option>";
																				}
																				
															echo "</select>
																		</td>
																	</tr>";
																	
														$user++;
													}
													?>
												</tbody>
											</table>
											<div>
                                                <ul class="pagination">
                                                    <?php echo $links; ?>
                                                </ul>    
                                            </div>
                                            <div class="text-left">
                                                <h4>Jumlah Pengguna : <strong><?php echo number_format($total_rows); ?></strong></h4>  
                                            </div>
										</div>
										</small>
									</div>
									
									<!-- #tab-user-admin -->
									<div class="tab-pane" id="tabs-user-admin">
									<form action="<?php echo base_url('admin');?>/index.php/user_management/add_user_management" method="post" id="add-new-users" class="form-horizontal form-bordered">
									<div class="row">
										<div class="col-sm-7">
										<fieldset>
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label" for="add-contact-name">Nama</label>
                                        <div class="col-xs-8">
                                            <input type="text" id="add-contact-name" name="add-contact-name" class="form-control" placeholder="Masukkan nama penuh">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label" for="add-contact-nric">No. Kad Pengenalan</label>
                                        <div class="col-xs-8">
                                            <input type="email" id="add-contact-nric" name="add-contact-nric" class="form-control" placeholder="Masukkan no. kad pengenalan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label" for="add-contact-email">Emel</label>
                                        <div class="col-xs-8">
                                            <input type="email" id="add-contact-email" name="add-contact-email" class="form-control" placeholder="Masukkan emel">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label" for="add-contact-phone">No. Telefon Bimbit</label>
                                        <div class="col-xs-8">
                                            <input type="text" id="add-contact-phone" name="add-contact-phone" class="form-control" placeholder="eg. 0135678921">
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-xs-4 control-label" for="add-contact-address">Peranan</label>
                                        <div class="col-xs-8">
                                           <select id="add-contact-roles" name="add-contact-roles" class="form-control" size="1">
																							<option value="0">Pilih</option>
																							<option value="3">Super Administrator</option>
																							<option value="2">Administrator</option>
																						</select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-username">ID Pengguna</label>
                                    <div class="col-md-8">
                                        <input type="text" id="user-settings-username" name="user-settings-username" class="form-control" placeholder="Masukkan kata laluan baru">
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-password">Kata Laluan Baru</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Masukkan kata laluan baru">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-repassword">Ulang Kata Laluan Baru</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="Ulang kata laluan baru">
                                    </div>
                                </div>
                                    
                                    <div class="form-group form-actions">
                                        <div class="col-xs-8 col-xs-offset-4">
                                        	
                                            <button type="button" id="save_new_users" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Daftar Pengguna</button>
                                        </div>
                                    </div>
										</fieldset>
										</div>
									</div>
										
										</form>
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
			
			<!-- Modal User Settings -->
        <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
			
			<form action="<?php echo base_url('admin')?>/index.php/user_management/update_user_management" method="post" id="update-user-manage" class="form-horizontal form-bordered" onsubmit="return false;">
			
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Urus Pengguna Portal <button type="button" class="close block-options pull-right" data-dismiss="modal" aria-hidden="true">&times;</button></h2>
                    </div>
                    <!-- END Modal Header -->

                    <!-- Modal Body -->
                    <div class="modal-body">
						<ul class="nav nav-tabs" data-toggle="tabs">
							<li class="active"><a href="#modal-tabs-userinfo">Butiran Pengenalan Diri</a></li>
							<li><a href="#modal-tabs-address">Alamat Tempat Peliharaan</a></li>
							<li><a href="#modal-tabs-resetpassword">Set Semula Kata Laluan</a></li>
						</ul>
						<div class="tab-content">
						
							<!-- #modal-tabs-userinfo -->
							<div class="tab-pane active" id="modal-tabs-userinfo">
							<fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nama Pemohon</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static" id="name-view"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-email">Kewarganegaraan</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static" id="warga-view"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-notifications">Jenis Pengenalan</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static" id="ic-type"></p>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-notifications">No. Pengenalan</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static" id="ic-view"></p>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-notifications">No. Telefon Bimbit</label>
                                    <div class="col-md-8">
                                        <input type="text" id="user-settings-phone-upd" name="user-settings-phone-upd" value="" class="form-control" placeholder="012-6058787">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-notifications">Email</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static" id="email-view"></p>
                                    </div>
                                </div>
                            </fieldset>
							
							</div>
							
							<!-- #modal-tabs-address -->
							<div class="tab-pane" id="modal-tabs-address">
							<fieldset>
								<span class="address-view"></span>
							</fieldset>
							</div>
							
							<!-- #modal-tabs-resetpassword -->
							<div class="tab-pane" id="modal-tabs-resetpassword">
							<fieldset>
								<div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-notifications">ID Pengguna</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static" id="user-name"></p>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-password">Kata Laluan Baru</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-password-upd" name="user-settings-password-upd" class="form-control" placeholder="Masukkan kata laluan baru">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-repassword">Ulang Kata Laluan Baru</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-repassword-upd" name="user-settings-repassword-upd" class="form-control" placeholder="..sahkan kata laluan baru">
                                    </div>
                                </div>
                            </fieldset>
							</div>
						</div><!-- .tab-content -->
                        
                            
                            <input type="hidden" name="user-id" id="user-id" value="" />
                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                                    <button type="submit" id="kemaskini-pengguna" class="btn btn-sm btn-primary">Kemaskini</button>
                                </div>
                            </div>
                        
                    </div>
                    <!-- END Modal Body -->
                </div>
				</form>
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal User Settings -->
			
				<!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url(); ?>js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>