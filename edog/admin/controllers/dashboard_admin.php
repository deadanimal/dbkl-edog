<?php

class Dashboard_Admin extends CI_Controller
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
						$data['sum_of_user'] = $this->dashboard_admin_model->get_sum_of_app();
						$data['sum_of_new_app'] = $this->dashboard_admin_model->get_sum_of_new_app();
						$data['sum_of_appeal'] = $this->dashboard_admin_model->get_sum_of_appeal();
						$data['approved_app'] = $this->dashboard_admin_model->get_approved_app();
						$data['accepted_app'] = $this->dashboard_admin_model->get_accepted_app();
						$data['sum_of_not_renew'] = $this->dashboard_admin_model->get_sum_of_not_renew();
						$data['already_license'] = $this->dashboard_admin_model->get_already_dash_license();
						$this->template->write_view('content', 'dashboard_admin', $data, TRUE);
						$this->template->parse_template = TRUE;
						$this->template->render();
				}
				else
				{
						redirect(base_url('admin'));
				}
		}
}