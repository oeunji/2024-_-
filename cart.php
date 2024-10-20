<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "cart_database.php"; // 데이터베이스 연결 포함

// 카트에 항목 추가
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add_to_cart') {
    $product_id = intval($_POST['product_id']);
    
    // 카트가 세션에 없으면 초기화
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // 카트에 제품 추가
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}

// 카트에서 제품 정보 가져오기
$cart_items = [];
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $product['quantity'] = $quantity;
            $cart_items[] = $product;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>Cart</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/cart.css" />

</head>
<body> 
    <header>
        <?php include "header.php";?>   
    </header>
    
    <section>

        <h2>Cart</h2>
        <table>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php foreach ($cart_items as $item) { ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['price']; ?>원</td>
                <td><?php echo $item['quantity']; ?></td>
                <td>
                    <form action="remove_from_cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                        <button type="submit">Remove</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
        <div class="checkout-container">
            <a href="checkout.php" class="checkout-button">Proceed to Checkout</a>
        </div>
    </section>
</body> 
</html>
