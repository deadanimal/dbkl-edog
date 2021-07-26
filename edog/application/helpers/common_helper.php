<?php

/***************Common Helper*************************/

if( ! function_exists('get_users_name') )
{
	function get_users_name($userid)
	{
		$CI =& get_instance();
		
		$CI->db->where( 'uid', $userid );
		$user = $CI->db->get( 'users' );
		$row = $user->result();
		
		return $row[0]->name;
	}
}

if( ! function_exists('get_users_name_by_email') )
{
	function get_users_name_by_email($email, $ic)
	{
		$CI =& get_instance();
		
		$CI->db->where( array('email' => $email, 'nric' => $ic) );
		$user = $CI->db->get( 'users' );
		$row = $user->result();
		
		return $row[0]->name;
	}
}

if( ! function_exists('get_application_no') )
{
	function get_application_no()
	{
		$ci =& get_instance();
		$_appNo = null;
		
		
		$ci->db->where(array('year' => date('y'), 'month' => date('m')));
		$_curr = $ci->db->get( 'running_no' );
		
		if( count( $_curr->result() ) > 0 )
		{
			foreach( $_curr->result() as $row )
			{
				$_new = $row->no + 1;
				
				$_upd = array(
										'no' => $_new
									);
				
				$ci->db->where( 'runid', $row->runid );
				$ci->db->update( 'running_no', $_upd );
				
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
				
				$_appNo = 'LX'.date('y').date('m').$_runNo;
			}
		}
		else
		{
			$_run = array(
								'year' => date('y'),
								'month' => date('m'),
								'no' => 1	
								);
								
			$ci->db->insert( 'running_no', $_run );
			
			$_runNo = '000001';
			$_appNo = 'LX'.date('y').date('m').$_runNo;
		}
		
		return $_appNo;
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
					 ->join('address', 'profile.profile_id = address.profile_id')
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
						 ->where_in('application.app_type', array('BARU','RENEW', 'NOT_RENEW'))
						 ->where(array('address.addr_id' => $addr_id))
						 ->where("DATE_FORMAT(date_start,'%Y')", date('Y'));

				
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
						 ->join('dog_details', 'application.app_id = dog_details.app_id')
						 ->where('dog_details.status', 'Valid')
						 ->where_in('application.status', array('Lulus'))
						 ->where_in('application.app_type', array('BARU','RENEW'))
						 ->where(array('address.addr_id' => $addr_id, 'renewed' => 0))
						 ->group_by('dog_details.app_id');
				
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

if( ! function_exists('get_available_license2') )
{
	function get_available_license2($addr_id)
	{
		$ci =& get_instance();
		
		$ci->db->select('dog_details.dog_id')
					 ->from('application')
					 ->join('dog_details', 'application.app_id = dog_details.app_id')
					 //->join('license', 'dog_details.dog_id = license.dog_id')
					 ->where(array('application.addr_id' => $addr_id, 'application.renewed' => 0, 'dog_details.status' => 'Valid'))
					 ->where_in('application.status', array('Diterima','Lulus','Dalam Proses'));
					 
					 
		$data = $ci->db->get();
		return $data->num_rows();
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
		
		$ci->db->order_by('dtid', 'desc');
		$ci->db->where('status', 1);
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

if( ! function_exists('get_count_temp') )
{
	function get_count_temp($addrID, $type)
	{
		$ci =& get_instance();
		
		$ci->db->where(array('addr_id' => $addrID, 'userid' => $ci->session->userdata('userid'), 'app_type' => $type));
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
		$ci =& get_instance();
		
	    if ($length>0) {
	        $rand_id="";
	        for ($i=1; $i<=$length; $i++) {
	            mt_srand((double)microtime() * 1000000);
	            $num = mt_rand(1,36);
	            $options = array_merge(range('a', 'z'), range('0', '9'));
							$rand_id.= $options[$num];
	        }
	    }
	    return $rand_id;
	}
}

if( ! function_exists('check_ic_no') )
{
	function check_ic_no($ic)
	{
			$ci =& get_instance();
			
			$ci->db->where('username', $ic);
			$data = $ci->db->get('users');
			$row = $data->result();
			
			if( count($row) > 0 )
				return 1;
			else
				return 0;
	}
}

if( ! function_exists('get_home_type') )
{
	function get_home_type($hometypeID)
	{
			$ci =& get_instance();
			
			$ci->db->where('hid', $hometypeID);
			$data = $ci->db->get('house_type');
			
			return $data->result();
	}
}

if( ! function_exists('get_staff_comment') )
{
	function get_staff_comment($appID)
	{
		 $ci =& get_instance();
		 
		 $ci->db->where('app_id', $appID);
		 $data = $ci->db->get('history');
		 
		 if( $data->num_rows() > 0 )
		 {
		 		return $data->last_row();
		 }
	}
}

if( ! function_exists('get_reason') )
{
	function get_reason($rid)
	{
		 $ci =& get_instance();
		 
		 $ci->db->where('reason_id', $rid);
		 $data = $ci->db->get('reason_not_renew');
		 
		 $row = $data->result();
		 
		 return $row[0]->reason;
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

if( ! function_exists('email_engine') )
{
	function email_engine($content, $email, $name, $subject, $cc, $from = 'edog@dbkl.gov.my', $nameFrom = 'DBKL Support')
	{
			$ci =& get_instance();
			
			/*  $ci->load->library('email');
			
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = '10.100.140.117';
			$config['smtp_user'] = 'jkas@dbkl.gov.my';
			$config['smtp_pass'] = '0c5nx23q';
			$config['smtp_port'] = 25;
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			//$config['newline'] = "\r\n";
			
			$ci->email->initialize($config);
			
			$ci->email->from($from, $nameFrom);
			$ci->email->to( $email );
			$ci->email->cc( $cc );
			
			$ci->email->subject( $subject );
			$ci->email->message( $content );
			
			$ci->email->send();

			return $ci->email->print_debugger(); */

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

