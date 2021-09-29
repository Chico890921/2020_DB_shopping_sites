<?php
    if (isset($_SESSION['customer'])) {
        echo '<table>';
        echo '<th>商品名稱</th><th>價格</th>';
        $pdo = new PDO('mysql:host=localhost; dbname=shopping_sites; charset=utf8', 'chico', 'password');
        $sql = $pdo->prepare( 'select * from favorite, product '. 'where customer_id=? and product_id=id');
        $sql->execute([$_SESSION['customer']['id']]);
        foreach ($sql->fetchAll() as $row) {
            $id = $row['id'];
            echo '<tr>';
            echo '<td><a href="detail.php?id='.$id.'">', $row['name'], '</a></td>';
            echo '<td>', $row['price'], '</td>';
            echo '<td class = "X"><a href="favorite_delete.php?id=', $id, '">X</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '請先登入，才能顯示我的最愛。';
    }
?>