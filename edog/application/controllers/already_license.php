<?php

class Already_License extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('already_license_model');
		}
		
		public function index()
		{
			if( $this->session->userdata('isLoggedIn') )
			{
				$this->template->write_view('content', 'already_license');
				$this->template->parse_template = TRUE;
				$this->template->render();
			}
			else
			{
				redirect('login');
			}
		}
		
		public function view_address()
		{
				$addr = $this->already_license_model->get_info_license( $this->uri->segment(3) );			
				$address = $this->already_license_model->get_address_view( $this->uri->segment(3) );
					
						echo "<h5><strong>Address #1: </strong>".$address[0]->no_unit.",&nbsp;".ucwords(strtolower($address[0]->home_name)).",&nbsp;".ucwords(strtolower($address[0]->street_name)).",&nbsp;".ucwords(strtolower(get_parlimen_name($address[0]->parlimen))).",&nbsp;".$address[0]->postcode."</h5><br>
									<div class=\"table-responsive\">
									<table class=\"table table-bordered table-striped\">
										<thead>
											<tr class=\"warning\">
												<td style=\"width: 50px;\"><strong>No / </strong><br><small>Bil</small></td>
												<td><strong>Application No / </strong><br><small>No. Permohonan</small></td>
												<td align=\"center\"><strong>License Start Date / </strong><br><small>Tarikh Lesen Mula</small></td>
												<td align=\"center\"><strong>License End Date / </strong><br><small>Tarikh Lesen Tamat</small></td>
												<td align=\"center\"><strong>Number of Dogs / </strong><br><small>Bilangan Anjing Peliharaan</small></td>
												<td align=\"center\"><strong>Tag No / </strong><br><small>No. Lencana</small></td>
											</tr>
										</thead>
										<tbody>";
										$no = 1;
										$addr_view = null;
										if( count($addr) > 0)
										{
											
											foreach($addr as $row)
											{
												if($addr_view != $row->app_no)
												{
													$dog = get_total_dog($row->app_id);
													
													

													echo "<tr>
																	<td class=\"text-center\">".$no."</td>
																	<td><a href=\"".base_url()."index.php/application_view/index/".$row->app_id."\">".$row->app_no."</a></td>
																	<td class=\"text-center\">".date('d/m/Y', strtotime($row->date_start))."</td>
																	<td class=\"text-center\">31/12/".date('Y', strtotime($row->date_start))."</td>
																	<td class=\"text-center\">".count($dog)."</td>
																	<td class=\"text-center\">";
																		$a = 1;
																		$lic = array();
																	

																		foreach($dog as $dg)
																		{	
																			$arrLic = get_dog_license($dg->dog_id);
																			$lic[] = $arrLic[0]->license_no;
																		}
																		
																		if(count($lic) > 0)
																		{
																			if(strlen($lic[0]) == 1)
																				$lic0 = '0000'.$lic[0];
																			elseif(strlen($lic[0]) == 2)
																				$lic0 = '000'.$lic[0];
																			elseif(strlen($lic[0]) == 3)
																				$lic0 = '00'.$lic[0];
																			elseif(strlen($lic[0]) == 4)
																				$lic0 = '0'.$lic[0];
																			elseif(strlen($lic[0]) == 5)
																				$lic0 = $lic[0];

																			if(strlen($lic[1]) == 1)
																				$lic1 = '0000'.$lic[1];
																			elseif(strlen($lic[1]) == 2)
																				$lic1 = '000'.$lic[1];
																			elseif(strlen($lic[1]) == 3)
																				$lic1 = '00'.$lic[1];
																			elseif(strlen($lic[1]) == 4)
																				$lic1 = '0'.$lic[1];
																			elseif(strlen($lic[1]) == 5)
																				$lic1 = $lic[1];
														
																			if(count($lic) > 1)
																				echo $lic0."<br>".$lic1;
																			else
																				echo $lic0;
																		}
																		
																			
														echo "</td>
																</tr>";
													$no++;
													$addr_view = $row->app_no;
												}
											}
										}
										else
										{
												echo "<tr>
																<td colspan=\"6\">No license available / Tidak mempunyai lesen</td>
															</tr>";
										}											
								echo "</tbody>
									</table>";
				
		}
}