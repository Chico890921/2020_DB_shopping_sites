<?php require 'header.php'; ?>
<?php
   session_start();
   $pdo = new PDO('mysql:host=localhost; dbname=shopping_sites; charset=utf8', 'chico', 'password');
   if (isset($_REQUEST['keyword'])) {
	   $sql = $pdo->prepare('select * from product where name like ?');
	   $sql->execute(['%'.$_REQUEST['keyword'].'%']);
   } else {
	   $sql = $pdo->prepare('select * from product');
	   $sql->execute([]);
   }
   foreach ($sql->fetchAll() as $row) {
	   $id = $row['id'];
      echo '<div class = "image">';
      echo '<a href="detail.php?id=', $id, '">';
      echo '<img src="image/', $row['id'], '.jpg" class = "product_picture">';
      echo '</a>';
      echo '<div class = "name">';
      echo '<p>',$row['name'],'</p>';
      echo '</div>';
      echo '</div>';

   }
?>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>