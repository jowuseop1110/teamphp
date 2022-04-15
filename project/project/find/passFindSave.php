<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디찾기</title>

    <?php
        include "../include/style.php";
    ?>
    
</head>
<body>
    <div id="wrap">
        <?php
            include "../include/header.php";
        ?>
        <!--//header-->

        <main id="contents">
            <h2 class="ir_so">컨텐츠 영역</h2>
            <section class="join_type">
                <div class="member_form">
                    <h3>비밀번호를 재설정 해주세요!</h3>

                    <form action="passModifySave.php" name="join" method="post">
                        <fieldse>
                            <legend class="ir_so">회원가입 입력폼</legend>

<?php
        include "../connect/connect.php";
        include "../connect/session.php";

       
        $youPhone = $_POST['youPhone'];
        $youEmail = $_POST['youEmail'];
    
        
       
        $sql ="SELECT youPhone, youEmail, memberID FROM myMembers WHERE youEmail ='$youEmail' && youPhone = '$youPhone'";
        $result = $connect -> query($sql);

        if($result){
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            // echo "<pre>";
            // var_dump($memberInfo);
            // echo "</pre>";

            if($memberInfo['youEmail']==$youEmail && $memberInfo['youPhone'] ==$youPhone ){
                
                echo"<div class ='join-box'>";
                echo "<label for='youPass'>새 비밀번호</label>";
                echo "<input type='password' id='youPass' name='youPass' maxlength='20'placeholder='' autocomplete='off' required>";
                echo "</div>";

                echo"<div class ='join-box'>";
                echo "<label for='youPassC'>비밀번호 확인</label>";
                echo "<input type='password' id='youPassC' name='youPassC' maxlength='20'placeholder='' autocomplete='off' required>";
                echo "</div>";
                echo "<input style = 'display: none;' type='text' id='memberID' name='memberID' maxlength='20'value ='".$memberInfo['memberID']."' autocomplete='off' required>";
            } else{
                echo "<script>alert('없는 계정입니다. 회원가입을 해주세요!'); history.back(1);</script>";
            }
        }
?>
<button id="joinBtn" class="join-submit" type="submit">비밀번호 변경</button>
                        </fieldset>
                    </form>

                </div>



