<?php 

class Login extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			$this->load->library('My_PHPMailer');
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
			
			redirect( base_url('admin') );
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
								
								$content .= "Untuk log masuk, sila layari : <a href='".base_url()."index.php/login'>Sistem Pengurusan Lesen Anjing - DBKL</a><br><br>";
								$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
								$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
								
								email_engine($content, $this->input->post('register-email'), $this->input->post('register-name'));
	
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
				$new_password = get_rand_alphanumeric(6);
				
				$this->Login_Model->reset_password($new_password);
				$name = get_users_name_by_email($this->input->post('reminder-email'), $this->input->post('register-ic'));
				
				$content = null;
								
				$content .= $this->input->post( "register-name" ).",<br></br>";
				$content .= "Ini adalah untuk memaklumkan bahawa kami telah menetapkan semula kata laluan anda di portal Sistem Pengurusan Lesen Anjing -DBKL.<br><br>
										 Butiran akaun anda adalah seperti berikut::<br></br>";
				
				$content .= "<b>User ID</b> : ".$this->input->post( "register-ic" )."<br>";
				$content .= "<b>Password</b> : ".$new_password."<br></br>";
				
				$content .= "Untuk log masuk, sila layari : <a href='".base_url()."index.php/login'>Sistem Pengurusan Lesen Anjing - DBKL</a><br><br>";
				$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
				$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
				
				
				email_engine($content, $this->input->post('register-email'), $name);
				
				/*$mail = new PHPMailer();
				$mail->IsHTML(true);
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPDebug = 1;
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "hafidzulamin.zulkifli@gmail.com";  // user email address
        $mail->Password   = "aa860620";            // password in GMail
        //$mail->SetFrom('admin@e-dog.dbkl.gov.my', 'DBKL Support');  //Who is sending the email
        $mail->SetFrom('edog@dbkl.gov.my', 'DBKL Support');  //Who is sending the email
        $mail->AddAddress($this->input->post('register-email'), $name);
        //$mail->AddReplyTo("hafidzulamin@hotmail.com","Hafidzul Amin");  //email address that receives the response
        
        $mail->Subject    = "Pendaftaran di Sistem Pengurusan Lesen Anjing - DBKL";
        $mail->Body      = $content;
        
        //$mail->AltBody    = "Plain text message";
       	
       	
				if($mail->Send()){
		    	redirect( base_url() );
				} else {
		    	echo "Error: " . $mail->ErrorInfo;
				}*/
		}
}
?>