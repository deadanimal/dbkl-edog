<?php 

class Receipt_Model extends CI_Model
{
		public function __construct()
		{
				parent::__construct();
		}
		
		public function get_info_application($app_id)
		{
				$this->db->select('*')
								 ->from('application')
								 ->join('address','address.addr_id = application.addr_id')
								 ->where('application.app_id', $app_id);
								 
				$data = $this->db->get();
				
				return $data->result();
		}
}