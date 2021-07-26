<?php

class Manage_Profile_Model extends CI_Model
{
		public function __contruct()
		{
				parent::__construct();
				
		}
		
		private function get_profile_id($uid)
		{
				$this->db->select('profile_id');
				$this->db->from('profile');
				$this->db->where('uid', $uid);
				
				$data = $this->db->get();
				return $data->result();
		}
		
		public function save_profile()
		{
				$authorize = $this->authorize_user_profile();
				
				if( count($authorize) == 0 )
				{
						//PROFILE
						$profile = array(
													'name' => $this->input->post('val_name'),
													'citizenship' => $this->input->post('val_resident_my'),
													'identity_type' => $this->input->post('val_type_id'),
													'nric' => $this->input->post('val_ids'),
													'phone_no' => $this->input->post('masked_phone'),
													'email' => $this->input->post('val_email'),
													'uid' => $this->session->userdata('userid')
											 );
											 
						$this->db->insert('profile', $profile);
				}
				else
				{
						//PROFILE
						$profile = array(
													'name' => $this->input->post('val_name'),
													'citizenship' => $this->input->post('val_resident_my'),
													'identity_type' => $this->input->post('val_type_id'),
													'nric' => $this->input->post('val_ids'),
													'phone_no' => $this->input->post('masked_phone'),
													'email' => $this->input->post('val_email')
											 );
						$this->db->where('uid', $this->session->userdata('userid'));					 
						$this->db->update('profile', $profile);
				}
				
				if($this->input->post('val_pass') != "")
				{
					$this->load->library('encrypt');
						$this->db->where('uid', $this->session->userdata('userid'));
						$this->db->update('users', array('password' => $this->encrypt->sha1($this->input->post('val_pass'))));
				}
		}
		
	
		
		public function get_parlimen()
		{
				$arr = $this->db->get('parlimen');
				
				return $arr->result();
		}
		
		public function get_house_type()
		{
				$arr = $this->db->get('house_type');
				
				return $arr->result();
		}
		
		public function get_house_space()
		{
				$arr = $this->db->get('house_space');
				
				return $arr->result();
		}
		
		public function authorize_user_profile()
		{
			 $this->db->where('uid', $this->session->userdata('userid'));
			 $data = $this->db->get('profile');
			 
			 return $data->result();
		}
		
		public function delete_address($addrID)
		{
				$this->db->where('addr_id', $addrID);
				$this->db->delete('address');
		}
		
		public function get_address($addrID)
		{
				$this->db->where('addr_id', $addrID);
				$data = $this->db->get('address');
				
				return $data->result();
		}
		
		public function update_address()
		{
				$addressID = $this->input->post('addressID');
				
				$address = array(
											'no_unit' => $this->input->post('val_no_unit'),
											'home_name' => $this->input->post('val_name_house'),
											'street_name' => $this->input->post('val_street'),
											'town_name' => $this->input->post('val_town'),
											'postcode' => $this->input->post('val_postcode'),
											'parlimen' => $this->input->post('val_parlimen'),
											'home_type' => $this->input->post('val_house_type'),
											'home_space' => $this->input->post('house_space'),
											'dog_house' => $this->input->post('house_dog')
									 );
									 
				$this->db->where('addr_id', $addressID);
				$this->db->update('address', $address);
		}
}