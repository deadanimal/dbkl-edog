<?php

class Contact extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();
		}
		
		public function index()
		{
				$this->template->write_view('content','contact');
				$this->template->parse_template = TRUE;
				$this->template->render();
		}
		
		public function send_email_complaint()
		{
			 $content = null;
								
			$content .= $this->input->post('contact-name').",<br><br>";
			//$content .= "Terima Kasih kerana mendaftar lessen anjing menggunakan portal Sistem Pengurusan Lesen Anjing – DBKL. Permohonan anda akan disemak oleh pegawai kami secepat mungkin<br></br>";
			$content .= "Aduan / Cadangan dari pengguna seperti berikut:<br><br>";
			$content .= "<b>Nama</b> : ".$this->input->post('contact-name')."<br>";
			$content .= "<b>Email</b> : ".$this->input->post('contact-email')."<br>";
			$content .= "<b>Tarikh</b> : ".date('d/m/Y H:i A')."<br><br>";
			$content .= "<b>Aduan / Cadangan</b> : <br>".$this->input->post('contact-message')."<br><br>";
			
			//$content .= "E-mel ini dijana oleh komputer dan tidak perlu dibalas<br><br>";
			//$content .= "Pentadbir<br>Sistem Pengurusan Lesen Anjing - DBKL";
			
			email_engine($content, 'jkas@dbkl.gov.my', 'JKAS Support', 'Aduan / Cadangan Sistem Pengurusan Lesen Anjing','unitkawalanpest@gmail.com', $this->input->post('contact-email'), $this->input->post('contact-name'));
		}
}