<?php

class Appeal_Model extends CI_Model
{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function save_appeal($doc)
		{
			$this->db->where('app_id', $this->input->post('app_id'));
			$data = $this->db->get('application');
			$row = $data->row();

			$docUpload = $row->doc_support.$doc;

			$arr = array(
						'status' => 'Dalam proses',
						'appeal' => 1,
						'appeal_desc' => $this->input->post('text-appeal'),
						'doc_support' => $docUpload
			);
			
			$this->db->where('app_id', $this->input->post('app_id'));
			$this->db->update('application', $arr);
			
			$dg = array(
						'status' => 'Valid'
			);
			
			$this->db->where('app_id', $this->input->post('app_id'));
			$this->db->update('dog_details', $dg);
		}
}