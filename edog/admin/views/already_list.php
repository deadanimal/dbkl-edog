<!-- Page Title -->
			<section class="site-heading site-section-top">
				<div class="header-section dashboard">
					<div class="container-fluid">
						<h1>Lesen Sedia Ada</h1>
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
												<strong>Tahun : 
													<?php 
														echo "<select name=\"year\" id=\"year-already\" class=\"form-control\">";
														foreach(range(date('Y'), $earliest_year) as $x){
																echo "<option value=\"".$x."\"".($x == $already_selected ? ' selected = "selected"' : '').">".$x."</option>";
														}
														echo "</select>";
													?>
													</strong>
											</div>
										</div>
									<h2><strong>Berikut ialah senarai lesen sedia ada</strong></h2>
								</div>
									<small>
                                                                        <!-- <form action="<?php //echo base_url('admin') ?>/index.php/already_list/index" name="search-form" id="search-form" method="get">
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
                                                                        </form> -->
									<div class="already-list">
									<table id="datatable-baru" class="table table-condensed table-striped table-bordered">
										<thead>
												<tr class="warning">
													<td width="5%" class="text-center"><strong>Bil</strong></td>
													<td class="text-center"><strong>Nombor Permohonan</strong></td>
													<td class="text-center"><strong>Bil Anjing</strong></td>
													<td class="text-center"><strong>No. Lencana</strong></td>
													<td><strong>Nama Pemohon</strong></td>
													<td class="col-sm-2 text-center"><strong>No. Pengenalan Pemohon</strong></td>
													<td class="col-sm-4"><strong>Alamat</strong></td>
													<td class="col-sm-1 text-center"><strong>Tarikh Daftar</strong></td>
												</tr>
											</thead>
											<tbody>
												<?php 
												$al = 1;
												
												foreach($already as $ready)
												{
													//if ( $al < 6 )
													//{
														$dog = get_total_dog($ready->app_id);

														$dog_view = NULL;
														
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
														elseif(count($dog) == 1)
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

														$addr = get_address_by_addr_id($ready->addr_id);

														$add = "";

														$add .= strtoupper($addr[0]->no_unit);
														if($addr[0]->home_name)
														$add .= ", ".ucwords(strtoupper($addr[0]->home_name));
														if($addr[0]->street_name)
														$add .= ", ".ucwords(strtoupper($addr[0]->street_name));
														if($addr[0]->town_name)
														$add .= ", ".ucwords(strtoupper($addr[0]->town_name));
														$add .= ", ".ucwords(strtoupper(get_parlimen_name($addr[0]->parlimen))).", <br>".$addr[0]->postcode." KUALA LUMPUR";
														

														echo "<tr>
                                                                    <td class=\"text-center\">".$al."</td>
                                                                    <td class=\"text-center\"><a href=\"".base_url('admin')."/index.php/view_app/index/".$ready->app_id."\" target=\"_blank\"><b>".$ready->app_no."</b></a></td>
                                                                    <td align=\"center\">".count($dog)."</td>
                                                                    <td align=\"center\">".$dog_view."</td>
                                                                    <td>".get_users_name($ready->addr_id)." </td>
                                                                    <td class=\"text-center\">".get_users_ic($ready->addr_id)."</td>
                                                                    <td>".$add."</td>
                                                                    <td class=\"text-center\">".date('d/m/Y', strtotime($ready->date_apply))."</td>
                                                                </tr>";
																	
														$al++;
													//}
												}
												?>
											</tbody>
									</table>
                                                                        <div>
                                                <!-- <ul class="pagination">
                                                    <?php echo $links; ?>
                                                </ul>    
                                            </div>
                                            <div class="text-left">
                                                <h4>Jumlah Lesen : <strong><?php echo number_format($total_rows); ?></strong></h4>  
                                            </div> -->
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