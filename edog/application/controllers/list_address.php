<?php

class List_Address extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('list_address_model');
		}
		
		public function index()
		{
			if( $this->session->userdata('isLoggedIn') )
			{
				$data['PROFILE'] = $this->list_address_model->get_profile_user();
				
				$this->template->write_view('content', 'list_address', $data, TRUE);
				$this->template->parse_template = TRUE;
				$this->template->render();
			}
			else
			{
				redirect('login');
			}
		}
}