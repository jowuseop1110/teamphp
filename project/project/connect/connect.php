<?php
    $host = "localhost";
    $user = "dnwls7738";
    $pass = "cjs1dn2wls3!";
    $db = "dnwls7738";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "DATABASE Connect False";
    } else {
        // echo "DATABASE Connect True";
    };
?>