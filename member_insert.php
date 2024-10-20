<?php
    // 세션 시작
    session_start();

    // 폼 데이터 가져오기
    $id = $_POST['id'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); // 비밀번호 해시화
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    // 데이터베이스 연결
    $con = mysqli_connect("localhost", "root", "", "project");

    // 연결 오류 확인
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // 중복 아이디 검사
    $sql = "SELECT * FROM members WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('이미 사용 중인 아이디입니다.');
                history.back();
              </script>";
        exit();
    }

    // 회원 정보 삽입
    $sql = "INSERT INTO members (id, pass, email, phone, regist_day) 
            VALUES ('$id', '$pass', '$email', '$phone', '$regist_day')";

    if (mysqli_query($con, $sql)) {
        echo "<script>
                alert('회원가입이 완료되었습니다.');
                location.href = 'index.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // 연결 종료
    mysqli_close($con);
?>
