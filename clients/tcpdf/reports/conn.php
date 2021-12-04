<?php
$link = mysqli_connect("localhost", "root", "", "service");

//$link = mysqli_connect("localhost", "root", "", "service");
  

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
 
?>