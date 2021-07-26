<?php

class Approved_Model extends CI_Model
{
		public function __construct()
		{
				parent::__construct();
		}
		
		public function save_no_badge()
		{
				$datepay = explode("/", $this->input->post('date-payment'));
				$datestart = explode("/", $this->input->post('date-start-license'));
				$dateaccepted = explode("/", $this->input->post('date-accepted'));
				//print_r($_POST);
				$arr = array(
						'date_payment' => $datepay[2]."-".$datepay[1]."-".$datepay[0],
						'counter' => $this->input->post('counter-payment'),
						'mode' => $this->input->post('mode-payment'),
						'amount' => $this->input->post('total-payment'),
						'receipt' => $this->input->post('receipt-payment'),
						'app_id' => $this->input->post('appID')
				);
				
				$this->db->insert('payment', $arr);
				
				$this->db->where('app_id', $this->input->post('appID'));
				$this->db->update('application', array('status' => 'Lulus', 'date_start' => $datestart[2]."-".$datestart[1]."-".$datestart[0], 'date_apply' => $dateaccepted[2]."-".$dateaccepted[1]."-".$dateaccepted[0]));
				
				$dog = $this->input->post('dogID');
				$badge = $this->input->post('val_lencana');
			
				for($i=0;$i < count($dog); $i++)
				{
					
						$arr_dog = array(
										'license_no' => $badge[$i],
										'dog_id' => $dog[$i]
						);

						$this->db->insert('license', $arr_dog);
				}
		}
}