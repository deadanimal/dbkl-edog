 <!-- Page Title -->
			<div class="media-container">
                <!-- Intro -->
                <section class="site-section site-section-light site-section-top">
                    <div class="container text-center">
                        <h1 class="animation-slideDown"><strong>Existing License</strong></h1>
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
                            	 <h4><strong>Profile Details <br> <small>Butiran Profil</small></strong></h4>
                            	 <hr>
																<h5><strong>Name / Name : </strong><?php echo strtoupper($this->session->userdata('name'));?></h5>
																<h5><strong>No. Kad Pengenalan / IC No : </strong><?php echo $this->session->userdata('nric');?></h5>																
																	<div class="row">
                        							<div class="col-sm-6">
                        								<select class="form-control" size="1" id="option-address">
                        									<option value="0">Please choose address / Sila pilih alamat</option>
                        									<?php 
                        									$info_users = get_users_by_userid( $this->session->userdata('userid') );
                        									
                        									foreach($info_users as $row)
                        									{
                        										unset($addr);
                        										
                        										$addr .= $row->no_unit;
                        										if($row->home_name)
                        											$addr .= ", &nbsp;".ucwords(strtolower($row->home_name));
                        										if($row->street_name)
                        											$addr .= ", &nbsp;".ucwords(strtolower($row->street_name));
                        										if($row->town_name)
                        											$addr .= ", &nbsp;".ucwords(strtolower($row->town_name));
                        											$addr .= ", &nbsp;".ucwords(strtolower( get_parlimen_name($row->parlimen) )).", &nbsp;".$row->postcode;
                        										echo "<option value='".$row->addr_id."'>".$addr."</option>";
                        									}
                        									?>
														</select>
                        							</div>
                        					</div>
												</div>

								<!-- START: For address #1 -->
								<div class="col-sm-12">
                    <div class="site-block">
								<hr>
								<div class="view-address"><font color="red">Please choose address above for list of licenses <br> <small>Sila pilih alamat di atas untuk paparan senarai lesen</small></font></div>
								<!--<h5><strong>Address #1: </strong>No.17, Taman Shamelin Perkasa, Jalan 6/91, Cheras, 56100</h5>
								<div class="table-responsive">
								<table class="table table-bordered table-striped">
									<thead>
										<tr class="warning">
											<td style="width: 30px;"><strong>Bil</strong></td>
											<td><strong>No. Permohonan</strong></td>
											<td align="center"><strong>Tarikh Lesen Mula</strong></td>
											<td align="center"><strong>Tarikh Lesen Tamat</strong></td>
											<td align="center"><strong>Bilangan Anjing Peliharaan</strong></td>
											<td align="center"><strong>No. Lencana</strong></td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">1</td>
											<td><a href="#">LX-A-2014-001</a></td>
											<td class="text-center">14 Oktober 2014</td>
											<td class="text-center">31 Disember 2014</td>
											<td class="text-center">2</td>
											<td class="text-center">5342<br>5567</td>
										</tr>
									</tbody>
								</table>-->
							</div>
								<div class="gap"></div>
							</div>
						</div>
                    </div>
                </div>
            </section>
            <!-- END Company Info -->