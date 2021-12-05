<?php
$link = mysqli_connect("localhost", "root", "", "lwr");


    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
 
?>