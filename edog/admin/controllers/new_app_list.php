<?php

class New_App_List extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('dashboard_admin_model');
		}
		
		public function index()
		{
				if( $this->session->userdata('isLoggedIn') )
				{
						$data['new_app'] = $this->dashboard_admin_model->get_approved_app($this->uri->segment(3));
						$this->template->write_view('content', 'new_app_list', $data, TRUE);
						$this->template->parse_template = TRUE;
						$this->template->render();
				}
				else
				{
						redirect('login');
				}
		}
}