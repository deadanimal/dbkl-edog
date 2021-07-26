<?php

class Data_Reference extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('data_reference_model');
		}
		
		public function index()
		{
				if( $this->session->userdata('isLoggedIn') )
				{
						$data['parlimen'] = $this->data_reference_model->get_data_parlimen();
						$data['house_type'] = $this->data_reference_model->get_data_house_type();
						$data['house_space'] = $this->data_reference_model->get_data_house_space();
						$data['dog_list'] = $this->data_reference_model->get_data_dog_list();
						$data['dog_weight'] = $this->data_reference_model->get_data_dog_weight();
						$data['reason'] = $this->data_reference_model->get_data_reason();
						$data['place'] = $this->data_reference_model->get_data_counter();
						$this->template->write_view('content', 'data_reference', $data, TRUE);
						$this->template->parse_template = TRUE;
						$this->template->render();
				}
				else
				{
					redirect( base_url('admin') );
				}
		}
		
		public function new_parlimen()
		{
			$this->data_reference_model->save_new_parlimen();
		}
		
		public function delete_parlimen()
		{
			$this->data_reference_model->delete_parlimen();
		}
		
		public function detail_parlimen()
		{
			$par = null;
			$data = $this->data_reference_model->get_detail($this->uri->segment(3));
			
			foreach($data as $row)
			{
				$par .= $row->par_name."|".$row->par_description."|".$row->par_status;
			}
			
			echo $par;
		}
		
		public function edit_parlimen()
		{
			$this->data_reference_model->update_parlimen();
		}
		
		public function new_house_type()
		{
			$this->data_reference_model->save_new_house_type();
		}
		
		public function delete_house_type()
		{
			$this->data_reference_model->delete_house_type();
		}
		
		public function detail_house_type()
		{
			$ht = null;
			$data = $this->data_reference_model->get_detail_house_type($this->uri->segment(3));
			
			foreach($data as $row)
			{
				$ht .= $row->name."|".$row->code."|".$row->desc."|".$row->doc."|".$row->status;
			}
			
			echo $ht;
		}
		
		public function update_house_type()
		{
			$this->data_reference_model->update_house_type();
		}
		
		public function new_house_space()
		{
			$this->data_reference_model->save_new_house_space();
		}
		
		public function delete_house_space()
		{
			$this->data_reference_model->delete_house_space();
		}
		
		public function detail_house_space()
		{
			$ht = null;
			$data = $this->data_reference_model->get_detail_house_space($this->uri->segment(3));
			
			foreach($data as $row)
			{
				$ht .= $row->name."|".$row->code."|".$row->desc."|".$row->quota."|".$row->status;
			}
			
			echo $ht;
		}
		
		public function update_house_space()
		{
			$this->data_reference_model->update_house_space();
		}
		
		public function new_dog_list()
		{
			$this->data_reference_model->save_new_dog_list();
		}
		
		public function delete_dog_list()
		{
			$this->data_reference_model->delete_dog_list();
		}
		
		public function detail_dog_list()
		{
			$dl = null;
			$data = $this->data_reference_model->get_detail_dog_list($this->uri->segment(3));
			
			foreach($data as $row)
			{
				$dl .= $row->detail."|".$row->status."|".$row->dtid;
			}
			
			echo $dl;
		}
		
		public function update_dog_list()
		{
			$this->data_reference_model->update_dog_list();
		}
		
		public function new_dog_weight()
		{
			$this->data_reference_model->save_new_dog_weight();
		}
		
		public function delete_dog_weight()
		{
			$this->data_reference_model->delete_dog_weight();
		}
		
		public function detail_dog_weight()
		{
			$dw = null;
			$data = $this->data_reference_model->get_detail_dog_weight($this->uri->segment(3));
			
			foreach($data as $row)
			{
				$dw .= $row->dog_weight."|".$row->status."|".$row->desc;
			}
			
			echo $dw;
		}
		public function update_dog_weight()
		{
			$this->data_reference_model->update_dog_weight();
		}
		
		public function new_dog_reason()
		{
			$this->data_reference_model->save_new_dog_reason();
		}
		
		public function delete_dog_reason()
		{
			$this->data_reference_model->delete_dog_reason();
		}
		
		public function detail_dog_reason()
		{
			$rn = null;
			$data = $this->data_reference_model->get_detail_dog_reason($this->uri->segment(3));
			
			foreach($data as $row)
			{
				$rn .= $row->reason."|".$row->desc;
			}
			
			echo $rn;
		}
		
		public function update_dog_reason()
		{
			$this->data_reference_model->update_dog_reason();
		}
		
		public function new_pay_counter()
		{
			$this->data_reference_model->save_new_pay_counter();
		}
		
		public function delete_pay_counter()
		{
			$this->data_reference_model->delete_pay_counter();
		}
		
		public function detail_pay_counter()
		{
			$pc = null;
			$data = $this->data_reference_model->get_detail_pay_counter($this->uri->segment(3));
			
			foreach($data as $row)
			{
				$pc .= $row->place_name."|".$row->place_description;
			}
			
			echo $pc;
		}
		
		public function update_pay_counter()
		{
			$this->data_reference_model->update_pay_counter();
		}
}