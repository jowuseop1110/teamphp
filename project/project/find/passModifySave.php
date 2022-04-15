

<?php
        include "../connect/connect.php";
        include "../connect/session.php";

        
        $memberID = $_POST['memberID'];
        //memberID 못불러와서 findSave.php에서 가상으로 불러온걸 post 방식으로 재 호출함
        $youPass = $_POST['youPass'];
        $youPassC = $_POST['youPassC'];
     
        $sql = "SELECT youPass FROM myMembers WHERE memberID = '$memberID'";
        $result = $connect -> query($sql);
        // $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            // echo "<pre>";
            // var_dump ($memberInfo);
            // echo "</pre>";
          if($result){
             $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            

             if($youPassC == $youPass){
                 //수정(쿼리문 작성)
                 $sql = "UPDATE myMembers SET youPass = '{$youPass}' WHERE memberID = '{$memberID}'";
                 $connect -> query($sql);
                 
                 echo "<script>alert('비밀번호가 수정되었습니다. 로그인 페이지로 이동합니다.'); location.href = '../Login/login.php';</script>";
                //  $newconf = "confirm";
                
                //  if($newconf == 'true'){
                //     Header("Location: ../Login/login.php");
                //  } else {
                //     Header("Location: ../pages/main.php");
                //  }
             } else {
                 echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 한번확인해주세요!'); history.back(1)</script>";
             }
            
           }
 
?>




