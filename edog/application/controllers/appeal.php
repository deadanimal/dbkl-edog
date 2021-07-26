<?php

class Appeal extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('application_view_model');
				$this->load->model('appeal_model');
		}
		
		public function index()
		{
				if( $this->session->userdata('isLoggedIn') )
				{
					$data['info'] = $this->application_view_model->get_application_info($this->uri->segment(3));
					$this->template->write_view('content', 'appeal', $data, TRUE);
					$this->template->parse_template = TRUE;
					$this->template->render();
				}
				else
				{
					redirect('login');
				}
		}
		
		public function save_appeal()
		{
			$config['upload_path'] = './doc/support/';
			$config['allowed_types'] = 'docx|doc|pdf|gif|jpg|jpeg|png|odt|xps';
			//$config['max_width']  = '1024';
			//$config['max_height']  = '768';

			$this->load->library('upload');
			
				//if( $this->input->post('doc_type') == 1 )
				//{
					if($_FILES['doc_support']['size'] > 0)
					{
						$this->upload->initialize($config);

						$numberUpload = count($_FILES['doc_support']['name']);

						for($i=0; $i < $numberUpload; $i++)
						{
							$_FILES['userfile']['name']     = $_FILES['doc_support']['name'][$i];
					        $_FILES['userfile']['type']     = $_FILES['doc_support']['type'][$i];
					        $_FILES['userfile']['tmp_name'] = $_FILES['doc_support']['tmp_name'][$i];
					        $_FILES['userfile']['error']    = $_FILES['doc_support']['error'][$i];
					        $_FILES['userfile']['size']     = $_FILES['doc_support']['size'][$i];

					        if(! $this->upload->do_upload())
					        {
					        	echo 0;
					        }
					        else
					        {
					        	$this->upload->do_upload();
					        	$final[] = $this->upload->data();
					        }

					        
						}

						for($j=0; $j < count($final); $j++)
						{
							$docUpload .= $final[$j]['orig_name'].'|';
						}
					}

						$this->appeal_model->save_appeal($docUpload);
		}
}