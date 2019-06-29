<?php 

$idget =  $_GET['id'];

$emailget =  $_GET['email'];


 $message = '<p><b>Hello Admin,</b></p>

<p>A new purchase request has been sent from user with email id ('.$emailget.').</p>

<p>Please confirm the payments using your shopify admin for further processing</p>


<p>Here is a link to download generated PDF file <a target="_blank" href="http://create.domain.com/created/'.$idget.'.pdf"><b>DOWNLOAD PDF FILE</b></a></p>

<p><a target="_blank" href="https://www.domain.com"><b>domain.com</b></a></p>

';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <email@gmail.com>' . "\r\n";

$res = mail('email@gmail.com','A new purchase request from user ('.$emailget.')',$message,$headers);

if($res)


header("Location: https://www.domain.com/products/download-pdf");


?>