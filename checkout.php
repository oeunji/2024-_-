<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "cart_database.php"; // 데이터베이스 연결 포함

// 카트에서 제품 정보 가져오기
$cart_items = [];
$total_price = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $product['quantity'] = $quantity;
            $cart_items[] = $product;
            $total_price += $product['price'] * $quantity;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>Checkout</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/checkout.css" />
</head>
<body> 
    <header>
        <?php include "header.php"; ?>   
    </header>
    
    <section>
        <h2>Checkout</h2>
        <table>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php foreach ($cart_items as $item) { ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['price']; ?>원</td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['price'] * $item['quantity']; ?>원</td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="3">Total Price</td>
                <td><?php echo $total_price; ?>원</td>
            </tr>
        </table>
        
        <form action="process_order.php" method="post">
            <h3>Shipping Information</h3>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required><br>
            
            <h3>Payment Information</h3>
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" required><br>
            
            <label for="expiry_date">Expiry Date:</label>
            <input type="text" id="expiry_date" name="expiry_date" required><br>
            
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required><br>
            
            <button type="submit">Place Order</button>
        </form>
    </section>
</body> 
</html>
