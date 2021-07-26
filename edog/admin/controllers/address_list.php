<?php

class Address_List extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('dashboard_admin_model');
		}
		
		public function index()
		{
				if( $this->session->userdata('isLoggedIn') )
				{
                                    $this->load->library('pagination');
                                    
                                    $count = $this->dashboard_admin_model->get_already_all_license($this->uri->segment(3));
                                    
                                    if ($this->uri->segment(3) >= 2014) {
                                        $config['base_url'] = base_url('admin') . '/index.php/address_list/index/' . $this->uri->segment(3);
                                        $config["uri_segment"] = 4;
                                    }
                                    else {
                                        $config['base_url'] = base_url('admin') . '/index.php/address_list/index/';
                                        $config["uri_segment"] = 3;
                                    }
                                    
                                
                                    $config['total_rows'] = $count->num_rows();
                                    $config['per_page'] = 10; 
                            
                                    $config['suffix'] = '?'.http_build_query($_GET, '', "&");
                                   
                                    $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
                                    $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';

                                    $config['cur_tag_open'] = "<li><span><b>";
                                    $config['cur_tag_close'] = "</b></span></li>";
			        
                                    $this->pagination->initialize($config); 
                                    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

                                    $data['links'] = $this->pagination->create_links();              
                                    $data['already'] = $this->dashboard_admin_model->get_already_license($this->uri->segment(3),$config["per_page"], $page);
                                    $data['total_rows'] = $count->num_rows();

                                    $this->template->write_view('content', 'address_list', $data, TRUE);
                                    $this->template->parse_template = TRUE;
                                    $this->template->render();
                                }
				else
				{
						redirect(base_url('admin'));
				}
        }
}