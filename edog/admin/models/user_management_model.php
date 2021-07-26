<?php

class User_Management_Model extends CI_Model
{
		public function __construct()
		{
				parent::__construct();
				$this->load->library('encrypt');
		}
		
		public function get_all_users($limit, $start)
		{
				if( $this->session->userdata('roles') == 2 )
				{
					$this->db->where('roles', 1);
				}

				if($this->input->get('search-data'))
				{
					$this->db->like('name', $this->input->get('search-data'));
					$this->db->or_like('nric', $this->input->get('search-data'));
				}

				$this->db->limit($limit, $start);
				$data = $this->db->get('users');
				
				return $data->result();
		}

		public function get_total_all_users()
		{
				if( $this->session->userdata('roles') == 2 )
				{
					$this->db->where('roles', 1);
				}
				
				$this->db->like('name', $this->input->get('search-data'));
				$this->db->or_like('nric', $this->input->get('search-data'));
				$data = $this->db->get('users');
				
				return $data;
		}
		
		public function get_data_profile($uid = 0)
		{
			
				$this->db->select('*')
								 ->from('users')
								 ->join('profile', 'users.uid = profile.uid');
								 
					if($uid > 0)
							 $this->db->where('users.uid', $uid);
								 
				$data = $this->db->get();
				
				if($data->num_rows() == 0)
				{
					$this->db->select('*')
								 ->from('users');
								 
					if($uid > 0)
							 $this->db->where('users.uid', $uid);
								 //->join('profile', 'users.uid = profile.uid');
								 
					$data = $this->db->get();
				}

				return $data->result();
		}
		
		public function get_address_registered($profileID)
		{
				$this->db->where('profile_id', $profileID);
				$data = $this->db->get('address');
				
				return $data->result();
		}
		
		public function update_status($uid, $stat)
		{
			 $arr = array(
			 			'status' => $stat
			 );
			 
			 $this->db->where('uid', $uid);
			 $this->db->update('users', $arr);
			 
			 return 1;
		}
		
		public function add_new_users()
		{
				$arr = array(
						'username' => $this->input->post('user-settings-username'),
						'nric_type' => 'IC',
						'nric' => $this->input->post('add-contact-nric'),
						'email' => $this->input->post('add-contact-email'),
						'password' => $this->encrypt->sha1($this->input->post('user-settings-password')),
						'name' => $this->input->post('add-contact-name'),
						'status' => 1,
						'roles' => $this->input->post('add-contact-roles')
				);
				
				$this->db->insert('users', $arr);
				$uid = $this->db->insert_id();
				
				$arrProfile = array(
								'identity_type' => 'IC',
								'nric' => $this->input->post('add-contact-nric'),
								'email' => $this->input->post('add-contact-email'),
								'name' => $this->input->post('add-contact-name'),
								'phone_no' => $this->input->post('add-contact-phone'),
								'citizenship' => 'Malaysia',
								'uid' => $uid
						);
				
				$this->db->insert('profile', $arrProfile);
		}
		
		public function update_users()
		{
				$arr = array(
						'password' => $this->encrypt->sha1($this->input->post('user-settings-password-upd'))
				);
				
				$this->db->where('uid', $this->input->post('user-id'));
				$this->db->update('users', $arr);
				
				$prof = array(
						'phone_no' => $this->input->post('user-settings-phone-upd')
				);
				
				$this->db->where('uid', $this->input->post('user-id'));
				$this->db->update('profile', $prof);
		}
		
		public function get_sms_data()
		{
			$sms = $this->db->get('sms_temp');
		
			if($sms->num_rows() == 0)
			{
				$data = $this->get_data_profile();
				
				foreach($data as $row)
				{
					$this->db->insert('sms_temp', array('profile_id' => $row->profile_id, 'phone_no' => $row->phone_no));
				}
			}

				$this->db->where('sms_send', 0);
				$data = $this->db->get('sms_temp');
				
				return $data->result();
			
		}
		
		public function update_sms_send($temp_id, $status)
		{
			$this->db->where('temp_id', $temp_id);
			$this->db->update('sms_temp', array('status' => $status, 'sms_send' => 1, 'time_send' => date('Y-m-d H:i:s')));
		}
		
		public function delete_sms_temp()
		{
			$this->db->delete('sms_temp');
		}
}