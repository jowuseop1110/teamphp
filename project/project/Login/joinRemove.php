<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];

    //쿼리문 작성(boardID 값 삭제하기)
    $sql = "DELETE FROM myMembers WHERE memberID = {$memberID}";
    $connect -> query($sql);

    echo "<script>alert('탈퇴되었습니다.'); location.href = '..main/.php';</script>";
?>