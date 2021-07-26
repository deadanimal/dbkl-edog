<?php 

class Receipt extends CI_Controller
{
	 public function __construct()
	 {
	 		parent::__construct();
	 		$this->load->model('receipt_model');
	 		
	 }
	 
	 public function index()
	 {
	 		if($this->session->userdata('isLoggedIn'))
	 		{

	 			$data['info'] = $this->receipt_model->get_info_application($this->uri->segment(3));
	 			$this->load->view('receipt_pdf', $data);
	 		}
	 		else
	 		{
	 			redirect('login');
	 		}
	 }
}
?>