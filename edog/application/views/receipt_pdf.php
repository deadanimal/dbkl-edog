<?php 
session_start();
require_once(APPPATH.'helpers/tcpdf/config/tcpdf_config.php');
require_once(APPPATH.'helpers/tcpdf/tcpdf.php');

$total = get_total_dog($info[0]->app_id);

if(count($total) == 1)
	$amount = 10;
else
	$amount = 20;
	

class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		//$image_file = K_PATH_IMAGES.'logo_example.jpg';
//		$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 8);
		// Title
		//$this->Cell(0, 15, 'Notification (2nd Schedule)', 0, false, 'R', 0, '', 0, false, 'T', 'M');
		//$this->Cell(0, 18, '__________________________________________________________________________________________________________________', 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', '', 8);
		// Page number
		//$this->Cell(0, 10, 'This is computer generated document. No signature is required.', 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, ''.$this->getAliasNumPage().' / '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle($info[0]->app_no);
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
//$pdf->setLanguageArray($l);


$pdf->SetFont('courier', '0', 10);
$pdf->AddPage();

// Box 1
$pdf->Text(6, 10, $this->session->userdata('name'));
$addr .= strtoupper($info[0]->no_unit);
if($info[0]->home_name)
	$addr .= ", ".strtoupper($info[0]->home_name);
if($info[0]->street_name)
	$addr .= "\n".strtoupper($info[0]->street_name);
if($info[0]->town_name)
	$addr .= "\n".strtoupper($info[0]->town_name);
$addr .= "\n".strtoupper(get_parlimen_name($info[0]->parlimen))." ".$info[0]->postcode." KUALA LUMPUR\n";

$pdf->MultiCell(80, 5, $addr, 0, 'J', 0, 0, 6 ,15, true);
//$pdf->Text(6, 15, $row['alamat_organisasi']);
//$pdf->Text(6, 20, 'CHERAS');
//$pdf->Text(6, 25, 'KUALA LUMPUR');
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(5, 5, 90, 30, 3.50, '1111', null);

// Box 2
//$pdf->Text(132, 10, 'BBBH34SITI');
$pdf->Text(162, 9, $info[0]->app_no);
//$pdf->Text(154, 10, '_______________________');
$pdf->SetFont('times', '0', 10);
$pdf->Text(165, 15, 'Jika ada pertanyaan');
$pdf->Text(167, 20, 'sebutkan rujukan ');
$pdf->Text(174, 25, 'di atas.');
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(155, 5, 50, 30, 3.50, '1111', null);


$pdf->Image('img/logo_dbkl_sm.png', '30', '40', 20, 25, '', '', 'T', false, 200, '', false, false, 0, false, false, false);
$pdf->Ln();
$pdf->SetFont('times', 'B', 10);
$pdf->Text(55, 40, 'Bayaran Kepada Dewan Bandaraya Kuala Lumpur');
$pdf->Text(55, 45, 'Boleh dibayar di');
$pdf->Text(70, 50, 'PEJABAT BENDAHARI BANDARAYA');
$pdf->Text(70, 54, 'DEWAN BANDARAYA KUALA LUMPUR, JALAN RAJA LAUT');
$pdf->Text(70, 58, '50350 KUALA LUMPUR, PETI SURAT 11022');
$pdf->SetFont('courier', '0', 10);
//$pdf->Text(150, 40, 'Kod Hasil : Pelbagai');

// Box 3
$pdf->Text(5, 80, '______________________________________________________________________________________________');
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(5, 70, 200, 60, 3.50, '1111', null);

$pdf->SetFont('times', 'B', 10);
$pdf->Text(18, 74, 'TARIKH');
$pdf->Text(90, 74, 'JENIS BAYARAN');
$pdf->Text(175, 72, 'JUMLAH');
$pdf->Text(166, 78, 'RM');
$pdf->Text(190, 78, 'SEN');

$pdf->SetFont('courier', '0', 10);
$pdf->Text(15, 90, date('d/m/Y', strtotime($info[0]->date_apply)));
$pdf->MultiCell(80, 5, '2618 - LESEN ANJING'."\n", 0, 'J', 0, 0, 55 ,90, true);

if(count($total) == 1)
$pdf->MultiCell(80, 5, 'NO. LENCANA : '."\n", 0, 'J', 0, 0, 55 ,100, true);
else
$pdf->MultiCell(80, 5, 'NO. LENCANA : '."\nNO. LENCANA : \n", 0, 'J', 0, 0, 55 ,100, true);
$pdf->Text(170, 90,  $amount);
$pdf->Text(190, 90,  '00');

$pdf->Rotate(0, 70, 110);
$pdf->Rect(50, 70, 0, 60, 'D');

$pdf->Rotate(0, 70, 110);
$pdf->Rect(155, 70, 0, 60, 'D');

$pdf->Rotate(0, 70, 110);
$pdf->Rect(185, 79, 0, 51, 'D');


