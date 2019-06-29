<?php




$url = ' https://domain.com/orders';

//create a new cURL resource
$ch = curl_init($url);





 $payload = '{"recipient": {"name": "John Doe","address1": "19749 Dearborn St","city": "Chatsworth","state_code": "CA","country_code": "US","zip":"91311"},"items": [{"variant_id": 1,"quantity": 1,"files": [{"url": "http://example.com/files/posters/poster_1.jpg"}]}]}';


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

echo '<pre>';

//var_dump($ret);


var_dump($result);





?>