<?php 

class Manage_Profile extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->no_cache();
				$this->load->model('manage_profile_model');
		}
		
		public function index()
		{
			if( $this->session->userdata('isLoggedIn') )
			{
				
					$data['PARLIMEN'] = $this->manage_profile_model->get_parlimen();
					$data['HOUSE_TYPE'] = $this->manage_profile_model->get_house_type();
					$data['HOUSE_SPACE'] = $this->manage_profile_model->get_house_space();
					$data['PROFILE'] = $this->manage_profile_model->authorize_user_profile();
					$this->template->write_view('content','manage_profile', $data, TRUE);
					$this->template->parse_template = TRUE;
					$this->template->render();
			}
			else
			{
				redirect('login');
			}
		}
		
		public function save_profile()
		{
				$this->manage_profile_model->save_profile();
				redirect(base_url('admin').'/index.php/manage_profile');
		}
	
		
		
		
		
		public function no_cache() {
		  $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		  $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		  $this->output->set_header('Pragma: no-cache');
		  $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		}
}
?>