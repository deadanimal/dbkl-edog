<?php

class Dashboard_User_Model extends CI_Model
{
		
		public function __construct()
		{
				parent::__construct();
		}
		
		public function get_dashboard_new()
		{
			
				$this->db->select('*')
								 ->from('profile')
								 ->join('address', 'profile.profile_id = address.profile_id')
								 ->join('application', 'address.addr_id = application.addr_id')
								 ->where_in('application.status', array('Diterima','Ditolak','Dalam Proses'))
								 ->where(array('profile.uid' => $this->session->userdata('userid')));
				
				$dash_new = $this->db->get();
				
				return $dash_new->result();
		}

		
		public function get_all_address()
		{
				$this->db->select('*')
								 ->from('profile')
								 ->join('address', 'profile.profile_id = address.profile_id')
								 ->where('profile.uid', $this->session->userdata('userid'));
				
				$addr = $this->db->get();
				
				return $addr->result();
		}
		
}