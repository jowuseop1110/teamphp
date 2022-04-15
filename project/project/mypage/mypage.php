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
        echo "<li><strong>이메일</strong><span>".$memberInfo['youEmail']."</span></li>";
        echo "<li><strong>닉네임</strong><span>".$memberInfo['youNickName']."</span></li>";
        echo "<li><strong>생일</strong><span>".$memberInfo['youBirth']."</span></li>";
        echo "<li><strong>번호</strong><span>".$memberInfo['youPhone']."</span></li>";
    }
?>

                        </ul>
                    </div>
                    <div class="join-btn">
                        <a href="mypageModify.php" style="width: 100%">수정하기</a>
                    </div>
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

		<!-- Scripts -->
        <script src="../Html/Assets/js/jquery.min.js"></script>
        <script src="../Html/Assets/js/browser.min.js"></script>
        <script src="../Html/Assets/js/breakpoints.min.js"></script>
        <script src="../Html/Assets/js/util.js"></script>
        <script src="../Html/Assets/js/main.js"></script>
</html>