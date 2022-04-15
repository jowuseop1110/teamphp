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
                    <h3>비밀번호를 잊으셨나요?</h3>

                    <form action="passFindSave.php" name="join" method="post">
                        <fieldset>
                            <legend class="ir_so">회원가입 입력폼</legend>
                            <div class="join-box1">
                                <div>
                                    <label for="youEmail">이메일</label>
                                    <input type="email" id="youEmail" name="youEmail" placeholder="sample@naver.com" autocomplete="off" autofocus required>
                                </div>
                                <div>
                                    <label for="youPhone">휴대폰번호</label>
                                    <input type="text" id="youPhone" name="youPhone" maxlength="15" placeholder="000-0000-0000" autocomplete="off" required>
                                </div>
                            </div>
                            <button id="joinBtn" class="join-submit" type="submit">비밀번호찾기</button>

                        </fieldset>
                    </form>

                </div>

            </section>
        </main>
    </div>
</body>
</html>