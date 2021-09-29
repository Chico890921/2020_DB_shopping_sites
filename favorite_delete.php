<?php require 'header.php'; ?>
<?php
    session_start();
    if (isset($_SESSION['customer'])) {
        $pdo = new PDO('mysql:host=localhost; dbname=shopping_sites; charset=utf8', 'chico', 'password');
        $sql = $pdo->prepare( 'delete from favorite where customer_id=? and product_id=?');
        $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
        echo '<p class = "delete">所選商品已從我的最愛移除。</p>';
        echo '<hr>';
    } else {
        echo '<p class = "delete">請先登入，才能從我的最愛移除商品。</p>';
    }
    require 'favorite.php';
?>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>