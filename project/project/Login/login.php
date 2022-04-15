<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <?php
        include "../include/style.php";
    ?>

</head>
<body>

    <?php
        include "../include/header.php";
    ?>
        <!--//header-->

        <main id="contents">
            <h2 class="ir_so">컨텐츠 영역</h2>
            <section class="join_type">
                <div class="member_form">
                    <h3>LOGIN</h3>
                    <form action="loginSave.php" name="join" method="post">
                        <fieldset>
                            <legend class="ir_so">로그인 입력폼</legend>
                            <div class="join-box">
                                <div>
                                    <label for="youEmail" class="ir_so">이메일</label>
                                    <input type="email" id="youEmail" name="youEmail" placeholder="이메일" autocomplete="off" autofocus required>
                                </div>
                                <div>
                                    <label for="youPass" class="ir_so">비밀번호</label>
                                    <input type="password" id="youPass" name="youPass"  maxlength="20"placeholder="비밀번호" autocomplete="off" required>
                                </div>
                            </div>
                            <button id="joinBtn" class="join-submit" type="submit">로그인</button>
                        </fieldset>
                    </form>
                </div>
                <div class="find">
                <a href ="../find/idFind.php">아이디 찾기</a> | <a href ="../find/passFind.php">비밀번호 찾기</a>
                </div>
            </section>
        </main>
        <!--//contents-->
        
    </div>
</body>
</html>