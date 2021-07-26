<?php

class Appeal_List extends CI_Controller
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
						$data['appeal'] = $this->dashboard_admin_model->get_sum_of_appeal($this->uri->segment(3));
						$this->template->write_view('content', 'appeal_list', $data, TRUE);
						$this->template->parse_template = TRUE;
						$this->template->render();
				}
				else
				{
						redirect(base_url('admin'));
				}
		}
}