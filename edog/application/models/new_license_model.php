<?php

class New_License_Model extends CI_Model
{
		public function __construct()
		{
				parent::__construct();
		}
		

		
		public function authorization_profile()
		{
				$this->db->where('uid', $this->session->userdata('userid'));
				$data = $this->db->get('profile');
				
				return $data->result();
		}
		
		public function get_profile_user()
		{
				$this->db->where('uid', $this->session->userdata('userid'));
		}
		
		public function get_address_user()
		{
			$this->db->select('*');
			$this->db->from('profile');
			$this->db->join('address', 'address.profile_id = profile.profile_id');
			$this->db->where('profile.uid', $this->session->userdata('userid'));
			
			$data = $this->db->get();
			return $data->result();
		}
}