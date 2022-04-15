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
    <title>게시판</title>
    

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
                        <h3 class="section__title">자유 게시판</h3>
                        <articel>
                            <div class="board__inner">
                                <div class="board__search">
                                    <form action="boardSearch.php" name="boardSearch" method="GET">
                                        <fieldset>
                                            <legend class="ir_so">게시판 검색 영역</legend>
                                            <div>
                                                <input type="search" name="searchKeyword" class="search-form"
                                                    placeholder="검색어를 입력하세요!" aria-label="search" required>
                                            </div>
                                            <div>
                                                <select name="searchOption" class="search-option">
                                                    <option value="title">제목</option>
                                                    <option value="content">내용</option>
                                                    <option value="name">등록자</option>
                                                </select>
                                            </div>
                                            <div>
                                                <button type="submit" class="search-btn">검색</button>
                                            </div>
                                            <div>
                                                <a href="boardWrite.php" class="search-btn black">글쓰기</a>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="board__table">
                                    <table class="hover">
                                        <colgroup>
                                            <col style="width: 5%;">
                                            <col>
                                            <col style="width: 10%;">
                                            <col style="width: 12%;">
                                            <col style="width: 7%;">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>번호</th>
                                                <th>제목</th>
                                                <th>등록자</th>
                                                <th>등록일</th>
                                                <th>조회수</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            //b.boardID, b.boardTitle, m.youNickName, b.regTime, b.boardView
                                            if(isset($_GET{'page'})){
                                                $page = (int) $_GET['page'];
                                            } else {
                                                $page = 1;
                                            }
                                            //게시판 불러올 갯수
                                            $pageView = 10;
                                            $pageLimit = ($pageView * $page) -  $pageView;

                                            // SELECT 필드명 FROM 테이블명 엘리어스 JOIN 연결할 테이블명 엘리어스 ON(조건문);
                                            $sql = "SELECT b.boardID, b.boardTitle, m.youNickName, b.regTime, b.boardView FROM myBoards b JOIN myMembers m ON (m.memberID = b.memberID) ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
                                            $result = $connect -> query($sql);

                                        if($result){
                                            $count = $result -> num_rows;

                                            if($count>0) {
                                                for($i=1; $i<=$count; $i++) {
                                                    $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                                                    echo "<tr>";
                                                    echo "<td>".$boardInfo['boardID']."</td>";
                                                    echo "<td class='left'><a href='boardView.php?boardID={$boardInfo['boardID']}'>".$boardInfo['boardTitle']."</a></td>";
                                                    echo "<td>".$boardInfo['youNickName']."</td>";
                                                    echo "<td>".date('Y-m-d', $boardInfo['regTime'])."</td>";
                                                    echo "<td>".$boardInfo['boardView']."</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="board__pages">
                                    <ul>
                                        <?php
                                            include "boardPage.php";
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </article>
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