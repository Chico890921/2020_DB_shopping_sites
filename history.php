<?php
    if (isset($_SESSION['customer'])) {
        $pdo = new PDO('mysql:host=localhost; dbname=shopping_sites; charset=utf8', 'chico', 'password');
        $sql_purchase = $pdo->prepare('select * from purchase where customer_id=? order by id desc');
        $sql_purchase->execute([$_SESSION['customer']['id']]);
        foreach ($sql_purchase->fetchAll() as $row_purchase) {
            $sql_detail = $pdo->prepare('select * from purchase_detail,product '.'where purchase_id=? and product_id=id'); 
            $sql_detail->execute([$row_purchase['id']]);
            echo '<table>';
            echo '<tr><th>訂單編號</th><th>商品名稱</th><th>價格</th><th>數量</th><th>小計</th></tr>';
            $total = 0;

            date_default_timezone_set('Asia/Taipei');
            foreach ($sql_detail->fetchAll() as $row_detail) {
                echo '<tr>';
                //echo '<td>', $row_detail['date'],'</td>';
                echo '<td>', $row_purchase['id'],'</td>';
                echo '<td><a href="detail.php?id=', $row_detail['id'], '">', $row_detail['name'], '</a></td>';
                echo '<td>', $row_detail['price'], '</td>';
                echo '<td>', $row_detail['count'], '</td>';
                $subtotal=$row_detail['price']*$row_detail['count'];
                $total+=$subtotal;
                echo '<td>', $subtotal, '</td>';
                echo '</tr>';
            }
            echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total, '</td></tr>';
            echo '</table>';
            echo '<hr>';
        }
    } else {
        echo '請先登入，才能查詢購買記錄。';
    }
?>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>
