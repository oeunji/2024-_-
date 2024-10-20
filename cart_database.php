<?php
$servername = "localhost";
$username = "root"; // 또는 데이터베이스 사용자명
$password = ""; // 또는 데이터베이스 비밀번호
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
