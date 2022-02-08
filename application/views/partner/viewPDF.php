<?php 
    $filename="uploads/".$name;
    header('Content-type:application/pdf');
    header('Content-disposition: inline; filename="'.$filename.'"');
    header('content-Transfer-Encoding:binary');
    header('Accept-Ranges:bytes');
    //membaca dan menampilkan file
    readfile($filename);
?>

