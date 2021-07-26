<?php

class Main extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('login');
			// redirect(base_url().'edog2017','refresh');
		}
}