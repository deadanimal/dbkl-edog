<!-- Page Title -->
			<div class="media-container">
                <!-- Intro -->
                <section class="site-section site-section-light site-section-top">
                    <div class="container text-center">
                        <h1 class="animation-slideDown"><strong>Bil Pembayaran</strong></h1>
                    </div>
                </section>
                <!-- END Intro -->

                <!-- For best results use an image with a resolution of 2560x279 pixels -->
                <img src="<?php echo base_url(); ?>img/placeholders/headers/article_header.jpg" alt="" class="media-image animation-pulseSlow">
            </div>
			<!-- END Page Title -->
<!-- Company Info -->
			<section class="site-section site-content-single">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="block-content">
								<a href="<?php echo base_url();?>index.php/dashboard_user" class="btn btn-square btn-primary themed-background-dark-flatie"><i class="fa fa-long-arrow-left"></i> Back to Dashboard</a>
							</div>
							<div class="small-gap"></div>
							<div class="block full bordered">
								<!-- Invoice Content -->
								<!-- 2 Column grid -->
								<div class="row block-section">
									<!-- Company Info -->
									<div class="col-sm-6">
										<h4><strong><?php echo $this->session->userdata('name');?></strong></h4>
										<address>
											<?php 
												echo $application[0]->no_unit.", ".ucwords(strtolower($application[0]->home_name)).",<br>";
												echo ucwords(strtolower($application[0]->street_name)).",<br>";
												echo ucwords(strtolower($application[0]->town_name)).",<br>";
												echo $application[0]->postcode." ".ucwords(strtolower(get_parlimen_name($application[0]->parlimen))).", Kuala Lumpur.";
											?>
										</address>
									</div>
									<!-- END Company Info -->

									<!-- Client Info -->
									<div class="col-sm-6 text-right">
										<h4><strong>No. Permohonan:</strong> <?php echo $application[0]->app_no; ?></h4>
										<p class="themed-color-fire">Jika ada pertanyaan, sila rujuk No. Permohonan diatas.</p>
									</div>
									<!-- END Client Info -->
								</div>
								<!-- END 2 Column grid -->

								<hr>

								<!-- 2 Column grid -->
								<div class="row block-section">
									<!-- Client Info -->
									<div class="col-sm-4 text-right">
										<img src="<?php echo base_url(); ?>img/logo_dbkl_sm.png">
									</div>
									<!-- END Client Info -->
									<!-- Company Info -->
									<div class="col-sm-8">
										<h4><strong>Bayaran Kepada Dewan Bandaraya Kuala Lumpur</strong></h4>
										<address>
											Pejabat Bendahari Bandaraya<br>
											Dewan Bandaraya Kuala Lumpur, Jalan Raja Laut<br>
											50350 Kuala Lumpur, Peti Surat 11022<br>
										</address>
									</div>
									<!-- END Company Info -->
								</div>
								<!-- END 2 Column grid -->
								<hr>
								<!-- Table -->
								<div class="table-responsive">
									<table class="table table-vcenter">
										<thead class="themed-background-night">
											<tr>
												<th style="width: 10%;">Tarikh</th>
												<th style="width: 60%;">Jenis Bayaran</th>
												<th class="text-right">Jumlah</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$dog = get_total_dog($application[0]->app_id);
											$total = null;
											
											foreach($dog as $dogs):
												echo "<tr>
																<td class=\"text-center\">".date('d/m/Y', strtotime($application[0]->date_apply))."</td>
																<td>
																	<strong>2618 - </strong>Lesen Anjing
																</td>
																<td class=\"text-right\"><span class=\"label label-success\">RM 10.00</span></td>
															</tr>";
												$total = $total + 10;
											endforeach;
											?>
											<tr class="active">
												<td colspan="2" class="text-right"><span class="h3"><strong>JUMLAH </strong></span></td>
												<td class="text-right"><span class="h3"><strong>RM <?php echo number_format($total,2,'.',','); ?></strong></span></td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- END Table -->
								
								<div class="block-content">
									<h4>KENYATAAN</h4>
									<p>Bayaran hanya boleh dibuat dengan wang tunai dan Wang Pos dan hendaklah dipalang "Kira-kira Penerima Sahaja" dan tulis atas nama Bendahari Bandaraya atau Datuk Bandar Kuala Lumpur atau Dewan Bandaraya Kuala Lumpur.</p>
								</div>
								<input type="hidden" name="app-no" id="app-no" value="<?php echo '2618'.str_replace("-","",$application[0]->app_no).'000000'.$total.'00'; ?>" />
								<div class="block-content">
									<div class="gap"></div>
									<p><div id="barcode1"></div></p>
								</div>
								<hr class="dashed">
								
								<div class="block-content">
									<p><div id="barcode2"></div></p>
								</div>
								
								<div class="row block-section">
									<!-- Company Info -->
									<div class="col-sm-6">
										<h4><strong><?php echo $this->session->userdata('name'); ?></strong></h4>
										<address>
											<?php 
												echo $application[0]->no_unit.", ".$application[0]->home_name.",<br>";
												echo $application[0]->street_name.",<br>";
												echo $application[0]->town_name.",<br>";
												echo $application[0]->postcode." ".get_parlimen_name($application[0]->parlimen).", Kuala Lumpur.";
											?>
										</address>
									</div>
									<!-- END Company Info -->

									<!-- Client Info -->
									<div class="col-sm-6 text-right">
										<h4><strong>No. Permohonan:</strong> <?php echo $application[0]->app_no;?></h4>
									</div>
									<!-- END Client Info -->
								</div>
								<!-- END Invoice Content -->
								<div class="table-responsive">
									<table class="table table-vcenter">
										<thead class="themed-background-night">
											<tr>
												<th style="width: 10%;">Tarikh</th>
												<th style="width: 60%;">Jenis Bayaran</th>
												<th class="text-right">Jumlah</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$dog = get_total_dog($application[0]->app_id);
											$total = null;
											
											foreach($dog as $dogs):
												echo "<tr>
																<td class=\"text-center\">".date('d/m/Y', strtotime($application[0]->date_apply))."</td>
																<td>
																	<strong>2618 - </strong>Lesen Anjing
																</td>
																<td class=\"text-right\"><span class=\"label label-success\">RM 10.00</span></td>
															</tr>";
												$total = $total + 10;
											endforeach;
											?>
											<tr class="active">
												<td colspan="2" class="text-right"><span class="h3"><strong>JUMLAH </strong></span></td>
												<td class="text-right"><span class="h3"><strong>RM <?php echo number_format($total,2,'.',','); ?></strong></span></td>
											</tr>
										</tbody>
									</table>
								</div>
								
								<div class="block-footer">
									<div class="clearfix">
										<div class="btn-group pull-right">
											<a href="#" id="print_receipt" class="btn btn-square btn-primary"><i class="fa fa-print"></i> Print</a>
											<input type="hidden" name="appid" id="appid" value="<?php echo $application[0]->app_id;?>" />
										</div>
									</div>
								</div>
							</div>
							
						</div><!-- END:  .col-sm-8  -->
						
						
						
						
					</div><!-- END:  .row -->
				</div><!-- END:  .container -->
			</section>