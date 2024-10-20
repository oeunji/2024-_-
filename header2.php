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
<div class="main">
    <ul class="listHeader">
        <li class="logo">
            <a href="index.php">
                <img src="images\mainPage\heart_y2k.png" alt="Logo" style="width: 100%; height: 32.5px; margin-left: 5%" />
            </a>
        </li>
    </ul>

    <ul class="list2">
        <li><a id="long" href="shop.php">Shop</a></li>
        <li><a href="#" onclick="alert('로그인이 필요합니다.'); return false;">Community</a></li>
        <li><a href="#" onclick="alert('로그인이 필요합니다.'); return false;">Cart</a></li>
        <li><a href="member_form.php">Sign up</a></li>
    </ul>
</div>
<?php
} else {
?>
<div class="main">
    <ul class="listHeader">
        <li class="logo">
            <a href="index.php">
                <img src="images\mainPage\heart_y2k.png" alt="Logo" style="width: 100%; height: 32.5px; margin-left: 5%" />
            </a>
        </li>
    </ul>

    <ul class="list2">
        <li><a id="long" href="shop.php">Shop</a></li>
        <li><a href="board_list.php">Community</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="logout.php">Log out</a></li>
    </ul>
</div>
<?php
}
?>
