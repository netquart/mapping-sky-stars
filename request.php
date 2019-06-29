<?php 

$url = "https://maps.googleapis.com/maps/api/geocode/json?address=Islamabad&key=AIzaSyBY6JCet-vhWNGTVkDDghFZ1nDIDiw_Umo";

$result = file_get_contents($url);

$vars = json_decode($result,true);    

var_dump($vars);
?>