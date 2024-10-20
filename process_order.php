<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "cart_database.php"; // 데이터베이스 연결 포함

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 사용자 정보 및 결제 정보 가져오기
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    
    // 주문 정보 저장 로직 추가 (예: 데이터베이스에 저장)
    // 결제 처리 로직 추가 (예: 결제 API 호출)
    
    // 주문이 완료되면 세션 카트를 비웁니다.
    unset($_SESSION['cart']);
    
    // 주문 완료 페이지로 리디렉션
    header('Location: order_confirmation.php');
    exit;
} else {
    // 잘못된 접근 시 처리
    echo "Invalid request.";
}
?>
