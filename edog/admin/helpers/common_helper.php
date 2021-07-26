<?php

/***************Common Helper*************************/

if( ! function_exists('get_users_name') )
{
	function get_users_name($addrID)
	{
		$CI =& get_instance();
		
		$CI->db->select('profile.name');
		$CI->db->from('profile');
		$CI->db->join('address', 'address.profile_id = profile.profile_id');
		$CI->db->where('address.addr_id', $addrID);
		$user = $CI->db->get();
		$row = $user->result();
		
		return $row[0]->name;
	}
}

if( ! function_exists('get_users_name_addr') )
{
	function get_users_name_addr($addrID)
	{
		$CI =& get_instance();
		
		$CI->db->select('profile.name');
		$CI->db->from('profile');
		$CI->db->join('address', 'address.profile_id = profile.profile_id');
		$CI->db->where('address.addr_id', $addrID);
		$user = $CI->db->get();
		//$row = $user->result();
		
		return $user->result();
	}
}

if( ! function_exists('get_users_ic') )
{
	function get_users_ic($addrID)
	{
		$CI =& get_instance();
		
		$CI->db->select('profile.nric');
		$CI->db->from('profile');
		$CI->db->join('address', 'address.profile_id = profile.profile_id');
		$CI->db->where('address.addr_id', $addrID);
		$user = $CI->db->get();
		$row = $user->result();
		
		return $row[0]->nric;
	}
}

if( ! function_exists('get_users_name_by_email') )
{
	function get_users_name_by_email($email, $ic, $uid = '')
	{
		$CI =& get_instance();
		
		if( $uid == '' )
		{
			$CI->db->where( array('email' => $email, 'nric' => $ic) );
		}
		else
		{
				$CI->db->where('uid', $uid);
		}
		
		$user = $CI->db->get( 'users' );
		$row = $user->result();
		
		return $row[0]->name;
	}
}

if( ! function_exists('get_applications') )
{
	function get_applications($appid)
	{
		$ci =& get_instance();
		
		$ci->db->where('app_id', $appid);
		$data = $ci->db->get('application');
		
		return $data->result();
	}
}

if( ! function_exists('get_address_users') )
{
	function get_address_users($profileid)
	{
		$ci =& get_instance();
		
		$ci->db->where('profile_id', $profileid);
		$data = $ci->db->get('address');
		
		return $data->result();
	}
}

if( ! function_exists('get_users_by_userid') )
{
	function get_users_by_userid($userid)
	{
		$ci =& get_instance();
		
		$ci->db->select('*')
					 ->from('profile')
					 //->join('address', 'profile.profile_id = address.profile_id')
					 ->where('profile.uid', $userid);
					 
		$data = $ci->db->get();
		
		return $data->result();
		
	}
}

if( ! function_exists('get_email_users') )
{
	function get_email_users($userid)
	{
		$ci =& get_instance();
		
		$ci->db->select('email');
		$ci->db->where('uid', $userid);
		
		$data = $ci->db->get('users');
		$row = $data->result();
		
		return $row[0]->email;
	}
}

if( ! function_exists('get_username_users') )
{
	function get_username_users($userid)
	{
		$ci =& get_instance();
		
		$ci->db->select('username');
		$ci->db->where('uid', $userid);
		
		$data = $ci->db->get('users');
		$row = $data->result();
		
		return $row[0]->username;
	}
}



if( ! function_exists('get_parlimen_name') )
{
	function get_parlimen_name($par_id)
	{
		$ci =& get_instance();
		
		$ci->db->where('par_id', $par_id);
		$data = $ci->db->get('parlimen');
		$row = $data->result();
		
		return $row[0]->par_name;
	}
}

if( ! function_exists('get_dashboard_already_license') )
{
	function get_dashboard_already_license($addr_id)
	{
		$ci =& get_instance();
		
		$ci->db->select('*')
						 ->from('profile')
						 ->join('address', 'profile.profile_id = address.profile_id')
						 ->join('application', 'address.addr_id = application.addr_id')
						 ->where_in('application.status', array('Lulus'))
						 ->where_in('application.app_type', array('BARU','RENEW'))
						 ->where(array('address.addr_id' => $addr_id));
				
		$dash_already = $ci->db->get();
				
		return $dash_already->result();
	}
}

