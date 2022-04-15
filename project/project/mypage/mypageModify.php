<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>요복조복 마이페이지</title>
    

    <?php
        include "../include/style.php";
    ?>
    
</head>
<body>
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">
                
            <?php
            include "../include/header.php";
            ?>
            <!--//header-->

            <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type">
            <div class="member-form">
                <h3>회원 정보</h3>     
            <form action="mypageImgSave.php" name="mypageImgSave" method="post" enctype="multipart/form-data">
                    <input type="file" name="youImgFile" id="youImgFile">
                    <button  class ="mypagesub" type="submit" value="저장하기">저장하기</button>
            </form>              
            <form action="mypageModifySave.php" name="join" method="post">
                <div class="join-intro">
                <div class="face">
                    <?php
                        $memberID = $_SESSION['memberID'];
                        $sql = "SELECT youImgFile FROM myMembers WHERE memberID = {$memberID}";
                        $result = $connect -> query($sql);
                        // echo $sql;
                        if($result){
                            $myPageInfo = $result -> fetch_array(MYSQLI_ASSOC);
                            echo "<img src='../Html/Img/".$myPageInfo['youImgFile']."' alt='기본이미지'>";
                        }
                    ?> 
                </div>   
                <div class="intro">안녕하세요 <?=$_SESSION['youNickName']?>님.</div>
                    <div class="join-info">
                        <ul>
<?php
    $memberID = $_SESSION['memberID'];
    $youEmail = $_POST['youEmail'];
    $youNickName = $_POST['youNickName'];
    $youBirth = $_POST['youBirth'];
    $youPhone = $_POST['youPhone'];

    $sql = "SELECT youEmail, youNickName, youBirth, youPhone FROM myMembers WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);
    
    if($result){
        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
        echo "<li><strong>이메일</strong><span><input type='email' id='youEmail' class='mypage' name='youEmail' placeholder='Sample@naver.com' value = ".$memberInfo['youEmail']." required></span></li>";
        echo "<li><strong>닉네임</strong><span><input type='name' id='youNickName' class='mypage' name='youNickName' placeholder='닉네임을 적어주세요!' value = ".$memberInfo['youNickName']." required></span></li>";
        echo "<li><strong>생일</strong><span><input type='text' id='youBirth' class='mypage' name='youBirth' placeholder='YYYY-MM-DD' value = ".$memberInfo['youBirth']." maxlength='12'></span></li>";
        echo "<li><strong>번호</strong><span><input type='text' id='youPhone' class='mypage' name='youPhone' placeholder='000-0000-0000' maxlength='15' value = ".$memberInfo['youPhone']."></span></li>";
        echo "<li><strong>비밀번호 확인</strong><span><input type='password' class='mypage' name='youPass' id='youPass' placeholder='로그인 비밀번호를 입력해주세요!!' autocomplete='off'></span></li>";
    }
?>
                        </ul>
                    </div>
                    <div class="join-btn">
                    <button type="submit" value="수정하기">수정하기</button>
                    <a href="mypageLeave.php" onclick="return noticeRemove();">탈퇴하기</a>
                    </div>
                </form>
            </div>
        </section>
    </main>

            </div>
        </div>

        <?php
             include "../include/sidebar.php";
        ?>
    </div>
    
</body>
    <script>
        function noticeRemove(){
            let notice = confirm("정말 탈퇴하시겠습니까?", "");
            return notice;
        }
    </script>

		<!-- Scripts -->
        <script src="../Html/Assets/js/jquery.min.js"></script>
        <script src="../Html/Assets/js/browser.min.js"></script>
        <script src="../Html/Assets/js/breakpoints.min.js"></script>
        <script src="../Html/Assets/js/util.js"></script>
        <script src="../Html/Assets/js/main.js"></script>
</html>