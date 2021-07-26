<?php

class Application_View extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('application_view_model');
		}
		
		public function index()
		{
				if( $this->session->userdata('isLoggedIn') )
				{
					$data['info'] = $this->application_view_model->get_application_info($this->uri->segment(3));
					$data['reason'] = $this->application_view_model->get_reason_dog();
					$this->template->write_view('content', 'application_view', $data, TRUE);
					$this->template->parse_template = TRUE;
					$this->template->render();
				}
				else
				{
					redirect('login');
				}
		}

		public function update_status()
		{
			//print_r($_POST);exit;
			$this->application_view_model->updateStatus();
		}

}