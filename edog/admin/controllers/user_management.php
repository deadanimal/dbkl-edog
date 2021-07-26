 <?php

class User_Management extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('user_management_model');
		}
		
		public function index()
		{
				if ( $this->session->userdata('isLoggedIn') )
				{
					$this->load->library('pagination');

			 		$count = $this->user_management_model->get_total_all_users();
			 		
					$config['base_url'] = base_url('admin') . '/index.php/user_management/index';
					//$config['page_query_string'] = TRUE;
					//$config['enable_query_strings'] = TRUE;
					$config['total_rows'] = $count->num_rows();
					$config['per_page'] = 20; 
					$config["uri_segment"] = 3;
					$config['suffix'] = '?'.http_build_query($_GET, '', "&");

					$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
			        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
			         
			        $config['cur_tag_open'] = "<li><span><b>";
			        $config['cur_tag_close'] = "</b></span></li>";
			        

					$this->pagination->initialize($config); 

					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


					//$config['suffix'] = "?page=".$page."&per_page=".$config["per_page"];

					$data['links'] = $this->pagination->create_links();

					$data['users'] = $this->user_management_model->get_all_users($config["per_page"], $page);
					$data['total_rows'] = $count->num_rows();
					$this->template->write_view('content', 'user_management', $data, TRUE);
					$this->template->parse_template = TRUE;
					$this->template->render();
				}
				else
				{
					 redirect( base_url('admin') );
				}
		}
		
		public function get_profile()
		{
				$uid = $this->uri->segment(3);
				
				$data = $this->user_management_model->get_data_profile($uid);
				
				$profile = null;

				foreach( $data as $row )
				{
						$profile = $row->name."|".$row->citizenship."|".$row->nric_type."|".$row->nric."|".$row->phone_no."|".$row->email."|".$row->profile_id."|".$row->roles."|".$row->username;
				}
				
				echo $profile;
		}
		
		public function get_address()
		{
				$profile_id = $this->uri->segment(4);
				
				$data = $this->user_management_model->get_address_registered($profile_id);
				
				$address = null;
				$n = 1;
				foreach($data as $row)
				{
					$totalLicense = get_available_license($row->addr_id);
					$homeType = get_home_type($row->home_type);
					$appealTotal = get_available_appeal_license($row->addr_id);
					
					if( $homeType[0]->doc == 0 )
					{
						$quota = 1;
					}
					else
					{
							$homeSpace = get_home_space($row->home_space);
							$quota = $homeSpace[0]->quota;
					}
					
					$totalAvailable = $quota - $totalLicense[0]->totalLicense - $appealTotal[0]->totalLicenseAppeal;
					
					if($totalAvailable < 0)
						$totalAvailable = 0;
					
					if( $n > 1 )
					 $address .= "|";
					 $address .= 	$row->no_unit.", ".ucwords(strtolower($row->home_name)).", ".ucwords(strtolower($row->street_name)).", ".ucwords(strtolower($row->town_name)).", ".ucwords(strtolower(get_parlimen_name($row->parlimen))).", ".$row->postcode." Kuala Lumpur.;".$quota.";".$totalAvailable;
					 
					 $n++;
				}
				
				echo $address;
		}
		
		public function update_status()
		{
				$uid = $this->uri->segment(3);
				$stat = $this->uri->segment(4);
				// echo 'lalala';
				// exit;
				$result = $this->user_management_model->update_status($uid, $stat);
				
				$content = null;
				
				if( $stat = 0 )
				{
					$content .= get_users_name_by_email('','', $uid).",<br></br>";
					$content .= "Ini adalah untuk memaklumkan bahawa kami telah mengnyah-aktifkan akaun anda di portal Sistem Pengurusan Lesen Anjing -DBKL atas permintaan / kerana beberapa masalah teknikal dalam akaun pengguna anda.<br>
											 Butiran akaun anda adalah seperti berikut:<br></br>";
					
					$content .= "<b>Nama</b> : ".get_users_name_by_email('','', $uid)."<br>";
					$content .= "<b>Password</b> : ".get_username_users($uid)."<br></br>";
					
					$content .= "Jika ini bukan akaun / permintaan anda, sila hubungi pentadbir kami menggunakan butiran hubungan di bawah, secepat :<br><br>";
					
					$content .= "<b>Telefon No</b> : 03 2617 9000<br>";
					$content .= "<b>Alamat E-mel</b> : edog@dbkl.gov.my<br>";
					$content .= "<b>Alamat</b> : http://www.dbkl.gov.my<br></br>";
					
					$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
					$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
				}
				else
				{
					$content .= get_users_name_by_email('','', $uid).",<br></br>";
					$content .= "Ini adalah untuk memaklumkan bahawa kami telah mengaktifkan akaun anda di portal Sistem Pengurusan Lesen Anjing -DBKL atas permintaan / kerana beberapa masalah teknikal dalam akaun pengguna anda.<br>
											 Butiran akaun anda adalah seperti berikut:<br></br>";
					
					$content .= "<b>Nama</b> : ".get_users_name_by_email('','', $uid)."<br>";
					$content .= "<b>Password</b> : ".get_username_users($uid)."<br></br>";
					
					$content .= "Jika ini bukan akaun / permintaan anda, sila hubungi pentadbir kami menggunakan butiran hubungan di bawah, secepat :<br><br>";
					
					$content .= "<b>Telefon No</b> : 03 2617 9000<br>";
					$content .= "<b>Alamat E-mel</b> : edog@dbkl.gov.my<br>";
					$content .= "<b>Alamat</b> : http://www.dbkl.gov.my<br></br>";
					
					$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
					$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
				}
				
				email_engine($content, get_email_users($uid), get_users_name_by_email('','', $uid), 'Status Akaun Pengguna di Sistem Pengurusan Lesen Anjing');
				
				
				echo $result;
		}
		
		public function add_user_management()
		{
				
				$this->user_management_model->add_new_users();
				
				$content = null;
								
				$content .= $this->input->post('add-contact-name').",<br></br>";
				$content .= "Anda kini pentadbir untuk portal Sistem Pengurusan Lesen Anjing - DBKL. Anda boleh menggunakan beberapa ciri-ciri yang terdapat di dalam halaman pentadbir.<br>
										 Berikut adalah butiran log masuk:<br></br>";
				
				$content .= "<b>URL</b> : <a href='".base_url('admin')."'>Sistem Pengurusan Lesen Anjing - DBKL ( Administrator )</a><br>";
				$content .= "<b>User ID</b> : ".$this->input->post('user-settings-username')."<br>";
				$content .= "<b>Password</b> : ".$this->input->post('user-settings-password')."<br></br>";
				
				$content .= "Sila tukar kata laluan anda dengan segera sebaik sahaja anda telah log masuk.<br><br>";
				$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
				$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
				
				email_engine($content, $this->input->post('add-contact-email'), $this->input->post('add-contact-name'), 'Status Akaun Pentadbir di Sistem Pengurusan Lesen Anjing');
				
		}
		
		public function update_user_management()
		{
				$this->user_management_model->update_users();
				
				print_r($_POST);
		}
}