<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="./css/member.css">

    <script>
        // 입력 필드 검증 함수
        function check_input() {
            if (!document.member_form.id.value) {
                alert("아이디를 입력하세요!");    // 아이디 입력 경고
                document.member_form.id.focus();   // 아이디 입력 필드에 포커스
                return;
            }

            if (!document.member_form.pass.value) {
                alert("비밀번호를 입력하세요!");   // 비밀번호 입력 경고
                document.member_form.pass.focus();  // 비밀번호 입력 필드에 포커스
                return;
            }

            if (!document.member_form.pass_confirm.value) {
                alert("비밀번호 확인을 입력하세요!");  // 비밀번호 확인 입력 경고
                document.member_form.pass_confirm.focus();  // 비밀번호 확인 입력 필드에 포커스
                return;
            }

            if (!document.member_form.email.value) {
                alert("이메일 주소를 입력하세요!");  // 이메일 첫 번째 부분 입력 경고
                document.member_form.email.focus();  // 이메일 첫 번째 부분 입력 필드에 포커스
                return;
            }

            // 비밀번호 일치 여부 확인
            if (document.member_form.pass.value != document.member_form.pass_confirm.value) {
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");  // 비밀번호 불일치 경고
                document.member_form.pass.focus();  // 비밀번호 입력 필드에 포커스
                document.member_form.pass.select();  // 비밀번호 입력 필드 내용 선택
                return;
            }

            // 폼 제출
            document.member_form.submit();
        }

        // 폼 초기화 함수
        function reset_form() {
            document.member_form.id.value = "";  
            document.member_form.pass.value = "";
            document.member_form.pass_confirm.value = "";
            document.member_form.email.value = "";
            document.member_form.phone.value = "";
            document.member_form.id.focus();  // 아이디 입력 필드에 포커스
            return;
        }

        // 아이디 중복 확인 함수
        function check_id() {
            window.open("member_check_id.php?id=" + document.member_form.id.value,
                "IDcheck",
                "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
        }
    </script>
</head>

<body> 
    <header>
        <?php include "header1.php";?>
    </header>
    
    <section>
        <!-- 회원가입 양식을 제출하는 폼 -->
        <form name="member_form" method="post" action="member_insert.php">
            <div class="login-box">
                <h1>Sign Up</h1>

                <div class="textbox">
                    <input type="text" placeholder="ID" id="id" name="id" value="" required />
                    <button type="button" class="styled-button" id="check-username" onclick="check_id()">
                        Check
                    </button>
                </div>

                <div class="clear"></div>

                <div class="textbox">
                    <input
                        type="password"
                        placeholder="Password"
                        id="pass"
                        name="pass"
                        value=""
                        maxlength="15"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="비밀번호에는 숫자 1개 이상, 대문자 및 소문자 1개 이상, 문자 8자 이상이 포함되어야 합니다."
                        required
                    />
                </div>

                <div class="clear"></div>

                <div class="textbox">
                    <input
                        type="password"
                        placeholder="Confirm Password"
                        id="pass_confirm"
                        name="pass_confirm"
                        value=""
                        maxlength="15"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="비밀번호에는 숫자 1개 이상, 대문자 및 소문자 1개 이상, 문자 8자 이상이 포함되어야 합니다."
                        required
                    />
                </div>
                <div class="clear"></div>

                <div class="textbox">
                    <input
                        type="text"
                        placeholder="Email"
                        id="email"
                        name="email"
                        value=""
                        required
                        pattern="[a-z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-z0-9-]+\.[a-z]{2,4}"
                        title="올바르지 않은 이메일 형식입니다."
                    />
                </div>
                <div class="clear"></div>

                <div class="textbox">
                    <input
                        type="text"
                        placeholder="Phone"
                        id="phone"
                        name="phone"
                        value=""
                        required
                        onkeypress="return /[0-9]/i.test(event.key)"
                        maxlength="15"
                        pattern="([0-9]){10,}"
                    />
                </div>
                <input class="btn" type="button" name="" value="Sign Up" onclick="check_input()" />
                <br /><br />
                <div style="text-align: center">
                    <a class="signup-link" href="login_form.php">Already have an account ?</a>
                </div>
            </div>
        </form>
    </section> 
</body>
</html>
