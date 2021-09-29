<?php require 'header.php'; ?>
<?php
    session_start();
    if (isset($_SESSION['customer'])) {
        $pdo = new PDO('mysql:host=localhost;dbname=shopping_sites;charset=utf8', 'chico', 'password');
        $sql = $pdo->prepare('insert into favorite values(?,?)');
        $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
        echo '<p class = "favorite_insert">商品加入我的最愛成功。</p>';
        echo '<hr>';
        require 'favorite.php';
    } else {
        echo '<p class = "favorite_insert2">請先登入，才能將商品加入我的最愛。</p>';
    }
?>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>