<?php require "header.php"; ?>
<?php
    session_start();
    if (isset($_SESSION['customer'])) {
        unset($_SESSION['customer']);
        echo '<p class = "logoutY">登出成功。</p>';
    } else {
        echo '<p class = "logoutY">您原本就已登出。</p>';
    }
?>
<?php require "menu_login.php"; ?>
<?php require "footer.php"; ?>