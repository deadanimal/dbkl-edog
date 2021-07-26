<?php

class New_License_App extends CI_Controller {
	
	public function __construct() 
	{
		parent::__construct();
		$this->no_cache();
		
		$this->load->model('manage_profile_model');
		$this->load->model('new_license_app_model');
	}
	
	public function index() 
	{
		if( $this->session->userdata("isLoggedIn") )
		{ 
			  $addrID = $this->uri->segment(3);
			  $data['address'] = $this->manage_profile_model->get_address($addrID);
			  
				$this->template->write_view("content","new_license_app", $data, TRUE);
				$this->template->parse_template = TRUE;
				$this->template->render();	
		}
			
		else{
			redirect('login');
		}
	}
	
	public function save_temporary()
	{

		$dateNow = new DateTime();


		$dogcolor = $this->input->post('val_dogcolor');
		$mndl = $this->input->post('val_mandul');
		$ot = $this->input->post('owner_training');
		$dt = $this->input->post('dog_training');
		
		if( empty($dogcolor) || !$this->input->post('dog_type') || !$this->input->post('val_gender') || !$this->input->post('val_weight') || !isset($mndl) || !isset($ot) || !isset($dt) )
		{
			
			echo 2;
		}
		else
		{
				
		$config['upload_path'] = './doc/pic/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '300';
		$config['file_name'] = $dateNow->format('U');
		
		$this->load->library('upload', $config);

		//print_r($_FILES);
		//exit;
		if($_FILES['pic_dog']['size'] > 0)
		{
			if(!$this->upload->do_upload('pic_dog'))
			{
	
//				echo "<script type=\"text/javascript\">";
//				echo "alert('".$this->upload->display_errors('', '')."');";
//				echo "window.location.href='".base_url()."index.php/new_license_app/index/".$this->input->post('addrID')."';";
//				echo "</script>";
//				exit;
				
					echo 0;
			}
			else
			{
					$dataUpload = $this->upload->data();
					$this->new_license_app_model->save_temporary_dog($dataUpload['file_name']);
					
					echo '1';
			}
		}
		else
		{
			$this->new_license_app_model->save_temporary_dog($target = null);
			
			echo '1';
		}
			
			//redirect('new_license_app/index/'.$this->input->post('addrID'));
		}
	}
	
	public function get_data_temporary_dog()
	{
			$addrID = $this->uri->segment(3);
			$dogID = $this->uri->segment(4);

			$data = $this->new_license_app_model->data_temporary($addrID,$dogID);
			$arr = null;
			
			foreach($data as $row)
			{
				 $arr .= $row->dog_type."|".$row->dog_color."|".$row->dog_gender."|".$row->dog_weight."|".$row->dog_mandul."|".$row->dog_microchip."|".$row->owner_training."|".$row->dog_training."|".$row->pic_dog;
			}
			
			echo $arr;
	}
	
	public function update_temporary_dog()
	{
		$dateNow = new DateTime();

		$config['upload_path'] = './doc/pic/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '300';
		$config['file_name'] = $dateNow->format('U');
		
		$this->load->library('upload', $config);
		
		if(is_uploaded_file($_FILES['pic_dog']['tmp_name']))
		{
			if(! $this->upload->do_upload('pic_dog'))
			{
				echo "<script type=\"text/javascript\">";
				echo "alert('".$this->upload->display_errors('', '')."');";
				echo "window.location.href='".base_url()."index.php/new_license_app/index/".$this->input->post('addrID')."';";
				echo "</script>";
				exit;
			}
			else
			{
					
					$dataUpload = $this->upload->data();
					$this->new_license_app_model->update_temporary($dataUpload['file_name']);
					//unlink($this->input->post('loc_pic'));
			}
		}
		else
		{
			$this->new_license_app_model->update_temporary($target = null);
		}
			
			
			redirect('new_license_app/index/'.$this->input->post('addrID'));
	}
	
