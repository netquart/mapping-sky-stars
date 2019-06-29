<?php





$url = 'orders.json';

//create a new cURL resource
$ch = curl_init($url);




$payload='{"order":{"email":"netquart@gmail.com","fulfillment_status":"fulfilled","send_receipt":true,"send_fulfillment_receipt":true,"line_items":[{"variant_id": 1890587312197,"price": 74.99,"title": "Big Brown Bear Boots","quantity": 1}]}}';


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

/*echo '<script>location.href=\''.str_replace(' ','-',$_POST['poster_title']).'\';</script>';*/

//header('Location',''.str_replace(' ','-',$_POST['poster_title']));

var_dump($result);





?>