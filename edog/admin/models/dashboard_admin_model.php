<?php

class Dashboard_Admin_Model extends CI_Model
{
		public function __construct()
		{
				parent::__construct();
		}
		
		public function get_sum_of_users()
		{
				$this->db->where('roles', 1);
				$data = $this->db->get('users');
				
				return $data->result();
		}
		
		public function get_sum_of_app()
		{
				//$this->db->order_by('app_no', 'desc');
				$this->db->select('*');
				$this->db->from('application');
				$this->db->join('address', 'address.addr_id = application.addr_id');
				$this->db->join('profile', 'profile.profile_id = address.profile_id');
				$this->db->join('dog_details', 'dog_details.app_id = application.app_id');
				$this->db->where('YEAR(application.date_apply)', date('Y'));
				$this->db->group_by('application.app_no');
				$this->db->order_by('application.app_no', 'desc');
				
				$data = $this->db->get();
				
				return $data->num_rows();
		}
		
		public function get_sum_of_new_app()
		{
				$this->db->order_by('app_no', 'desc');
				$this->db->where(array('renewed' => 0, 'appeal' => 0, 'YEAR(date_apply)' => date('Y')));
				$this->db->where_in('app_type', array('BARU'));
				$this->db->where_in('status', array('Dalam proses', 'Ditolak'));
				
				$data = $this->db->get('application');
				
				return $data->result();
		}
		
		public function get_sum_of_appeal($year = '')
		{
			 if($year == '')
				$year = date('Y');
			else
				$year = $year;

			 $this->db->order_by('app_no', 'desc');
			 $this->db->where_in('status', array('Dalam proses'));
			 $this->db->where('appeal', 1);
			 $this->db->where('YEAR(date_apply)', $year);
			 
			 $data = $this->db->get('application');
			 
			 return $data->result();
		}
		
		public function get_approved_app($year = '')
		{	
				if($year == '')
					$year = date('Y');
				else
					$year = $year;

				$this->db->order_by('app_no', 'desc');
				$this->db->where(array('renewed' => 0, 'YEAR(date_apply)' => $year, 'appeal' => 0));
				$this->db->where_in('app_type', array('BARU', 'RENEW'));
				$this->db->where_in('status', array('Dalam Proses'));

				
				$data = $this->db->get('application');
				//echo $this->db->last_query();
				return $data->result();
		}

		public function get_accepted_app($year = '')
		{	
				if($year == '')
					$year = date('Y');
				else
					$year = $year;

				$this->db->order_by('app_no', 'desc');
				$this->db->where(array('renewed' => 0, 'YEAR(date_apply)' => $year));
				$this->db->where_in('app_type', array('BARU', 'RENEW'));
				$this->db->where_in('status', array('Diterima'));

				
				$data = $this->db->get('application');
				
				return $data->result();
		}
		
                public function get_already_dash_license($year = '')
		{
				if($year == '')
					$year = date('Y');
				else
					$year = $year;

				$this->db->order_by('date_apply', 'desc');
				$this->db->where('status', 'Lulus');
				$this->db->where('YEAR(date_apply)', $year);
				$data = $this->db->get('application');
				
				return $data->result();
		}
                
		public function get_already_license($year = '', $limit, $start)
		{
				// echo $year.'--'.$limit.'--'.$start;
				if($year == ''){
					$year = date('Y');
				}
				else if ($year < 2014){
					$year = date('Y');
				}
				else{
					$year = $year;
				}

					// echo $year.`<br />`;
                                
                //                 if($this->input->get('search-data'))
				// {
				// 	//$this->db->like('name', $this->input->get('search-data'));
				// 	//$this->db->or_like('nric', $this->input->get('search-data'));
                //                         $this->db->or_like('app_no', $this->input->get('search-data'));
				// }
				
				$this->db->order_by('date_apply', 'desc');
				$this->db->where('status', 'Lulus');
				$this->db->where('YEAR(date_apply)', $year);
				// $this->db->limit($limit,$limit);
				$data = $this->db->get('application');

				$app_count = $data->result();
				
				return $data->result();
		}
                
                public function get_already_all_license($year = '')
		{
				if($year == '')
					$year = date('Y');
				else if ($year < 2014)
					$year = date('Y');
				else
					$year = $year;
                                
                //                 if($this->input->get('search-data'))
				// {
				// 	//$this->db->like('name', $this->input->get('search-data'));
				// 	//$this->db->or_like('nric', $this->input->get('search-data'));
                //                         $this->db->or_like('app_no', $this->input->get('search-data'));
				// }

				$this->db->order_by('date_apply', 'desc');
				$this->db->where('status', 'Lulus');
				$this->db->where('YEAR(date_apply)', $year);
				$data = $this->db->get('application');
				
				return $data;
		}


		public function get_sum_of_not_renew()
		{		
				$this->db->select('*');
				$this->db->from('application');
				$this->db->join('address', 'address.addr_id = application.addr_id');
				$this->db->join('profile', 'profile.profile_id = address.profile_id');
				$this->db->join('dog_details', 'dog_details.app_id = application.app_id');
				//$this->db->order_by('app_no', 'desc');
				//$this->db->where('date_start <=', date('Y').'-01-01');
				$this->db->where("DATE_FORMAT(application.date_apply,'%Y')", date('Y') - 1);
				$this->db->group_by('application.app_no');
				
				$data = $this->db->get();
				
				return $data->result();
		}
}