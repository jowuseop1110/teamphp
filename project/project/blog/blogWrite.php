<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
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
                <section id="blog-type" class="section center mb100">
                    <div class="container">
                        <h3 class="section__title">게시글 작성하기</h3>
                        <div class="blog__inner">
                            <div class="blog__write">
                                <form action="blogWriteSave.php" name="blogWrite" method="post" enctype="multipart/form-data">
                                    <fieldset>
                                        <legend class="ir_so">블로그 게시글 작성 영역</legend>
                                        <div>
                                            <label for="blogCate">카테고리</label>
                                            <select name="blogCate" id="blogCate">
                                                <option value="식사">식사</option>
                                                <option value="디저트">디저트</option>
                                                <option value="간식">간식</option>
                                                <option value="안주">안주</option>
                                                <option value="야식">야식</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="blogTitle">제목</label>
                                            <input type="text" name="blogTitle" id="blogTitle" placeholder="레시피 제목을 입력하세요" required>
                                        </div>
                                        <div>
                                            <label for="blogContents">내용</label>
                                            <textarea type="text" name="blogContents" id="blogContents" placeholder="레시피를 입력해주세요. (준비재료, 조리순서, 시간 등등)!" required></textarea>
                                        </div>
                                        <div>
                                            <label for="blogFile">파일</label>
                                            <input type="file" name="blogFile" id="blogFile" placeholder="사진을 넣어주세요. 사진은 jpg, gif, png 파일만 지원이 됩니다.">
                                        </div>
                                            <button type="submit" value="저장하기">저장하기</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
            <!-- //main -->

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