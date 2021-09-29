<?php require 'header.php'; ?>
<table>
    <tr><th>商品編號</th><th>商品名稱</th><th>商品價格</th><th>商品描述</th></tr>
    <?php
        $pdo = new PDO('mysql:host=localhost; dbname=shopping_sites; charset=utf8', 'chico', 'password');
        if (isset($_REQUEST['command'])) {
            switch ($_REQUEST['command']) {
                case 'insert':
                    if (empty($_REQUEST['name']) || !preg_match('/[0-9]+/', $_REQUEST['price']) || empty($_REQUEST['description'])) {
                        break;
                    } 
                    $sql = $pdo->prepare('insert into product values(NULL, ?, ?, ?)');
                    $sql->execute([htmlspecialchars($_REQUEST['name']), $_REQUEST['price'], $_REQUEST['description']]);
                    break;
                case 'update':
                    if (empty($_REQUEST['name']) || !preg_match('/[0-9]+/', $_REQUEST['price']) || empty($_REQUEST['description'])) {
                        break;
                    }
                    $sql = $pdo->prepare('update product set name=?, price=?, description=? where id=?');
                    $sql->execute([htmlspecialchars($_REQUEST['name']), $_REQUEST['price'], htmlspecialchars($_REQUEST['description']), $_REQUEST['id']]);
                    break;
                case 'delete' :
                    $sql = $pdo->prepare('delete from product where id=?');
                    $sql->execute([$_REQUEST['id']]);
                    break;
            }
        }
        foreach ($pdo->query('select * from product') as $row) {
            echo '<tr>';
            echo '<form action = "edit.php" method = "post">';
            echo '<input type = "hidden" name = "command" value = "update">';
            echo '<input type = "hidden" name = "id" value ="', $row['id'], '">';
            echo '<td>', $row['id'], '</td>';
            echo '<td><input type = "text" name = "name" value ="', $row['name'], '"></td>';
            echo '<td><input type = "text" name = "price" value ="', $row['price'], '"></td>';
            echo '<td><input type = "text" name = "description" value = "', $row['description'], '" size = "140"></textarea></td>';
            echo '<td><input type = "submit" value = "確定修改"></td>';
            echo '</form>';
            echo '<form action = "edit.php" method = "post">';
            echo '<input type = "hidden" name = "command" value = "delete">';
            echo '<input type = "hidden" name = "id" value =', $row['id'], '">';
            echo '<td><input type = "submit" value = "確定刪除"></td>';
            echo '</form>';
            echo '</tr>';
            echo "\n";
        }
    ?>
    <tr>
        <form action = "edit.php" method = "post">
            <input type = "hidden" name = "command" value = "insert">
            <td></td>
            <td><input type = "text" name = "name"></td>
            <td><input type = "text" name = "price"></td>
            <td><textarea name = "description" cols = "130"></textarea></td>
            <td><input type = "submit" value = "確定新增"></td>
        </from>
    </tr>
</table>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>