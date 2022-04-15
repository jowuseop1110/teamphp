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
                <section id="blog-type" class="section center">
                    <div class="container">
                        <?php
                           
                            $blogCategory = $_GET['blogCategory'];
                            $searchKeyword = $_GET['searchKeyword'];

                            $sql = "SELECT blogCategory FROM myBlogs WHERE blogCategory like '%$blogCategory%'";
                            $result = $connect -> query($sql);
                            if($result){
                                $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);
                                echo "<h3 class='section__title'>".$blogInfo['blogCategory']."</h3>";
                            }
                        ?>
                        <div class="blog__inner">
                        <div class="blog__search">
                                <form action ="blogSearch.php" method="get">
                                    <fieldset>
                                        <legend class="ir_so">검색 영역</legend>
                                        <select name="searchOption" class="search-option">
                                            <option value="title">제목</option>
                                            <option value="content">내용</option>                       
                                        </select>
                                        <input type= "search" name="searchKeyword" id="blogSearch" class="search" placeholder ="검색어를 입력하세요.">
                                        <label for="blogSearch" class="ir_so">검색</label>
                                        <input style = "display:none;"type="text" name="blogCategory" value="<?=$blogInfo['blogCategory']?>">
                                        <button class="button">검색</button>
                        
                                    </fieldset>
                                </form>
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
                               
                                    $sql = "SELECT blogID, memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogImgFile, blogRegTime FROM myBlogs WHERE blogTitle like '%$searchKeyword%' and blogCategory like '%$blogCategory%'";
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
                          
                            <div class="blog__pages">
                                <ul>
                                    <?php
                                        include "blogPage.php";
                                    ?>
                                </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
            <!-- //main -->
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