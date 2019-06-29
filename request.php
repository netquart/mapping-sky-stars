<?php 

$url = "https://maps.googleapis.com/maps/api/geocode/json?address=Islamabad&key=apikey";

$result = file_get_contents($url);

$vars = json_decode($result,true);    

var_dump($vars);
?>
