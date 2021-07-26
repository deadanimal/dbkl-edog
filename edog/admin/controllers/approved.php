<?php

class Approved extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('new_app_model');
				$this->load->model('approved_model');
		}
		
		public function index()
		{
				if( $this->session->userdata('isLoggedIn') )
				{
						$data['info'] = $this->new_app_model->get_all_info_by_app_id($this->uri->segment(3));
						$data['history'] = $this->new_app_model->get_history($this->uri->segment(3));
						$this->template->write_view('content', 'approved', $data, TRUE);
						$this->template->parse_template = TRUE;
						$this->template->render();
				}
				else
				{
						redirect(base_url('admin'));
				}
		}
		
		public function update_approved_license()
		{
			
				$this->approved_model->save_no_badge();
				
				$application = get_applications($this->input->post('appID'));
				$dog = get_dog_detail($application[0]->app_id);
				$usr = get_users_name_addr($application[0]->addr_id);
				
				$content = null;
								
				$content .= get_users_name($application[0]->addr_id).",<br></br>";
				$content .= "Ini adalah memaklumkan kepada tuan/puan, pendaftaran lesen anjing yang telah telah diterima telah disemak oleh pegawai kami.<br></br>";
				$content .= "Status permohonan tuan/puan adalah seperti berikut:<br><br>";
				
				$content .= "<b>No Permohonan</b> : ".$application[0]->app_no."<br>";
				$content .= "<b>Tarikh Permohonan</b> : ".date('d/m/Y', strtotime($application[0]->date_apply))."<br></br>";
				
				$content .= "<b>Status Permohona</b> : Diluluskan<br>";
				$content .= "<b>Kenyataan / Ulasan</b> : <br></br>";
				
				$content .= "<b>Tarikh Terima Bayaran</b> : ".$this->input->post('date-payment')."<br>";
				$content .= "<b>Tarikh Kelulusan</b> : ".date('d/m/Y')."<br></br>";
				
				$content .= "<b>Tarikh Mula Lesen</b> : ".date('d/m/Y')."<br>";
				$content .= "<b>Tarikh Tamat Lesen</b> : 31/12/2014<br></br>";
				
				if( count($dog) == 1 )
				{
						$lic = get_dog_license($dog[0]->dog_id);
						$content .= "<b>No. Lesen</b> : ".$lic[0]->license_no."<br></br>";
				}
				else{
					$lic = get_dog_license($dog[0]->dog_id);
					$lic2 = get_dog_license($dog[1]->dog_id);
					$content .= "<b>No. Lesen</b> : ".$lic[0]->license_no."<br>";
					$content .= "<b>No. Lesen 2</b> : ".$lic2[0]->license_no."<br></br>";
				}
				
				$content .= "Sila layari <a href=\"".base_url()."index.php/login\">Laman Utama</a> dan log masuk untuk semak permohonan anda. Terima kasih kerana berurusan dengan Sistem Pengurusan Lesen Anjing – DBKL<br><br>";
				
				$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
				$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
				
				email_engine($content, $usr[0]->email, $usr[0]->name, 'Status Permohonan Lesen Anjing - DBKL');
				
		}
}