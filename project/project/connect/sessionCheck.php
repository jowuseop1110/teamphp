<?php
    if(!isset($_SESSION['memberID'])){
        Header("Location: ../Login/login.php");
    }
?>