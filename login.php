<?php
    // 세션 시작
    session_start();

    // 폼 데이터 가져오기
    $id   = $_POST["id"];
    $pass = $_POST["pass"];

    // 데이터베이스 연결
    $con = mysqli_connect("localhost", "root", "", "project");

    // 연결 오류 확인
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // 사용자 조회
    $sql = "SELECT * FROM members WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    $num_match = mysqli_num_rows($result);

    if(!$num_match) 
    {
        echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
        ");
    }
    else
    {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];

        // 비밀번호 검증
        if (!password_verify($pass, $db_pass)) {
            echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
            ");
            exit;
        }
        else
        {
            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["id"];  // 아이디를 사용자 이름으로 사용

            echo("
              <script>
                location.href = 'index.php';
              </script>
            ");
        }
     }

    // 연결 종료
    mysqli_close($con);
?>
