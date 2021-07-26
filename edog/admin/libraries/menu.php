<?php

class Menu
{
		public function user_menu()
		{
				 $ci =& get_instance();
				 $menu = null;
				 $menu .= "<!-- Main Menu -->
						          <ul class=\"site-nav\">
						              <!-- Toggles menu on small screens -->
						              <li class=\"visible-xs visible-sm\">
						                  <a href=\"javascript:void(0)\" class=\"site-menu-toggle text-center\">
						                      <i class=\"fa fa-times\"></i>
						                  </a>
						              </li>
						              <!-- END Menu Toggle -->";
						              
						              	//if( $ci->session->userdata('roles') == 1 )
						              	//{
						              			$dashboard = null;
						              			$profile = null;
						              			$new = null;
						              			$renew = null;
						              			
						              			if($ci->uri->segment(1) == 'dashboard_user')
						              			{
						              				$dashboard = 'active';
						              			}

						              			if($ci->uri->segment(2) == 'details')
						              			{
						              				$dtl = 'active';
						              			}
												
												if($ci->uri->segment(1) == 'sms_blasting')
												{
														$sms = 'active';
												}
						           
						              $menu .= "<li class='".$dashboard."'>
									                      <a href='".base_url('admin')."/index.php/dashboard_admin'>Dashboard Admin</a>
									                  </li>
																		<li>
                                <a href=\"#\" class=\"site-nav-sub\"><i class=\"fa fa-angle-down site-nav-arrow\"></i>Permohonan</a>
																	<ul>
																		<li>
																			<a href=\"".base_url('admin')."/index.php/new_app_list\">Permohonan Lesen Baru</a>
																		</li>
																		<li>
																			<a href=\"".base_url('admin')."/index.php/appeal_list\">Permohonan Rayuan</a>
																		</li>
																		<li>
																			<a href=\"".base_url('admin')."/index.php/approved_list\">Kelulusan</a>
																		</li>
																		<li>
																			<a href=\"".base_url('admin')."/index.php/already_list\">Lesen Sedia Ada</a>
																		</li>
																		<li>
																		<a href=\"".base_url('admin')."/index.php/address_list\">Semakan Permohonan</a>
																		</li>
																	</ul>
									                            </li>
																<li>
									                                <a href=\"".base_url('admin')."/index.php/report\">Laporan</a>
									                            </li>
																<li class=\"".$dtl."\">

																<li>
																<a href=\"#\" class=\"site-nav-sub\"><i class=\"fa fa-angle-down site-nav-arrow\"></i>Statistik</a>
																<ul>
																<li>
																	<a href=\"".base_url('admin')."/index.php/report/details\">Statistik</a>
																</li>
																<li>
																	<a href=\"".base_url('admin')."/index.php/analytic\">Graf Laporan</a>
																</li>
																</ul>
																</li>
																
									                            </li>";
									              
																$menu .= " <li>
									                                <a href=\"#\" class=\"site-nav-sub\">Penyelenggaraan<i class=\"fa fa-angle-down site-nav-arrow\"></i></a>
																	<ul>
															
																					<li>
																							<a href=\"".base_url('admin')."/index.php/user_management\">Pengurusan Pengguna</a>
																						</li>
																						<li>
																							<a href=\"".base_url('admin')."/index.php/data_reference\">Data Rujukan Sistem</a>
																						</li>
																						<li><a href=\"".base_url('admin')."/index.php/report/upload_excel\">Muat Naik Excel</a></li>
																	</ul></li>";
																$menu .= "<li class=\"".$sms."\"><a href=\"".base_url('admin')."/index.php/sms_blasting\">SMS</a></li>";
															
						            		//}
						           
						          	$menu .= "</ul>
						          							<!-- END Main Menu -->";
						          							
						  return $menu;
		}
}