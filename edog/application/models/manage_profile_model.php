<?php

class Manage_Profile_Model extends CI_Model
{
		public function __construct()
		{
				parent::__construct();
				// $this->load->library('encrypt');
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

				//print_r($_POST);exit;

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

					$this->db->where('uid', $this->session->userdata('userid'));
					$this->db->update('users', array('email' => $this->input->post('val_email')));
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

					$this->db->where('uid', $this->session->userdata('userid'));
					$this->db->update('users', array('email' => $this->input->post('val_email')));

				}
				
				if( $this->input->post('val_password_view') != "" )
				{
					$user = array(
								'password' => $this->encrypt->sha1( $this->input->post('val_password_view') )
					);
					
					$this->db->where('uid', $this->session->userdata('userid'));
					$this->db->update('users', $user);
				}
		}
		
		public function save_address($data)
		{
				$pathImage = 'doc/uploadbil/'.$data['image_metadata']['orig_name'];
				$profileID = $this->get_profile_id( $this->session->userdata('userid') );
				echo "pathName = ".$pathImage."-----";
				//ADDRESS
				
				$address = array(
					'no_unit' => $this->input->post('val_no_unit'),
					'home_name' => $this->input->post('val_name_house'),
					'street_name' => $this->input->post('val_street'),
					'town_name' => $this->input->post('val_town'),
					'postcode' => $this->input->post('val_postcode'),
					'parlimen' => $this->input->post('val_parlimen'),
					'home_type' => $this->input->post('val_house_type'),
					'home_space' => $this->input->post('house_space'),
					'dog_house' => $this->input->post('house_dog'),
					'doc_bill' => $pathImage,
					'profile_id' => $profileID[0]->profile_id
				);
									 
				$this->db->insert('address', $address);
		}
		
		public function get_parlimen()
		{
				$this->db->where('par_status', 1);
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
			$data = $this->db->get('address')->row();
			unlink($data->doc_bill);
			$this->db->where('addr_id', $addrID);
			$this->db->delete('address');
		}
		
		public function get_address($addrID)
		{
				$this->db->where('addr_id', $addrID);
				$data = $this->db->get('address');
				
				return $data->result();
		}
		
		public function update_address($data)
		{
			$pathImage = 'doc/uploadbil/'.$data['image_metadata']['orig_name'];
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
				'dog_house' => $this->input->post('house_dog'),
				'doc_bill' => $pathImage,
			);
									
			$this->db->where('addr_id', $addressID);
			$this->db->update('address', $address);
		}

		// public function doc_profile()
		// {		
		// 	$authorize = $this->authorize_user_profile();
			
		// 	echo $authorize[0]->profile_id;die;

		// 	$this->db->select('*');
		// 	$this->db->from('address');
		// 	$this->db->where('addr_id', $authorize[0]->profile_id);
			
		// 	$data = $this->db->get();
		// 	return $data->result();
		// }
}