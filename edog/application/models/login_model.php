<?php 

class Login_Model extends CI_Model {
	
		public function __construct() {
			parent::__construct();
			$this->load->library('encrypt');
		}
		
		public function authenticationUser() {
				
				$username = $this->input->post('login-user');
				$password = $this->encrypt->sha1($this->input->post('login-password'));
				
				$this->db->where(array('username' => $username, 'password' => $password, 'status' => '1'));
				$data = $this->db->get('users');
				
				if(count($data->result()) > 0){
					foreach($data->result() as $row) {
							
							$session = array(
									'userid' => $row->uid,
									'name' => $row->name,
									'nric' => $row->nric,
									'roles' => $row->roles,
									'id_type' => $row->nric_type,
									'isLoggedIn' => true
							);
						
						$this->session->set_userdata($session);
						return $row->roles;
					}
				}else{
					return 0;
				}
				
		
		}
		
		public function register_user()
		{
				$chk_ic = check_ic_no($this->input->post('register-ic'));
			
				if($chk_ic == 0)
				{
					$log = array(
								 		'username' => $this->input->post( 'register-ic' ),
								 		'email' => $this->input->post( 'register-email' ),
								 		'password' => $this->encrypt->sha1( $this->input->post( 'register-password' ) ),
								 		'name' => $this->input->post( 'register-name' ),
								 		'nric_type' => $this->input->post( 'register_type_id' ),
								 		'nric' => $this->input->post( 'register-ic' ),
								 		'roles' => 1
								 );
					
					$this->db->insert( 'users', $log );
					
					return 1;
				}
				else
				{
					return 2;
				}
		}
		
		public function check_valid_forgot($ic, $emel)
		{
				$this->db->where(array('nric' => $ic, 'username' => $ic, 'email' => $emel));
				$data = $this->db->get('users');
				$row = $data->result();
				
				if( count($row) == 1 )
					return 1;
				else
					return 0;
				
		}
		
		public function reset_password($new_password)
		{
				$arr = array(
						'password' => $this->encrypt->sha1($new_password)
				);
				
				$this->db->where(array('email' => $this->input->post('reminder-email-forgot'), 'nric' => $this->input->post('register-ic-forgot'), 'username' => $this->input->post('register-ic-forgot')));
				$this->db->update('users', $arr);
		}
		
		public function register_log()
		{
				$log = array(
									'log_datetime' => date('Y-m-d H:i:s'),
									'user_id' => $this->session->userdata('userid')
							);
							
							$this->db->insert('log', $log);
		}
}
?>