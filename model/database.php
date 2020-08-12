<?php
    $conection = mysqli_connect("localhost","root","","consultorio"); 
    if ($conection->connect_error) {
        die($conection->connect_errno);
    }     
?>