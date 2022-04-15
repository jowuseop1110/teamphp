<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];
    $youImgFile = $_FILES['youImgFile'];
    $youImgSize = $_FILES['youImgFile']['size'];
    $youImgType = $_FILES['youImgFile']['type'];
    $youImgName = $_FILES['youImgFile']['name'];
    $youImgTmp = $_FILES['youImgFile']['tmp_name'];
    echo "<pre>";
    var_dump($youImgFile);
    echo "</pre>";

    // //이미지 파일명 확인
    $fileTypeEctensiton = explode("/", $youImgType);

    echo "<pre>";
    var_dump( $fileTypeEctensiton);
    echo "</pre>";

    $fileType = $fileTypeEctensiton[0]; //image

    echo $fileType;

    $fileEctensiton = $fileTypeEctensiton[1]; //jpeg

    echo $fileEctensiton;

    // //이미지 확인 작업 / 이미지 확장자 확인 작업 / 용량 확인(숙제)
    if($fileType == "image"){
        //     //확장자 확인
             if($fileEctensiton == "jpg" || $fileEctensiton == "jpeg" || $fileEctensiton == "png" || $fileEctensiton === "gif"){
                 $youImgDir = "../Html/Img/"; // 이미지 저장 경로
                 $youImgName = "Img_".time().rand(1,99999)."."."{$fileEctensiton}";  //이미지 이름 통일
    
                 $sql = "UPDATE myMembers SET youImgFile = '$youImgName' WHERE memberID = {$memberID}";
    
             }else {
                 echo "<script>alert(지원하는 이미지 파일 형식이 아닙니다. jpg, gif, png 파일만 지원이 됩니다.); history.back(1);</script>";
            }
        } else {
            $sql = "INSERT INTO myMembers(youImgFile) VALUES ('default.svg')";
         }
        $result = $connect -> query($sql);
        $result = move_uploaded_file($youImgTmp, $youImgDir.$youImgName);

    Header("Location: mypage.php");
?>