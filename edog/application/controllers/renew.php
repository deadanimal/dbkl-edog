<?php

class Renew extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->no_cache();
				$this->load->model('renew_model');
		}
		
		public function index()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data['ADDRESS'] = $this->renew_model->get_all_info();
				$data['reason'] = $this->renew_model->get_reasons();
				$this->template->write_view('content','renew',$data,TRUE);
				$this->template->parse_template = TRUE;
				$this->template->render();
			}
			else
			{
				redirect('login');
			}
		}
		
		public function get_address()
		{
			$address = $this->renew_model->get_info_address($this->uri->segment(3));
			$complete_addr = null;
			
			foreach($address as $addr)
			{
					$complete_addr .= $addr->no_unit.", ".$addr->home_name.", ".$addr->street_name."<br>".$addr->town_name.", ".get_parlimen_name($addr->parlimen).", ".$addr->postcode." Kuala Lumpur.";
			}
			$totalDog = get_total_dog($this->uri->segment(3));
			
			echo $complete_addr."|".count($totalDog);
		}
		
		public function save_not_renew()
		{
				$this->renew_model->save_not_renew();
		}
		
		public function no_cache() 
		{
		  $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		  $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		  $this->output->set_header('Pragma: no-cache');
		  $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		}
}