<?php

class Copyright extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
		}
		
		public function index()
		{
				$this->template->write_view('content', 'copyright');
				$this->template->parse_template = TRUE;
				$this->template->render();
	  }
}