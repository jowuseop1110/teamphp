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
                <div class="member_form1">
                    <h3>아이디를 잊으셨나요?</h3>

                    <form action="idFindSave.php" name="join" method="post">
                        <fieldset>
                            <legend class="ir_so">회원가입 입력폼</legend>
<?php
        include "../connect/connect.php";
        include "../connect/session.php";

        $youBirth = $_POST['youBirth'];
        $youPhone = $_POST['youPhone'];
        $youEmail = $_POST['youEmail'];

        $sql ="SELECT youBirth, youPhone, youEmail FROM myMembers WHERE youBirth ='$youBirth' && youPhone = '$youPhone'";
        $result = $connect -> query($sql);

        if($result){
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            // echo "<pre>";
            // var_dump($memberInfo);
            // echo "</pre>";

            if($memberInfo['youBirth']==$youBirth && $memberInfo['youPhone'] ==$youPhone ){
                echo "<div style = 'text-align: center; font-size: 30px; border: 3px solid #411700; padding: 10px; border-radius: 10px;'>회원님의 이메일은 ".$memberInfo['youEmail']." 입니다.</div>";
            } else{
                echo "<script>alert('없는 계정입니다.'); history.back(1);</script>";
            }
        }
?>
                        </fieldset>
                    </form>

                </div>

            </section>
        </main>
    </div>
</body>
</html>
