<?php 
session_start();
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    unset($_SESSION['ID']);
    unset($_SESSION['FullName']);
    unset($_SESSION['Phone']);
    unset($_SESSION['DiaChi']);
    unset($_SESSION['UserName']);
    header("location:index.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping every day.</title>

    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="./lib/bootstrap-3.3.7-dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../lib/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./css/mediaquery.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../lib/bootstrap-3.3.7-dist/js/jquery-360.min.js"></script>
    <script type="text/javascript" src="./js/allFun.js"></script>
</head>
<?php if(!isset($_SESSION['Cart'])) echo '<script>loadCart();</script>'; ?>
<body>
<div id="wrapper">
        <!-- HEADER-->
        <div id="header">
            <div class="new-navbar" id="myTopnav">
               <div id="logo">
                    <a href="index.php">
                        <img class="logo"
                            src="./img/logo.png"
                            alt="logo">
                    </a>
                </div>
                    <div class="search-navbar">
                    <form action="" method="POST" role="form" class='form-search'>
                        <input type="text" class='input-search' placeholder="Gõ tên sản phẩm cần tìm (VD: iPhone 12, Galaxy S21)" required minlength='1' maxlength='50'>
                        <button type="submit">
                            <i class='fa fa-search'></i>
                        </button>
                        </form>
                    </div>
                    <div class="cart">
                        <?php if(!isset($_SESSION['Cart']) || count($_SESSION['Cart']) == 0) echo '<a href="cart.php"><i style="font-size:19px; color: #ddd" class="fa fa-shopping-cart"></i></a>';
                        else echo '<a href="cart.php"><i style="font-size:19px; color: #ddd" class="fa fa-shopping-cart"></i><span class="cart-num">'.count($_SESSION['Cart']).'</span></a>' ;?>
                        <span class='triangle'></span>
                        <div class="products-in-cart">
                        <?php
                            if(!isset($_SESSION['Cart']) || count($_SESSION['Cart']) ==0) echo '<img class="null-cart" src="./img/null-cart.png" alt="photo">';
                            else{
                               echo "<ul class='products'>
                               <p>Sản phẩm mới thêm</p>" ;
                               $i=0;
                                foreach ($_SESSION['Cart'] as $product) {
                                echo '<li class="product">
                                    <img width="40px" heigh="50px" src="'.$product['HinhAnh'].'" alt="pd1">
                                    <span class="name-phone">'.substr($product['TenHH'],0,31).'... </span> 
                                    <span class="price-phone">₫ '.number_format((int)$product['Gia'],0,',','.').'</span>
                                    </li>';
                                    if($i==2) break;
                                    $i++;
                                }
                                if(count($_SESSION['Cart']) > 3) echo "<p>còn ".(count($_SESSION['Cart']) - 3 ) ." sản phẩm trong giỏ hàng</p>";
                                echo '<div class="view-cart"><a href="cart.php" class="btn btn-warning mt-3" >Xem giỏ hàng</a></div>
                                </ul>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class='in-out'>
                        <?php
                        if(isset($_SESSION['ID'])){
                            echo "<div class='logged'>
                                         <i class='fas fa-user' style='font-size:19px; color: #ddd'  ></i>
                                        <span class='name mr-2'>".$_SESSION['UserName']."</span>
                                        <span class='triangle'></span>
                                        <div class='account'>
                                            <div><a href='personal-info.php'>Tài khoản của tôi</a></div>
                                            <div><a href='bill-done.php'>Đơn mua</a></div> 
                                            <div><a href='header.php?action=logout'>Đăng xuất</a></div> 
                                        </div>
                                </div>";
                        }else {
                            echo '<a href="login.php" class="signin">Đăng nhập</a>';
                        }
                        ?>
                    </div>                                                
            </div>
        </div>