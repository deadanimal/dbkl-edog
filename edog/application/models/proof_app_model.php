<?php

class Proof_App_Model extends CI_Model
{
		public function __construct()
		{
				parent::__construct();
		}
		
		public function get_application($app_id)
		{
				$this->db->select('*');
				$this->db->from('application');
				$this->db->join('address', 'application.addr_id = address.addr_id');
				
				$this->db->where('application.app_id', $app_id);
				$data = $this->db->get();
				
				return $data->result();
		}
}