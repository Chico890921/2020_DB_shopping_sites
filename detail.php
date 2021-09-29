<?php require 'header.php'; ?>
<?php
    $pdo = new PDO('mysql:host=localhost; dbname=shopping_sites; charset=utf8', 'chico', 'password');
    $sql = $pdo->prepare('select * from product where id=?');
    $sql->execute([$_REQUEST['id']]);
    $pdo->query("SET NAMES utf8");
    foreach ($sql->fetchAll() as $row) {
        echo '<p><img src="image/switch.png" class = "switch"></p>';
        echo '<p><img src="image/', $row['id'], '.jpg" class = "picture"></p>';
        
        echo '<form action="cart_insert.php" method="post">';
        echo '<p class = "product_name">', $row['name'], '</p>';
        echo '<p class = "cost">NT$ ', $row['price'], '</p>';
        //select 是下拉式選單，跟input差不多功能，也可以傳入表單內
        // 所以這個表單接收到 count 值
        echo '<p class = "count">數量：<select name="count">';
        for ($i=1; $i<=10; $i++) {
            echo '<option value="', $i, '">', $i, '</option>';
        }
        echo '</select></p>';
        echo '<input type="hidden" name="id" value="', $row['id'], '">';
        echo '<input type="hidden" name="name" value="', $row['name'], '">';
        echo '<input type="hidden" name="price" value="', $row['price'], '">';
        echo '<input class = "cart_icon" type="image" src="image/cart.png" alt="Submit Form" value="放入購物車">';
        // 傳送 count, id, name, price 到 cart_insert.php
        echo '</form>';
        echo '<p><a href="favorite_insert.php?id=', $row['id'], '"><img src="image/love.png" class = "love"></a></p>';
        $str = $row['description'];
        // str_replace \r\n -> br
        // 商品描述我是寫在phpmyadmin的text標籤，裡面的空行是<\n>,<\t>呈現
        //html只接受<br>，所以用str_replace函式轉換
        echo '<p class = "content">', str_replace("\r\n", "<br>", "$str"), '</p>';        
    }
?>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>