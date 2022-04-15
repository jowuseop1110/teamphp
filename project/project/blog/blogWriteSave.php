<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];
    $blogAuthor = $_SESSION['youNickName'];
    $blogCate = $_POST['blogCate'];
    $blogTitle = $_POST['blogTitle'];
    $blogContents = $_POST['blogContents'];
    $blogDelete = 1;
    $blogLike = 0;
    $blogView = 1;
    $blogRegTime = time();

    $blogImgFile = $_FILES['blogFile'];
    $blogImgSize = $_FILES['blogFile']['size'];
    $blogImgType = $_FILES['blogFile']['type'];
    $blogImgName = $_FILES['blogFile']['name'];
    $blogImgTmp = $_FILES['blogFile']['tmp_name'];

    // echo "<pre>";
    // var_dump($blogImgFile);
    // echo "</pre>";

    //이미지 파일명 확인
    $fileTypeEctensiton = explode("/", $blogImgType);
    $fileType = $fileTypeEctensiton[0]; //image
    $fileEctensiton = $fileTypeEctensiton[1]; //jpeg

    //이미지 확인 작업 / 이미지 확장자 확인 작업 / 용량 확인(숙제)
    if($fileType == "image"){
        //확장자 확인
        if($fileEctensiton == "jpg" || $fileEctensiton == "jpeg" || $fileEctensiton == "png" || $fileEctensiton == "gif"){
            $blogImgDir = "../blog/img/"; // 이미지 저장 경로
            $blogImgName = "Img_".time().rand(1,99999)."."."{$fileEctensiton}";  //이미지 이름 통일

            $sql = "INSERT INTO myBlogs(memberID, blogAuthor, blogCategory, blogTitle, blogContents, blogLike, blogView, blogRegTime, blogDelete, blogImgFile, blogImgSize) VALUES('$memberID', '$blogAuthor', '$blogCate', '$blogTitle', '$blogContents', '$blogLike', '$blogView', '$blogRegTime', '$blogDelete', '$blogImgName', '$blogImgSize')";
        }else {
            echo "<script>alert(지원하는 이미지 파일 형식이 아닙니다. jpg, gif, png 파일만 지원이 됩니다.); history.back(1);</script>";
        }
    } else {
        $sql = "INSERT INTO myBlogs(memberID, blogAuthor, blogCategory, blogTitle, blogContents, blogLike, blogView, blogRegTime, blogDelete, blogImgFile ) VALUES('$memberID', '$blogAuthor', '$blogCate', '$blogTitle', '$blogContents', '$blogLike', '$blogView', '$blogRegTime', '$blogDelete', 'default.svg')";
    }
    $result = $connect -> query($sql);
    $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);

    Header("Location: blog.php");
?>