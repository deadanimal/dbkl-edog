<?php

class Sms_Blasting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Management_Model');
	}
	
	public function index()
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$this->template->write_view('content', 'sms_blast', $data, TRUE);
			$this->template->parse_template = TRUE;
			$this->template->render();
		}
		else
		{
			redirect('login');
		}
	}
	
	public function blast()
	{
		$phone_no = $this->User_Management_Model->get_sms_data();
		
		//$phone_no = array('0163056762');
		$message = 'Semua+pemilik+anjing+wajib+memgambil+/+memperbaharui+lesen+anjing+bagi+tahun+2016+.+Memelihara+anjing+tanpa+lesen+di+WPKL+adalah+SALAH+.';
		//redirect('http://202.171.41.169:8080/15888v3/smsgateway/sendsms.aspx?username=dapat15888&password=ZGFwYXQxMjM=&keyword=DBKL&shortcode=15888&smsid=0&sender=%2B60163056762&servicetype=BULK&details='.$message.'&telco=CELCOM&guid=0');
		foreach($phone_no as $ph)
		{
			$status = file_get_contents('http://202.171.41.169:8080/15888v3/smsgateway/sendsms.aspx?username=dapat15888&password=ZGFwYXQxMjM=&keyword=DBKL&shortcode=15888&smsid=0&sender=%2B6'.$ph.'&servicetype=BULK&details='.$message.'&telco=CELCOM&guid=0');
			//echo $status;
			$this->User_Management_Model->update_sms_send($ph->temp_id, $status);				
	
		}
	}
	
	public function delete_temporary()
	{
		$this->User_Management_Model->delete_sms_temp();
	}
}