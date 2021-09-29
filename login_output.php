<?php require 'header.php'; ?>
<?php
    session_start();
    unset($_SESSION['customer']);
    $pdo = new PDO('mysql:host=localhost; dbname=shopping_sites; charset=utf8','chico', 'password');
    $sql = $pdo->prepare('select * from customer where login=? and password=?');
    $sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
    foreach ($sql->fetchAll() as $row) {
	    $_SESSION['customer']=[
		    'id'=>$row['id'], 'name'=>$row['name'], 
            'phone'=>$row['phone'], 'address'=>$row['address'], 
            'login'=>$row['login'], 'password'=>$row['password']];
    }
    if (isset($_SESSION['customer'])) {
        echo '<p class = "welcome">',$_SESSION['customer']['name'], '、歡迎光臨。</p>';
    } else {
	    echo '<p class = "wrong">登入ID或密碼有誤。</p>';
    }
?>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>