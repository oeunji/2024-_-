<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
?>	

<?php
if(!$userid) {
?>  
<!-- 주요 메뉴 -->
<div class="main">
    <ul class="listHeader">
        <!-- 로고를 포함하는 리스트. 로고를 클릭하면 메인 페이지로 이동 -->
        <li class="logo">
            <a href="index.php">
                <img src="images\mainPage\heart_y2k.png" alt="Logo" style="width: 100%; height: 32.5px; margin-left: 5%" />
            </a>
        </li>
    </ul>

    <!-- 내비게이션 메뉴 -->
    <ul class="list2">
        <li><a id="long" href="shop.php">Shop</a></li>
        <!-- 쇼핑 -->

        <li><a href="#" onclick="alert('로그인이 필요합니다.'); return false;">Community</a></li>
        <!-- 커뮤니티 -->

        <li><a href="#" onclick="alert('로그인이 필요합니다.'); return false;">Cart</a></li>
        <!-- 장바구니 -->

        <li><a href="login_form.php">Log In</a></li>
        <!-- 로그인 페이지 -->
    </ul>
</div>
<?php
} else {
?>
<div class="main">
    <ul class="listHeader">
        <!-- 로고를 포함하는 리스트. 로고를 클릭하면 메인 페이지로 이동 -->
        <li class="logo">
            <a href="index.php">
                <img src="images\mainPage\heart_y2k.png" alt="Logo" style="width: 100%; height: 32.5px; margin-left: 5%" />
            </a>
        </li>
    </ul>

    <!-- 내비게이션 메뉴 -->
    <ul class="list2">
        <li><a id="long" href="shop.php">Shop</a></li>
        <!-- 쇼핑 -->

        <li><a href="board_list.php">Community</a></li>
        <!-- 커뮤니티 -->

        <li><a href="cart.php">Cart</a></li>
        <!-- 장바구니 -->

        <li><a href="logout.php">Log Out</a></li>
        <!-- 로그아웃 -->
    </ul>
</div>
<?php
}
?>
