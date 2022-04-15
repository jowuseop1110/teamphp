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
                                    <?php
                                        function msg($alert){
                                            echo "<p class ='result'>총 ".$alert."건이 검색되었습니다.</p>";
                                        }
                                        $searchKeyword = $_GET['searchKeyword'];
                                        $searchOption = $_GET['searchOption'];

                                        $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
                                        $searchOption = $connect -> real_escape_string(trim($searchOption));

                                        // 쿼리문 작성
                                        // b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView
                                        // $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myBoard b JOIN myMember m ON (m.memberID = b.memberID) WHERE b.boardTItle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
                                        // $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myBoard b JOIN myMember m ON (m.memberID = b.memberID) WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
                                        // $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myBoard b JOIN myMember m ON (m.memberID = b.memberID) WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
                                        
                                        $sql = "SELECT b.boardID, b.boardTitle, m.youNickName, b.regTime, b.boardView, b.boardContents FROM myBoards b JOIN myMembers m ON (m.memberID = b.memberID) ";
                                        
                                        switch($searchOption){
                                            case 'title':
                                                $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
                                                break;
                                            case 'content':
                                                $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
                                                break;
                                            case 'name':
                                                $sql .= "WHERE m.youNickName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
                                                break;
                                        }     
                                        $result = $connect -> query($sql);
                                        
                                        if($result){
                                            $count = $result ->num_rows;
                                            msg($count);
                                        }
                                    ?>
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
                                                if(isset($_GET{'page'})){
                                                    $page = (int) $_GET['page'];
                                                } else {
                                                    $page = 1;
                                                }
                                                //게시판 불러올 갯수
                                                $pageView = 10;
                                                $pageLimit = ($pageView * $page) -  $pageView;

                                                $sql = "SELECT b.boardID, b.boardTitle, m.youNickName, b.regTime, b.boardView, b.boardContents FROM myBoards b JOIN myMembers m ON (m.memberID = b.memberID) ";
                                        
                                                switch($searchOption){
                                                    case 'title':
                                                        $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
                                                        break;
                                                    case 'content':
                                                        $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
                                                        break;
                                                    case 'name':
                                                        $sql .= "WHERE m.youNickName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
                                                        break;
                                                }  
                                                $result = $connect -> query($sql);
                                                
                                                if($result){
                                                    $count = $result ->num_rows;

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
    switch($searchOption){
        case 'title':
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
            break;
        case 'content':
            $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC  LIMIT {$pageLimit}, {$pageView}";
            break;
        case 'name':
            $sql .= "WHERE m.youNickName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
            break;
    }
    $sql = "SELECT count(boardID) FROM myBoards";
    $result = $connect -> query($sql);
    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(boardID)'];
    // echo "<pre>";
    // var_dump($boardCount);
    // echo "</pre>";
    //echo $boardCount;
    // 페이지 넘버 갯수
    // 300/10 = 30
    // 301/10 = 31
    // 306/10 = 31
    // 309/10 = 31

    //총 페이지 갯수
    $boardCount = ceil($boardCount/$pageView);

    //현재 페이지를 기준으로 보여주고 싶은 갯수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;

    //처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    //마지막 페이지 초기화
    if($endPage >= $boardCount) $endPage = $boardCount;
    
    //이전 페이지
    if($page != 1){
        $prevPage = $page - 1;
        echo "<li><a href='boardSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>이전</a></li>";
    }
    //처음으로 페이지
    if($page != 1){
        echo "<li><a href='boardSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>처음으로</a></li>";
    }
    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page){
            $active = "active";
        }
        echo "<li class='{$active}'><a href='boardSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
    }
    //다음 페이지
    if($page != $endPage){
        $nextPage = $page + 1;
        echo "<li><a href='boardSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>다음</a></li>";
    }
    //마지막 페이지
    if($page != $endPage){
        echo "<li><a href='boardSearch.php?page={$boardCount}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>마지막으로</a></li>";
    }
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