if( ! function_exists('get_dashboard_already_license_renewed') )
{
	function get_dashboard_already_license_renewed($addr_id)
	{
		$ci =& get_instance();
		
		$ci->db->select('*')
						 ->from('profile')
						 ->join('address', 'profile.profile_id = address.profile_id')
						 ->join('application', 'address.addr_id = application.addr_id')
						 ->where_in('application.status', array('Lulus'))
						 ->where_in('application.app_type', array('BARU','RENEW'))
						 ->where(array('address.addr_id' => $addr_id, 'renewed' => 0));
				
		$dash_already = $ci->db->get();
				
		return $dash_already->result();
	}
}

if( ! function_exists('get_total_dog') )
{
	function get_total_dog($app_id)
	{
		$ci =& get_instance();
		
		$ci->db->where(array('app_id' => $app_id, 'status' => 'Valid'));
		$data = $ci->db->get('dog_details');
		
		return $data->result();
	}
}

if( ! function_exists('get_dog_detail') )
{
	function get_dog_detail($app_id)
	{
		$ci =& get_instance();
		
		$ci->db->where(array('app_id' => $app_id));
		$data = $ci->db->get('dog_details');
		
		return $data->result();
	}
}

if( ! function_exists('get_dog_license') )
{
	function get_dog_license($dog_id)
	{
		$ci =& get_instance();
		
		$ci->db->where('dog_id', $dog_id);
		$data = $ci->db->get('license');
		
		return $data->result();
	}
}

if( ! function_exists('authorize_address') )
{
	function authorize_address($addr_id)
	{
		$ci =& get_instance();
		
		$ci->db->where('addr_id', $addr_id);
		$ci->db->from('application');
		
		return $ci->db->count_all_results();
		
	}
}

if( ! function_exists('get_license_quota') )
{
	function get_license_quota($hsid)
	{
		$ci =& get_instance();
		
		$ci->db->select('quota');
		$ci->db->where('hsid', $hsid);
		
		$data = $ci->db->get('house_space');
		$row = $data->result();
		
		return $row[0]->quota;
	}
}

if( ! function_exists('get_available_license') )
{
	function get_available_license($addr_id)
	{
		$ci =& get_instance();
		
		$ci->db->select('COUNT(dog_details.dog_id) AS totalLicense')
					 ->from('application')
					 ->join('dog_details', 'application.app_id = dog_details.app_id')
					 //->join('license', 'dog_details.dog_id = license.dog_id')
					 ->where_in('application.status', array('Diterima','Lulus','Dalam Proses'))
					 ->where(array('application.addr_id' => $addr_id, 'application.renewed' => 0, 'dog_details.status' => 'Valid'));
					 
		$data = $ci->db->get();
		return $data->result();
	}
}

if( ! function_exists('get_available_appeal_license') )
{
	function get_available_appeal_license($addr_id)
	{
		$ci =& get_instance();
		
		$ci->db->select('COUNT(dog_details.dog_id) AS totalLicenseAppeal')
					 ->from('application')
					 ->join('dog_details', 'application.app_id = dog_details.app_id')
					 //->join('license', 'dog_details.dog_id = license.dog_id')
					 ->where_in('application.status', array('Ditolak'))
					 ->where(array('application.addr_id' => $addr_id, 'application.appeal' => 0, 'application.renewed' => 0));
					 
		$data = $ci->db->get();
		return $data->result();
	}
}

if( ! function_exists('get_dog_type') )
{
	function get_dog_type()
	{
		$ci =& get_instance();
		
		$ci->db->order_by('detail');
		$data = $ci->db->get('dog_list');
		return $data->result();
	}
}

if( ! function_exists('get_dog_weight') )
{
	function get_dog_weight()
	{
		$ci =& get_instance();
		
		$ci->db->order_by('dwid');
		$data = $ci->db->get('dog_weight');
		return $data->result();
	}
}

if( ! function_exists('get_temp_dog') )
{
	function get_temp_dog($addrID, $dogID, $type)
	{
		$ci =& get_instance();
		
		$ci->db->where(array('addr_id' => $addrID, 'userid' => $ci->session->userdata('userid'), 'no_dog' => $dogID, 'app_type' => $type));
		$data = $ci->db->get('temporary_dog');
		
		return $data->result();
	}
}

