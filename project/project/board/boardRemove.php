<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];
    $boardID = $_GET['boardID'];
    $boardID = $connect -> real_escape_string($boardID);

    //쿼리문 작성(boardID 값 삭제하기)
    // $sql = "DELETE FROM myBoards WHERE boardID = {$boardID}";
    // $connect -> query($sql);

    $sql = "SELECT memberID FROM myBoards";
    $connect -> query($sql);

    if($memberID == 'memberID'){
        $sql = "DELETE FROM myBoards WHERE boardID = {$boardID}";
        $connect -> query($sql);
    } else {
        echo "<script>alert('삭제할 수 없습니다.'); location.href = 'board.php';</script>";
    }
    echo "<script>alert('삭제되었습니다.'); location.href = 'board.php';</script>";
?>