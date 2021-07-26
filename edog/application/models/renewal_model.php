<?php

class Renewal_Model extends CI_Model
{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_reasons()
		{
				$this->db->where_in('category', array('Dog', 'Application|Dog'));
				$reason = $this->db->get('reason_not_renew');
				
				return $reason->result();
		}
		
		public function get_address($appID)
		{
				$this->db->select('*')
								 ->from('application')
								 ->join('address', 'application.addr_id = address.addr_id')
								 ->where('application.app_id', $appID);
								 
				$data = $this->db->get();
				
				return $data->result();
		}
		
		public function get_dog_detail($dogID)
		{
				$this->db->where('dog_id', $dogID);
				$data = $this->db->get('dog_details');
				
				return $data->result();
		}
		
		private function get_old_app($appID)
		{
				$this->db->where('app_id', $appID);
				$data = $this->db->get('application');
				
				return $data->result();
		}
		
		private function get_old_dog($dogID)
		{
				$this->db->where('dog_id', $dogID);
				$data = $this->db->get('dog_details');
				
				return $data->result();
		}
		
		public function save_renew_application($target, $dogPic1, $dogPic2)
		{
				$oldApp = $this->get_old_app( $this->input->post('appID') );
				$appNo = get_application_no();
				
				// print_r($_POST);
				// print_r($oldApp);
				// exit;
				foreach($oldApp as $row)
				{
					$this->db->where('app_id', $row->app_id);
					$this->db->update('application', array('renewed' => 1));
					
					if( $this->input->post('doc_type') == 1)
					{
							$status = "Dalam Proses";
					}
					else
					{
							$status = "Diterima";
					}
					
						$app = array(
									'app_no' => $appNo,
									'app_type' => 'RENEW',
									'date_apply' => date('Y-m-d h:i:s'),
									'date_renew' => date('Y-m-d h:i:s'),
									'status' => $status,
									'doc_support' => $target,
									'old_app_id' => $row->app_id,
									'addr_id' => $row->addr_id
						);
						
						$this->db->insert('application', $app);	
						$renewID = $this->db->insert_id();
											
						
						$oldDog1 = $this->get_old_dog($this->input->post('dog-id-1'));
						
						if( $this->input->post('reasons') == 0 )
						{
							foreach($oldDog1 as $rows)
							{
								//DOG FIRST
								 
								 if( $dogPic1 == '' )
								 {
								 		$trgtDog1 = $rows->dog_pic;
								 }
								 else
								 {
								 		$trgtDog1 = 'doc/pic/'.$dogPic1;
								 }
								 
								 if( $this->input->post('weight-val') == "" )
								 {
								 		$dog1 = array(
								 					'dog_type' => $rows->dog_type,
								 					'color' => $rows->color,
								 					'gender' => $rows->gender,
								 					'weight' => $rows->weight,
								 					'sterilization' => $rows->sterilization,
								 					'microchip' => $rows->microchip,
								 					'owner_training' => $rows->owner_training,
								 					'dog_training' => $rows->dog_training,
								 					'dog_pic' => $trgtDog1,
								 					'status' => 'Valid',
								 					'app_id' => $renewID
								 		);
								 		
								 		$this->db->insert('dog_details', $dog1);
								 }
								 else
								 {
										$dog1 = array(
													'dog_type' => $rows->dog_type,
								 					'color' => $rows->color,
								 					'gender' => $rows->gender,
													'weight' => $this->input->post('weight-val'),
													'sterilization' => $this->input->post('mandul-val'),
													'microchip' => $this->input->post('microchip-val'),
													'owner_training' => $this->input->post('owner-training-val'),
													'dog_training' => $this->input->post('dog-training-val'),
													'dog_pic' => $trgtDog1,
													'status' => 'Valid',
													'app_id' => $renewID
										);
										
										$this->db->insert('dog_details', $dog1);
								 }
	
							}
						}
						else
						{

									$arr_not = array(
												'status' => 'Invalid',
												'reason' => $this->input->post('reasons')
									);
									
									$this->db->where('dog_id', $this->input->post('dog-id-1'));
									$this->db->update('dog_details', $arr_not);
						}
						
						$oldDog2 = $this->get_old_dog($this->input->post('dog-id-2'));
						
						if( $this->input->post('reasons2') == 0 )
						{
							foreach($oldDog2 as $rowss)
							{
								//DOG SECOND
								 
								 if( $dogPic2 == '' )
								 {
								 		$trgtDog2 = $rowss->dog_pic;
								 }
								 else
								 {
								 		$trgtDog2 = 'doc/pic/'.$dogPic2;
								 }
								 
								 if( $this->input->post('weight-val-2') == "" )
								 {
								 		$dog2 = array(
								 					'dog_type' => $rows->dog_type,
								 					'color' => $rows->color,
								 					'gender' => $rows->gender,
								 					'weight' => $rowss->weight,
								 					'sterilization' => $rowss->sterilization,
								 					'microchip' => $rowss->microchip,
								 					'owner_training' => $rowss->owner_training,
								 					'dog_training' => $rowss->dog_training,
								 					'dog_pic' => $trgtDog2,
								 					'status' => 'Valid',
								 					'app_id' => $renewID
								 		);
								 		
								 		$this->db->insert('dog_details', $dog2);
								 }
								 else
								 {
										$dog2 = array(
												  'dog_type' => $rows->dog_type,
								 					'color' => $rows->color,
								 					'gender' => $rows->gender,
													'weight' => $this->input->post('weight-val-2'),
													'sterilization' => $this->input->post('mandul-val-2'),
													'microchip' => $this->input->post('microchip-val-2'),
													'owner_training' => $this->input->post('owner-training-val-2'),
													'dog_training' => $this->input->post('dog-training-val-2'),
													'dog_pic' => $trgtDog2,
													'status' => 'Valid',
													'app_id' => $renewID
										);
										
										$this->db->insert('dog_details', $dog2);
								 }
							}
						}
						else
						{
								$arr_not2 = array(
											'status' => 'Invalid',
											'reason' => $this->input->post('reasons2')
								);
								
								$this->db->where('dog_id', $this->input->post('dog-id-2'));
								$this->db->update('dog_details', $arr_not2);
								
						}
				}
		}
}