if( ! function_exists('get_temp_renew_dog') )
{
	function get_temp_renew_dog($addrID, $dogNo, $dogID, $type)
	{
		$ci =& get_instance();
		
		$ci->db->where(array('addr_id' => $addrID, 'userid' => $ci->session->userdata('userid'), 'no_dog' => $dogNo, 'dog_id' => $dogID, 'app_type' => $type));
		$data = $ci->db->get('temporary_dog');
		
		return $data->result();
	}
}

if( ! function_exists('get_dog_name') )
{
	function get_dog_name($type_id)
	{
		$ci =& get_instance();
		
		$ci->db->where('ddid', $type_id);
		$data = $ci->db->get('dog_list');
		$row = $data->result();
		
		return $row[0]->detail;
	}
}

if( ! function_exists('get_dogs_weight') )
{
	function get_dogs_weight($weight_id)
	{
		$ci =& get_instance();
		
		$ci->db->where('dwid', $weight_id);
		$data = $ci->db->get('dog_weight');
		$row = $data->result();
		
		return $row[0]->dog_weight;
	}
}

if( ! function_exists('validate_doc_support') )
{
	function validate_doc_support($home_type)
	{
		$ci =& get_instance();
		
		$ci->db->where('hid', $home_type);
		$data = $ci->db->get('house_type');
		$row = $data->result();
		
		return $row[0]->doc;
	}
}

if( ! function_exists('get_app_id') )
{
	function get_app_id($dog_id)
	{
			$ci =& get_instance();
			
			$ci->db->where('dog_id', $dog_id);
			$data = $this->db->get('dog_details');
			$row = $data->result();
			
			return $row[0]->app_id;
	}
}

if( ! function_exists('check_renew_valid_dog') )
{
	function check_renew_valid_dog($dogID)
	{
		 $ci =& get_instance();
		 
		 $ci->db->where('dog_id', $dogID);
		 $this->db->from('dog_details_renew');
		 
		 return $this->db->count_all_result();
	}
}

if( ! function_exists('get_rand_alphanumeric') )
{
	function get_rand_alphanumeric($length) {
	    if ($length>0) {
	        $rand_id="";
	        for ($i=1; $i<=$length; $i++) {
	            mt_srand((double)microtime() * 1000000);
	            $num = mt_rand(1,36);
	            $rand_id .= assign_rand_value($num);
	        }
	    }
	    return $rand_id;
	}
}

if( ! function_exists('get_address_by_addr_id') )
{
	function get_address_by_addr_id($addrID)
	{
			$ci =& get_instance();
			
			$ci->db->where('addr_id', $addrID);
			$data = $ci->db->get('address');
			
			return $data->result();
	}
}

if( ! function_exists('get_home_type') )
{
	function get_home_type($homeID)
	{
			$ci =& get_instance();
			
			$ci->db->where('hid', $homeID);
			$data = $ci->db->get('house_type');
			
			return $data->result();
	}
}

if( ! function_exists('get_home_space') )
{
	function get_home_space($homeSpace)
	{
			$ci =& get_instance();
			
			$ci->db->where('hsid', $homeSpace);
			$data = $ci->db->get('house_space');
			
			return $data->result();
	}
}

if( ! function_exists('get_mode_payment') )
{
	function get_mode_payment($mid = 0)
	{
			$ci =& get_instance();
			
			if( $mid > 0 )
			$ci->db->where('mode_id', $mid);
			$data = $ci->db->get('mode_payment');
			
			return $data->result();
	}
}

if( ! function_exists('get_counter_payment') )
{
	function get_counter_payment($cid = 0)
	{
			$ci =& get_instance();
			
			if( $cid > 0 )
			$ci->db->where('place_id', $cid);
			$data = $ci->db->get('payment_place');
			
			return $data->result();
	}
}

if( ! function_exists('get_name_roles') )
{
	function get_name_roles($rolesID)
	{
			$ci =& get_instance();
			
			$ci->db->where('roles_id', $rolesID);
			$data = $ci->db->get('roles');
			$row = $data->result();
			
			return $row[0]->roles_name;
	}
}

if( ! function_exists('get_reason_admin') )
{
	function get_reason_admin()
	{
			$ci =& get_instance();
			
			$ci->db->where('category', 'Application');
			$data = $ci->db->get('reason_not_renew');
			
			return $data->result();
	}
}

