<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "cart_database.php"; // 데이터베이스 연결 포함

// 데이터베이스에서 제품 세부 정보 가져오기
if (isset($_GET['id'])) {
    $item_id = intval($_GET['id']);
    $sql = "SELECT * FROM products WHERE id = $item_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $item = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "No product ID provided.";
    exit;
}

$userid = isset($_SESSION["userid"]) ? $_SESSION["userid"] : "";
?>

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title><?php echo $item['name']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/shopItem.css" />

</head>
<body> 
    <header>
        <?php include "header.php";?>   
    </header>
    
    <section>
        <div class="item-detail">
            <h3><?php echo $item['name']; ?></h3>
            <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
            <p>Price: <?php echo $item['price']; ?>원</p>
            <div class="action-buttons">
                <form id="cart-form" action="cart.php" method="post" onsubmit="return checkLogin()">
                    <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                    <button type="submit" name="action" value="add_to_cart">Cart</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        function checkLogin() {
            var loggedIn = <?php echo json_encode($userid !== ""); ?>;
            if (!loggedIn) {
                alert('로그인이 필요합니다.');
                return false;
            }
            return true;
        }
    </script>
</body> 
</html>
