<?php require 'header.php'; ?>
<?php
    session_start();
    $pdo = new PDO('mysql:host=localhost; dbname=shopping_sites; charset=utf8', 'chico', 'password');
    $purchase_id=1;
    foreach ($pdo->query('select max(id) from purchase') as $row) {
	    $purchase_id = $row['max(id)'] + 1;
    }
    $sql = $pdo->prepare('insert into purchase values(?,?)');
    if ($sql->execute([$purchase_id, $_SESSION['customer']['id']])) {
        foreach ($_SESSION['product'] as $product_id=>$product) {
            $sql = $pdo->prepare('insert into purchase_detail values(?,?,?)');
            $sql->execute([$purchase_id, $product_id, $product['count']]);
        }
        unset($_SESSION['product']);
        echo '<p class = "finish">已完成訂購，謝謝您的惠顧。</p>';
    } else {
        echo '<p class = "finish">很抱歉，結帳過程發生錯誤，無法完成訂購。</p>';
    }
?>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>