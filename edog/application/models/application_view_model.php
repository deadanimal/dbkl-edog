<?php

class Application_View_Model extends CI_Model
{
		public function __construct()
		{
				parent::__construct();
		}
		
		public function get_application_info($appID)
		{
				$this->db->select('*, application.status AS statusApp')
								 ->from('application')
								 ->join('address', 'application.addr_id = address.addr_id')
								 ->where(array('application.app_id' => $appID));
								 
				$data = $this->db->get();
				
				return $data->result();
		}

		public function get_reason_dog()
		{
				$this->db->where('category', 'Application|Dog')
						 ->order_by('reason', 'asc');

				$data = $this->db->get('reason_not_renew');

				return $data->result();
		}

		public function updateStatus()
		{
			$this->db->where('dog_id', $this->input->post('dogid'))
					 ->update('dog_details', array('status' => 'Invalid', 'reason' => $this->input->post('status')));
		}
}