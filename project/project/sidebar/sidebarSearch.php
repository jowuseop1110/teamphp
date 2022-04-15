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
    <title>sidebarSearch</title>
    

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
                <section id="board-type" class="section center mb100">
                    <div class="container">
                        <p class="section__desc">검색 결과입니다.</p>
                            </div>
                            <div class="blog__btn">
                                <a href="blogWrite.php">글쓰기</a>
                            </div>
                            <div class="blog__cont">
                                
<?php 
    if(isset($_GET{'page'})){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    //게시판 불러올 갯수
    $PageView = 5;
    $pageLimit = ($pageView * $page) -  $pageView;
    $category = $_GET['blogCategory'];
    $sql = "SELECT g.blogContents, g.blogCategory, g.blogAuthor, g.blogImgFile, b.boardTitle, b.boardContents FROM myBlogs g JOIN myBoards b ON(g.memberID = b.memberID ) ";

    $result = $connect -> query($sql);  ?>

<?php foreach($result as $blog){ ?>
    <article class="blog">
        <figuer class="blog__header">
        <a href="blogView.php?blogID=<?=$blog['blogID']?>"><img src="../blog/img/<?=$blog['blogImgFile']?>" alt='블로그 이미지'></a>
        </figuer>
        <div class="blog__body">
            <span class="blog__cate"><?=$blog['blogCategory']?></span>
            <div class="blog__title"><?=$blog['blogTitle']?></div>
            <div class="blog__desc"><?=$blog['blogContents']?></div>
            <div class="blog__info">
                <span class="author"><a href='#'><?=$blog['blogAuthor']?></a></span>
                <span class="date"><?=date('Y-m-d H:i',  $blog['blogRegTime'])?></span>
                <span class="modify"><a href='#'>수정</a></span>
                <span class="delete"><a href='#'>삭제</a></span>
            </div>
        </div>
    </article>
<?php }?>



   

                    </div>
                </section>

            </div>
        </div>
            


        <!-- sidebar -->
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