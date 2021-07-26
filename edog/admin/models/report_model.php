<?php

class Report_Model extends CI_Model
{
		public function __construct()
		{
			 parent::__construct();
			 $this->load->library('encrypt');
		}
		
		public function get_house_type()
		{
				$this->db->order_by('name', 'desc');
				$data = $this->db->get('house_type');
				
				return $data->result();
		}
		
		public function get_house_space()
		{
				$this->db->order_by('hsid', 'asc');
				$data = $this->db->get('house_space');
				
				return $data->result();
		}
		
		public function get_parlimen()
		{
				$this->db->order_by('par_name', 'asc');
				$data = $this->db->get('parlimen');
				
				return $data->result();
		}

		public function get_app_lulus()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	 if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');
			 	
			 	//print_r($this->input->get('list-parlimen'));


			 	$this->db->select('*')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i]);
				 	if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));

				 		$this->db->where('application.status', 'Lulus');
				 $val = $this->db->get();

				$values[] = $val->num_rows();
			 }

			 return $values;
			 
		}

		public function get_app_ditolak()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 	$this->db->select('*')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i]);

				 	if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));

				 	$this->db->where('application.status', 'Ditolak');
				 	$val =  $this->db->get();

				$values[] = $val->num_rows();
			 }

			 return $values;
			 
		}

		public function get_app_diterima()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 			$this->db->select('*')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i]);

				 	if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));


				 	   $this->db->where('application.status', 'Diterima');
				$val = $this->db->get();

				$values[] = $val->num_rows();
			 }

			 return $values;
			 
		}

		public function get_app_dalam_proses()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 	$this->db->select('*')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i]);

				 	if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));


				 	$this->db->where('application.status', 'Dalam proses')
				 		    ->where('application.appeal', 0);

				$val = $this->db->get();

				$values[] = $val->num_rows();
			 }

			 return $values;
			 
		}

		public function get_app_dalam_proses_rayuan()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 	$this->db->select('*')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i]);

				 	if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));

				 	$this->db->where('application.status', 'Dalam proses')
				 		    ->where('application.appeal', 1);

				$val = $this->db->get();

				$values[] = $val->num_rows();
			 }

			 return $values;
			 
		}

		public function get_exist_license()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 	/* $this->db->group_by('license_no');
			 	$licenses = $this->db->get('license');


			 	 foreach($licenses->result() as $rw)
			 	{
			 		$license[] = $rw->dog_id;
			 	}  */

			 	$this->db->select('*')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->join('dog_details', 'application.app_id = dog_details.app_id')
							->join('license', 'dog_details.dog_id = license.dog_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i])
							->group_by('license.license_no');

				 	if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));
					
					//$this->db->where(
				 	//$this->db->where_in('dog_details.dog_id', $license);
		
				 $val = $this->db->get();
				//echo $this->db->last_query();
				$values[] = count($val->result());
			 }

			 return $values;
			 
		}
		
		public function get_not_exist_license()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');


			 for($i=0; $i<count($month); $i++)
			 {
			 $val = 0;
			 
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 	 

			 	$this->db->select('dog_details.dog_id')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->join('dog_details', 'application.app_id = dog_details.app_id')
							//->where('dog_details.dog_id NOT EXISTS (select dog_id from license)', NULL, FALSE)
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i]);

				 	if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));

				 	//$this->db->where_not_in('dog_details.dog_id', $license);
					
				 	$val = $this->db->get();
				
				
				
				
	
					
				$values[] = $val->num_rows();
			 }
			 
			 $data = $this->get_exist_license();
			 
			 for($j=0; $j< count($data); $j++)
			{
				$ne[] = $values[$j] - $data[$j];
			}

			 return $ne;
			 
		}

		public function get_alive_dog()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 	$this->db->select('dog_details.dog_id')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->join('dog_details', 'application.app_id = dog_details.app_id')
							//->join('license', 'dog_details.dog_id = license.dog_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i]);
							//->group_by('license.license_no');

				 	if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));

					$this->db->where('dog_details.status', 'Valid');
				 		   
				 	$val = $this->db->get();
					
					#print_r($val->result());

				$values[] = $val->num_rows();
			 }

			 return $values;
			 
		}

		public function get_dead_dog()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 	$this->db->select('*')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->join('dog_details', 'application.app_id = dog_details.app_id')
							->join('license', 'dog_details.dog_id = license.dog_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i])
							->group_by('license.license_no');

				 	if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));

				 	$this->db->where('dog_details.status', 'Invalid')
							->where('dog_details.reason', 2);
				 		   
				 	$val = $this->db->get();

				$values[] = $val->num_rows();
			 }

			 return $values;
			 
		}

		public function get_not_allowed_dog()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 	$this->db->select('*')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->join('dog_details', 'application.app_id = dog_details.app_id')
							//->join('license', 'dog_details.dog_id = license.dog_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i]);

				if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));

				$this->db->where('dog_details.status', 'Invalid')
							->where('dog_details.reason', 0);
				 		   
				 	$val = $this->db->get();

				$values[] = $val->num_rows();
			 }

			 return $values;
			 
		}

		public function get_lost_dog()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 	$this->db->select('*')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->join('dog_details', 'application.app_id = dog_details.app_id')
							->join('license', 'dog_details.dog_id = license.dog_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i])
				 		    ->where('dog_details.status', 'Invalid')
							->where('dog_details.reason', 3);
				 		   
				 	$val = $this->db->get();

				$values[] = $val->num_rows();
			 }

			 return $values;
			 
		}

		public function get_lost_tag_dog()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 	$this->db->select('*')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->join('dog_details', 'application.app_id = dog_details.app_id')
							->join('license', 'dog_details.dog_id = license.dog_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i]);

				if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));

				$this->db->where('dog_details.status', 'Invalid')
							->where('dog_details.reason', 6);
				 		   
				 	$val = $this->db->get();

				$values[] = $val->num_rows();
			 }

			 return $values;
			 
		}

		public function get_new_place_dog()
		{
			 $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
			 //$values = array();

			 for($i=0; $i<count($month); $i++)
			 {
			 	if($this->input->get('tahun'))
			 	 	$year = $this->input->get('tahun');
			 	 else
			 	 	$year = date('Y');

			 	$this->db->select('*')
				 		    ->from('application')
				 		    ->join('address', 'application.addr_id = address.addr_id')
				 		    ->join('dog_details', 'application.app_id = dog_details.app_id')
							->join('license', 'dog_details.dog_id = license.dog_id')
				 		    ->where("DATE_FORMAT(application.date_apply,'%Y-%m')", $year.'-'.$month[$i]);

				if($this->input->get('list-parlimen'))
				 		$this->db->where_in('address.parlimen', $this->input->get('list-parlimen'));

				 $this->db->where('dog_details.status', 'Invalid')
							->where('dog_details.reason', 1);
				 		   
				 	$val = $this->db->get();

				$values[] = $val->num_rows();
			 }

			 return $values;
			 
		}
		
		public function get_dog()
		{
				$this->db->order_by('detail', 'asc');
				$data = $this->db->get('dog_list');
				
				return $data->result();
		}
		
		public function get_dog_weight()
		{
				$this->db->order_by('dog_weight', 'asc');
				$data = $this->db->get('dog_weight');
				
				return $data->result();
		}
		
		public function get_data_all($limit, $start)
		{

				$this->db->select('*, application.status as appStatus');
				$this->db->from('application');
				$this->db->join('address', 'address.addr_id = application.addr_id');
				$this->db->join('profile', 'profile.profile_id = address.profile_id');
				$this->db->join('dog_details', 'dog_details.app_id = application.app_id');
				

				if($this->input->get('date-type') == 'Sedia')
				{
					$this->db->join('license', 'dog_details.dog_id = license.dog_id');
				}
				
				if( $this->input->get('kata-kunci') != "" )
				{
						$this->db->like('application.app_no', $this->input->get('kata-kunci'));
						$this->db->or_like('address.no_unit', $this->input->get('kata-kunci'));
						$this->db->or_like('address.home_name', $this->input->get('kata-kunci'));
						$this->db->or_like('address.street_name', $this->input->get('kata-kunci'));
						$this->db->or_like('address.town_name', $this->input->get('kata-kunci'));
						$this->db->or_like('address.postcode', $this->input->get('kata-kunci'));
						$this->db->or_like('profile.name', $this->input->get('kata-kunci'));
						$this->db->or_like('profile.nric', $this->input->get('kata-kunci'));
				}
				
				if( $this->input->get('date-from') != "" && $this->input->get('date-tos') != "" )
				{
					$from = explode("/",$this->input->get('date-from')); 
					$datefrom = $from[2]."-".$from[1]."-".$from[0]." 00:00:00";
					
					$to = explode("/",$this->input->get('date-tos')); 
					$dateto = $to[2]."-".$to[1]."-".$to[0]." 23:59:59";
					
					
					

						$this->db->where('application.date_apply >=', $datefrom);
						$this->db->where('application.date_apply <=', $dateto);
				}

				if( $this->input->get('date-type') == 'Permohonan' )
				{
					$this->db->where_in('application.status', array('Dalam proses'));
					//$this->db->where('application.date_apply >=', $datefrom);
					//$this->db->where('application.date_apply <=', $dateto);
				}
				elseif( $this->input->get('date-type') == 'Kelulusan' )
				{
					$this->db->where_in('application.status', array('Diterima'));
					$this->db->where('dog_details.dog_id NOT IN (SELECT dog_id FROM license)', NULL, FALSE);
					//$this->db->where('application.date_start >=', $datefrom);
					//$this->db->where('application.date_start <=', $dateto);
				}
				elseif( $this->input->get('date-type') == 'Sedia' )
				{
					$this->db->where_in('application.status', array('Lulus', 'Ditolak'));
				}
				elseif( $this->input->get('date-type') == 'Pembaharuan' )
				{
					$this->db->where("DATE_FORMAT(date_apply,'%Y')", date('Y') - 1);
				}
				
				if( $this->input->get('status-permohonan') != "")
				{
					if($this->input->get('status-permohonan') == "Rayuan Dalam Proses")
					{
						$this->db->where('application.status', 'Dalam Proses');
						$this->db->where('application.appeal', 1);
					}
					elseif($this->input->get('status-permohonan') == "Dalam Proses")
					{
						$this->db->where('application.status', $this->input->get('status-permohonan'));
						$this->db->where('application.appeal', 0);
					}
					else
					{
						$this->db->where('application.status', $this->input->get('status-permohonan'));
					}
				}
				
				if( $this->input->get('house-type') != 0 )
				{
					$this->db->where('address.home_type', $this->input->get('house-type'));
				}
				
				if( $this->input->get('house-space') != 0 )
				{
					$this->db->where('address.home_space', $this->input->get('home-space'));
				}
				
				if( $this->input->get('parlimen') != 0 )
				{
					$this->db->where('address.parlimen', $this->input->get('parlimen'));
				}
				
				if( $this->input->get('kembiri') != "" )
				{
					//$this->db->join('dog_details', 'application.app_id = dog_details.app_id');
					$this->db->where('dog_details.sterilization', $this->input->get('kembiri'));
				}
				
				if( $this->input->get('no-lencana') != "" && $this->input->get('kembiri') == "")
				{
					//$this->db->join('dog_details', 'application.app_id = dog_details.app_id');
					//$this->db->join('license', 'license.dog_id = dog_details.dog_id');
					$this->db->like('license.license_no', $this->input->get('no-lencana'));
				}
				
				if( $this->input->get('no-lencana') != "" && $this->input->get('kembiri') != "")
				{
					//$this->db->join('license', 'license.dog_id = dog_details.dog_id');
					$this->db->like('license.license_no', $this->input->get('no-lencana'));
				}
				
				if( $this->input->get('no-siri-microchip') != "" )
				{
					$this->db->like('dog_details.microchip', $this->input->get('no-siri-microchip'));
				}
				
				if( $this->input->get('dog-type') != 0 )
				{
					$this->db->where('dog_details.dog_type', $this->input->get('dog-type'));
				}
				
				/* if( $this->input->post('dog-weight') != 0 )
				{
					$this->db->where('dog_details.weight', $this->input->post('dog-weight'));
				} 
				
				if( $this->input->post('no-receipt') != "" )
				{
					$this->db->join('payment', 'application.app_id = payment.app_id');
					$this->db->where('receipt', $this->input->post('no-receipt'));
				}*/
				
				//$this->db->where('YEAR(application.date_apply)', date('Y'));
				$this->db->limit($limit, $start);
				$this->db->group_by('application.app_no');
				$this->db->order_by('application.date_apply', 'asc');
				//echo $this->db->last_query();
				$data = $this->db->get();
				return  $data->result();
		}

		public function get_count_all()
		{
				$this->db->select('*, application.status as appStatus');
				$this->db->from('application');
				$this->db->join('address', 'address.addr_id = application.addr_id');
				$this->db->join('profile', 'profile.profile_id = address.profile_id');
				$this->db->join('dog_details', 'dog_details.app_id = application.app_id');
				

				if($this->input->get('date-type') == 'Sedia')
				{
					$this->db->join('license', 'dog_details.dog_id = license.dog_id');
				}
				
				if( $this->input->get('kata-kunci') != "" )
				{
						$this->db->like('application.app_no', $this->input->get('kata-kunci'));
						$this->db->or_like('address.no_unit', $this->input->get('kata-kunci'));
						$this->db->or_like('address.home_name', $this->input->get('kata-kunci'));
						$this->db->or_like('address.street_name', $this->input->get('kata-kunci'));
						$this->db->or_like('address.town_name', $this->input->get('kata-kunci'));
						$this->db->or_like('address.postcode', $this->input->get('kata-kunci'));
						$this->db->or_like('profile.name', $this->input->get('kata-kunci'));
						$this->db->or_like('profile.nric', $this->input->get('kata-kunci'));
				}
				
				if( $this->input->get('date-from') != "" && $this->input->get('date-tos') != "" )
				{
					$from = explode("/",$this->input->get('date-from')); 
					$datefrom = $from[2]."-".$from[1]."-".$from[0]." 00:00:00";
					
					$to = explode("/",$this->input->get('date-tos')); 
					$dateto = $to[2]."-".$to[1]."-".$to[0]." 23:59:59";
					
					
					

						$this->db->where('application.date_apply >=', $datefrom);
						$this->db->where('application.date_apply <=', $dateto);
				}

				if( $this->input->get('date-type') == 'Permohonan' )
				{
					$this->db->where_in('application.status', array('Dalam proses'));
					//$this->db->where('application.date_apply >=', $datefrom);
					//$this->db->where('application.date_apply <=', $dateto);
				}
				elseif( $this->input->get('date-type') == 'Kelulusan' )
				{
					$this->db->where_in('application.status', array('Diterima'));
					$this->db->where('dog_details.dog_id NOT IN (SELECT dog_id FROM license)', NULL, FALSE);
					//$this->db->where('application.date_start >=', $datefrom);
					//$this->db->where('application.date_start <=', $dateto);
				}
				elseif( $this->input->get('date-type') == 'Sedia' )
				{
					$this->db->where_in('application.status', array('Lulus', 'Ditolak'));
				}
				elseif( $this->input->get('date-type') == 'Pembaharuan' )
				{
					$this->db->where("DATE_FORMAT(application.date_apply,'%Y')", date('Y') - 1);
				}
				
				if( $this->input->get('status-permohonan') != "")
				{
					if($this->input->get('status-permohonan') == "Rayuan Dalam Proses")
					{
						$this->db->where('application.status', 'Dalam Proses');
						$this->db->where('application.appeal', 1);
					}
					elseif($this->input->get('status-permohonan') == "Dalam Proses")
					{
						$this->db->where('application.status', $this->input->get('status-permohonan'));
						$this->db->where('application.appeal', 0);
					}
					else
					{
						$this->db->where('application.status', $this->input->get('status-permohonan'));
					}
				}
				
				if( $this->input->get('house-type') != 0 )
				{
					$this->db->where('address.home_type', $this->input->get('house-type'));
				}
				
				if( $this->input->get('house-space') != 0 )
				{
					$this->db->where('address.home_space', $this->input->get('home-space'));
				}
				
				if( $this->input->get('parlimen') != 0 )
				{
					$this->db->where('address.parlimen', $this->input->get('parlimen'));
				}
				
				if( $this->input->get('kembiri') != "" )
				{
					//$this->db->join('dog_details', 'application.app_id = dog_details.app_id');
					$this->db->where('dog_details.sterilization', $this->input->get('kembiri'));
				}
				
				if( $this->input->get('no-lencana') != "" && $this->input->get('kembiri') == "")
				{
					//$this->db->join('dog_details', 'application.app_id = dog_details.app_id');
					//$this->db->join('license', 'license.dog_id = dog_details.dog_id');
					$this->db->like('license.license_no', $this->input->get('no-lencana'));
				}
				
				if( $this->input->get('no-lencana') != "" && $this->input->get('kembiri') != "")
				{
					//$this->db->join('license', 'license.dog_id = dog_details.dog_id');
					$this->db->like('license.license_no', $this->input->get('no-lencana'));
				}
				
				if( $this->input->get('no-siri-microchip') != "" )
				{
					$this->db->like('dog_details.microchip', $this->input->get('no-siri-microchip'));
				}
				
				if( $this->input->get('dog-type') != 0 )
				{
					$this->db->where('dog_details.dog_type', $this->input->get('dog-type'));
				}
				
				/* if( $this->input->post('dog-weight') != 0 )
				{
					$this->db->where('dog_details.weight', $this->input->post('dog-weight'));
				} 
				
				if( $this->input->post('no-receipt') != "" )
				{
					$this->db->join('payment', 'application.app_id = payment.app_id');
					$this->db->where('receipt', $this->input->post('no-receipt'));
				}*/
				
				//$this->db->where('YEAR(application.date_apply)', date('Y'));
				$this->db->group_by('application.app_no');
				$this->db->order_by('application.date_apply', 'desc');
				$data = $this->db->get();
				return $data;
		}

		public function getUsersID($ic, $email, $name, $type)
		{
			$this->db->where('nric', $ic);
			$data = $this->db->get('users');

			if(count($data->result()) > 0)
			{
				$usr = $data->row();

				return $usr->uid;
			}
			else
			{
				$this->db->insert('users', array('username' => $ic, 'email' => $email, 'name' => $name, 'password' => $this->encrypt->sha1($ic), 'nric_type' => $type, 'nric' => $ic, 'status' => 1, 'roles' => 1));
				return $this->db->insert_id();
			}
		}

		public function insertProfile($name, $citizen, $ictype, $nric, $phone, $email, $uid)
		{
			$this->db->where('uid', $uid);
			$data = $this->db->get('profile');

			if(count($data->result()) > 0)
			{
				$usr = $data->row();

				return $usr->profile_id;
			}
			else
			{
				$array = array(
					'name' => $name,
					'citizenship' => $citizen,
					'identity_type' => $ictype,
					'nric' => $nric,
					'phone_no' => $phone,
					'email' => $email,
					'uid' => $uid
				);

				$this->db->insert('profile', $array);
				return $this->db->insert_id();
			}
			

			
		}


		public function insertAddress($no_unit, $home, $street, $town, $postcode, $parlimen, $home_type, $home_space, $dog_house, $uid)
		{
			$array = array(
				'no_unit' => $no_unit,
				'home_name' => $home,
				'street_name' => $street,
				'town_name' => $town,
				'postcode' => $postcode,
				'parlimen' => $parlimen,
				'home_type' => $home_type,
				'home_space' => $home_space,
				'dog_house' => $dog_house,
				'profile_id' => $uid
			);


			$this->db->insert('address', $array);

			return $this->db->insert_id();
		}

		public function getNo($year, $month)
		{
			$_appNo = null;
		
			$yr = substr( $year, -2);

			$this->db->where(array('year' => $yr, 'month' => $month));	
			$_curr = $this->db->get( 'running_no' );
			
			if( count( $_curr->result() ) > 0 )
			{
				foreach( $_curr->result() as $row )
				{
					$_new = $row->no + 1;
					
					$_upd = array(
										'no' => $_new
									);
					
					$this->db->where( 'runid', $row->runid );
					$this->db->update( 'running_no', $_upd );
					
					if( strlen( $_new ) == 1 )
					{
						$_runNo = '00000'.$_new;
					}
					elseif( strlen( $_new ) == 2 )
					{
						$_runNo = '0000'.$_new;
					}
					elseif( strlen( $_new ) == 3 )
					{
						$_runNo = '000'.$_new;
					}
					elseif( strlen( $_new ) == 4 )
					{
						$_runNo = '00'.$_new;
					}
					elseif( strlen( $_new ) == 5 )
					{
						$_runNo == '0'.$_new;
					}
					
					$_appNo = 'LX'.$yr.$month.$_runNo;
				}
			}
			else
			{
				$_run = array(
									'year' => $yr,
									'month' => $month,
									'no' => 1	
									);
									
				$this->db->insert( 'running_no', $_run );
				
				$_runNo = '000001';
				$_appNo = 'LX'.$yr.$month.$_runNo;
			}

			return $_appNo;
		}


		public function insertApplication($yr, $mnth, $date_apply, $date_accept, $date_start, $addr_id)
		{

			$appNo = $this->getNo($yr, $mnth);

			$array = array(
				'app_no' => $appNo,
				'app_type' => 'BARU',
				'date_apply' => str_replace('/', '-', $date_apply).' 00:00:00',
				'date_accept' => str_replace('/', '-', $date_accept).' 00:00:00',
				'date_start' => str_replace('/', '-', $date_start).' 00:00:00',
				'status' => 'Lulus',
				'addr_id' => $addr_id
			);

			$this->db->insert('application', $array);
			return $this->db->insert_id();
		}

		public function insertDog($dog_type, $color, $gender, $weight, $mandul, $microchip, $owner, $dog, $appid)
		{
			$array = array(
				'dog_type' => $dog_type,
				'color' => $color,
				'gender' => $gender,
				'weight' => $weight,
				'sterilization' => $mandul,
				'microchip' => $microchip,
				'owner_training' => $owner,
				'dog_training' => $dog,
				'app_id' => $appid
			);

			$this->db->insert('dog_details', $array);
		}


		public function insertPayment($date, $counter, $amount, $receipt, $appid)
		{
			$array = array(
				'date_payment' => $date,
				'counter' => $counter,
				'mode' => 1,
				'amount' => $amount,
				'receipt' => $receipt,
				'app_id' => $appid
			);

			$this->db->insert('payment', $array);
		}

		
}