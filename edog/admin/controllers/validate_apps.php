<?php

class Validate_Apps extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('new_app_model');
	}
	public function index()
	{
		if ($this->session->userdata('isLoggedIn')) {
			$data['info'] = $this->new_app_model->get_all_info_by_app_id($this->uri->segment(3));
			$data['history'] = $this->new_app_model->get_history($this->uri->segment(3));

			$app_id = $data['info'][0]->app_id;
			$status = $data['info'][0]->status;
			if($status == 'Batal'){
				$doc_cancel = $this->db->query("Select * from doc_cancellation where app_id = $app_id");
				$doc_cancel = $doc_cancel->result();
			}else{
				$doc_cancel = 0;
			}
			
			$data['doc_cancel'] = $doc_cancel;

			$this->template->write_view('content', 'validate_apps', $data, TRUE);
			$this->template->parse_template = TRUE;
			$this->template->render();
		} else {
			redirect(base_url('admin'));
		}
	}
// ----------------------------------- Upload Banyak-----------------------------------
	public function batalLesen()
	{
		// echo "<pre>";
		// print_r($_FILES);

		$numberUpload = count($_FILES['gambarAnjing']['name']);
		$appid = $_POST['app_id'];
		$comment = $_POST['commentBatal'];
		// echo '--- size ---';
		// print_r($_POST);
		// echo "</pre><br/>";
		// echo $comment."---";
		// echo $appid;
		// die;
		// print_r('numberUpload = '.$numberUpload);
		// echo '--- size ---';
		// print_r($_POST);
		// echo "</pre><br/>";
		// die;
		if($_FILES['gambarAnjing']['size'] > 0)		
		{
			$config['upload_path'] = '../doc/batalLesen/';
			$config['allowed_types'] = 'docx|doc|pdf|gif|jpg|JPG|JPEG|jpeg|png|PNG';
			$config['max_size'] = 2000;
			$config['max_width'] = 2048;
			$config['max_height'] = 2048;

			for($i=0; $i < $numberUpload; $i++)
			{
				
				$rand = rand(9999,99999);
				$config['file_name'] = date('Ymdhis')."_".$rand;
				$config['file_type'] = $_FILES['gambarAnjing']['type'][$i];

				$_FILES['anjing']['name'] = $_FILES['gambarAnjing']['name'][$i];
				$_FILES['anjing']['type'] = $_FILES['gambarAnjing']['type'][$i];
				$_FILES['anjing']['tmp_name'] = $_FILES['gambarAnjing']['tmp_name'][$i];
				$_FILES['anjing']['error'] = $_FILES['gambarAnjing']['error'][$i];
				$_FILES['anjing']['size'] = $_FILES['gambarAnjing']['size'][$i];

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// $this->load->library('upload', $config);

				if (!$this->upload->do_upload('anjing')) {
					$error = array('error' => $this->upload->display_errors());
				} else {
					$data = array('image_metadata' => $this->upload->data());
					$pathImage = 'doc/batalLesen/'.$data['image_metadata']['orig_name'];
					$report_data = $this->db->query("INSERT INTO doc_cancellation (filename,app_id,created_at) value ('$pathImage','$appid',now())");
				}
			}			
		}
		$report_data = $this->db->query("UPDATE application SET status = 'Batal',catatan = '$comment' where app_id = $appid");
		// echo "UPDATE application SET status = 'Batal',catatan = '$comment' where app_id = $appid";
		// print_r($report_data);
		redirect(base_url('admin')."/index.php/validate_apps/index/".$appid);

	}
	

	// ----------------------------------- Upload Satu-----------------------------------
	// public function batalLesen()
	// {
	// 	$rand = rand(9999,99999);
	// 	$config['file_name'] = date('Ymdhis')."_".$rand;
	// 	$config['file_type'] = $_FILES['gambarAnjing']['type'];

	// 	$config['upload_path'] = '../doc/batalLesen/';
	// 	$config['allowed_types'] = 'gif|jpg|JPG|JPEG|jpeg|png|PNG';
	// 	$config['max_size'] = 2000;
	// 	$config['max_width'] = 2048;
	// 	$config['max_height'] = 2048;

	// 	$this->load->library('upload', $config);
	// 	$this->upload->initialize($config);
		
	// 	echo 'config = <pre>';
	// 	print_r($config);
	// 	echo 'config = <br/>';
	// 	print_r($_FILES);
	// 	echo "</pre>";

	// 	// $this->load->library('upload', $config);

	// 	if (!$this->upload->do_upload('gambarAnjing')) {
	// 		echo " --- sini ---  ";
	// 		$error = array('error' => $this->upload->display_errors());
	// 		print_r($error);
	// 		// $this->load->view('imageupload_form', $error);
	// 	} else {
	// 		echo " --- sana ---  ";
	// 		$data = array('image_metadata' => $this->upload->data());
	// 		print_r($data);
	// 		// $this->load->view('imageupload_success', $data);
	// 	}
	// }

	// public function batalLesen()
	// {	

	// 	$dateNow = date('Ymdhis');

	// 	$config['upload_path'] = './doc/batalLesen/';
	// 	$config['allowed_types'] = 'gif|jpg|jpeg|png';
	// 	$config['max_size'] = '2048';

	// 	echo "<pre>";
	// 	print_r($_FILES);
	// 	echo "</pre>";

	// 	$this->load->library('upload');

	// 		if($_FILES['gambarAnjing']['size'] > 0)
	// 		{
	// 			$numberUpload = count($_FILES['gambarAnjing']['name']);

	// 			for($i=0; $i < $numberUpload; $i++)
	// 			{
	// 				$config['file_name'] = pathinfo($_FILES['gambarAnjing']['name'][$i], PATHINFO_FILENAME).'_'.$dateNow;
	// 				$this->upload->initialize($config);

	// 				$_FILES['userfile']['name']     = $_FILES['gambarAnjing']['name'][$i];
	// 		        $_FILES['userfile']['type']     = $_FILES['gambarAnjing']['type'][$i];
	// 		        $_FILES['userfile']['tmp_name'] = $_FILES['gambarAnjing']['tmp_name'][$i];
	// 		        $_FILES['userfile']['error']    = $_FILES['gambarAnjing']['error'][$i];
	// 		        $_FILES['userfile']['size']     = $_FILES['gambarAnjing']['size'][$i];

	// 		        if(! $this->upload->do_upload())
	// 		        {
	// 		        	$status = 0;
	// 		        }
	// 		        else
	// 		        {
	// 		        	#$this->upload->do_upload();
	// 		        	$final[] = $this->upload->data();
	// 		        	$status = 1;
	// 			    }

	// 			}
	// 			#print_r($final);
	// 			if($status == 1){
	// 				for($j=0; $j < count($final); $j++)
	// 				{
	// 					echo 'file_name = '.'<br />';
	// 					print_r($final);
	// 					$docUpload .= $final[$j]['file_name'].'|';
	// 				}
	// 			}	
	// 		}

	// 		echo '<br />dataUpload = '.'<br />';
	// 		print_r($docUpload
	// 	);
	// 		print_r($_POST);

	// 	// if( $this->session->userdata('isLoggedIn') )
	// 	// {

	// 	// 	//////////////////////////////////////////// start upload image
	// 	// 	//////////////////////////////////////////// end upload image

	// 		$id = $_POST['app_id'];
	// 		$comment = $_POST['commentBatal'];
	// 	// 	echo 'file_name = '.'<br />';
	// 	// 	print_r($data['file_name']);
	// 	// 	echo '<br />dataUpload = '.'<br />';
	// 		print_r($docUpload);
	// 		print_r($_POST);
	// 	// 	echo "UPDATE application SET status = 'Batal',catatan = '$comment' where app_id = $id";
	// 		die;
	// 		$report_data = $this->db->query("UPDATE application SET status = 'Batal',catatan = '$comment' where app_id = $id");
	// 		redirect(base_url('admin')."/index.php/validate_apps/index/".$id);
	// 	// }
	// 	// else
	// 	// {
	// 	// 		redirect(base_url('admin'));
	// 	// }
	// }

	// public function update_receipt_no()
	// {
	// 	$this->new_app_model->updateReceiptNo($this->uri->segment(3), $this->uri->segment(4), $this->uri->segment(5));
	// }

	public function submitForm()
	{
		$this->new_app_model->updateReceiptNo($this->uri->segment(3), $this->uri->segment(4), $this->uri->segment(5));
	}
}
