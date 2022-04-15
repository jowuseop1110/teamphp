<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $blogID = $_GET['blogID'];
    $blogID = $connect -> real_escape_string($blogID);

    //쿼리문 작성(blogID 값 삭제하기)
    $sql = "DELETE FROM myBlogs WHERE blogID = {$blogID}";
    $connect -> query($sql);

    echo "<script>alert('삭제되었습니다.'); location.href = 'blog.php';</script>";
?>