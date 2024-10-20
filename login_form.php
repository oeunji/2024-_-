<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>Log in</title>
<link rel="stylesheet" type="text/css" href="css/member.css">

<script type="text/javascript" src="./js/login.js"></script>
</head>
<body> 
    <header>
        <?php include "header2.php";?>
    </header>

    <!-- 폼 태그로 로그인 데이터를 전송합니다. -->
    <form name="login_form" method="post" action="login.php" onsubmit="return check_input()">
            <!-- 로그인 박스 -->
            <div class="login-box">
                <!-- 로그인 제목 -->
                <h1>Log in</h1>

                <div class="textbox">
                    <input type="text" placeholder="ID" name="id" value="" required />
                </div>

                <div class="textbox">
                    <input type="password" placeholder="PASSWORD" name="pass" value="" maxlength="15" required />
                </div>

                <input class="btn" type="submit" name="submit" value="Log In" />
                <br />
                <br />
                <div style="text-align: center">
                    <a class="signup-link" href="member_form.php">Create An Account ?</a>
                </div>
            </div>
        </form>

</body>
</html>
