<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입</title>
    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->
</head>
<body>

<?php
            include "../include/header.php";
        ?>
    <!-- //header -->
    <main id="contents" class="gray">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <div class="container">



        </div>
    </main>
    <!-- //main -->

    <?php
        include "../connect/connect.php";

        $youEmail = $_POST['youEmail'];
        $youPass = $_POST['youPass'];
        $youPassC = $_POST['youPassC'];
        $youNickName = $_POST['youNickName'];
        $youBirth = $_POST['youBirth'];
        $youPhone = $_POST['youPhone'];
        $regTime = time();

        //echo $youEmail, $youPass, $youPassC, $youName, $youBirth, $youPhone, $regTime;

        //메세지 출력
        function msg($alert){
            echo "<p class='alert'>{$alert}</p>";
        }

        //이메일 유효성 검사
        //$check_email = filter_var($youEmail, FILTER_VALIDATE_EMAIL);
        //$check_email = preg_match(" /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i")

        // if($check_email == false){
            //    echo "이메일이 잘못되었습니다.<br> 올바른 이메일을 정어주세요!";
            //    exit
        // }

        //비밀번호 유효성 검사
        if($youPass !== $youPassC) {
            echo "<script>alert('비밀번호가 일치하지 않습니다.<br>다시한번 확인해 주세요!');</script>";
            Header("Location: join.php"); 
            exit;
        } 

        // 생년월일 유효성 검사
        $check_birth = preg_match("/^(19[0-9][0-9])|20\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$youBirth);
        
        if($check_birth == false){
            echo "<script>alert('생년월일이 정확하지 않습니다. <br> 올바른 생년월일(YYYY-MM-DD)을 적어주세요!');</script>";
            Header("Location: join.php"); 
            exit;
        } 
        

        // 핸드폰 번호 유효성 검사
        $check_phone =  preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);

        if($check_phone == false) {
            echo "<script>alert('올바른 번호가 아닙니다. <br> 올바른 번호(000-0000-0000)로 입력해주세요');</script>";
            exit;
        } 
    

        // 이메일 주소(중복검사)
        $isEmailCheck = false;

        //이메일 목록 가져오기
        $sql = "SELECT youEmail FROM myMembers WHERE youEmail = '$youEmail'";
        $result = $connect -> query($sql);

        if($result){
            $count = $result -> num_rows;
            if($count == 0) {
                // 회원가입 가능
                $isEmailCheck = true;
            } else {
                echo "<script>alert('이미 회원가입이 되어있습니다.');</script>";
                exit;
            }
        } else {
            msg("에러발생01 -- 관리자에게 문의하세요!");
            exit;
        } Header("Location: join.php"); 

        // 핸드폰 번호(중복검사)
        $isPhonCheck = false;

        // 핸드폰 목록 가져오기
        $sql = "SELECT youPhone FROM myMembers WHERE youPhone = '$youPhone'";
        $result = $connect -> query($sql);

        if($result){
            $count = $result -> num_rows;
            if($count == 0) {
                // 회원가입 가능
                $isPhoneCheck = true;
            } else {
                echo "<script>alert('이미 회원가입이 되어있습니다.');</script>";
                exit;
            }
        } else {
            msg("에러발생02 -- 관리자에게 문의하세요!");
            exit;
        } Header("Location: join.php"); 

        //회원가입
        if($isEmailCheck = true && $isEmailCheck = true) {
            $sql = "INSERT INTO myMembers(youEmail, youPass, youNickName, youBirth, youPhone, regTime) VALUES ('$youEmail', '$youPass', '$youNickName', '$youBirth', '$youPhone', '$regTime')";
            $result = $connect  -> query($sql);
    
            if($result){
                echo "<script>alert('회원가입을 축하합니다.!');</script>";
                
            } else {
                echo "<script>alert('에러발생03 -- 관리자에게 문의하세요');</script>";
                exit;
            }
        }else {
            echo "<script>alert('이메일 또는 핸드폰 번호가 틀립니다.');</script>";
        }
        Header("Location: join.php"); 
    ?>
</body>
</html>