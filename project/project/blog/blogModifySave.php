<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 수정</title>
</head>
<body>
<?php
        $blogID = $_POST['blogID'];
        $category = $_POST['blogCate'];
        $blogTitle = $_POST['blogTitle'];
        $blogContents = $_POST['blogContents'];
        $memberID = $_SESSION['memberID'];
        $blogTitle = $connect -> real_escape_string($blogTitle);
        $blogContents = $connect -> real_escape_string($blogContents);

        echo $category;

        //쿼리문 작성
        $sql = "SELECT memberID FROM myMembers WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);
        if($result){
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

            //아이디 비밀번호 확인
            if($memberInfo['memberID'] == $memberID){
                //수정(쿼리문 작성)
                $sql = "UPDATE myBlogs SET blogTitle = '{$blogTitle}', blogContents = '{$blogContents}', blogCategory = '{$category}' WHERE blogID = '{$blogID}'";
                $connect -> query($sql);
            } else {
                echo "<script>alert('회원정보가 일치하지 않습니다. 다시 한번확인해주세요!'); history.back(1)</script>";
            }
        }
    ?>
    <script>
        location.href = "blog.php";
    </script>
</body>
</html>