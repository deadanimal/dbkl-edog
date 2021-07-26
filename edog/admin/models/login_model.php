<?php 

class Login_Model extends CI_Model {
	
		public function __construct() {
			parent::__construct();
			$this->load->library('encrypt');
		}
		
		public function authenticationUser() {
				
				$username = $this->input->post('login-users');
				$password = $this->encrypt->sha1($this->input->post('login-password'));

				$this->db->where(array('username' => $username, 'password' => $password, 'status' => 1));
				$data = $this->db->get('users')->row();
				
				if ($data->uid != '') {
				// if(count($data->result()) > 0){
					// foreach($data->result() as $row) {
							
							$log = array(
									'log_datetime' => date('Y-m-d H:i:s'),
									'user_id' => $data->uid
							);
							
							$this->db->insert('log', $log);
							
							$session = array(
									'userid' => $data->uid,
									'admin_userid' => $data->uid,
									'name' => $data->name,
									'nric' => $data->nric,
									'roles' => $data->roles,
									'id_type' => $data->nric_type,
									'isLoggedIn' => true
							);
						
						$this->session->set_userdata($session);
						// return redirect( base_url('edog/admin/index.php/dashboard_admin');
						return $data->roles;
					// }
				}else{
					return 0;
				}
				
		
		}
		
		public function register_user()
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
		
		public function check_valid_forgot($ic, $emel)
		{
				$this->db->where(array('email' => $emel, 'nric' => $ic));
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
				
				$this->db->where(array('email' => $this->input->post('reminder-email'), 'nric' => $this->input->post('register-ic')));
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