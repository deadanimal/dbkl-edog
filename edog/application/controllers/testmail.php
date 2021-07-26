<?php 

class Testmail extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
	}
	
	public function index() {
	      $content = null;
	      
		  $content .= "TEST";
		$this->load->library('My_PHPMailer');
		
		$mail = new PHPMailer();
	
        $mail->IsSMTP(); // we are going to use SMTP
		$mail->IsHTML(true); 
        //$mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPDebug = 1;
        //$mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
        $mail->Host       = "webmail.dbkl.gov.my";      // setting GMail as our SMTP server
        //$mail->Port       = 25;                   // SMTP port to connect to GMail
        $mail->Username   = "norbaizura@dbkl.gov.my";  // user email address
        $mail->Password   = "nan25009";            // password in GMail
        $mail->SetFrom('jkas@edog.dbkl.gov.my', 'DBKL Support');  //Who is sending the email
        //$mail->AddReplyTo("hafidzulamin@hotmail.com","Hafidzul Amin");  //email address that receives the response
        $mail->Subject    = "Email subject";
        $mail->Body      = $content;
        $mail->AltBody    = "Plain text message";
       	$mail->AddAddress("norbaizura@dbkl.gov.my", "Pn Norbaizura");
       	
		if($mail->Send()){
    	echo"Your email was sent successfully";
		} else {
    	echo "Error: " . $mail->ErrorInfo;
		}
	}
}
?>