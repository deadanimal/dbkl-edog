<?php

class Proof_Application extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('proof_app_model');
				$this->load->library('Barcode39');
		}
		
		public function index()
		{

				if( $this->session->userdata('isLoggedIn') )
				{
						$data['application'] = $this->proof_app_model->get_application($this->uri->segment(3));
						$this->template->write_view('content', 'proof_application', $data, TRUE);
						$this->template->parse_template = TRUE;
						$this->template->render();
				}
				else
				{
						redirect( 'login' );
				}
		}
}