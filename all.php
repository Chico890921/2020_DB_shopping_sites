<?php require 'header.php'; ?>
<table>
    <tr><th>商品編號</th><th>商品名稱</th><th>商品價格</th><th>商品描述</th></tr>
    <?php
        $pdo = new PDO('mysql:host=localhost; dbname=shopping_sites; charset=utf8', 'chico', 'password');
        foreach ($pdo->query('select * from product') as $row) {
            echo '<tr>';
            echo '<td>', htmlspecialchars($row['id']), '</td>';
            echo '<td>', htmlspecialchars($row['name']), '</td>';
            echo '<td>', htmlspecialchars($row['price']), '</td>';
            echo '<td>', htmlspecialchars($row['description']), '</td>';
            echo '</tr>';
            echo "\n";
        }
    ?>
</table>
<?php require 'footer.php'; ?>