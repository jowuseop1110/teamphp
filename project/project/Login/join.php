<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>

    <?php
        include "../include/style.php";
    ?>
    
</head>
<body>
    <div id="wrap">
        <?php
            include "../include/header.php";
        ?>
        <!--//header-->

        <main id="contents">
            <h2 class="ir_so">컨텐츠 영역</h2>
            <section class="join_type">
                <div class="member_form1">
                    <h3>환영합니다!</h3>

                    <form action="joinSave.php" name="join" method="post">
                        <fieldset>
                            <legend class="ir_so">회원가입 입력폼</legend>
                            <div class="join-box1">
                                <div class="overlap">
                                    <label for="youEmail">이메일</label>
                                    <input type="email" id="youEmail" name="youEmail" placeholder="Sample@naver.com" autocomplete="off" autofocus required>
                                    <!-- <a href="#c" class="test" onclick="emailChecking()">중복검사</a>
                                    <p class="comment" id="youEmailComment"></p> -->
                                </div>
                                <div class="overlap">
                                    <label for="youNickName">닉네임</label>
                                    <input type="text" id="youNickName" name="youNickName" placeholder="닉네임을 적어주세요!">
                                    <!-- <a href="#c" class="test" onclick="nickChecking()">중복검사</a>
                                    <p class="comment" id="youNickNameComment"></p> -->
                                </div>  
                                <div>
                                    <label for="youPass">비밀번호</label>
                                    <input type="password" id="youPass" name="youPass" maxlength="20"placeholder="비밀번호를 입력해주세요" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youPassC">비밀번호 확인</label>
                                    <input type="password" id="youPassC" name="youPassC" maxlength="20"placeholder="" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youBirth">생년월일</label>
                                    <input type="text" id="youBirth" name="youBirth" maxlength="12" placeholder="YYYY-MM-DD" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youPhone">휴대폰번호</label>
                                    <input type="text" id="youPhone" name="youPhone" maxlength="15" placeholder="000-0000-0000" autocomplete="off" required>
                                </div>
                            </div>
                            <button id="joinBtn" class="join-submit" type="submit">회원가입</button>
                        </fieldset>
                    </form>

                </div>

            </section>
        </main>
        <!-- main -->
    </div>

    <script>
        let emailCheck = false;
        let nickCheck = false;
        function emailChecking(){
            let youEmail = $("#youEmail").val();
           
            if(youEmail == null || youEmail ==''){
                $("#youEmailComment").text("이메일을 입력해주세요")
            } else {
                $.ajax({
                type : "POST",
                url : "joinCheck.php",
                data : {"youEmail": youEmail, "type": "emailCheck"},
                dataType : "json",
                success : function(data){
                    if(data.result == "good"){
                        $("#youEmailComment").text("사용 가능한 이메일입니다.");
                        emailCheck = true;
                    } else {
                        $("#youEmailComment").text("이미 존재하는 이메일입니다. 로그인을 해주세요!");
                        emailCheck = false;
                    }
                },
                error : function(request, status, error){
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                }
            });
            }
        }
        function nickChecking(){
            let youNickName = $("#youNickName").val();
           
            if(youNickName == null || youNickName ==''){
                $("#youNickNameComment").text("닉네임을 입력해주세요");
            } else {
                $.ajax({
                type : "POST",
                url : "joinCheck.php",
                data : {"youNickName": youNickName, "type": "nickCheck"},
                dataType : "json",
                success : function(data){
                    if(data.result == "good"){
                        $("#youNickNameComment").text("사용 가능한 닉네임입니다.");
                        nickCheck = true;
                    } else {
                        $("#youNickNameComment").text("이미 존재하는 닉네임입니다. 변경해주세요!");
                        nickCheck = false;
                    }
                },
                error : function(request, status, error){
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                    }
                });
            }
        }

        function joinChecks(){
            //개인정보 동의 체크 확인
            let joinCheck = $("#joinCheck").is(":checked");
            if(joinCheck == false){
                alert("개인 정보 수집 및 동의를 체크해 주세요");
                return false;
            }

            //이메일 공백 검사
            if($("#youEmail").val()==""){
                $("#youEmailComment").text("이메일을 입력해주세요");
                return false;
            }

            //이메일 유효성 검사
            let getMail = RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/);
            if(!getMail.test($("#youEmail").val())){
                $("#youEmailComment").text("이메일 형식에 맞게 작성해주세요!");
                $("#youEmail").val("");
                return false;
            }
            
            //이메일 중복 검사
            if(emailCheck == false){
                $("#youEmailComment").text("이메일 중복 검사를 확인해주세요");
                return false;
            }
             //닉네임 공백 검사
             if($("#youNickName").val() == ""){
                $("#youNickNameComment").text("닉네임을 입력해주세요!");
                return false;
            }
            
            //닉네임 유효성 검사
            let getNick = RegExp(/^[ㄱ-ㅎ|가-힣|0-9]+$/);
            if(!getNick.test($("#youNickName").val())){    
                $("#youNickNameComment").text("닉네임은 한글 숫자만 사용할 수 있습니다.");
                $("#youNickName").val("");     
                return false;
            }

            //닉네임 중복 검사
            if(nickCheck == false){
                $("#youNickNameComment").text("닉네임 중복 검사를 확인해주세요!");
                return false;
            }

             //비밀번호 공백 검사
             if($("#youPass").val() == ""){
                $("#youPassComment").text("비밀번호를 입력해주세요!");
                return false;
            }

            //비밀번호 유효성 검사 
            let getPass = $("#youPass").val();
            let getPassNum = getPass.search(/[0-9]/g);
            let getPassEng = getPass.search(/[a-z]/ig);
            let getPassSpe = getPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
            if(getPass.length < 8 || getPass.length > 20){
                $("#youPassComment").text("8자리 ~ 20자리 이내로 입력해주세요.");
                return false;
            } else if (getPass.search(/\s/) != -1){
                $("#youPassComment").text("비밀번호는 공백 없이 입력해주세요.");
                return false;
            } else if(getPassNum < 0 || getPassEng < 0 || getPassSpe < 0 ){
                $("#youPassComment").text("영문,숫자, 특수문자를 혼합하여 입력해주세요.");
                return false;
            }

            //확인 비밀번호 공백 확인
            if($("#youPassC").val() == ""){
                $("#youPassCComment").text("확인 비밀번호를 입력해주세요!");
                return false;
            }

            //비밀번호가 동일한지 체크
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassCComment").text("비밀번호가 동일하지 않습니다");
            }

            //이름 공백 확인
            if($("#youName").val() == ""){
                $("#youNameComment").text("이름을 입력해주세요");
                return false;
            }

            //이름 유효성 검사
            let getName = RegExp(/^[ㄱ-ㅎ|가-힣|0-9]+$/);
            if(!getName.test($("#youName").val())){    
                $("#youNameComment").text("이름은 한글로만 입력해주세요.");
                $("#youName").val("");     
                return false;
            }

            //생년월일 공백 확인
            if($("#youBirth").val() == ""){
                $("#youBirthComment").text("생년월일을 입력해주세요!");
                return false;
            }

            //생년월일 유효성 검사
            let getBirth = RegExp(/^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/);
            if(!getBirth.test($("#youBirth").val())){    
                $("#youBirthComment").text("생년월일이 정확하지 않습니다. 올바른 생년월일(YYYY-MM-DD)을 적어주세요!");
                $("#youBirth").val("");     
                return false;
            }

            //휴대폰 번호 공백 확인
            if($("#youPhone").val() == ""){
                $("#youPhoneComment").text("휴대폰 번호를 입력해주세요!");
                return false;
            }

            //휴대폰 번호 유효성 검사
            let getPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
            if(!getPhone.test($("#youPhone").val())){    
                $("#youPhoneComment").text("휴대폰 번호가 올바르지 않습니다. 올바른 휴대폰번호(000-0000-0000)을 입력해주세요!");
                $("#youPhone").val("");     
                return false;
            }
        }
    </script>
</body>
</html>