<?php

class New_App extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('new_app_model');
		}
		
		public function index()
		{
				if( $this->session->userdata('isLoggedIn') )
				{
						$data['info'] = $this->new_app_model->get_all_info_by_app_id($this->uri->segment(3));
						$data['history'] = $this->new_app_model->get_history($this->uri->segment(3));
						$this->template->write_view('content', 'new_app', $data, TRUE);
						$this->template->parse_template = TRUE;
						$this->template->render();
				}
				else
				{
						redirect(base_url('admin'));
				}
		}
		
		public function save_new_app()
		{
				
				$this->new_app_model->save_new_app();
		}
}