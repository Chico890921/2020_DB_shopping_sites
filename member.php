<?php require "header.php"; ?>
<?php session_start(); ?>
<h2>Welcome，
    <?php 
        echo $_SESSION['customer']['name'];
    ?>
</h2>
<a href = "logout_input.php" class = "logout">登出</a>
<p class = "title1">購物車</p>
<?php require "cart.php"; ?>
<p class = "title2">我的最愛</p>
<?php require "favorite.php"; ?>
<p class = "title3">歷史購買清單</p>
<?php require "history.php"; ?>
<?php require "menu_login.php"; ?>
<?php require "footer.php"; ?>