	public function cancel_temporary_dog()
	{
			$dog = $this->uri->segment(3);
			$addr = $this->uri->segment(4);
			
			$result = $this->new_license_app_model->cancel_temporary($dog, $addr);
			echo $result;
	}
	
	public function save_new_application()
	{	
		$dateNow = new DateTime();
		
		$config['upload_path'] = './doc/support/';
		$config['allowed_types'] = 'docx|doc|pdf|gif|jpg|jpeg|png|odt|xps';
		$config['max_size'] = '2048';
		
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		
		$this->load->library('upload');
		
			//if( $this->input->post('doc_type') == 1 )
			//{
				if($_FILES['doc_support']['size'] > 0)
				{
					

					$numberUpload = count($_FILES['doc_support']['name']);

					for($i=0; $i < $numberUpload; $i++)
					{
						$config['file_name'] = pathinfo($_FILES['doc_support']['name'][$i], PATHINFO_FILENAME).'_'.$dateNow->format('U');
						$this->upload->initialize($config);
						
						$_FILES['userfile']['name']     = $_FILES['doc_support']['name'][$i];
				        $_FILES['userfile']['type']     = $_FILES['doc_support']['type'][$i];
				        $_FILES['userfile']['tmp_name'] = $_FILES['doc_support']['tmp_name'][$i];
				        $_FILES['userfile']['error']    = $_FILES['doc_support']['error'][$i];
				        $_FILES['userfile']['size']     = $_FILES['doc_support']['size'][$i];

				        if(! $this->upload->do_upload())
				        {
				        	$status = 0;
				        }
				        else
				        {
				        	#$this->upload->do_upload();
				        	$final[] = $this->upload->data();
				        	$status = 1;
					    }
				        
					}
					#print_r($final);
					if($status == 1){
						for($j=0; $j < count($final); $j++)
						{
							$docUpload .= $final[$j]['file_name'].'|';
						}
						#echo $docUpload;exit;
						$app_no = $this->new_license_app_model->save_new_application($docUpload);
						$content = null;
										
						$content .= $this->session->userdata('name').",<br></br>";
						$content .= "Terima Kasih kerana mendaftar lesen anjing menggunakan portal Sistem Pengurusan Lesen Anjing – DBKL. Permohonan anda akan disemak oleh pegawai kami secepat mungkin<br></br>";
						$content .= "Nombor permohonan anda adalah seperti berikut:<br><br>";
						$content .= "<b>No Permohonan</b> : ".$app_no."<br>";
						$content .= "<b>Tarikh Permohonan</b> : ".date('d/m/Y H:i A')."<br></br>";
						
						$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
						$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
						
						email_engine($content, get_email_users($this->session->userdata('userid')), $this->session->userdata('name'), 'Permohonan Lesen Anjing - DBKL');

						echo $status;
					}
					else
					{
						echo $status;
					}
						
						
					//}
				}
			// }
			else
			{
				
				$app_no = $this->new_license_app_model->save_new_application($target = '');
				
				$content = null;
								
				$content .= $this->session->userdata('name').",<br></br>";
				$content .= "Terima Kasih kerana mendaftar lesen anjing menggunakan portal Sistem Pengurusan Lesen Anjing – DBKL.<br></br>";
				$content .= "Nombor permohonan anda adalah seperti berikut:<br><br>";
				$content .= "<b>No Permohonan</b> : ".$app_no."<br>";
				$content .= "<b>Tarikh Permohonan</b> : ".date('d/m/Y H:i A')."<br></br>";
				
				$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
				$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
				
				email_engine($content, get_email_users($this->session->userdata('userid')), $this->session->userdata('name'),  'Permohonan Lesen Anjing - DBKL');
				
				echo '1';
			}

				
			
	}
	
	public function no_cache() 
	{
		  $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		  $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		  $this->output->set_header('Pragma: no-cache');
		  $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}
}