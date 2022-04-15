<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>

</head>
<body>
    <?php
        include "../connect/connect.php";
        include "../connect/session.php";


        $youEmail = $_POST {'youEmail'};
        $youPass = $_POST {'youPass'};

        // echo $youEmail, $youPass;

        //메세지 출력
        function msg($alert){
            echo "<p calss='alert'>$alert</p>";
        }

        // //이메일 유효성 검사
        // if(!filter_var($youEmail, FILTER_VALIDATE_EMAIL)){
        //     msg("이메일이 잘못되었습니다.<br>올바른 이메일을 적어주세요");
        // }

        // //비밀번호 유효성 검사
        // if($youPass == null || $youPass == ''){
        //     msg("비밀번호를 입력해주세요");
        // }

        //데이터 불러오기
        $sql ="SELECT memberID, youNickName, youEmail, youPass FROM myMembers WHERE youEmail ='$youEmail' && youPass = '$youPass'";
        $result = $connect -> query($sql);

        if($result){
            $count = $result -> num_rows;
            if($count == 0) {
                echo "<script>alert('이메일 또는 비밀번호가 잘못되었습니다! 다시한번 확인해 주세요.'); location.href = 'login.php';</script>";

            } else {
                // 로그인 성공
                $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

                //섹션 추가 작업
                $_SESSION['memberID'] = $memberInfo['memberID'];
                $_SESSION['youNickName'] = $memberInfo['youNickName'];
                $_SESSION['youEmail'] = $memberInfo['youEmail'];

                //메인
                Header("Location: ../pages/main.php");
            }
        }


    ?>



</body>
</html>