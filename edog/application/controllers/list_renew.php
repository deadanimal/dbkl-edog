<?php

class List_Renew extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->no_cache();
		}
		
		public function index()
		{
				if( $this->session->userdata('isLoggedIn') )
				{
					
					$this->template->write_view('content', 'list_renew');
					$this->template->parse_template = TRUE;
					$this->template->render();	
				}
				else
				{
					redirect('login');
				}
		}
		
		public function no_cache() {
		  $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		  $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		  $this->output->set_header('Pragma: no-cache');
		  $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		}
}	