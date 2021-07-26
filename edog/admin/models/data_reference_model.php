<?php

class Data_Reference_Model extends CI_Model
{
		public function __construct()
		{
		
		}
		
		public function get_data_parlimen()
		{
				$data = $this->db->get('parlimen');
				
				return $data->result();
		}
		
		public function get_data_house_type()
		{
				$data = $this->db->get('house_type');
				
				return $data->result();
		}
		
		public function get_data_house_space()
		{
				$data = $this->db->get('house_space');
				
				return $data->result();
		}
		
		public function get_data_dog_list()
		{
			$this->db->order_by('detail', 'asc');
			$data = $this->db->get('dog_list');
			
			return $data->result();
		}
		
		public function get_data_dog_weight()
		{
			$this->db->where('status', 1);
			$data = $this->db->get('dog_weight');
			
			return $data->result();
		}
		
		public function get_data_reason()
		{
			$data = $this->db->get('reason_not_renew');
			
			return $data->result();
		}
		
		public function get_data_counter()
		{
			$data = $this->db->get('payment_place');
			
			return $data->result();
		}
		
		public function save_new_parlimen()
		{
				$arr = array(
					'par_name' => $this->input->post('name-parlimen'),
					'par_description' => $this->input->post('deskripsi-parlimen'),
					'par_status' => $this->input->post('status-parlimen')
				);
				
				$this->db->insert('parlimen', $arr);
		}
		
		public function delete_parlimen()
		{
			$par = $this->input->post('_par');
			
			for($i=0; $i<count($par); $i++)
			{
				$this->db->where('par_id', $par[$i]);
				$this->db->delete('parlimen');
			}
		}
		
		public function get_detail($id)
		{
			$this->db->where('par_id', $id);
			$data = $this->db->get('parlimen');
			
			return $data->result();
		}
		
		public function update_parlimen()
		{
				$arr = array(
					'par_name' => $this->input->post('name-parlimen'),
					'par_description' => $this->input->post('deskripsi-parlimen'),
					'par_status' => $this->input->post('status-parlimen')
				);
				
				$this->db->where('par_id', $this->input->post('par_id'));
				$this->db->update('parlimen', $arr);
		}
		
		public function save_new_house_type()
		{
			$arr = array(
				'name' => $this->input->post('name-house-type'),
				'code' => $this->input->post('code-house-type'),
				'desc' => $this->input->post('deskripsi-house-type'),
				'doc' => $this->input->post('doc-support'),
				'status' => $this->input->post('status-house-type')
			);
			
			$this->db->insert('house_type', $arr);
		}
		
		public function delete_house_type()
		{
			$ht = $this->input->post('_ht');
			
			for($i=0; $i<count($ht); $i++)
			{
				$this->db->where('hid', $ht[$i]);
				$this->db->delete('house_type');
			}
		}
		
		public function get_detail_house_type($id)
		{
			$this->db->where('hid', $id);
			$data = $this->db->get('house_type');
			
			return $data->result();
		}
		
		public function update_house_type()
		{
			$arr = array(
				'name' => $this->input->post('name-house-type'),
				'code' => $this->input->post('code-house-type'),
				'desc' => $this->input->post('deskripsi-house-type'),
				'doc' => $this->input->post('doc-support'),
				'status' => $this->input->post('status-house-type')
			);
			$this->db->where('hid', $this->input->post('hid'));
			$this->db->update('house_type', $arr);
		}
		
		public function save_new_house_space()
		{
			$arr = array(
				'name' => $this->input->post('name-house-space'),
				'code' => $this->input->post('code-house-space'),
				'desc' => $this->input->post('deskripsi-house-space'),
				'quota' => $this->input->post('dog'),
				'status' => $this->input->post('status-house-space')
			);
			
			$this->db->insert('house_space', $arr);
		}
		
		public function delete_house_space()
		{
			$hs = $this->input->post('_hs');
			
			for($i=0; $i<count($hs); $i++)
			{
				$this->db->where('hsid', $hs[$i]);
				$this->db->delete('house_space');
			}
		}
		
		public function get_detail_house_space($id)
		{
			$this->db->where('hsid', $id);
			$data = $this->db->get('house_space');
			
			return $data->result();
		}
		
		public function update_house_space()
		{
			$arr = array(
				'name' => $this->input->post('name-house-space'),
				'code' => $this->input->post('code-house-space'),
				'desc' => $this->input->post('deskripsi-house-space'),
				'quota' => $this->input->post('dog'),
				'status' => $this->input->post('status-house-space')
			);
			
			$this->db->where('hsid', $this->input->post('hsid'));
			$this->db->update('house_space', $arr);
		}
		
