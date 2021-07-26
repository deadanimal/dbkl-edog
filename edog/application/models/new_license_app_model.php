<?php

class New_License_App_Model extends CI_Model
{
		public function __construct()
		{
				parent::__construct();
		}
		
		public function save_temporary_dog($target)
		{
				$color_post = $this->input->post('val_dogcolor');
				$color = null;
				
				if( $this->input->post('val_microchip') == "" )
					$microchip = "Tiada";
				else
					$microchip = $this->input->post('val_microchip');
					
				for($i=0; $i < count($color_post); $i++)
				{
					if($i > 0){
				 	 	$color .= ", ";
				 	}

					 $color .= $color_post[$i];
				}
				
				if($target == null)
					$path = "";
				else
					$path = 'doc/pic/'.$target;					
			
				$arr = array(
							'dog_type' => $this->input->post('dog_type'),
							'dog_color' => $color,
							'dog_gender' => $this->input->post('val_gender'),
							'dog_weight' => $this->input->post('val_weight'),
							'dog_mandul' => $this->input->post('val_mandul'),
							'dog_microchip' => $microchip,
							'owner_training' => $this->input->post('owner_training'),
							'dog_training' => $this->input->post('dog_training'),
							'pic_dog' => $path,
							'addr_id' => $this->input->post('addrID'),
							'userid' => $this->session->userdata('userid'),
							'no_dog' => $this->input->post('dogID'),
							'app_type' => 'BARU'
				);	
				
				$this->db->insert('temporary_dog', $arr);
		}
		
		public function data_temporary($addrID,$dogID)
		{

			 $this->db->where(array('addr_id' => $addrID, 'userid' => $this->session->userdata('userid'), 'no_dog' => $dogID, 'app_type' => 'BARU'));
			 $data = $this->db->get('temporary_dog');
			 
			 return $data->result();
		}
		
		public function update_temporary($target)
		{
				$color_post = $this->input->post('val_dogcolor');
				$color = null;
				
				if( $this->input->post('val_microchip') == "" )
					$microchip = "Tiada";
				else
					$microchip = $this->input->post('val_microchip');
					
				for($i=0; $i < count($color_post); $i++)
				{
					 if($i > 0)
					 	$color .= ", ";
					 	
					 $color .= $color_post[$i];
				}
	
				if($target == null)
					$path = $this->input->post('loc_pic');
				else
					$path = 'doc/pic/'.$target;	
					
				$arr = array(
							'dog_type' => $this->input->post('dog_type'),
							'dog_color' => $color,
							'dog_gender' => $this->input->post('val_gender'),
							'dog_weight' => $this->input->post('val_weight'),
							'dog_mandul' => $this->input->post('val_mandul'),
							'dog_microchip' => $microchip,
							'owner_training' => $this->input->post('owner_training'),
							'dog_training' => $this->input->post('dog_training'),
							'pic_dog' => $path,
							'userid' => $this->session->userdata('userid')
				);	
				
				$this->db->where(array('addr_id' => $this->input->post('addrID'), 'userid' => $this->session->userdata('userid'), 'no_dog' => $this->input->post('dogID'), 'app_type' => 'BARU'));
				$this->db->update('temporary_dog', $arr);
		}
		
		public function cancel_temporary($dog, $addr)
		{
			 $this->db->where(array('addr_id' => $addr, 'userid' => $this->session->userdata('userid'), 'no_dog' => $dog, 'app_type' => 'BARU'));
			 $this->db->delete('temporary_dog');
			 
			 echo 1;
		}
		
		private function validate_dog_type($dog_type)
		{
				$this->db->select('dog_type.types');
				$this->db->from('dog_list');
				$this->db->join('dog_type', 'dog_list.dtid = dog_type.dtid');
				$this->db->where('dog_list.ddid', $dog_type);
				
				$data = $this->db->get();
				$row = $data->result();
				
				return $row[0]->types;
		}
		
