<?php

class View_App extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('new_app_model');
		}
		
		public function index()
		{
				if( $this->session->userdata('isLoggedIn') )
				{
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

						$this->template->write_view('content', 'view_app', $data, TRUE);
						$this->template->parse_template = TRUE;
						$this->template->render();
				}
				else
				{
						redirect(base_url('admin'));
				}
		}
		
		public function save_comment()
		{
			$this->new_app_model->save_staff_comment();
		}

		public function update_receipt_no()
		{
			$this->new_app_model->updateReceiptNo($this->uri->segment(3), $this->uri->segment(4), $this->uri->segment(5));
		}
}