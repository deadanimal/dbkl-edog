<?php

class Analytic extends CI_Controller
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

		if ($this->session->userdata('isLoggedIn')) {

			//----------  application

			 $app_count = $this->db->query("SELECT COUNT(b.hid) AS bilangan FROM address a
			 JOIN house_type b ON b.hid = a.home_type
			 JOIN application c ON c.addr_id = a.addr_id;");
			
			 $app_count = $app_count->result();

			//----------  address data

			$address_count = $this->db->query("	SELECT COUNT(a.addr_id) AS bilangan, 
				(case 
				 WHEN b.par_name IS NULL THEN 'Parlimen Tidak Didaftarkan'
				 ELSE b.par_name
				 END 
				 ) AS parlimen_name
			from address a 
			LEFT JOIN parlimen b ON a.parlimen = b.par_id
			GROUP BY b.par_id;");

			$address_count = $address_count->result();
		
			// ---------- address data

			$report_data = $this->db->query("SELECT
			SUM(CASE WHEN a.status LIKE 'Diterima' THEN 1 ELSE 0 END) AS 'Diterima',
			SUM(CASE WHEN a.status LIKE 'Ditolak' THEN 1 ELSE 0 END) AS 'Ditolak',
			SUM(CASE WHEN a.status LIKE 'Lulus' THEN 1 ELSE 0 END) AS 'Lulus',
			MONTHNAME(a.date_apply) AS month, 
			YEAR(a.date_apply) AS apply_year,
			MONTH(a.date_apply) AS apply_month
			FROM application a 
			WHERE YEAR(a.date_apply) = YEAR(CURDATE())
			GROUP BY MONTH (a.date_apply), YEAR (a.date_apply)
			ORDER BY apply_month, apply_year");

			$report_data = $report_data->result();

			// ---------- house data

			// $house_count = $this->db->query("SELECT COUNT(b.hid) AS bilangan,b.name 
			// AS jenisrumah FROM address a LEFT JOIN house_type b ON b.hid = a.home_type GROUP BY b.hid");

			$house_count = $this->db->query("SELECT COUNT(b.hid) AS bilangan,b.name AS jenisrumah
			FROM address a
			JOIN house_type b ON b.hid = a.home_type
			JOIN application c ON c.addr_id = a.addr_id
			GROUP BY b.hid;");

            $house_count = $house_count->result();

			// ---------- end get report data
			$data['address_count'] = $address_count;
			$data['report_data'] = $report_data;
			$data['house_count'] = $house_count;
			$data['app_count'] = $app_count;
		
			//$data['type_report'] = $this->input->cookie('date-type');

			$this->template->write_view('content', 'analytic', $data, TRUE);
			$this->template->parse_template = TRUE;
			$this->template->render();
		} else {
			redirect(base_url());
		}
	}
}
