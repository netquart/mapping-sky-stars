<?php


if(isset($_POST['submit_amazon']))

{


$url = 'products.json';

//create a new cURL resource
$ch = curl_init($url);

if($_POST['posters']=='12-18')
{
$p_type = '12x18 Poster in  | (60 x 90 cm)';

$priceset  = '55';
}

elseif($_POST['posters']=='12-18F')
{
$p_type = '12x18 Poster w/ Frame in  | (60 x 90 cm)';
$priceset  = '110';
}


elseif($_POST['posters']=='18-24')
{
$p_type = '18x24 Poster in  | (60 x 90 cm)';
$priceset  = '70';
}


elseif($_POST['posters']=='18-24F')
{
$p_type = '18x24 Poster w/ Frame  | (60 x 90 cm)';
$priceset  = '140';
}


elseif($_POST['posters']=='24-36')
{
$p_type = '24x36 Poster in  | (60 x 90 cm)';
$priceset  = '80';
}


elseif($_POST['posters']=='24-36F')
{
$p_type = '24x36 Poster w/ Frame  | (60 x 90 cm)';
$priceset  = '180';
}


$purchase_pdf='';

if($_POST['purchase_pdf']=='yes')

{
$priceset  = $priceset+30;

$purchase_pdf = 'PDF Price $30 included along product price';
}

//setup request to send json via POST
/*$data = array(
    'title' => $_POST['poster_title'],
    'body_html' => '<strong>'.$_POST['details'].'</strong>',
	
	'vendor' => 'Night Sky Maps',
    'product_type' => $p_type,
	
	'variants'=> array('presentment_prices'=> array('price'=>array('currency_code'=>'USD','amount'=>$priceset))),
	
	'images' => array('src'=>''.$_POST['filename']),
	
	'published'=> true
	
);*/
/*echo '<pre>';
print_r($data);
echo '</pre>';*/
//$payload = json_encode(array("product" => $data));


$details = '<b>Your Other Details:</b><br /><br /><b>Your Location(Lat/Long:('.$_POST['lat'].'/'.$_POST['long'].')):</b><br />'.$_POST['txtarea'].'<b><br />Time of Special Moment:</b>'.$_POST['datetime'].'<br /><b>Detail Message:</b>'.$_POST['message'].'<b><br>Special Moment info:</b>'.$_POST['messager'].$purchase_pdf;


 $payload = '{"product": {"title": "'.$_POST['poster_title'].'","body_html": "<strong>'.$details.'</strong><br /><b>Email ID:</b>'.$_POST['email'].'","price": "'.$priceset.'.00","vendor": "Night Sky Maps","product_type": "'.$p_type.'","images":[{"src":"'.$_POST['filename'].'"}], "variants": [{"price": "'.$priceset.'.00","sku": "'.rand(99999,9999999).'"}]}}';


//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$result = curl_exec($ch);

//close cURL resource
curl_close($ch);

//$ret = json_decode($result, true);

//ksort($ret);

//echo '<pre>';

//var_dump($ret);

echo '<script>location.href=\''.str_replace(' ','-',$_POST['poster_title']).'\';</script>';

//header('Location',''.str_replace(' ','-',$_POST['poster_title']));

//var_dump($result);


}


?>