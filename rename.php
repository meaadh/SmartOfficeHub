<?php
    extract($_REQUEST);
    $file=fopen("form-save.txt","a");

    fwrite($file,"CourseName :");
    fwrite($file,"question :");
    fclose($file);
    header("location: officehours.php");
 ?>
