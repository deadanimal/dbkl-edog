<!-- Page Title -->
			<section class="site-heading site-section-top">
				<div class="header-section dashboard">
					<div class="container-fluid">
						<h1>Permohonan Rayuan</h1>
					</div>
				</div>
			</section>
			<!-- END Page Title -->
			<?php 
			$already_selected = $this->uri->segment(3);
			$earliest_year = 2014;
			?>
            <!-- Content -->
            <section class="site-section site-content-single">
                <div class="container-fluid">
	                    <div class="row">
							<div class="col-sm-12">
								<!-- Datatables Content -->
								<div class="block full bordered">
									<div class="block-title">
										<div class="block-options pull-right">
											<div class="form-inline">
												<strong>Tahun : <?php 
														echo "<select name=\"year\" id=\"year-appeal\" class=\"form-control\">";
														foreach(range(date('Y'), $earliest_year) as $x){
																echo "<option value=\"".$x."\"".($x == $already_selected ? ' selected = "selected"' : '').">".$x."</option>";
														}
														echo "</select>";
													?></strong>
											</div>
										</div>
										<h2><strong>Berikut ialah senarai permohonan rayuan</strong></h2>
									</div>
									<small>
									<div class="table-responsive">
										<table id="datatable-baru" class="table table-vcenter table-condensed table-striped table-bordered">
											<thead>
												<tr class="warning">
													<td class="text-center"><strong>Bil.</strong></td>
													<td class="text-center"><strong>No. Permohonan</strong></td>
													<td class="text-center"><strong>Tarikh</strong></td>
													<td><strong>Nama Pemohon</strong></td>
													<td class="col-sm-2 text-center"><strong>No. Pengenalan Pemohon</strong></td>
													<td class="text-center"><strong>Tindakan</strong></td>
												</tr>
											</thead>
											<tbody>
												<?php 
												$a = 1;
												foreach($appeal as $row)
												{
														echo "<tr>
																		<td class=\"text-center\">".$a."</td>
																		<td class=\"text-center\"><a href=\"".base_url('admin')."/index.php/view_app/index/".$row->app_id."\" target=\"_blank\"><b>".$row->app_no."</b></a></td>
																		<td class=\"text-center\">".date('d/m/Y', strtotime($row->date_apply))."</td>
																		<td>".get_users_name($row->addr_id)."</td>
																		<td class=\"text-center\">".get_users_ic($row->addr_id)."</td>
																		<td class=\"text-center\">
																			<div class=\"btn-group\">";
																			if( $row->appeal == 1 && $row->status == "Ditolak" || $row->status == "Diterima")
																				echo "Rayuan telah dibuat";
																			else
																				echo "<a class=\"btn btn-xs btn-success\" href=\"".base_url('admin')."/index.php/new_app/index/".$row->app_id."\"><i class=\"fa fa-eye\"></i> Semak Permohonan Rayuan</a>";
																	echo "</div>
																		</td>
																	</tr>";
																	
														$a++;
												}
												?>
											</tbody>
										</table>
									</div>
									</small>
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