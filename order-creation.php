<?php

//session_start();

 error_reporting('E_ERROR');
   
  
   
  /* $link = mysqli_connect("localhost", "user", "pass", "db");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}*/

/*define('SHOPIFY_APP_SECRET', 'secret');

function verify_webhook($data, $hmac_header)
{
  $calculated_hmac = base64_encode(hash_hmac('sha256', $data, SHOPIFY_APP_SECRET, true));
  return hash_equals($hmac_header, $calculated_hmac);
}


$hmac_header = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
$data = file_get_contents('php://input');
$verified = verify_webhook($data, $hmac_header);
error_log('Webhook verified: '.var_export($verified, true)); //check error.log to see the result
*/







/*$data = file_get_contents('php://input');
$shop = json_decode($data, true);*/

$string = file_get_contents("text3.json");
$json_a = json_decode($string, true);

echo $json_a['shipping_address'][first_name];
echo '<br />';
echo $json_a['shipping_address'][last_name];
echo '<br />';
echo $json_a['shipping_address'][address1];
echo '<br />';
echo $json_a['shipping_address'][city];
echo '<br />';
echo $json_a['shipping_address'][zip];
echo '<br />';
echo $json_a['shipping_address'][country];
echo '<br />';
echo $json_a['customer'][email];


echo '<br />';

//print_r($json_a['line_items']);

echo $json_a['line_items'][0][product_id];

echo '<br />';
echo $json_a['line_items'][0][title];


echo '<br />';
echo $json_a['line_items'][0][price];



echo $json_a['product']['images'][0][src];

echo '<br />';
echo $json_a['product'][title];


echo '<br />';
echo $json_a['line_items'][0][price];





/*mysqli_query($link,"insert into product_orders set shopify_order_id='".$shop['id']."' ,order_products='".$_SESSION['product_id']."',user_shipping_email='".$shop['customer'][email]."',user_shipping_firstname='".$shop['shipping_address'][first_name]."',user_shipping_lastname='".$shop['shipping_address'][last_name]."',user_shipping_address='".$shop['shipping_address'][address1]."',user_shipping_city='".$shop['shipping_address'][city]."',user_shipping_zip='".$shop['shipping_address'][zip]."',user_shipping_country='".$shop['shipping_address'][country]."',shopify_customer_id='".$shop['default_address'][customer_id]."',shopify_gateway='".$shop['gateway']."' , shopify_total='".$shop['total_price']."' , shopify_subtotal='".$shop['subtotal_price']."' , shopify_currency='".$shop['currency']."'  ");*/



//in $shop your array with data

//to put array in file

/*$info = file_get_contents('php://input');
$a = __DIR__ . '/text.txt';        
$file=fopen($a, "a");
fwrite($file, $info);*/

?>