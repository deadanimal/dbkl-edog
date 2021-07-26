<?php

class Faq extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if( $this->session->userdata('isLoggedIn') )
		{
			$this->template->write_view('content', 'faq');
			$this->template->parse_template = TRUE;
			$this->template->render();
		}
		else
		{
			redirect( base_url() );
		}
	}
}