<?php
include "cart_database.php"; // 데이터베이스 연결 포함

// 데이터베이스에서 제품 목록 가져오기
$sql = "SELECT * FROM products WHERE category = 'pants'";
$result = $conn->query($sql);
$items = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
} else {
    echo "No products found.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>Shop</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/shop.css" />

</head>
<body> 
    <header>
        <?php include "header.php";?>   
    </header>
    <nav>
        <h3>Shop</h3>
        <ul class="category-nav">
            <li><a href="shop_shirt.php">Shirt</a></li>
            <li><a href="shop_pants.php">Pants</a></li>
            <li><a href="shop_accessories.php">Acc</a></li>
        </ul>
    </nav>
    <section>
        <?php
            foreach ($items as $item) {
                echo '
                <div class="item">
                    <img src="' . $item['image'] . '" alt="' . $item['name'] . '">
                    <h4><a href="shop_item.php?id=' . urlencode($item['id']) . '">' . $item['name'] . '</a></h4>
                    <p>' . $item['price'] . '원</p>
                </div>';
            }
        ?>
    </section>
</body> 
</html>
