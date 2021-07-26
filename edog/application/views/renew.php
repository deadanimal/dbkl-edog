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
                        
                        <div class="col-sm-12">
                            <div class="site-block">
								<h5><strong>Name / Nama : </strong><?php echo $this->session->userdata('name');?></h5>
								<h5><strong>IC No / No. Kad Pengenalan: </strong><?php echo $this->session->userdata('nric');?></h5>
								
								<?php
								$no = 1;
								foreach($ADDRESS as $addr)
								{
								?>
								<!-- START: For address #1 -->
								<hr>
								<div>
										<?php echo "<strong>Alamat #".$no."</strong> :  ".$addr->no_unit.",&nbsp; ".ucwords(strtolower($addr->home_name)).",&nbsp; ".ucwords(strtolower($addr->street_name)).",&nbsp; ".ucwords(strtolower($addr->town_name)).",&nbsp; ".get_parlimen_name($addr->parlimen).",&nbsp".$addr->postcode." Kuala Lumpur."; ?>
								</div><br>
								<table class="table table-bordered table-striped">
									<thead>
										<tr class="warning">
											<td style="width: 50px;"><strong>No </strong>/<br><small>Bil</small></td>
											<td><strong>Application No </strong>/<br><small>No. Permohonan</small></td>
											<td class="text-center"><strong>Payment Date </strong>/<br><small>Tarikh Pembayaran Lesen</small></td>
											<td class="text-center"><strong>License Date End </strong>/<br><small>Tarikh Lesen Tamat</small></td>
											<td class="text-center"><strong>Number of Dogs </strong>/<br><small>Bilangan Anjing Peliharaan</small></td>
											<td class="text-center"><strong>Renew License? </strong>/<br><small>Perbaharui Lesen?</small></td>
										</tr>
									</thead>
									<tbody>
										<?php 
										$application = get_dashboard_already_license_renewed($addr->addr_id);
										//echo count($application);
										if( count($application) > 0 )
										{
											
											//if( date('Y-m-d') >= date('Y', strtotime('+1 year')).'-01-01' )
											//{
												$no = 1;
												foreach($application as $app){

												if( date('Y-m-d') >= date('Y', strtotime('+1 year', strtotime($app->date_start))).'-01-01' )
												{
													$total_dog = get_total_dog($app->app_id);
													//if(count($total_dog) > 0){
													?>
													<tr>
														<td class="text-center"><?php echo $no; ?></td>
														<td><a href="<?php echo base_url()."index.php/application_view/index/".$app->app_id; ?>"><strong><?php echo $app->app_no; ?></strong></a></td>
														<td class="text-center"><?php echo date('d/m/Y', strtotime($app->date_start)); ?></td>
														<td class="text-center"><?php echo '31/12/'.date('Y', strtotime($app->date_start));?></td>
														<td class="text-center"><?php echo count($total_dog);?></td>
														<td class="text-center">
															<div class="btn-group btn-group-xs">
																<a href="<?php echo base_url();?>index.php/renewal/index/<?php echo $app->app_id;?>" class="btn btn-success">Yes / Ya</a>
																<a href="#" id="not-renew-app" onclick="not_renew_app(<?php echo $app->app_id;?>)" class="btn btn-danger" data-toggle="modal">No / Tidak</a>
															</div>
														</td>
													</tr>
													<?php 
													
												$no++;
												}
												
											}
										//}
										//
									}
									else
									{
									?>
									<tr>
										<td colspan="6">No license found <small><br>Tiada lesen dijumpai</small></td>	
									</tr>
									<?php
									}
									?>
									</tbody>
								</table>
								<div class="gap"></div>
								<?php 
								$no++;
								}
								?>		
							</div>
						</div>
                    </div>
                </div>
            </section>
            <!-- END Company Info -->
            
            <!-- Modal Not Renew -->
        <div id="not-renew" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
					<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Pembaharuan Lesen: <strong>Tidak</strong></h4>
                    </div>
					<div class="modal-body">
						<form id="form-not-renew" action="<?php echo base_url();?>index.php/renew/save_not_renew" method="post" class="form-horizontal">
							<div class="form-group">
								<label class="col-md-5 control-label">Alamat </label>
								<div class="col-md-7">
									<p class="form-control-static" id="address"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Bilangan Anjing Peliharaan </label>
								<div class="col-md-7">
									<p class="form-control-static" id="no-dog"> </p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label" for="example-select">Nyatakan sebab tidak perbaharui lesen</label>
								<div class="col-md-7">
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
							<!-- Form Buttons -->
							<div class="form-group form-actions">
								<div class="col-md-6 col-md-offset-5">
							
									<button type="button" class="btn btn-square btn-sm btn-primary" id="submit-not-renew" value="Simpan"><i class="fa fa-send"></i> Hantar</button>
								</div>
							</div>
							<input type="hidden" name="appID" id="appID" value="" />
							<!-- END Form Buttons -->
						</form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal Not Renew -->
        
             <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url();?>js/pages/formsWizard.js"></script>
        <script>$(function(){ FormsWizard.init(); });</script>