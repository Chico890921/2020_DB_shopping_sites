<?php
    if (!empty($_SESSION['product'])) {
        echo '<table>';
        echo '<th>商品名稱</th>';
        echo '<th>價格</th><th>數量</th><th>小計</th>';
        $total = 0;
        //從 product 資料表抓取 id 值，然後存進 $product
        foreach ($_SESSION['product'] as $id=>$product) {
            echo '<tr>';
            echo '<td><a href="detail.php?id=', $id, '">', $product['name'], '</a></td>';
            echo '<td>', $product['price'], '</td>';
            // 我 product 裡沒有count但依舊可以呼叫的原因是因為我
            // purchase_detail 有跟 product 做關聯
            echo '<td>', $product['count'], '</td>';
            $subtotal = $product['price'] * $product['count'];
            $total += $subtotal;
            echo '<td>', $subtotal, '</td>';
            // class 就只是幫標籤 < > 做分類而已
            echo '<td class = "X"><a href="cart_delete.php?id=', $id, '">X</a></td>';
            echo '</tr>';
        }
        echo '<tr><td>合計</td><td></td><td></td><td>', $total, '</td><td></td></tr>';
        echo '</table>';
        echo '<a href = "purchase_input.php" class = "checkout">結帳</a>';
    } else {
        echo '<p class = "nothing">購物車內無商品。</p>';
    }
?>