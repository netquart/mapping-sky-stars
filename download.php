<?php


    //Create URL like this
   
    $fileName 		= "5be82d6449530.pdf";
  
    $newFileName 		= $fileName;
    $encryptedFileName 	= trim(base64_encode($newFileName));
    /**
    * Use this encrypted file name as a part of the URL
    * e.g. http://www.mysite.com/download.php?fileName=$encryptedFileName
    */
     
    // When you receive request on your page download.php, decrypt the file name to get the actual filename.
     
   

?>

<a href="download2.php?fileName=<?php echo $encryptedFileName; ?>">download</a>