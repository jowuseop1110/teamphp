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
                            <div class="join-box1">
                                <div>
                                    <label for="youBirth">생년월일</label>
                                    <input type="text" id="youBirth" name="youBirth" maxlength="12" placeholder="YYYY-MM-DD" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youPhone">휴대폰번호</label>
                                    <input type="text" id="youPhone" name="youPhone" maxlength="15" placeholder="000-0000-0000" autocomplete="off" required>
                                </div>
                            </div>
                            <button id="joinBtn" class="join-submit" type="submit">아이디찾기</button>
                            <button id="joinBtn" class="join-submit" type="submit"><a href="../Login/login.php">로그인</a></button>
                            
                        </fieldset>
                    </form>

                </div>

            </section>
        </main>
    </div>
</body>
</html>