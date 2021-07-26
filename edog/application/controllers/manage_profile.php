<?php 

class Manage_Profile extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->no_cache();
				$this->load->model('manage_profile_model');
		}
		
		public function index()
		{
			if( $this->session->userdata('isLoggedIn') )
			{
				  
					$data['PARLIMEN'] = $this->manage_profile_model->get_parlimen();
					$data['HOUSE_TYPE'] = $this->manage_profile_model->get_house_type();
					$data['HOUSE_SPACE'] = $this->manage_profile_model->get_house_space();
					$data['PROFILE'] = $this->manage_profile_model->authorize_user_profile();
					// $data['DOCUMENT'] = $this->manage_profile_model->doc_profile();
					// echo '<pre>';
					// print_r($data);
					// echo '</pre>';
					// die;
					$this->template->write_view('content','manage_profile', $data, TRUE);
					$this->template->parse_template = TRUE;
					$this->template->render();

			}
			else
			{
				redirect('login');
			}
		}
		
		public function save_profile()
		{
			//print_r($_POST);exit;
				$this->manage_profile_model->save_profile();
				redirect('manage_profile');
		}
		
		public function save_address()
		{
			$rand = rand(9999,99999);
			$config['file_name'] = date('Ymdhis')."_".$rand;
			$config['file_type'] = $_FILES['billAnjing']['type'];

			$config['upload_path'] = './doc/uploadbil/';
			$config['allowed_types'] = 'docx|doc|pdf|gif|jpg|JPG|JPEG|jpeg|png|PNG';
			$config['max_size'] = 2000;
			$config['max_width'] = 2048;
			$config['max_height'] = 2048;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			// $this->load->library('upload', $config);

			if (!$this->upload->do_upload('billAnjing')) {
				// echo " --- sini ---  ";
				$error = array('error' => $this->upload->display_errors());
				// print_r($error);
				// $this->load->view('imageupload_form', $error);
			} else {
				// echo " --- sana ---  ";
				$data = array('image_metadata' => $this->upload->data());
				// print_r($data);
				// $this->load->view('imageupload_success', $data);
			}
			// echo "<pre>-----";
			// print_r($data);
			// echo "</pre>";
			// echo "manage_profile_model->save_address start <br />";
			$this->manage_profile_model->save_address($data);
			// echo "manage_profile_model->save_address end <br />";
			// redirect('manage_profile?action=addr');
		}
		
		public function application_exists()
		{
				$addrID = $this->uri->segment(3);
				
				$this->db->where('addr_id', $addrID);
				$this->db->from('application');
				
				echo $this->db->count_all_results();
		}

		public function address_exists()
		{
				$addrID = $this->uri->segment(3);
				
				$this->db->where('addr_id', $addrID);
				$this->db->from('address');
				
				echo $this->db->count_all_results();
		}
		
		public function delete_address()
		{
				$addrID = $this->uri->segment(3);
				$this->manage_profile_model->delete_address($addrID);
		}
		
		public function get_address_edit()
		{
				$addrID = $this->uri->segment(3);
				$address = $this->manage_profile_model->get_address($addrID);
				
				foreach($address as $addr)
				{	
					$arr = $addr->no_unit."|".$addr->home_name."|".$addr->street_name."|".$addr->town_name."|".$addr->postcode."|".$addr->parlimen."|".$addr->home_type."|".$addr->home_space."|".$addr->dog_house."|".$addr->doc_bill;
				}
				
				echo $arr;
		}
		
		public function update_address()
		{
			$rand = rand(9999,99999);
			$config['file_name'] = date('Ymdhis')."_".$rand;
			$config['file_type'] = $_FILES['billAnjing']['type'];

			$config['upload_path'] = './doc/uploadbil/';
			$config['allowed_types'] = 'docx|DOCX|doc|DOC|pdf|PDF|gif|GIF|jpg|JPG|JPEG|jpeg|png|PNG';
			$config['max_size'] = 2000;
			$config['max_width'] = 2048;
			$config['max_height'] = 2048;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			// $this->load->library('upload', $config);

			if (!$this->upload->do_upload('billAnjing')) {
				echo " --- sini ---  ";
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				// $this->load->view('imageupload_form', $error);
			} else {
				echo " --- sana ---  ";
				$data = array('image_metadata' => $this->upload->data());
				print_r($data);
				// $this->load->view('imageupload_success', $data);
			}
			$this->manage_profile_model->update_address($data);
			redirect('manage_profile?action=addr');
		}
		
		public function no_cache() {
		  $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		  $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		  $this->output->set_header('Pragma: no-cache');
		  $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		}

		// public function uploadbil()
		// {

		// 	$numberUpload = count($_FILES['gambarAnjing']['name']);
		// 	$appid = $_POST['app_id'];


		// 	if($_FILES['gambarAnjing']['size'] > 0)		
		// 	{
		// 		$config['upload_path'] = '../doc/uploadbil/';
		// 		$config['allowed_types'] = 'gif|jpg|JPG|JPEG|jpeg|png|PNG';
		// 		$config['max_size'] = 2000;
		// 		$config['max_width'] = 2048;
		// 		$config['max_height'] = 2048;
	
		// 		for($i=0; $i < $numberUpload; $i++)
		// 		{
					
		// 			$rand = rand(9999,99999);
		// 			$config['file_name'] = date('Ymdhis')."_".$rand;
		// 			$config['file_type'] = $_FILES['gambarAnjing']['type'][$i];
	
		// 			$_FILES['anjing']['name'] = $_FILES['gambarAnjing']['name'][$i];
		// 			$_FILES['anjing']['type'] = $_FILES['gambarAnjing']['type'][$i];
		// 			$_FILES['anjing']['tmp_name'] = $_FILES['gambarAnjing']['tmp_name'][$i];
		// 			$_FILES['anjing']['error'] = $_FILES['gambarAnjing']['error'][$i];
		// 			$_FILES['anjing']['size'] = $_FILES['gambarAnjing']['size'][$i];
	
		// 			$this->load->library('upload', $config);
		// 			$this->upload->initialize($config);
	
		// 			// $this->load->library('upload', $config);
	
		// 			if (!$this->upload->do_upload('anjing')) {
		// 				$error = array('error' => $this->upload->display_errors());
		// 			} else {
		// 				$data = array('image_metadata' => $this->upload->data());
		// 				$pathImage = 'doc/uploadbil/'.$data['image_metadata']['orig_name'];
						
		// 				$report_data = $this->db->query("INSERT INTO doc_cancellation (filename,app_id,created_at) value ('$pathImage','$appid',now())");
		// 			}
		// 		}			
		// 	}
		// 	$report_data = $this->db->query("UPDATE application SET status = 'Batal',catatan = '$comment' where app_id = $appid");
		// 	// echo "UPDATE application SET status = 'Batal',catatan = '$comment' where app_id = $appid";
		// 	// print_r($report_data);
		// 	redirect(base_url('admin')."/index.php/validate_apps/index/".$appid);
	
		// }
}
?>