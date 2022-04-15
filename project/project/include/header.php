<header id="header">
    <div class="logo">
        <h1></h1>
    </div>
    <nav class="menu">
        <h2 class="ir_so">메인 메뉴</h2>
           <a href="../pages/main.php"><img src="../Html/Img/Group 326.png" alt="로고" class = "logo1"></a>
    </nav>
    <div class="member">
    <span class="ir_so">회원 정보 영역</span>
        <?php if(isset($_SESSION['memberID'])){  ?>
                    <a href="../mypage/mypage.php"><?=$_SESSION['youNickName']?>님 환영합니다.</a>
                    <a href="../Login/logout.php">로그아웃</a>        
        <?php  } else {  ?>
                    <a href="../Login/login.php">로그인</a>
                    <a href="../Login/join.php">회원가입</a>
        <?php } ?>
    </div>
</header>