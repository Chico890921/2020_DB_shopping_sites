<?php require 'header.php'; ?>
<?php
    session_start();
    $name = $phone = $address = $login = $password = '';
    if (isset($_SESSION['customer'])) {
        $name = $_SESSION['customer']['name'];
        $phone = $_SESSION['customer']['phone'];
	    $address = $_SESSION['customer']['address'];
        $login = $_SESSION['customer']['login'];
        $password = $_SESSION['customer']['password'];
    }
?>
<form action="customer_output.php" method="post">
    <fieldset class = "create">
        <legend>建立您的帳戶</legend>
            <p><label class = "title">姓名</label><br>
               <input type ="text" name = "name" required = "required"><br>
               <label class = "title">手機</label><br>
               <input type="test" name = "phone" required = "required"><br>
               <label class = "title">地址</label><br>
               <input type="test" name = "address" required = "required"><br>
               <label class = "title">帳號</label><br>
               <input type="text" name = "login" required = "required"><br>
               <label class = "title">密碼</label><br>
               <input type="password" name="password" required = "required"><br><br></p>
    </fieldset>
    <input type="submit" value="確定" class = "sure">
</form>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>