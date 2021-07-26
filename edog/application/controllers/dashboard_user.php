<?php

class Dashboard_user extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			$this->load->helper('common');
			$this->load->model('dashboard_user_model');
			$this->no_cache();
		}
		
		public function index() {
			
			if( $this->session->userdata('isLoggedIn') ){
				
				$data['USER'] = get_users_name( $this->session->userdata('userid') );
				$data['ADDRESS'] = $this->dashboard_user_model->get_all_address();
				$data['DASH_NEW'] = $this->dashboard_user_model->get_dashboard_new();
				$this->template->write_view( "content","dashboard_user",$data,TRUE );
				$this->template->parse_template = TRUE;
				$this->template->render();
				
			}else{
				redirect( base_url() );
			}
		}
		
		public function no_cache() {
		  $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		  $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		  $this->output->set_header('Pragma: no-cache');
		  $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		}
}