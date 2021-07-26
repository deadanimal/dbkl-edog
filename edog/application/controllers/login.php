<?php 

class Login extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			
			$this->load->helper('html');
			$this->load->model('Login_Model');
		}
		
		public function index() {
			$this->load->view('login');
		}
		
		public function loginUser() {
			
			$result = $this->Login_Model->authenticationUser();
			
			echo $result;
		}
		
		public function logout() {
			
			$this->Login_Model->register_log();
			$this->session->sess_destroy();
			
			redirect( base_url() );
		}
		
		public function register_user() 
		{	
				if( $this->input->post( 'register-password' ) != $this->input->post( 'register-password-verify' ) )
				{
					echo "<script type=\"type/javascript\">
										alert( 'Katalaluan anda tidak sepadan. Sila cuba lagi.' );
									</script>";
				}
				else
				{
						$reg = $this->Login_Model->register_user();
						
						if( $reg == 1 )
						{
								$content = null;
								
								$content .= $this->input->post( "register-name" ).",<br></br>";
								$content .= "Terima kasih kerana mendaftar di portal Sistem Pengurusan Lesen Anjing - DBKL.<br>
														 Butiran log masuk anda adalah seperti berikut:<br></br>";
								
								$content .= "<b>User ID</b> : ".$this->input->post( "register-ic" )."<br>";
								$content .= "<b>Password</b> : ".$this->input->post( "register-password" )."<br></br>";
								
								$content .= "Untuk log masuk, sila layari : <a href='".base_url()."'>Sistem Pengurusan Lesen Anjing - DBKL</a><br><br>";
								$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
								$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
								
								email_engine($content, $this->input->post( "register-email" ), $this->input->post( "register-name" ), 'Pendaftaran di Sistem Pengurusan Lesen Anjing - DBKL');

								redirect( base_url() );
						}
						else
						{
								echo $reg;
						}
				}
				
		}
		
		public function check_valid()
		{
				$ic = $this->uri->segment(3);
				$emel = $this->uri->segment(4);
				
				$valid = $this->Login_Model->check_valid_forgot($ic, $emel);
				
				echo $valid;
		}
		
		public function forgot_password()
		{
				$chk = $this->Login_Model->check_valid_forgot($this->input->post('register-ic-forgot'), $this->input->post('reminder-email-forgot'));
               
                if($chk == 1)
                {
                    $new_password = mt_rand(100000, 999999);
                    
                    $this->Login_Model->reset_password($new_password);
                    
                    $name = get_users_name_by_email($this->input->post('reminder-email-forgot'), $this->input->post('register-ic-forgot'));
                    
                    $content = null;
                                    
                    $content .= "Salam Sejahtera,<br><br>";
                    $content .= "Tuan / Puan,<br><br>";
                    $content .= "Kata laluan tuan/puan direset dan boleh mengakses semula sistem dengan menggunakan kata laluan berikut:<br><br>";
                    
                    $content .= "<b>User ID</b> : ".$this->input->post( "register-ic-forgot" )."<br>";
                    $content .= "<b>Password</b> : ".$new_password."<br><br>";
                    
                    $content .= "Klik di sini <a href='".base_url()."'>Sistem Pengurusan Lesen Anjing - DBKL</a> untuk memasuki sistem eDog DBKL<br><br>";
                    $content .= "Terima kasih kerana menggunakan Sistem Pengurusan Lesen Anjing<br></br>Sekian, terima kasih<br><br>";
                    $content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
                    $content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
                    
                    
                    email_engine($content, $this->input->post('reminder-email-forgot'), $name, 'Penetapan Semua Kata Laluan di Sistem Pengurusan Lesen Anjing');
                    
                    echo 1;
                }
                else{
                    echo 0;
                }
                
		}
}
?>