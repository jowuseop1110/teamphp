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
    <title>요복조복</title>
    

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
                    <h2 class="ir_so">컨텐츠 영역</h2>
                    <section id="blog-type" class="center mb100">
                            
                            <?php 
                                $blogID = $_GET['blogID'];
                                
                                $sql = "SELECT blogID, memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogImgFile, blogRegTime FROM myBlogs WHERE blogID = {$blogID}";
                                $result = $connect -> query($sql);
                                if($result){
                                    $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);
                                    echo "<div class='blog__label' style='background-image: url(img/".$blogInfo['blogImgFile'].");'>";
                                    echo "<h3 class='section__title1'>".$blogInfo['blogTitle']."</h3>";
                                    echo "<div>";
                                    echo "<span class='author'><a href='#'>".$blogInfo['blogAuthor']."</a></span>&nbsp;";
                                    echo "<span class='date'>".date('Y-m-d H:i', $blogInfo['blogRegTime'])."</span><br>";
                                    echo "<span class='modify'><a href='blogModify.php?blogID=".$blogInfo['blogID']."'>수정</a></span>&nbsp;";
                                    echo "<span class='delete'><a href='blogRemove.php?blogID=".$blogID."' onclick='return noticeRemove();'>삭제</a></span>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            ?>
                            
                            <div class="container">
                                <div class="blog__layout">
                                    <div class="blog__left">
                                        <h4><?=$blogInfo['blogTitle']?></h4>
                                        <div>
                                            <img src="img/<?=$blogInfo['blogImgFile']?>" alt="블로그 이미지">
                                        </div>
                                        <div style="white-space: pre-line">
                                            <?=$blogInfo['blogContents']?>
                                        </div>
                                    </div>
                                    <div class="blog__right">
                                        <div class="ad">
                                            <iframe src="https://ads-partners.coupang.com/widgets.html?id=572088&template=carousel&trackingCode=AF6258714&subId=&width=300&height=300" width="300" height="300" frameborder="0" scrolling="no" referrerpolicy="unsafe-url"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                <!-- //main -->  
            </div>
            
        </div>
            <?php
                include "../include/sidebar.php";
            ?>
    </div>
    
</body>
    <script>
        function noticeRemove(){
            let notice = confirm("정말 삭제하시겠습니까?", "");
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