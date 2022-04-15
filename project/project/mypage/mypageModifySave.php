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
    <title>마이페이지</title>
</head>
<body>
<?php
        $memberID = $_SESSION['memberID'];
        $youEmail = $_POST['youEmail'];
        $youNickName = $_POST['youNickName'];
        $youBirth = $_POST['youBirth'];
        $youPhone = $_POST['youPhone'];
        $youPass = $_POST['youPass'];

        echo $youName;

        // 쿼리문 작성
        $sql = "SELECT youPass, memberID FROM myMembers WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);

        if($result){
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

            if($memberInfo['youPass'] == $youPass && $memberInfo['memberID'] == $memberID){
                //수정(쿼리문 작성)
                $sql = "UPDATE myMembers SET youEmail = '{$youEmail}', youNickName = '{$youNickName}', youBirth = '{$youBirth}', youPhone = '{$youPhone}' WHERE memberID = '{$memberID}'";
                $connect -> query($sql);
                echo "<script>alert('수정되었습니다!');</script>";  
            } else {
                echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 한번확인해주세요!'); history.back(1)</script>";
            }
        }
    ?>
</body>
</html>