// Box 4
$pdf->SetFont('courier', 'B', 10);
$pdf->Text(157, 135, 'RM');
$pdf->SetFont('courier', 'B', 10);
$pdf->Text(185, 135,  number_format($amount,2,'.',','));
$pdf->SetFont('times', 'B', 10);
$pdf->Text(74, 131, 'KENYATAAN');
$pdf->SetFont('times', '0', 10);
$pdf->Text(30, 135, 'Bayaran hanya boleh dibuat dengan Wang TUNAI Sahaja');
$pdf->Text(30, 139, 'di mana-mana Pejabat Cawangan DBKL atau');
$pdf->Text(30, 143, 'di Unit Kawalan Pest, DBKL, Lot 24, Jalan Loke Yew, Cheras, 56100 Kuala Lumpur.');
//$pdf->Text(60, 147, '');
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(155, 132, 50, 10, 1, '1111', null);

$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);



// Box 5
$pdf->SetFont('times', 'B', 6);
//$pdf->Text(113, 154, '** DITERIMA JUMLAH YANG DINYATAKAN DENGAN ANGKA BERCETAK **');
$pdf->SetFont('courier', '0', 10);

//$pdf->Cell(0, 0, 'CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9', 0, 1);
$pdf->write1DBarcode('2618'.str_replace("-","",$info[0]->app_no).'000000'.$amount.'00', 'C39E', 7, 150, 120, 18, 0.4, $style, 'N'); // code, xxx, left, top, width, height
//$pdf->write1DBarcode('CODE 39 E', 'C39E', '', '', '', 18, 0.4, $style, 'N');
$pdf->Text(5, 173, '----------------------------------------------------------------------------------------------');
//$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
//$pdf->RoundedRect(105, 153, 100, 40, 3.50, '1111', null);

// $pdf->write1DBarcode('2618'.str_replace("-","",$info[0]->app_no).'000000'.$amount.'00', 'C39E', 7, 195, 120, 18, 0.4, $style, 'N'); // code, xxx, left, top, width, height
// Box 5
// $pdf->SetFont('courier', '0', 10);
// $pdf->Text(170, 203, $info[0]->app_no);
// $pdf->Text(10, 272, 'Nama');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->Text(23, 272, ':');
// $pdf->SetFont('courier', '0', 10);
// $pdf->Text(30, 270,  $this->session->userdata('name'));
// $pdf->Text(28, 272, '............................................');
// $pdf->Text(30, 276, strtoupper($info[0]->no_unit).", ".strtoupper($info[0]->home_name).", \n".strtoupper($info[0]->street_name)."\n");
// $pdf->Text(30, 280, strtoupper($info[0]->town_name).", \n".strtoupper(get_parlimen_name($info[0]->parlimen))." ".$info[0]->postcode."\n");

$pdf->SetFont('courier', '0', 10);
$pdf->Text(170, 203, $info[0]->app_no);
$pdf->Text(10, 195, 'Nama');
$pdf->SetFont('courier', 'B', 10);
$pdf->Text(23, 195, ':');
$pdf->SetFont('courier', '0', 10);
$pdf->Text(30, 193,  $this->session->userdata('name'));
$pdf->Text(28, 195, '............................................');
$addr2 .= strtoupper($info[0]->no_unit);
if($info[0]->home_name)
	$addr2 .= ", ".strtoupper($info[0]->home_name);
if($info[0]->street_name)
	$addr2 .= ", ".strtoupper($info[0]->street_name)."\n";
$pdf->Text(30, 199, $addr2);
$pdf->Text(30, 203, strtoupper($info[0]->town_name).", \n".strtoupper(get_parlimen_name($info[0]->parlimen))." ".$info[0]->postcode."\nKUALA LUMPUR");

$pdf->write1DBarcode('2618'.str_replace("-","",$info[0]->app_no).'000000'.$amount.'00', 'C39E', 7, 272, 120, 18, 0.4, $style, 'N'); // code, xxx, left, top, width, height

$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(165, 200, 40, 10, 1, '1111', null);

// Box 6
$pdf->SetFont('courier', '0', 10);
//$pdf->Text(10, 267, 'PX-D007 PELBAGAI PENDAPATAN');
$pdf->SetFont('courier', 'B', 10);
$pdf->Text(160, 273, 'RM');
$pdf->SetFont('courier', '0', 10);
$pdf->Text(185, 273, number_format($amount,2,'.',','));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(5, 217, 147, 50, 3.50, '1111', null);
$pdf->RoundedRect(154, 217, 51, 50, 3.50, '1111', null);
$pdf->RoundedRect(155, 270, 50, 10, 1, '1111', null);

$pdf->SetFont('courier', '0', 10);
$pdf->Text(15, 220, date('d/m/Y', strtotime($info[0]->date_apply)));
$pdf->MultiCell(80, 5, '2618 - LESEN ANJING'."\n", 0, 'J', 0, 0, 55 ,220, true);
if(count($total) == 1)
$pdf->MultiCell(80, 5, 'NO. LENCANA : '."\n", 0, 'J', 0, 0, 55 ,230, true);
else
$pdf->MultiCell(80, 5, 'NO. LENCANA : '."\nNO. LENCANA : \n", 0, 'J', 0, 0, 55 ,230, true);
$pdf->Text(170, 220, $amount);
$pdf->Text(190, 220, '00');

$pdf->Rotate(0, 70, 110);
$pdf->Rect(50, 217, 0, 50, 'D');

$pdf->Rotate(0, 70, 110);
$pdf->Rect(185, 217, 0, 50, 'D');

// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output('BAYARAN_'.$info[0]->app_no.'.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
