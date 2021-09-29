<?php require 'header.php'; ?>
<?php
    session_start();
    if (!isset($_SESSION['customer'])) {
        echo '<p class = "purchase_input">請先登入再開始結帳。</p>';
    } else 
    if (empty($_SESSION['product'])) {
        echo '購物車內無商品。';
    } else {
        echo '<p>姓名：', $_SESSION['customer']['name'], '</p>';
        echo '<p>地址：', $_SESSION['customer']['address'], '</p>';
        echo '<hr>';
        require 'cart.php';
        echo '<hr>';
        echo '<p class = "check">請確認內容無誤後，按下確定購買開始結帳。</p>';
        echo '<a href="purchase_output.php" class = "buy">確定購買</a>';
    }
?>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>