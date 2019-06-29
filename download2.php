<?php

    $encryptedName 	= $_GET['fileName'];
    $fileName 	= trim(base64_decode($encryptedName));
   
   
    header('Content-Type: application/pdf');
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    set_time_limit(0);
    $filePath 	= $fileName;
    $file 		= @fopen($filePath, "rb");
    while(!feof($file)) {
        print(@fread($file, 1024*8));
        ob_flush();
        flush();
    }





?>