<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping every day.</title>

    <!-- Optional theme -->
    <link rel="stylesheet" href="./lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./lib/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./css/mediaquery.css">
</head>

<body>
<div id="wrapper">
        <!-- HEADER-->
        <div id="header">
            <div class="navbar" id="myTopnav">
               <div id="nav">
                    <a href="index.php" class="mt-3 mr-5">
                        <img class="logo"
                            src="https://png.pngtree.com/template/20190422/ourlarge/pngtree-phone-store-logo-design-image_145177.jpg"
                            alt="logo">
                    </a>

                    <li>
                        <a href="index.php">
                            <i class="fas fa-home"></i>
                            <span class="ml-2"> Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">Sản phẩm</a>
                    </li>
                    <li>
                        <a href="#">Tồn kho</a>
                    </li>
                </div>

                <div id="right-menu">
                    <div class="cart">
                        <a href="cart.php"><i class="fas fa-cart-plus fa-lg"></i>
                            <span>Giỏ hàng</span></a>
                    </div>
                    <?php
                    session_start();
                       if(isset($_SESSION['ID'])){
                        echo "<div class='logged'>
                                    <span class='name'>".$_SESSION['FullName']."</span>
                                    <a class='signout' href='logout.php'><i class='fas fa-sign-out-alt'></i></a>
                             </div>";
                       }else {
                           echo '<a href="login.php" class="signin">Sign in <i class="fas fa-sign-in-alt"></i></a>';
                       }
                    ?>
                    </div>
                <a href="javascript:void(0);" class="icon" onclick="navResponsive()">
                    <i class="fa fa-bars"></i>
                </a>
                    
            </div>
        </div>