if( ! function_exists('get_reason_admin_by_id') )
{
	function get_reason_admin_by_id($id)
	{
			$ci =& get_instance();
			
			$ci->db->where('reason_id', $id);
			$data = $ci->db->get('reason_not_renew');
			
			$result = $data->row();

			return $result->reason;
	}
}

if( ! function_exists('email_engine') )
{
	function email_engine($content, $email, $name, $subject='')
	{
			$ci =& get_instance();	

			$ci->load->library('My_PHPMailer');
								
			$mail = new PHPMailer();
			$mail->IsHTML(true);
			$mail->IsSMTP(); // we are going to use SMTP
		  //$mail->SMTPAuth   = true; // enabled SMTP authentication
		  $mail->SMTPDebug = 1;
		  //$mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
			$mail->Host       = "10.100.140.117";      // setting GMail as our SMTP server
			$mail->Port       = 25;                   // SMTP port to connect to GMail
			$mail->Username   = "jkas@dbkl.gov.my";  // user email address
			$mail->Password   = "0c5nx23q";            // password in GMail
			$mail->SetFrom($from, $nameFrom);  //Who is sending the email
			$mail->AddAddress($email, $name);
		  //$mail->AddReplyTo("hafidzulamin@hotmail.com","Hafidzul Amin");  //email address that receives the response
		  
		  $mail->Subject    = $subject;
		  $mail->Body      = $content;

		$mail->Send();
	}
}

if( ! function_exists('get_status') )
{
	function get_status($stat)
	{
			if( $stat == 1 )
			{
					return "Aktif";
			}
			else
			{
					return "Tidak Aktif";
			}	
	}
}

if( ! function_exists('get_day_malay'))
{
		function get_day_malay( $day )
		{
				$arrDay = array("Sunday" => "Ahad", "Monday" => "Isnin", "Tuesday" => "Selasa", "Wednesday" => "Rabu", "Thursday" => "Khamis", "Friday" => "Jumaat", "Saturday" => "Sabtu");
				
				return $arrDay[$day];
		}
}

if( ! function_exists('get_month_malay'))
{
		function get_month_malay( $month )
		{
				$arrMonth = array("January" => "Januari", "February" => "Februari", "March" => "Mac", "April" => "April", "May" => "Mei", "June" => "Jun", "July" => "Julai", "August" => "Ogos", "September" => "September", "October" => "Oktober", "November" => "November", "December" => "Disember");
				
				return $arrMonth[$month];
		}
}

if( ! function_exists('get_log') )
{
	function get_log($userid)
	{
		$ci =& get_instance();
		
		 $ci->db->where('user_id', $userid);
		 $data = $ci->db->get('log');
		 
		 if ( $data->num_rows() > 0 )
		 {
		 		$row = $data->last_row();
		 		return $row->log_datetime;
		 }
	}
}

if( ! function_exists('check_data') )
{
	function check_data( $data, $column, $table )
	{
		$ci =& get_instance();
		
		$ci->db->where( $column, $data );
		$data = $ci->db->get( $table );
		
		return $data->num_rows();
	}
}

if( ! function_exists('get_data') )
{
	function get_data( $data, $column, $table, $point )
	{
		$ci =& get_instance();
		
		$ci->db->where( $column, $data );
		$data = $ci->db->get( $table );
		$row = $data->row();
		
		return $row->$point;
	}
}

if( ! function_exists('get_count_log') )
{
	function get_count_log($userid)
	{
		$ci =& get_instance();
		
		 $ci->db->where('user_id', $userid);
		 $data = $ci->db->get('log');
		 
		 return $data->num_rows();
	}
}

if( ! function_exists('get_data_payment') )
{
	function get_data_payment($appid)
	{
		$ci =& get_instance();
		
		$ci->db->where('app_id', $appid);
		$data = $ci->db->get('payment');
		
		return $data->result();
	}
}

if( ! function_exists('get_dog_comment') )
{
	function get_dog_comment($dog_id)
	{
		$ci =& get_instance();
		
		$ci->db->where('dog_id', $dog_id);
		$data = $ci->db->get('dog_comment');
		
		return $data->result();
	}
}

if( ! function_exists('get_dog_types') )
{
	function get_dog_types()
	{
		$ci =& get_instance();
		
		$data = $ci->db->get('dog_type');
		
		return $data->result();
	}
}
