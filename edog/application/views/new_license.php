 <!-- Page Title -->
			<div class="media-container">
                <!-- Intro -->
                <section class="site-section site-section-light site-section-top">
                    <div class="container text-center">
                        <h1 class="animation-slideDown"><strong>Apply New License</strong></h1>
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
							<div class="table-responsive">
								<h3>Dog's Address Details <small>/ Butiran Alamat Tempat Peliharaan</small></h3>
							<br>
								<table class="table table-bordered table-striped">
									<thead>
										<tr class="warning">
											<td style="width: 50px;"><strong>No </strong>/<br><small>Bil</small></td>
											<td><strong>Address </strong>/<br><small>Alamat</small></td>
											<td class="text-center"><strong>Number of License Allowed </strong>/<br><small>Bilangan Lesen Dibenarkan</small></td>
											<td class="text-center"><strong>License Balance </strong>/<br><small>Baki Lesen</small></td>
											<td class="text-center"><strong>Action </strong>/<br><small>Tindakan</small></td>
										</tr>
									</thead>
									<tbody>
									<?php 
									$no=1;
									if( count($ADDRESS) > 0 )
									{
											foreach ($ADDRESS as $address):
											$totalLicense = get_available_license($address->addr_id);
											$homeType = get_home_type($address->home_type);
											$totalDogAvai = get_license_quota($address->home_space);
											$appealTotal = get_available_appeal_license($address->addr_id);
											
											if( $homeType[0]->doc == 0 )
											{
												$totalDog = $totalLicense[0]->totalLicense;
												$total = $totalLicense[0]->totalLicense;
												$totalQuota = $totalDogAvai;
												
											}
											else
											{
												$total = $totalLicense[0]->totalLicense;
												$totalDog = 1;
												$totalQuota = 1;
												//$totalDogAvai = 1;
											}
				
 												$totalAvailable = $totalQuota - $total;
 												
 												echo "<tr>
																<td class=\"text-center\">".$no."</td>
																<td>".$address->no_unit;
																if($address->home_name)
																echo ",&nbsp".ucwords(strtolower($address->home_name));
																if($address->street_name)
																echo ",&nbsp".ucwords(strtolower($address->street_name));
																if($address->town_name)
															    echo ",&nbsp".ucwords(strtolower($address->town_name));
																echo ",&nbsp;".$address->postcode." ".ucwords(strtolower(get_parlimen_name($address->parlimen))).". </td>
																<td class=\"text-center\">".$totalQuota."</td>
																<td class=\"text-center\">".$totalAvailable."</td>";
														if( $totalAvailable > 0 )		
															echo "<td class=\"text-center\"><a href=\"".base_url()."index.php/new_license_app/index/".$address->addr_id."\" class=\"btn btn-square btn-sm btn-success\">Add New License / Tambah Lesen Baru</a></td>";
														elseif( $totalAvailable == 0 )
															echo "<td class=\"text-center\">Not applicable <br><small>Tidak berkenaan</small></td>";															
												echo "</tr>";
											$no++;
											endforeach;
									}
									else
									{
											echo "<tr>
															<td colspan=\"5\">No address registered <small><br>Tiada alamat didaftarkan</small></td>
														</tr>";	
									} 
										?>
									</tbody>
								</table>
								<div class="text-right"><a href="<?php echo base_url();?>index.php/manage_profile?action=addr" class="btn btn-primary"><i class="fa fa-plus"></i> Add Dog's Address / Daftar Alamat</a></div>
							</div>
						</div>
                    </div>
                </div>
            </section>
            <!-- END Company Info -->
			
					

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>
			
	<!-- Load and execute javascript code used only in this page -->
    <script src="<?php echo base_url();?>js/pages/formsWizard.js"></script>
    <script>$(function(){ FormsWizard.init(); });</script>