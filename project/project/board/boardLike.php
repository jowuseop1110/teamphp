<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $memberID = $_SESSION['memberID'];
    $boardID = $_GET['boardID'];
 
    $boardID = $connect -> real_escape_string($boardID);
   

    //쿼리문 작성(boardID 값 삭제하기)
    // $sql = "DELETE FROM myBoards WHERE boardID = {$boardID}";
    // $connect -> query($sql);

    $sql = "SELECT boardLike FROM myBoards";
    $result = $connect -> query($sql);


     if($result){
         $sql = "UPDATE myBoards SET boardLike = boardLike + 1 WHERE boardID = {$boardID}";
         $result1 = $connect -> query($sql);
         $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
         echo json_encode(array("quiz"=> $boardInfo));
         

    }
    // echo "<script>history.back(1);</script>";
?>