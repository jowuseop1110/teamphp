<?php

    include "../connect/session.php";

    unset($_SESSION['memberID']);
    unset($_SESSION['youNickName']);
    unset($_SESSION['youEmail']);

    Header("Location: ../pages/main.php");
?>