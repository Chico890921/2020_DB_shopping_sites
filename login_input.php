<?php require 'header.php'; ?>
<form action = "login_output.php" method = "post" class = "login">
    <fieldset>
        <legend>登入</legend>
            <p><label class = "title">帳號</label>  
               <input type = "text" name = "login" required = "required"><br>
               <label class = "title">密碼</label>
               <input type = "password" name = "password" required = "required"><br><br></p>
    </fieldset>
    <input type = "submit" value = "登入" class = "login">
</form>
<a href="customer_input.php" class = "register">會員註冊</a>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>