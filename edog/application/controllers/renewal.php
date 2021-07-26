<?php

class Renewal extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('renewal_model');
		}
		
		public function index()
		{
				if( $this->session->userdata('isLoggedIn') )
				{
						$data['address'] = $this->renewal_model->get_address($this->uri->segment(3));
						$data['reason'] = $this->renewal_model->get_reasons();
						
						$this->template->write_view('content', 'renewal', $data, TRUE);
						$this->template->parse_template = TRUE;
						$this->template->render();
				}
				else
				{
						redirect('login');
				}
		}
		
		public function get_dog_detail()
		{
				$dogID = $this->uri->segment(3);
				
				$dogDetail = $this->renewal_model->get_dog_detail($dogID);
				
				foreach( $dogDetail as $row )
				{
						$arr = $row->dog_type."|".$row->color."|".$row->gender."|".$row->weight."|".$row->sterilization."|".$row->microchip."|".$row->owner_training."|".$row->dog_training."|".$row->dog_pic;
				}
				
				echo $arr;
		}
		
		public function get_weight_name()
		{
				echo get_dogs_weight($this->uri->segment(3));
		}
		
		public function save_renew_app()
		{
				
				$config['upload_path'] = './doc/support/';
				$config['allowed_types'] = 'docx|doc|pdf|gif|jpg|jpeg|png|rtf|odt|xps';
				//$config['max_width']  = '1024';
				//$config['max_height']  = '768';
				
				$this->load->library('upload');

				// print_r($_POST);
					if( $this->input->post('doc_type') == 1 )
					{
						if(is_uploaded_file($_FILES['doc_support']['tmp_name'][0]))
						{
							$this->upload->initialize($config);

							$numberUpload = count($_FILES['doc_support']['name']);

							for($i=0; $i < $numberUpload; $i++)
							{
								$_FILES['userfile']['name']     = $_FILES['doc_support']['name'][$i];
						        $_FILES['userfile']['type']     = $_FILES['doc_support']['type'][$i];
						        $_FILES['userfile']['tmp_name'] = $_FILES['doc_support']['tmp_name'][$i];
						        $_FILES['userfile']['error']    = $_FILES['doc_support']['error'][$i];
						        $_FILES['userfile']['size']     = $_FILES['doc_support']['size'][$i];

						        if(! $this->upload->do_upload())
								{
									echo "<script type=\"text/javascript\">";
									echo "alert('".$this->upload->display_errors('', '')."');";
									echo "window.location.href='".base_url()."index.php/new_license_app/index/".$this->input->post('addrID')."';";
									echo "</script>";
									exit;
								}
								else
								{
									$this->upload->do_upload();

						        	$final[] = $this->upload->data();
								}

						        
							}


							// if(! $this->upload->do_upload('doc_support'))
							// {
							// 	echo "<script type=\"text/javascript\">";
							// 	echo "alert('".$this->upload->display_errors('', '')."');";
							// 	echo "window.location.href='".base_url()."index.php/new_license_app/index/".$this->input->post('addrID')."';";
							// 	echo "</script>";
							// 	exit;
							// }
							// else
							// {


								for($j=0; $j < count($final); $j++)
								{
									$docUpload .= $final[$j]['orig_name'].'|';
								}
								//Upload Anjing Pertama
								
								if( $this->input->post('reasons') == 0 )
								{
									if(is_uploaded_file($_FILES['dog_pic']['tmp_name']))
									{
										 	$config['upload_path'] = './doc/pic/';
											$config['allowed_types'] = 'gif|jpg|png';
											$config['max_width']  = '1024';
											$config['max_height']  = '768';
											
											$this->load->library('upload', $config);
											
											if(! $this->upload->do_upload('dog_pic'))
											{
												echo "<script type=\"text/javascript\">";
												echo "alert('".$this->upload->display_errors('', '')."');";
												echo "window.location.href='".base_url()."index.php/renewal/index/".$this->uri->segment(3)."';";
												echo "</script>";
												exit;
											}
											else
											{
												 $picUpload = $this->upload->data();			 
												 $orig_name = $picUpload['orig_name'];
											}
									}
									else
									{
											$orig_name = '';
									}
								}
								else
								{
									$orig_name = '';
								}
								
								if( $this->input->post('reasons2') == 0)
								{
									if(is_uploaded_file($_FILES['dog_pic-2']['tmp_name']))
									{
										 	$config['upload_path'] = './doc/pic/';
											$config['allowed_types'] = 'gif|jpg|png';
											$config['max_width']  = '1024';
											$config['max_height']  = '768';
											
											$this->load->library('upload', $config);
											
											if(! $this->upload->do_upload('dog_pic-2'))
											{
												echo "<script type=\"text/javascript\">";
												echo "alert('".$this->upload->display_errors('', '')."');";
												echo "window.location.href='".base_url()."index.php/renewal/index/".$this->uri->segment(3)."';";
												echo "</script>";
												exit;
											}
											else
											{
												 $picUpload2 = $this->upload->data();			 
												 $orig_name2 = $picUpload2['orig_name'];
											}
									}
									else
									{
											$orig_name2 = '';
									}
								}
								else
								{
									$orig_name2 = '';
								}
								
								$app_no = $this->renewal_model->save_renew_application($docUpload, $orig_name, $orig_name2);
								
								$content = null;
										
								$content .= $this->session->userdata('name').",<br></br>";
								$content .= "Terima Kasih kerana memperbaharui lessen anjing menggunakan portal Sistem Pengurusan Lesen Anjing – DBKL. Permohonan anda akan disemak oleh pegawai kami secepat mungkin<br></br>";
								$content .= "Nombor permohonan anda adalah seperti berikut:<br><br>";
								$content .= "<b>No Permohonan</b> : ".$app_no."<br>";
								$content .= "<b>Tarikh Permohonan</b> : ".date('d/m/Y H:i A')."<br></br>";
								
								$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
								$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
							//}
						}
						else
						{
								
						}

					}
					else
					{
						if( $this->input->post('reasons') == 0)
						{
							if(is_uploaded_file($_FILES['dog_pic']['tmp_name']))
								{
									 	$config['upload_path'] = './doc/pic/';
										$config['allowed_types'] = 'gif|jpg|png';
										$config['max_width']  = '1024';
										$config['max_height']  = '768';
										
										$this->load->library('upload', $config);
										
										if(! $this->upload->do_upload('dog_pic'))
										{
											echo "<script type=\"text/javascript\">";
											echo "alert('".$this->upload->display_errors('', '')."');";
											echo "window.location.href='".base_url()."index.php/renewal/index/".$this->uri->segment(3)."';";
											echo "</script>";
											exit;
										}
										else
										{
											 $picUpload = $this->upload->data();			 
											 $orig_name = $picUpload['orig_name'];
										}
								}
								else
								{
										$orig_name = '';
								}
							}
							else
							{
								$orig_name = '';
							}
						
						if( $this->input->post('reason2') == 0 )
						{		
							if(is_uploaded_file($_FILES['dog_pic-2']['tmp_name']))
							{
								 	$config['upload_path'] = './doc/pic/';
									$config['allowed_types'] = 'gif|jpg|png';
									$config['max_width']  = '1024';
									$config['max_height']  = '768';
									
									$this->load->library('upload', $config);
									
									if(! $this->upload->do_upload('dog_pic-2'))
									{
										echo "<script type=\"text/javascript\">";
										echo "alert('".$this->upload->display_errors('', '')."');";
										echo "window.location.href='".base_url()."index.php/renewal/index/".$this->uri->segment(3)."';";
										echo "</script>";
										exit;
									}
									else
									{
										 $picUpload2 = $this->upload->data();			 
										 $orig_name2 = $picUpload2['orig_name'];
									}
							}
							else
							{
									$orig_name2 = '';
							}
						}
						else
						{
							$orig_name2 = '';
						}
								
						$app_no = $this->renewal_model->save_renew_application($target = '', $orig_name, $orig_name2);
						
						$content = null;
										
						$content .= $this->session->userdata('name').",<br></br>";
						$content .= "Terima Kasih kerana memperbaharui lesen anjing menggunakan portal Sistem Pengurusan Lesen Anjing – DBKL.<br></br>";
						$content .= "Nombor permohonan anda adalah seperti berikut:<br><br>";
						$content .= "<b>No Permohonan</b> : ".$app_no."<br>";
						$content .= "<b>Tarikh Permohonan</b> : ".date('d/m/Y H:i A')."<br></br>";
						
						$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
						$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
					}
		
						email_engine($content, get_email_users($this->session->userdata('userid')), $this->session->userdata('name'), 'Pembaharuan Lesen Anjing - DBKL');
						
		}
}