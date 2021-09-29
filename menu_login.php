<?php 
    if (isset($_SESSION['customer'])) {
        echo '<a href = "member.php">';
        echo '<p><img src="image/member.png" class = "menu_member">';
        echo '</a>';
    } else {
        echo '<a href = "login_input.php">';
        echo '<img src="image/member.png" class = "menu_member">';
        echo '</a>';
    }
?>
<a href = "cart_show.php">
    <img src = "image/cart.png" class = "menu_cart">
</a>
