<?php
    $filename="uploads/pks".$name;
    header('Content-type:application/msword');
    header('Content-disposition: inline; filename="'.$filename.'"');
    header('content-Transfer-Encoding:binary');
    header('Accept-Ranges:bytes');
    readfile($filename);
?>