		public function save_new_dog_list()
		{
			$arr = array(
				'detail' => $this->input->post('name-dog'),
				'status' => $this->input->post('status-dog'),
				'dtid' => $this->input->post('dog-types')
			);
			
			$this->db->insert('dog_list', $arr);
		}
		
		public function delete_dog_list()
		{
			$dl = $this->input->post('_dl');
			
			for($i=0; $i<count($dl); $i++)
			{
				$this->db->where('ddid', $dl[$i]);
				$this->db->delete('dog_list');
			}
		}
		
		public function get_detail_dog_list($id)
		{
			$this->db->where('ddid', $id);
			$data = $this->db->get('dog_list');
			
			return $data->result();
		}
		
		public function update_dog_list()
		{
			$arr = array(
				'detail' => $this->input->post('name-dog'),
				'status' => $this->input->post('status-dog'),
				'dtid' => $this->input->post('dog-types')
			);
			$this->db->where('ddid', $this->input->post('ddid'));
			$this->db->update('dog_list', $arr);
		}
		
		public function save_new_dog_weight()
		{
			$arr = array(
				'dog_weight' => $this->input->post('name-dog-weight'),
				'status' => 1,
				'desc' => $this->input->post('deskripsi-dog-weight'),
			);
			
			$this->db->insert('dog_weight', $arr);
		}
		
		public function delete_dog_weight()
		{
			$dw = $this->input->post('_dw');
			
			for($i=0; $i<count($dw); $i++)
			{
				$this->db->where('dwid', $dw[$i]);
				$this->db->update('dog_weight', array('status', 0));
			}
		}
		
		public function get_detail_dog_weight($id)
		{
			$this->db->where('dwid', $id);
			$data = $this->db->get('dog_weight');
			
			return $data->result();
		}
		
		public function update_dog_weight()
		{
			$arr = array(
				'dog_weight' => $this->input->post('name-dog-weight'),
				'status' => 1,
				'desc' => $this->input->post('deskripsi-dog-weight'),
			);
			
			$this->db->where('dwid', $this->input->post('dwid'));
			$this->db->update('dog_weight', $arr);
		}
		
		public function save_new_dog_reason()
		{
			$arr = array(
				'reason' => $this->input->post('name-dog-reason'),
				'desc' => $this->input->post('deskripsi-dog-reason'),
				'category' => 'Application|Dog'
			);
			
			$this->db->insert('reason_not_renew', $arr);
		}
		
		public function delete_dog_reason()
		{
			$rn = $this->input->post('_rn');
			
			for($i=0; $i<count($rn); $i++)
			{
				$this->db->where('reason_id', $rn[$i]);
				$this->db->delete('reason_not_renew');
			}
		}
		
		public function get_detail_dog_reason($id)
		{
			$this->db->where('reason_id', $id);
			$data = $this->db->get('reason_not_renew');
			
			return $data->result();
		}
		
		public function update_dog_reason()
		{
			$arr = array(
				'reason' => $this->input->post('name-dog-reason'),
				'desc' => $this->input->post('deskripsi-dog-reason')
			);
			
			$this->db->where('reason_id', $this->input->post('reason_id'));
			$this->db->update('reason_not_renew', $arr);
		}
		
		public function save_new_pay_counter()
		{
			$arr = array(
				'place_name' => $this->input->post('name-pay-counter'),
				'place_description' => $this->input->post('deskripsi-pay-counter')
			);
			
			$this->db->insert('payment_place', $arr);
		}
		
		public function delete_pay_counter()
		{
			$pc = $this->input->post('_pc');
			
			for($i=0; $i<count($pc); $i++)
			{
				$this->db->where('place_id', $pc[$i]);
				$this->db->delete('payment_place');
			}
		}
		
		public function get_detail_pay_counter($id)
		{
			$this->db->where('place_id', $id);
			$data = $this->db->get('payment_place');
			
			return $data->result();
		}
		
		public function update_pay_counter()
		{
			$arr = array(
				'place_name' => $this->input->post('name-pay-counter'),
				'place_description' => $this->input->post('deskripsi-pay-counter')
			);
			
			$this->db->where('place_id', $this->input->post('place_id'));
			$this->db->update('payment_place', $arr);
		}

}