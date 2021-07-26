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
						              
						              	if( $ci->session->userdata('roles') == 1 )
						              	{
						              			$dashboard = null;
						              			$profile = null;
						              			$new = null;
						              			$renew = null;
						              			
						              			if($ci->uri->segment(1) == 'dashboard_user')
						              			{
						              				$dashboard = 'active';
						              			}
						              			elseif($ci->uri->segment(1) == 'manage_profile')
						              			{
						              				$profile = 'active';
						              			}
						           
						              $menu .= "<li class='".$dashboard."'>
							                      <a href='".base_url()."index.php/dashboard_user'>Dashboard</a>
							                    </li>
																		<li>
											                  <a href='#' class=\"site-nav-sub\"><i class=\"fa fa-angle-down site-nav-arrow\"></i>License</a>
																						<ul>
																							<li>
																								<a href='".base_url()."index.php/new_license'>Apply New License</a>
																							</li>
																							<li>
																								<a href='".base_url()."index.php/already_license'>Existing Licenses</a>
																							</li>
																							<li>
																								<a href='".base_url()."index.php/renew'>Renew License</a>
																							</li>
																						</ul>
											              </li>
																		<li>
				            
				                            </li>
				                            <li class='".$profile."'>
				                                <a href=\"".base_url()."index.php/manage_profile\">Update Profile</a>
				                            </li>
				                            <li>
												<a href='".base_url()."index.php/login/logout'>Logout</a>
											</li>";
						            		}
						           
						          	$menu .= "</ul>
						          							<!-- END Main Menu -->";
						          							
						  return $menu;
		}
}