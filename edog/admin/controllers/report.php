<?php

class Report extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('report_model');
				$this->load->library('excel');
				$this->load->helper('cookie');
		}
		
		public function index()
		{
			 if( $this->session->userdata('isLoggedIn') )
			 {
					// echo "<pre>";
					// print_r($_GET);
					// echo "</pre>";
					// die;

					$status_batal = '0';
					if(!empty($_GET)){
						if( $_GET['status-permohonan'] == 'Batal' ){
							$status_batal = '1';
						}
					}

			 		$data['house_type'] = $this->report_model->get_house_type();
			 		$data['house_space'] = $this->report_model->get_house_space();
			 		$data['parlimen'] = $this->report_model->get_parlimen();
			 		$data['dog'] = $this->report_model->get_dog();
			 		//$data['weight'] = $this->report_model->get_dog_weight();

			 		$this->load->library('pagination');

			 		$count = $this->report_model->get_count_all();
			 		
					$config['base_url'] = base_url('admin') . '/index.php/report/index';
					// $config['base_url'] = base_url('admin') . '/index.php/user_management/index';
					//$config['page_query_string'] = TRUE;
					//$config['enable_query_strings'] = TRUE;
					$config['total_rows'] = $count->num_rows();
					$config['per_page'] = 20; 
					$config["uri_segment"] = 3;
					$config['suffix'] = '?'.http_build_query($_GET, '', "&");

					$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
			        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
			         
			        $config['cur_tag_open'] = "<li><span><b>";
			        $config['cur_tag_close'] = "</b></span></li>";
			        

					$this->pagination->initialize($config); 

					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


					//$config['suffix'] = "?page=".$page."&per_page=".$config["per_page"];

					$data['links'] = $this->pagination->create_links();
					$data['status_batal'] = $status_batal;
			 		$data['get_all'] = $this->report_model->get_data_all($config["per_page"], $page);
			 		$data['total_rows'] = $count->num_rows();
			 		$data['all'] = $count->result();
			 		$data['query'] = http_build_query($_GET, '', "&");
			 		//$data['type_report'] = $this->input->cookie('date-type');

			 		$this->template->write_view('content', 'report', $data, TRUE);
			 		$this->template->parse_template = TRUE;
			 		$this->template->render();
					
					
			 }
			 else
			 {
			 		redirect( base_url() );
			 }
		}

		public function details()
		{
			if($this->session->userdata('isLoggedIn'))
			{	
				if($this->input->get('tahun'))
					$year = $this->input->get('tahun');
				else
					$year = date('Y');

				if($this->input->get('parlimen'))
				{

					if($this->input->get('parlimen') == 'semua-parlimen'){
						$parlimen = 'Semua Parlimen';
					}
					elseif($this->input->get('parlimen') == 'pilih-parlimen'){

						$list = $this->input->get('list-parlimen');

						for($i=0; $i<count($list); $i++)
						{
							if($i > 0)
								$parlimen .= " , ";
								$parlimen .= get_parlimen_name($list[$i]);
						}
					}
				}
				else
				{
					$parlimen = 'Semua Parlimen';
				}
				//print_r($this->report_model->get_not_exist_license());
				$data['parlimen'] = $this->report_model->get_parlimen();
				$data['lulus'] = $this->report_model->get_app_lulus();
				$data['tolak'] = $this->report_model->get_app_ditolak();
				$data['terima'] = $this->report_model->get_app_diterima();
				$data['dalam_proses'] = $this->report_model->get_app_dalam_proses();
				$data['dalam_proses_rayuan'] = $this->report_model->get_app_dalam_proses_rayuan();

				$data['exists'] = $this->report_model->get_exist_license();
				$data['not_exists'] = $this->report_model->get_not_exist_license();

				$data['alive'] = $this->report_model->get_alive_dog();
				$data['dead'] = $this->report_model->get_dead_dog();
				$data['lost'] = $this->report_model->get_lost_dog();
				$data['tag_lost'] = $this->report_model->get_lost_tag_dog();
				$data['not_allowed'] = $this->report_model->get_not_allowed_dog();
				$data['new_place'] = $this->report_model->get_new_place_dog();

				$data['year'] = $year;
				$data['listparlimen'] = $parlimen;

				$this->template->write_view('content', 'details', $data, TRUE);
				$this->template->parse_template = TRUE;
				$this->template->render();
			}
			else
			{
				redirect('/','refresh');
			}
		}
		
		public function get_for_graph()
		{
			$data = $this->report_model->get_data_all();
			
			$lulus = 0;
			$tolak = 0;
			$terima = 0;
			$dalam_proses = 0;
			$rayuan_proses = 0;
										
			foreach($data as $row)
			{
				if($row->appStatus == "Lulus")
					$lulus = $lulus + 1;
				elseif($row->appStatus == "Ditolak")
					$tolak = $tolak + 1;
				elseif($row->appStatus == "Diterima")
					$terima = $terima + 1;
				elseif($row->appStatus == "Dalam Proses")
					$dalam_proses = $dalam_proses + 1;
				elseif($row->appStatus == "Dalam Proses" && $row->appeal == 1)
					$rayuan_proses = $rayuan_proses + 1;
			}
			
				echo $lulus."|".$tolak."|".$terima."|".$dalam_proses."|".$rayuan_proses;

		}

		public function display_report()
		{

			$get_all = $this->report_model->get_data_all();

		}

		public function upload_excel()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$this->template->write_view('content', 'upload_excel', $data, TRUE);
		 		$this->template->parse_template = TRUE;
		 		$this->template->render();
			}
			else
			{
				redirect(base_url());
			}
		}

		public function process_data()
		{
			 $configUpload['upload_path'] = FCPATH.'upload/';
	         $configUpload['allowed_types'] = 'xls|xlsx|csv';
	         //$configUpload['max_size'] = '5000';


	         $this->load->library('upload', $configUpload);
	         $this->upload->do_upload('files');	

	         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
	         
	         $file_name = $upload_data['file_name']; //uploded file name
			 $extension=$upload_data['file_ext'];    // uploded file extension
			
			//$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
			 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
			          //Set to read only
	          $objReader->setReadDataOnly(true); 		  
	        //Load excel file
			 $objPHPExcel=$objReader->load(FCPATH.'upload/'.$file_name);		 
	         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
	         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
	          
	          for($i=2;$i<=$totalrows;$i++)
	          {

	              $Name= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();	
	              $Citizen= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(); //Excel Column 1		
	              $Email= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(); //Excel Column 1
				  $Icno= $objWorksheet->getCellByColumnAndRow(3,$i)->getValue(); //Excel Column 2
				  $ICType=$objWorksheet->getCellByColumnAndRow(4,$i)->getValue(); //Excel Column 3
				  $Phone=$objWorksheet->getCellByColumnAndRow(5,$i)->getValue(); //Excel Column 3
				  $Mohon=$objWorksheet->getCellByColumnAndRow(6,$i)->getValue(); //Excel Column 4
				  $Terima=$objWorksheet->getCellByColumnAndRow(7, $i)->getValue();
				  $Mula=$objWorksheet->getCellByColumnAndRow(8, $i)->getValue();
				  $Unit=$objWorksheet->getCellByColumnAndRow(9, $i)->getValue();
				  $Kawasan=$objWorksheet->getCellByColumnAndRow(10, $i)->getValue();
				  $Jalan=$objWorksheet->getCellByColumnAndRow(11, $i)->getValue();
				  $Bandar=$objWorksheet->getCellByColumnAndRow(12, $i)->getValue();
				  $Poskod=$objWorksheet->getCellByColumnAndRow(13, $i)->getValue();
				  $Parlimen=$objWorksheet->getCellByColumnAndRow(14, $i)->getValue();
				  $HouseType=$objWorksheet->getCellByColumnAndRow(15, $i)->getValue();
				  $Space=$objWorksheet->getCellByColumnAndRow(16, $i)->getValue();
				  $HouseDog=$objWorksheet->getCellByColumnAndRow(17, $i)->getValue();

				  $DogType1=$objWorksheet->getCellByColumnAndRow(18, $i)->getValue();
				  $Color1=$objWorksheet->getCellByColumnAndRow(19,$i)->getValue();
				  $Gender1=$objWorksheet->getCellByColumnAndRow(20,$i)->getValue();
				  $Weight1=$objWorksheet->getCellByColumnAndRow(21,$i)->getValue();
				  $Mandul1=$objWorksheet->getCellByColumnAndRow(22,$i)->getValue();
				  $Microchip1=$objWorksheet->getCellByColumnAndRow(23,$i)->getValue();
				  $Owner1=$objWorksheet->getCellByColumnAndRow(24,$i)->getValue();
				  $DogTrain1=$objWorksheet->getCellByColumnAndRow(25,$i)->getValue();

				  $DogType2=$objWorksheet->getCellByColumnAndRow(26, $i)->getValue();
				  $Color2=$objWorksheet->getCellByColumnAndRow(27,$i)->getValue();
				  $Gender2=$objWorksheet->getCellByColumnAndRow(28,$i)->getValue();
				  $Weight2=$objWorksheet->getCellByColumnAndRow(29,$i)->getValue();
				  $Mandul2=$objWorksheet->getCellByColumnAndRow(30,$i)->getValue();
				  $Microchip2=$objWorksheet->getCellByColumnAndRow(31,$i)->getValue();
				  $Owner2=$objWorksheet->getCellByColumnAndRow(32,$i)->getValue();
				  $DogTrain2=$objWorksheet->getCellByColumnAndRow(33,$i)->getValue();

				  $DatePayment=$objWorksheet->getCellByColumnAndRow(34,$i)->getValue();
				  $Place=$objWorksheet->getCellByColumnAndRow(35,$i)->getValue();
				  $Amount=$objWorksheet->getCellByColumnAndRow(36,$i)->getValue();
				  $Receipt=$objWorksheet->getCellByColumnAndRow(37,$i)->getValue();


				  if($Name == "" || $Citizen == "" || $Email == "" || $Phone == "")
				 {
				 	//echo 'lalala';
				 	echo 0;
				 }
				 else
				 {
		          	  if($DogType2 != '')
		          	  {
		          	  	 if($DogType2 == "" || $Color2 == "" || $Gender2 == "" || $Weight2 == "" || $Mandul2 == "" || $Microchip2 == "" || $Owner2 == "" || $DogTrain2 == "")
		          	  	 {
		          	  	 	//echo 'eeee';
		          	  	 	echo 0;
		          	  	 }
		          	  	 else
		          	  	 {
		          	  	 	  $userid = $this->report_model->getUsersID($Icno, $Email, $Name, $ICType);
					  		  $pid = $this->report_model->insertProfile($Name, $Citizen, $ICType, $Icno, $Phone, $Email, $userid);
					  		  $addrid = $this->report_model->insertAddress($Unit, $Kawasan, $Jalan, $Bandar, $Poskod, $Parlimen, $HouseType, $Space, $HouseDog, $pid);
				          	  $appid = $this->report_model->insertApplication($this->input->post('tahun'), $this->input->post('bulan'), $Mohon, $Terima, $Mula, $addrid);
				          	  $this->report_model->insertDog($DogType1, $Color1, $Gender1, $Weight1, $Mandul1, $Microchip1, $Owner1, $DogTrain1, $appid);
				          	  $this->report_model->insertPayment($DatePayment, $Place, $Amount, $Receipt, $appid);
				          	  $this->report_model->insertDog($DogType2, $Color2, $Gender2, $Weight2, $Mandul2, $Microchip2, $Owner2, $DogTrain2, $appid);
		          	  			
		          	  		  echo 1;
		          	  	 }
		          	  		
		          	  }
		          	  else
		          	  {
		          	  		  $userid = $this->report_model->getUsersID($Icno, $Email, $Name, $ICType);
					  		  $pid = $this->report_model->insertProfile($Name, $Citizen, $ICType, $Icno, $Phone, $Email, $userid);
					  		  $addrid = $this->report_model->insertAddress($Unit, $Kawasan, $Jalan, $Bandar, $Poskod, $Parlimen, $HouseType, $Space, $HouseDog, $pid);
				          	  $appid = $this->report_model->insertApplication($this->input->post('tahun'), $this->input->post('bulan'), $Mohon, $Terima, $Mula, $addrid);
				          	  $this->report_model->insertDog($DogType1, $Color1, $Gender1, $Weight1, $Mandul1, $Microchip1, $Owner1, $DogTrain1, $appid);
				          	  $this->report_model->insertPayment($DatePayment, $Place, $Amount, $Receipt, $appid);
		          	  		  
		          	  		  echo 1;
		          	  }
				 }
			}
	          
		}

		public function print_report()
		{

			 echo link_tag("css/bootstrap.min.css");   		
			 echo link_tag("css/bootstrap-theme.min.css");   		
			 echo link_tag("css/ui-lightness/jquery-ui-1.10.4.custom.css");   		
			 echo link_tag("css/box.css");			

			 echo script_tag("js/jquery-2.1.1.min.js");   		
			 echo script_tag("js/bootstrap.min.js");   		
			 echo script_tag("js/jquery-1.10.2.js");   		
			 echo script_tag("js/jquery-ui-1.10.4.custom.js");

			$lulus = $this->report_model->get_app_lulus();
			$tolak = $this->report_model->get_app_ditolak();
			$terima = $this->report_model->get_app_diterima();
			$dalam_proses = $this->report_model->get_app_dalam_proses();
			$dalam_proses_rayuan = $this->report_model->get_app_dalam_proses_rayuan();

			$exists = $this->report_model->get_exist_license();
			$not_exists = $this->report_model->get_not_exist_license();

			$alive = $this->report_model->get_alive_dog();
			$dead = $this->report_model->get_dead_dog();
			$lost = $this->report_model->get_lost_dog();
			$tag_lost = $this->report_model->get_lost_tag_dog();
			$not_allowed = $this->report_model->get_not_allowed_dog();
			$new_place = $this->report_model->get_new_place_dog();


			$lulus1 = $lulus[0] + $tolak[0] + $terima[0] + $dalam_proses[0] + $dalam_proses_rayuan[0];
			$lulus2 = $lulus[1] + $tolak[1] + $terima[1] + $dalam_proses[1] + $dalam_proses_rayuan[1];
			$lulus4 = $lulus[2] + $tolak[2] + $terima[2] + $dalam_proses[2] + $dalam_proses_rayuan[2];
			$lulus5 = $lulus[3] + $tolak[3] + $terima[3] + $dalam_proses[3] + $dalam_proses_rayuan[3];
			$lulus6 = $lulus[4] + $tolak[4] + $terima[4] + $dalam_proses[4] + $dalam_proses_rayuan[4];
			$lulus7 = $lulus[5] + $tolak[5] + $terima[5] + $dalam_proses[5] + $dalam_proses_rayuan[5];
			$lulus8 = $lulus[6] + $tolak[6] + $terima[6] + $dalam_proses[6] + $dalam_proses_rayuan[6];
			$lulus9 = $lulus[7] + $tolak[7] + $terima[7] + $dalam_proses[7] + $dalam_proses_rayuan[7];
			$lulus10 = $lulus[8] + $tolak[8] + $terima[8] + $dalam_proses[8] + $dalam_proses_rayuan[8];
			$lulus11 = $lulus[9] + $tolak[9] + $terima[9] + $dalam_proses[9] + $dalam_proses_rayuan[9];
			$lulus12 = $lulus[10] + $tolak[10] + $terima[10] + $dalam_proses[10] + $dalam_proses_rayuan[10];
			$lulus13 = $lulus[11] + $tolak[11] + $terima[11] + $dalam_proses[11] + $dalam_proses_rayuan[11];
			$lulus14 = array_sum($lulus) + array_sum($tolak) + array_sum($terima) + array_sum($dalam_proses) + array_sum($dalam_proses_rayuan);

			$exists1 = $exists[0] + $not_exists[0];
			$exists2 = $exists[1] + $not_exists[1];
			$exists3 = $exists[2] + $not_exists[2];
			$exists4 = $exists[3] + $not_exists[3];
			$exists5 = $exists[4] + $not_exists[4];
			$exists6 = $exists[5] + $not_exists[5];
			$exists7 = $exists[6] + $not_exists[6];
			$exists8 = $exists[7] + $not_exists[7];
			$exists9 = $exists[8] + $not_exists[8];
			$exists10 = $exists[9] + $not_exists[9];
			$exists11 = $exists[10] + $not_exists[10];
			$exists12 = $exists[11] + $not_exists[11];
			$exists13 = array_sum($exists) + array_sum($not_exists);

			$alive1 = $alive[0] + $dead[0] + $lost[0] + $tag_lost[0] + $not_allowed[0] + $new_place[0];
			$alive2 = $alive[1] + $dead[1] + $lost[1] + $tag_lost[1] + $not_allowed[1] + $new_place[1];
			$alive3 = $alive[2] + $dead[2] + $lost[2] + $tag_lost[2] + $not_allowed[2] + $new_place[2];
			$alive4 = $alive[3] + $dead[3] + $lost[3] + $tag_lost[3] + $not_allowed[3] + $new_place[3];
			$alive5 = $alive[4] + $dead[4] + $lost[4] + $tag_lost[4] + $not_allowed[4] + $new_place[4];
			$alive6 = $alive[5] + $dead[5] + $lost[5] + $tag_lost[5] + $not_allowed[5] + $new_place[5];
			$alive7 = $alive[6] + $dead[6] + $lost[6] + $tag_lost[6] + $not_allowed[6] + $new_place[6];
			$alive8 = $alive[7] + $dead[7] + $lost[7] + $tag_lost[7] + $not_allowed[7] + $new_place[7];
			$alive9 = $alive[8] + $dead[8] + $lost[8] + $tag_lost[8] + $not_allowed[8] + $new_place[8];
			$alive10 = $alive[9] + $dead[9] + $lost[9] + $tag_lost[9] + $not_allowed[9] + $new_place[9];
			$alive11 = $alive[10] + $dead[10] + $lost[10] + $tag_lost[10] + $not_allowed[10] + $new_place[10];
			$alive12 = $alive[11] + $dead[11] + $lost[11] + $tag_lost[11] + $not_allowed[11] + $new_place[11];
			$alive13 = array_sum($alive) + array_sum($dead) + array_sum($lost) + array_sum($tag_lost) + array_sum($not_allowed) + array_sum($new_place);

			$file="statistik.xls";
			$test="<div class=\"block full bordered\">
					<div class=\"block-title\">
						<h2><strong>Permohonan</strong></h2>
					</div>
					<div class=\"form-horizontal form-bordered\">
		            	<div class=\"row\">
							<div class=\"col-sm-12\">
		                        <div class=\"form-group\">
		                            <table border=\"1\" class=\"table table-bordered table-vcenter\">
		                            	<thead>
		                            		<tr class=\"warning text-center\">
		                            			<td><strong>Status Permohonan</strong></td>
		                            			<td><strong>Jan</strong></td>
		                            			<td><strong>Feb</strong></td>
		                            			<td><strong>Mac</strong></td>
		                            			<td><strong>Apr</strong></td>
		                            			<td><strong>Mei</strong></td>
		                            			<td><strong>Jun</strong></td>
		                            			<td><strong>Jul</strong></td>
		                            			<td><strong>Ogs</strong></td>
		                            			<td><strong>Sep</strong></td>
		                            			<td><strong>Okt</strong></td>
		                            			<td><strong>Nov</strong></td>
		                            			<td><strong>Dis</strong></td>
		                            			<td><strong>JUMLAH</strong></td>
		                            		</tr>
		                            	</thead>
		                            	<tbody>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Lulus</td>
		                            			<td>".number_format($lulus[0])."</td>
		                            			<td>".number_format($lulus[1])."</td>
		                            			<td>".number_format($lulus[2])."</td>
		                            			<td>".number_format($lulus[3])."</td>
		                            			<td>".number_format($lulus[4])."</td>
		                            			<td>".number_format($lulus[5])."</td>
		                            			<td>".number_format($lulus[6])."</td>
		                            			<td>".number_format($lulus[7])."</td>
		                            			<td>".number_format($lulus[8])."</td>
		                            			<td>".number_format($lulus[9])."</td>
		                            			<td>".number_format($lulus[10])."</td>
		                            			<td>".number_format($lulus[11])."</td>
		                            			<td>".number_format(array_sum($lulus))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Ditolak</td>
		                            			<td>".number_format($tolak[0])."</td>
		                            			<td>".number_format($tolak[1])."</td>
		                            			<td>".number_format($tolak[2])."</td>
		                            			<td>".number_format($tolak[3])."</td>
		                            			<td>".number_format($tolak[4])."</td>
		                            			<td>".number_format($tolak[5])."</td>
		                            			<td>".number_format($tolak[6])."</td>
		                            			<td>".number_format($tolak[7])."</td>
		                            			<td>".number_format($tolak[8])."</td>
		                            			<td>".number_format($tolak[9])."</td>
		                            			<td>".number_format($tolak[10])."</td>
		                            			<td>".number_format($tolak[11])."</td>
		                            			<td>".number_format(array_sum($tolak))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Diterima</td>
		                            			<td>".number_format($terima[0])."</td>
		                            			<td>".number_format($terima[1])."</td>
		                            			<td>".number_format($terima[2])."</td>
		                            			<td>".number_format($terima[3])."</td>
		                            			<td>".number_format($terima[4])."</td>
		                            			<td>".number_format($terima[5])."</td>
		                            			<td>".number_format($terima[6])."</td>
		                            			<td>".number_format($terima[7])."</td>
		                            			<td>".number_format($terima[8])."</td>
		                            			<td>".number_format($terima[9])."</td>
		                            			<td>".number_format($terima[10])."</td>
		                            			<td>".number_format($terima[11])."</td>
		                            			<td>".number_format(array_sum($terima))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Dalam Proses</td>
		                            			<td>".number_format($dalam_proses[0])."</td>
		                            			<td>".number_format($dalam_proses[1])."</td>
		                            			<td>".number_format($dalam_proses[2])."</td>
		                            			<td>".number_format($dalam_proses[3])."</td>
		                            			<td>".number_format($dalam_proses[4])."</td>
		                            			<td>".number_format($dalam_proses[5])."</td>
		                            			<td>".number_format($dalam_proses[6])."</td>
		                            			<td>".number_format($dalam_proses[7])."</td>
		                            			<td>".number_format($dalam_proses[8])."</td>
		                            			<td>".number_format($dalam_proses[9])."</td>
		                            			<td>".number_format($dalam_proses[10])."</td>
		                            			<td>".number_format($dalam_proses[11])."</td>
		                            			<td>".number_format(array_sum($dalam_proses))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Rayuan Dalam Proses</td>
		                            			<td>".number_format($dalam_proses_rayuan[0])."</td>
		                            			<td>".number_format($dalam_proses_rayuan[1])."</td>
		                            			<td>".number_format($dalam_proses_rayuan[2])."</td>
		                            			<td>".number_format($dalam_proses_rayuan[3])."</td>
		                            			<td>".number_format($dalam_proses_rayuan[4])."</td>
		                            			<td>".number_format($dalam_proses_rayuan[5])."</td>
		                            			<td>".number_format($dalam_proses_rayuan[6])."</td>
		                            			<td>".number_format($dalam_proses_rayuan[7])."</td>
		                            			<td>".number_format($dalam_proses_rayuan[8])."</td>
		                            			<td>".number_format($dalam_proses_rayuan[9])."</td>
		                            			<td>".number_format($dalam_proses_rayuan[10])."</td>
		                            			<td>".number_format($dalam_proses_rayuan[11])."</td>
		                            			<td>".number_format(array_sum($dalam_proses_rayuan))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\"><strong>JUMLAH</strong></td>
		                            			<td>".$lulus1."</td>
		                            			<td>".$lulus2."</td>
		                            			<td>".$lulus4."</td>
		                            			<td>".$lulus5."</td>
		                            			<td>".$lulus6."</td>
		                            			<td>".$lulus7."</td>
		                            			<td>".$lulus8."</td>
		                            			<td>".$lulus9."</td>
		                            			<td>".$lulus10."</td>
		                            			<td>".$lulus11."</td>
		                            			<td>".$lulus12."</td>
		                            			<td>".$lulus13."</td>
		                            			<td>".$lulus14."</td>
		                            		</tr>
		                            	</tbody>
		                            </table>
		                        </div>
		                    </div>
		                </div>
		            </div>
				</div>
				<div class=\"block full bordered\">
					<div class=\"block-title\">
						<h2><strong>Bilangan Anjing</strong></h2>
					</div>
					<div class=\"form-horizontal form-bordered\">
		            	<div class=\"row\">
							<div class=\"col-sm-12\">
		                        <div class=\"form-group\">
		                            <table border=\"1\" class=\"table table-bordered table-vcenter\">
		                            	<thead>
		                            		<tr class=\"warning text-center\">
		                            			<td><strong>Bilangan Anjing</strong></td>
		                            			<td><strong>Jan</strong></td>
		                            			<td><strong>Feb</strong></td>
		                            			<td><strong>Mac</strong></td>
		                            			<td><strong>Apr</strong></td>
		                            			<td><strong>Mei</strong></td>
		                            			<td><strong>Jun</strong></td>
		                            			<td><strong>Jul</strong></td>
		                            			<td><strong>Ogs</strong></td>
		                            			<td><strong>Sep</strong></td>
		                            			<td><strong>Okt</strong></td>
		                            			<td><strong>Nov</strong></td>
		                            			<td><strong>Dis</strong></td>
		                            			<td><strong>JUMLAH</strong></td>
		                            		</tr>
		                            	</thead>
		                            	<tbody>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Mempunyai Lencana</td>
		                            			<td>".number_format($exists[0])."</td>
		                            			<td>".number_format($exists[1])."</td>
		                            			<td>".number_format($exists[2])."</td>
		                            			<td>".number_format($exists[3])."</td>
		                            			<td>".number_format($exists[4])."</td>
		                            			<td>".number_format($exists[5])."</td>
		                            			<td>".number_format($exists[6])."</td>
		                            			<td>".number_format($exists[7])."</td>
		                            			<td>".number_format($exists[8])."</td>
		                            			<td>".number_format($exists[9])."</td>
		                            			<td>".number_format($exists[10])."</td>
		                            			<td>".number_format($exists[11])."</td>
		                            			<td>".number_format(array_sum($exists))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Tiada Lencana</td>
		                            			<td>".number_format($not_exists[0])."</td>
		                            			<td>".number_format($not_exists[1])."</td>
		                            			<td>".number_format($not_exists[2])."</td>
		                            			<td>".number_format($not_exists[3])."</td>
		                            			<td>".number_format($not_exists[4])."</td>
		                            			<td>".number_format($not_exists[5])."</td>
		                            			<td>".number_format($not_exists[6])."</td>
		                            			<td>".number_format($not_exists[7])."</td>
		                            			<td>".number_format($not_exists[8])."</td>
		                            			<td>".number_format($not_exists[9])."</td>
		                            			<td>".number_format($not_exists[10])."</td>
		                            			<td>".number_format($not_exists[11])."</td>
		                            			<td>".number_format(array_sum($not_exists))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\"><strong>JUMLAH</strong></td>
		                            			<td>".$exists1."</td>
		                            			<td>".$exists2."</td>
		                            			<td>".$exists3."</td>
		                            			<td>".$exists4."</td>
		                            			<td>".$exists5."</td>
		                            			<td>".$exists6."</td>
		                            			<td>".$exists7."</td>
		                            			<td>".$exists8."</td>
		                            			<td>".$exists9."</td>
		                            			<td>".$exists10."</td>
		                            			<td>".$exists11."</td>
		                            			<td>".$exists12."</td>
		                            			<td>".$exists13."</td>
		                            		</tr>
		                            	</tbody>
		                            </table>
		                        </div>
		                    </div>
		                </div>
		            </div>
				</div>
				<div class=\"block full bordered\">
					<div class=\"block-title\">
						<h2><strong>Status Anjing</strong></h2>
					</div>
					<div class=\"form-horizontal form-bordered\">
		            	<div class=\"row\">
							<div class=\"col-sm-12\">
		                        <div class=\"form-group\">
		                            <table border=\"1\" class=\"table table-bordered table-vcenter\">
		                            	<thead>
		                            		<tr class=\"warning text-center\">
		                            			<td><strong>Status Anjing</strong></td>
		                            			<td><strong>Jan</strong></td>
		                            			<td><strong>Feb</strong></td>
		                            			<td><strong>Mac</strong></td>
		                            			<td><strong>Apr</strong></td>
		                            			<td><strong>Mei</strong></td>
		                            			<td><strong>Jun</strong></td>
		                            			<td><strong>Jul</strong></td>
		                            			<td><strong>Ogs</strong></td>
		                            			<td><strong>Sep</strong></td>
		                            			<td><strong>Okt</strong></td>
		                            			<td><strong>Nov</strong></td>
		                            			<td><strong>Dis</strong></td>
		                            			<td><strong>JUMLAH</strong></td>
		                            		</tr>
		                            	</thead>
		                            	<tbody>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Masih Hidup</td>
		                            			<td>".number_format($alive[0])."</td>
		                            			<td>".number_format($alive[1])."</td>
		                            			<td>".number_format($alive[2])."</td>
		                            			<td>".number_format($alive[3])."</td>
		                            			<td>".number_format($alive[4])."</td>
		                            			<td>".number_format($alive[5])."</td>
		                            			<td>".number_format($alive[6])."</td>
		                            			<td>".number_format($alive[7])."</td>
		                            			<td>".number_format($alive[8])."</td>
		                            			<td>".number_format($alive[9])."</td>
		                            			<td>".number_format($alive[10])."</td>
		                            			<td>".number_format($alive[11])."</td>
		                            			<td>".number_format(array_sum($alive))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Mati</td>
		                            			<td>".number_format($dead[0])."</td>
		                            			<td>".number_format($dead[1])."</td>
		                            			<td>".number_format($dead[2])."</td>
		                            			<td>".number_format($dead[3])."</td>
		                            			<td>".number_format($dead[4])."</td>
		                            			<td>".number_format($dead[5])."</td>
		                            			<td>".number_format($dead[6])."</td>
		                            			<td>".number_format($dead[7])."</td>
		                            			<td>".number_format($dead[8])."</td>
		                            			<td>".number_format($dead[9])."</td>
		                            			<td>".number_format($dead[10])."</td>
		                            			<td>".number_format($dead[11])."</td>
		                            			<td>".number_format(array_sum($dead))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Hilang</td>
		                            			<td>".number_format($lost[0])."</td>
		                            			<td>".number_format($lost[1])."</td>
		                            			<td>".number_format($lost[2])."</td>
		                            			<td>".number_format($lost[3])."</td>
		                            			<td>".number_format($lost[4])."</td>
		                            			<td>".number_format($lost[5])."</td>
		                            			<td>".number_format($lost[6])."</td>
		                            			<td>".number_format($lost[7])."</td>
		                            			<td>".number_format($lost[8])."</td>
		                            			<td>".number_format($lost[9])."</td>
		                            			<td>".number_format($lost[10])."</td>
		                            			<td>".number_format($lost[11])."</td>
		                            			<td>".number_format(array_sum($lost))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">No Lencana Hilang</td>
		                            			<td>".number_format($tag_lost[0])."</td>
		                            			<td>".number_format($tag_lost[1])."</td>
		                            			<td>".number_format($tag_lost[2])."</td>
		                            			<td>".number_format($tag_lost[3])."</td>
		                            			<td>".number_format($tag_lost[4])."</td>
		                            			<td>".number_format($tag_lost[5])."</td>
		                            			<td>".number_format($tag_lost[6])."</td>
		                            			<td>".number_format($tag_lost[7])."</td>
		                            			<td>".number_format($tag_lost[8])."</td>
		                            			<td>".number_format($tag_lost[9])."</td>
		                            			<td>".number_format($tag_lost[10])."</td>
		                            			<td>".number_format($tag_lost[11])."</td>
		                            			<td>".number_format(array_sum($tag_lost))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Anjing Tidak Dibenarkan</td>
		                            			<td>".number_format($not_allowed[0])."</td>
		                            			<td>".number_format($not_allowed[1])."</td>
		                            			<td>".number_format($not_allowed[2])."</td>
		                            			<td>".number_format($not_allowed[3])."</td>
		                            			<td>".number_format($not_allowed[4])."</td>
		                            			<td>".number_format($not_allowed[5])."</td>
		                            			<td>".number_format($not_allowed[6])."</td>
		                            			<td>".number_format($not_allowed[7])."</td>
		                            			<td>".number_format($not_allowed[8])."</td>
		                            			<td>".number_format($not_allowed[9])."</td>
		                            			<td>".number_format($not_allowed[10])."</td>
		                            			<td>".number_format($not_allowed[11])."</td>
		                            			<td>".number_format(array_sum($not_allowed))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\">Berpindah Ke Tempat Baru</td>
		                            			<td>".number_format($new_place[0])."</td>
		                            			<td>".number_format($new_place[1])."</td>
		                            			<td>".number_format($new_place[2])."</td>
		                            			<td>".number_format($new_place[3])."</td>
		                            			<td>".number_format($new_place[4])."</td>
		                            			<td>".number_format($new_place[5])."</td>
		                            			<td>".number_format($new_place[6])."</td>
		                            			<td>".number_format($new_place[7])."</td>
		                            			<td>".number_format($new_place[8])."</td>
		                            			<td>".number_format($new_place[9])."</td>
		                            			<td>".number_format($new_place[10])."</td>
		                            			<td>".number_format($new_place[11])."</td>
		                            			<td>".number_format(array_sum($new_place))."</td>
		                            		</tr>
		                            		<tr class=\"text-center\">
		                            			<td class=\"text-left\"><strong>JUMLAH</strong></td>
		                            			<td>".$alive1."</td>
		                            			<td>".$alive2."</td>
		                            			<td>".$alive3."</td>
		                            			<td>".$alive4."</td>
		                            			<td>".$alive5."</td>
		                            			<td>".$alive6."</td>
		                            			<td>".$alive7."</td>
		                            			<td>".$alive8."</td>
		                            			<td>".$alive9."</td>
		                            			<td>".$alive10."</td>
		                            			<td>".$alive11."</td>
		                            			<td>".$alive12."</td>
		                            			<td>".$alive13."</td>
		                            		</tr>
		                            	</tbody>
		                            </table>
		                        </div>
		                    </div>
		                </div>
		            </div>
				</div>";

			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=$file");
			echo $test;

		}

		public function prints()
		{
			 echo link_tag("css/bootstrap.min.css");   		
			 echo link_tag("css/bootstrap-theme.min.css");   		
			 echo link_tag("css/ui-lightness/jquery-ui-1.10.4.custom.css");   		
			 echo link_tag("css/box.css");			

			 echo script_tag("js/jquery-2.1.1.min.js");   		
			 echo script_tag("js/bootstrap.min.js");   		
			 echo script_tag("js/jquery-1.10.2.js");   		
			 echo script_tag("js/jquery-ui-1.10.4.custom.js");

			 $data = $this->report_model->get_count_all();
			 $get_all = $data->result();
			 
			echo "<table class=\"table table-vcenter table-striped table-condensed table-bordered\">
                    <thead>
                        <tr class=\"warning\">
                            <td class=\"text-center\"><strong>Bil.</strong></td>
                            <td class=\"text-center\"><strong>No. Permohonan</strong></td>
                            <td class=\"text-center\"><strong>Tarikh</strong></td>
                            <td><strong>Nama Pemohon</strong></td>
                            <td class=\"text-center\"><strong>Status</strong></td>
                            <td class=\"text-center\"><strong>Jenis Rumah</strong></td>
                            <td class=\"text-center\"><strong>Parlimen</strong></td>
                            <td class=\"text-center\"><strong>Jenis Anjing</strong></td>
                            <td class=\"text-center\"><strong>No Lencana</strong></td>
                        </tr>
                    </thead>
                    <tbody>";

                        $no = 1;
                        $lulus = 0;
                        $tolak = 0;
                        $terima = 0;
                        $dalam_proses = 0;
                        $rayuan_proses = 0;
                        
                        foreach($get_all as $row)
                        {
                            $home_type = get_home_type($row->home_type);
                            $dog_detail = get_dog_detail($row->app_id);
                            
                            $view_dog = null;
                            $view_lic = null;
                            $old_lic = null;
                            
                            foreach($dog_detail as $rows)
                            {
                                    $view_dog .= get_dog_name($rows->dog_type);
                                    if(count($dog_detail) >= 2)
                                        $view_dog .= "<br>";
                                        
                                    $dog_license = get_dog_license($rows->dog_id);
                                    foreach($dog_license as $rowss)
                                    {
                                        if( $old_lic != $rowss->license_no)
                                        {
                                            //DOG FIRST
                                            if(strlen($rowss->license_no) == 1)
                                                $view_lic .= '0000'.$rowss->license_no;
                                            elseif(strlen($rowss->license_no) == 2)
                                                $view_lic .= '000'.$rowss->license_no;
                                            elseif(strlen($rowss->license_no) == 3)
                                                $view_lic .= '00'.$rowss->license_no;
                                            elseif(strlen($rowss->license_no) == 4)
                                                $view_lic .= '0'.$rowss->license_no;
                                            elseif(strlen($rowss->license_no) == 5)
                                                $view_lic .= $rowss->license_no;

                                            //$view_lic .= $rowss->license_no;
                                            if(count($dog_detail) >= 2)
                                                $view_lic .= "<br>";
                                        }
                                            
                                            $old_lic = $rowss->license_no;
                                    }
                            }
                            
                                echo "<tr>
                                        <td class=\"text-center\" width=\"3px\">".$no."</td>
                                        <td class=\"col-lg-1 text-center\"><strong>".$row->app_no."</strong></td>
                                        <td class=\"col-lg-2 text-center\">".date('d/m/Y h:i A', strtotime($row->date_apply))."</td>
                                        <td class=\"col-lg-2\">".$row->name."</td>";
                                        if( $row->appStatus == "Ditolak" )
                                            echo "<td class=\"text-center\">".$row->appStatus."</td>";
                                        elseif($row->appStatus == "Dalam proses" && $row->appeal == 1)
                                            echo "<td class=\"text-center\">Rayuan Dalam Proses</td>";
                                        else
                                            echo "<td class=\"text-center\">".$row->appStatus."</td>";
                                    echo "<td class=\"text-center\">".$home_type[0]->name."</td>
                                        <td class=\"text-center\">".get_parlimen_name($row->parlimen)."</td>
                                        <td>".$view_dog."</td>
                                        <td class=\"text-center\">".$view_lic."</td>
                                    </tr>"; 
                            $no++;
                            
                            
                        }

                        foreach($all as $rw)
                        {
                            if($rw->appStatus == "Lulus")
                                $lulus = $lulus + 1;
                            elseif($rw->appStatus == "Ditolak")
                                $tolak = $tolak + 1;
                            elseif($rw->appStatus == "Diterima")
                                $terima = $terima + 1;
                            elseif($rw->appStatus == "Dalam Proses" && $rw->appeal == 0)
                                $dalam_proses = $dalam_proses + 1;
                            elseif($rw->appStatus == "Dalam proses" && $rw->appeal == 1)
                                $rayuan_proses = $rayuan_proses + 1;
                        }
                                                              
                echo "</tbody>
              </table>";

              echo "<script>window.print();</script>";
		}
}
