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

                <!-- Banner -->
                    <section id="banner">
                        <div class="content">
                            <header>
                                <h1>요리보고 조리보고<br />
                               초간단 편의점<br /> 레시피</h1>
                            </header>
                            <p class="p1">요리하기 힘든 자취생을 위한 초간단 <br>편의점 레시피를 모아서 누구나 따라하기 쉽게!</p>
                        </div>
                        <span class="image object">
                            <img src="../Html/Img/pic10.jpg" alt="" />
                        </span>
                    </section>

                <!-- Section -->
                    <section>
                        <header class="major">
                            <h2>오늘의 랭킹!</h2>
                        </header>
                        <div class="posts">
<?php
 $sql = "SELECT * FROM myBlogs ORDER BY blogID DESC LIMIT 6";
 $result = $connect -> query($sql);
?>

<?php foreach($result as $myBlogs){?>
                <article>
                <a href="../blog/blogView.php?blogID=<?=$myBlogs['blogID']?>"><img src="../blog/img/<?=$myBlogs['blogImgFile']?>" style ="" alt="블로그이미지"></a>
                    <h3><?=$myBlogs['blogTitle']?></h3>
                    <p class="p1"><?=$myBlogs['blogContents']?></p>
                    <ul class="actions">
                        <li><a href="#" class="button1">더보기</a></li>
                    </ul>
                </article>
<?php }?>
                        </div>
                    </section>

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