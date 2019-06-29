<?php

$data = file_get_contents('https://1960410939461.json?fields=images,title');


$shop = json_decode($data, true);

 $shop['product'][title];




 $shop['product']['images'][0][src];

?>