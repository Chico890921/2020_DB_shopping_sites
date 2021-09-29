<?php require 'header.php'; ?>
<?php
    session_start();
    unset($_SESSION['product'][$_REQUEST['id']]);
    echo '<p class = "move">所選商品已移出購物車。</p>';
    echo '<hr>';
    require 'cart.php';
?>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>