<?php require 'header.php'; ?>
<?php
    session_start();
    $pdo = new PDO('mysql:host=localhost; dbname=shopping_sites; charset=utf8', 'chico', 'password');
    if (isset($_SESSION['customer'])) {
        $id = $_SESSION['customer']['id'];
        $sql = $pdo->prepare('select * from customer where id!=? and login=?');
        $sql->execute([$id, $_REQUEST['login']]);
    } else {
        $sql=$pdo->prepare('select * from customer where login=?');
        $sql->execute([$_REQUEST['login']]);
    }
    if (empty($sql->fetchAll())) {
	    if (isset($_SESSION['customer'])) {
		    $sql = $pdo->prepare('update customer set name=?, phone=?, address=?, login=?,  password=? where id=?');
		    $sql->execute([
			    $_REQUEST['name'], $_REQUEST['phone'], $_REQUEST['address'], 
			    $_REQUEST['login'], $_REQUEST['password'], $id]);
		    $_SESSION['customer']=[
			    'id'=>$id, 'name'=>$_REQUEST['name'], 'phone'=>$_REQUEST['phone'],
			    'address'=>$_REQUEST['address'], 'login'=>$_REQUEST['login'], 
			    'password'=>$_REQUEST['password']];
		    echo '<p class = "customer_output">會員資料修改完成。</p>';
	    } else {
		    $sql = $pdo->prepare('insert into customer values(null,?,?,?,?,?)');
		    $sql->execute([
			    $_REQUEST['name'], $_REQUEST['phone'], $_REQUEST['address'], 
			    $_REQUEST['login'], $_REQUEST['password']]);
		    echo '<p class = "customer_output">會員資料新增完成。</p>';
	    }
    } else {
    	echo '<p class = "customer_output">登入ID已被使用，請重新設定。</p>';
    }
?>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>