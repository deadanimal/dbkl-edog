<?php

class New_License extends CI_Controller {
	
	public function __construct() 
	{
		parent::__construct();
		$this->no_cache();
		$this->load->library('upload');
		$this->load->model('new_license_model');
	}
	
	public function index() 
	{
		if( $this->session->userdata("isLoggedIn") )
		{ 
			$profile = $this->new_license_model->authorization_profile();
			
			if( count($profile) > 0 )
			{
				$data['USER'] = get_users_name( $this->session->userdata('userid') );
				$data['ADDRESS'] = $this->new_license_model->get_address_user();
				//$data['DOG'] = $this->new_license_model->get_all_dogs();
				
				$this->template->write_view( "content","new_license", $data, TRUE );
				$this->template->parse_template = TRUE;
				$this->template->render();	
			}
			else
			{
				redirect('manage_profile');
			}
		}else{
			redirect('login');
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