<?php require 'header.php'; ?>
<?php
    session_start();
    $id = $_REQUEST['id'];
    if (!isset($_SESSION['product'])) {
        $_SESSION['product']=[];
    }
    //先假設數量為0
    $count = 0;
    //若購物車存在相同商品，則取得原有數量
    if (isset($_SESSION['product'][$id])) {
        $count = $_SESSION['product'][$id]['count'];
    }
    // 將商品放入購物車
    $_SESSION['product'][$id]=[
        'name'=>$_REQUEST['name'], 
        'price'=>$_REQUEST['price'], 
        'count'=>$count + $_REQUEST['count']
    ];
    echo '<p class = "input">商品放入購物車成功。</p>';
    echo '<hr>';
    // require 跟 include 差不多的功能
    require 'cart.php';
?>
<?php require 'menu_login.php'; ?>
<?php require 'footer.php'; ?>