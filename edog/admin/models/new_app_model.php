<?php

class New_App_Model extends CI_Model
{
		public function __construct()
		{
				parent::__construct();
		}
		
		public function get_all_info_by_app_id($appID)
		{
				$this->db->select('*')
								 ->from('application')
								 ->join('address', 'application.addr_id = address.addr_id')
								 ->join('profile', 'address.profile_id = profile.profile_id')
								 ->where('application.app_id', $appID);
								 
				$data = $this->db->get();
				
				return $data->result();
		}
		
		public function get_history($appID)
		{
				$this->db->where('app_id', $appID);
				$this->db->order_by('date_history', 'desc');
				
				$data = $this->db->get('history');
				
				return $data->result();
		}
		
		public function save_new_app()
		{
				if ( $this->input->post('decision') == "Diterima" )
				$date_acc = date('Y-m-d H:i:s');
			else
				$date_acc = '0000-00-00 00:00:00';
				
				$arr = array(
							'status' => $this->input->post('decision'),
							'reason_reject' => $this->input->post('reject-cause'),
							'decision_desc' => $this->input->post('decision-description'),
							'date_accept' => $date_acc
				);
				
				$this->db->where('app_id', $this->input->post('appID'));
				$this->db->update('application', $arr);
				
				if($this->input->post('decision-description') == "")
					$description = "Tidak Berkenaan";
				else
					$description = $this->input->post('decision-description');
					
				$hty = array(
							'status' => $this->input->post('decision'),
							'app_id' => $this->input->post('appID'),
							'date_history' => date('Y-m-d H:i:s'),
							'description' => $description,
							'staff_id' => $this->session->userdata('admin_userid')
				);
				
				$this->db->insert('history', $hty);
		}
		
		public function save_staff_comment()
		{
			if($this->input->post('comment') != '')
			{
				$arr = array(
					'comment' => $this->input->post('comment'),
					'dog_id' => $this->input->post('dog-id')
				);
				
				$this->db->insert('dog_comment', $arr);
			}

			$this->db->where('dog_id', $this->input->post('dog-id'))
					 ->update('license', array('license_no' => $this->input->post('val_lencana')));
				
		}

		public function updateReceiptNo($receiptNo, $payVal, $appID)
		{
			$this->db->where(array('app_id' => $appID))
					 ->update('payment', array('receipt' => $receiptNo, 'amount' => $payVal));
		}
}