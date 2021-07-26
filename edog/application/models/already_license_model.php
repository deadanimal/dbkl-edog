<?php

class Already_License_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_info_license($addr_id)
	{
			$this->db->select('*')
							 ->from('application')
							 ->join('dog_details', 'application.app_id = dog_details.app_id')
							 ->join('license', 'dog_details.dog_id = license.dog_id')
							 ->where('application.addr_id', $addr_id)
							 ->order_by('application.app_no');
							 
			$data = $this->db->get();
			
			return $data->result();
			
	}
	
	public function get_address_view($addr_id)
	{
			$this->db->where('addr_id', $addr_id);
			$data = $this->db->get('address');
			
			return $data->result();
	}
}