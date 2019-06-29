<?php

   error_reporting('E_ERROR');
   
   session_start();
   
   $link = mysqli_connect("localhost", "user", "pass", "db");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
   
   
   
    /// first check product title already exist
	
	 //$res = mysqli_query($link,"select  prd_title from products where  prd_title='".$_POST['poster_title']."'");
	
	
	
	/*if(mysqli_num_rows($res)>0)
	
	echo 'tile already exists';
	
	else
	
	{*/
	
	define('UPLOAD_DIR', 'created/');
	$img = $_POST['imgData'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	
	$un_id = uniqid();
	
	$file = UPLOAD_DIR . $un_id . '.png';
	$success = file_put_contents($file, $data);
	
	
	$im = imagecreatefrompng($file);
	$cropped = imagecropauto($im, IMG_CROP_DEFAULT);
	
	if ($cropped !== false) { // in case a new image resource was returned
		imagedestroy($im);    // we destroy the original image
		$im = $cropped;       // and assign the cropped image to $im
	}
	
	imagepng($im, $file);
	imagedestroy($im);
	
	
	
	
	
	// create PDF file from image
	
	
	require_once('tcpdf_include.php');
	
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// set document information
	$pdf->SetCreator('Night Sky Map');
	
	$pdf->SetAuthor($_POST['emailid']);
	
	$pdf->SetTitle($_POST['poster_title']);
	
	$pdf->SetSubject($_POST['poster_title']);
	
	$pdf->SetKeywords($_POST['message']);	
	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, '20', $_POST['poster_title'], $_POST['txtarea']);
	
	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	
	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	
	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	
	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	
	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	
	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		require_once(dirname(__FILE__).'/lang/eng.php');
		$pdf->setLanguageArray($l);
	}
	
	// -------------------------------------------------------------------
	
	// add a page
	$pdf->AddPage();
	
	// set JPEG quality
	$pdf->setJPEGQuality(75);
	
	
	
	$pdf->Text(15, 30, 'Location : '.$_POST['txtarea']);

	$pdf->Text(15, 37, 'Time of Special Moment: '.$_POST['datetime']);
	
	$pdf->Text(15, 44, 'Message Title: '.$_POST['poster_title']);
	
	$pdf->Text(15, 51, 'Message Details: '.$_POST['message']);
	
	$pdf->Text(15, 58, 'Time of Special Moment: '.$_POST['messager']);
	
	$pdf->Text(15, 65, 'Document Type: '.$_POST['price']);
	

//////////////////////////////
	
	if($_POST['price2']=='12-18')
{
$p_type = '12x18 Poster in  | (60 x 90 cm)';

$priceset  = '55';
}

elseif($_POST['price2']=='12-18F')
{
$p_type = '12x18 Poster w/ Frame in  | (60 x 90 cm)';
$priceset  = '110';
}


elseif($_POST['price2']=='18-24')
{
$p_type = '18x24 Poster in  | (60 x 90 cm)';
$priceset  = '70';
}


elseif($_POST['price2']=='18-24F')
{
$p_type = '18x24 Poster w/ Frame  | (60 x 90 cm)';
$priceset  = '140';
}


elseif($_POST['price2']=='24-36')
{
$p_type = '24x36 Poster in  | (60 x 90 cm)';
$priceset  = '80';
}


elseif($_POST['price2']=='24-36F')
{
$p_type = '24x36 Poster w/ Frame  | (60 x 90 cm)';
$priceset  = '180';
}	
	
///////////////////////////////////////////////////////////////////////////////////////////////	
	
	$pdf->Text(15, 72, 'Price: $'.$priceset);
	
	
	if($_POST['purchase_pdf']=='yes')
	{
	
	$pdf->Text(15, 79, 'PDF Price: $30');
	
	$priceset = $priceset + 30;
	
	}
	
	$pdf->Text(15, 89, 'Email ID: '.str_replace('#','@',$_POST['emailid']));
	
	
	
	
	$pdf->Text(15, 96, 'Latitude/Longitude: '.$_POST['lat'].'/'.$_POST['long']);
	
	
	// add a page
	$pdf->AddPage();
	
	// set JPEG quality
	$pdf->setJPEGQuality(75);
	
	
	// Image example with resizing
	$pdf->Image($file, 15, 30, 160, 200, 'PNG', 'http://domain.com', '', true, 200, '', false, false, 1, false, false, false);

	$pdf_name = $un_id.'.pdf';
	
	$pdf->Output(dirname(__FILE__).'/created/'.$un_id.'.pdf', 'F');

	
	
	
	
	//////////////////////// save to db ///////////////////////////////////////////////////////////////////////////
	
	
	mysqli_query($link,"insert into products set img_name='".$file."' ,prd_title='".addslashes($_POST['poster_title'])."',prd_details='".addslashes($_POST['message'])."',location='".addslashes($_POST['txtarea'])."',lat_long='".addslashes($_POST['lat']."/".$_POST['long'])."',spec_time='".addslashes($_POST['datetime'])."',time_spec_moment='".addslashes($_POST['messager'])."',poster_size='".addslashes($p_type)."',poster_price='".addslashes($priceset)."',email_id='".addslashes(str_replace('#','@',$_POST['emailid']))."',pdf_name='".addslashes($pdf_name)."' ");
	
	$_SESSION['product_id'] = mysqli_insert_id($link);
	
	//////////////////////// end /////////////////////////////////////////////////////////////////////////////////
	
	
	
	print $success ? $file : 'Unable to save the file.';
	
	//}

mysqli_close($link);

?>