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
    <title>게시글 보기</title>
    

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
                    <h3 class="section__title">게시글 보기</h3>
                    <div class="board__inner">
                        <div class="board__table">
                            <table>
                                <colgroup>
                                    <col style="width: 20%">
                                    <col>
                                    <col style="width: 10%">
                                </colgroup>
                                <tbody>
                                <?php
                                    $boardID = $_GET['boardID'];

                                    // echo $boardID;

                                    $sql = "SELECT  b.boardTitle, m.youNickName, b.regTime, b.boardView, b.boardContents FROM myBoards b JOIN myMembers m ON (m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
                                    $result = $connect -> query($sql);

                                    $sql = "UPDATE myBoards SET boardView = boardView + 1 WHERE boardID = {$boardID}";   //조회수 추가
                                    $connect -> query($sql);

                                    if($result){
                                        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                                        // echo "<pre>";
                                        // var_dump($boardInfo);
                                        // echo "</pre>";

                                        echo "<tr><th>제목</th><td class='left'>".$boardInfo['boardTitle']."</td></tr>";
                                        echo "<tr><th>글쓴이</th><td class='left'>".$boardInfo['youNickName']."<td>".date('Y-m-d', $boardInfo['regTime'])."</td><td>".$boardInfo['boardView']."</td></td></tr>";
                                        echo "<tr><th>내용</th><td class='left height' colspan='4'>".$boardInfo['boardContents']."</td></tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                                    
           
               
                        
                       
                        <div class="board__btn">
               
                                <!-- <button style = "background:black;"> -->
                                    <div id="good" class="like" name=boardLike>
                                        <button type = "submit"><span>좋아요!</span>                                      
                                        <div class="count1">0</div>
                                        <div class="img1">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 4.59079C11.5179 2.01842 9.20238 0 6.50239 0C2.90477 0.00789474 -0.00594326 3.20263 9.11315e-06 7.13553C9.11315e-06 14.7513 12.5 25 12.5 25C12.5 25 25 14.7513 25 7.13553C25.0059 3.20132 22.0952 0.00657895 18.4964 0C15.7964 0 13.4845 2.01842 12.5 4.59079Z" fill="#FF1150"/>
                                        </svg>
                                        </div>
                                        </button>
                                    </div>
                            
                     
                            <a href="board.php">목록보기</a>
                            <a href="boardRemove.php?boardID=<?=$boardID?>" onclick="return noticeRemove();">삭제하기</a>
                            <a href="boardModify.php?boardID=<?=$_GET['boardID']?>">수정하기</a>
                        </div>
                    </div>
                </div>
            </section>

            </div>
        </div>
            


        <!-- sidebar -->
        <?php
             include "../include/sidebar.php";
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        
function quizView(view){
            $(".count1").text(view.boardLike);
           
            quizAnswer = view.quizAnswer;
        }

            const img1 = document.querySelector(".img1");

       

            document.querySelector("#good button").addEventListener("click", () => {
        result1 =  count1 += 1;
    
        // document.querySelector(".count1").innerHTML = result1;
        function quizData(){
            let count1 = 0;
            let result1 =  count1 += 1;

            $.ajax({
                url: "boardLIke.php",
                method: "POST",
                data: {"boardLIke": result1},
                dataType: "json",
                success: function(data){
                    console.log(data.quiz);
                    quizView(data.quiz);
                },
                error: function(reqeust, status, error){
                    console.log('reqeust' + reqeust);
                    console.log('status' + status);
                    console.log('error' + error);
                }
            })
        }
        quizData();





    
         document.querySelector("#good .img1").classList.add("show");
            })
   
        setInterval(() => {
            img1.classList.remove("show");
        }, 1000);
    }
  

        function noticeRemove(){
            let notice = confirm("정말 삭제하시겠습니까?", "");
            return notice;
        }
 
    </script>
 
    
</body>

		<!-- Scripts -->
        <script src="../Html/Assets/js/jquery.min.js"></script>
        <script src="../Html/Assets/js/browser.min.js"></script>
        <script src="../Html/Assets/js/breakpoints.min.js"></script>
        <script src="../Html/Assets/js/util.js"></script>
        <script src="../Html/Assets/js/main.js"></script>

</html>