		public function save_new_application($target)
		{
			$app_no = get_application_no();
			
			$this->db->where(array('addr_id' => $this->input->post('addrid'), 'userid' => $this->session->userdata('userid'), 'app_type' => 'BARU'));
			$query = $this->db->get('temporary_dog');
			$data = $query->result();
			$valid = array();
			$date_accept = null;
			
			foreach($data as $rows)
			{
					$cond = $this->validate_dog_type($rows->dog_type);
					$valid[] = $cond;
			}
				
			if( $this->input->post('doc_type') == 1)
			{
				
				if(in_array("Kecil", $valid))
				{
					$status = 'Dalam Proses';
					$date_accept = '0000-00-00 00:00:00';
				}
				else
				{
					// $status = "Ditolak"; - LAMA 22/01/2021
					$status = 'Dalam Proses'; // BARU 22/01/2021
					$date_accept = '0000-00-00 00:00:00';
				}
				
			}
			else
			{
					
				if(count($data) == 1)
				{
					if(in_array("Terlarang", $valid))
					{
						// $status = "Ditolak"; - LAMA 22/01/2021
						$status = 'Dalam Proses'; // BARU 22/01/2021
						$date_accept = '0000-00-00 00:00:00';
					}
					else
					{
						$status = 'Dalam Proses';
						$date_accept = date('Y-m-d H:i:s');
					}
				}
				else
				{
						$length = count( array_keys( $valid, "Terlarang" ) );
	
						if( $length == 2 )
						{
							// $status = "Ditolak"; - LAMA 22/01/2021
							$status = 'Dalam Proses'; // BARU 22/01/2021
							$date_accept = '0000-00-00 00:00:00';
						}
						else
						{
							$status = "Dalam Proses";
							$date_accept = date('Y-m-d H:i:s');
						}
				}
			}

			 $app = array(
			 			'app_no' => $app_no,
			 			'doc_support' => $target,
			 			'app_type' => 'BARU',
						'date_renew' => '0000-00-00 00:00:00',
			 			'date_apply' => date('Y-m-d H:i:s'),
			 			'date_accept' => $date_accept,
			 			'status' => $status,
			 			'addr_id' => $this->input->post('addrid')
			 );
			 
			 $this->db->insert('application', $app);
			 $app_id = $this->db->insert_id();
			 
			 if ( $status == "Ditolak" )
			 {
			 		$hstry = array(
			 					'status' => $status,
			 					'app_id' => $app_id,
			 					'date_history' => date('Y-m-d H:i:s'),
			 					'description' => 'Anjing tidak dibenarkan'
			 		);
			 		
			 		$this->db->insert('history', $hstry);
			 }
			 elseif ( $status == "Diterima" )
			 {
			 		$hstry = array(
			 					'status' => $status,
			 					'app_id' => $app_id,
			 					'date_history' => date('Y-m-d H:i:s'),
			 					'description' => 'Permohonan berjaya dihantar'
			 		);
			 		
			 		$this->db->insert('history', $hstry);
			 }
			 elseif ( $status == "Dalam Proses" )
			 {
			 		$hstry = array(
			 					'status' => $status,
			 					'app_id' => $app_id,
			 					'date_history' => date('Y-m-d H:i:s'),
			 					'description' => 'Permohonan berjaya'
			 		);
			 		
			 		$this->db->insert('history', $hstry);
			 }
			 
			 $arr_kecil[] = 'Kecil';
			 
			 foreach($data as $row)
			 {
			 		$dog_cond = $this->validate_dog_type($row->dog_type);
			 		
			 		if( $this->input->post('doc_type') == 1 )
			 		{
			 				if(in_array($dog_cond, $arr_kecil))
			 				{
			 					 $dog_status = "Valid";
			 				}
			 				else
			 				{
			 					$dog_status = "Invalid";
			 				}
			 		}
			 		else
			 		{
			 				if( $dog_cond == "Terlarang" )
			 				{
			 					$dog_status = "Invalid";
			 				}
			 				else
			 				{
			 					$dog_status = "Valid";
			 				}
			 		}
			 		
			 		$dog = array(
			 				'dog_type' => $row->dog_type,
			 				'color' =>	$row->dog_color,
			 				'gender' =>	$row->dog_gender,
			 				'weight' =>	$row->dog_weight,
			 				'sterilization' =>	$row->dog_mandul,
			 				'microchip' =>	$row->dog_microchip,
			 				'owner_training' =>	$row->owner_training,
			 				'dog_training' =>	$row->dog_training,
			 				'dog_pic' =>	$row->pic_dog,
			 				'status' => $dog_status,
			 				'app_id' => $app_id
			 				
			 		);
			 		
			 		$this->db->insert('dog_details', $dog);
			 }
			 
			 $this->db->where(array('addr_id' => $this->input->post('addrid'), 'userid' => $this->session->userdata('userid')));
			 $this->db->delete('temporary_dog');
			 
			 return $app_no;
		}
}