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
               <div>
                    <a href="index.php" class="mt-3 mr-5">
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
                        <a href="cart.php"><i class="fas fa-cart-plus fa-lg"></i></a>
                        <div class="products-in-cart">
                            <!-- <img src="./img/null-cart.png" alt="photo"> -->
                            <ul class='products'>
                                <p>Sản phẩm mới thêm</p>
                                <li class='product'>
                                    <img width='40px' heigh='50px' src="https://cdn.tgdd.vn/Products/Images/42/226099/samsung-galaxy-z-fold-2-vang-dong-600x600.jpg" alt="pd1">
                                    <span class='name-phone'>Điện thoại Samsung Galaxy A02 </span> 
                                    <span class='price-phone'>₫ 10.000.000</span>
                                </li>
                                <li class='product'>
                                    <img width='40px' heigh='50px' src="https://cdn.tgdd.vn/Products/Images/42/226099/samsung-galaxy-z-fold-2-vang-dong-600x600.jpg" alt="pd1">
                                    <span class='name-phone'>Điện thoại Samsung Galaxy Z Fo</span> 
                                    <span class='price-phone'>₫ 8.000.000</span>
                                </li>
                                <li class='product'>
                                    <img width='40px' heigh='50px' src="https://cdn.tgdd.vn/Products/Images/42/226099/samsung-galaxy-z-fold-2-vang-dong-600x600.jpg" alt="pd1">
                                    <span class='name-phone'>Xiaomi Redmi Note 10 Pro MFF</span> 
                                    <span class='price-phone'>₫ 7.000.000</span>
                                </li>
                                <li class='product'>
                                   31 ki tu
                                </li>
                                <a href="cart.php" class='btn btn-danger'>Xem giỏ hàng</a>
                            </ul>
                            
                        </div>
                    </div>
                    <div class='in-out'>
                        <?php
                        session_start();
                        if(isset($_SESSION['ID'])){
                            echo "<div class='logged'>
                                         <i class='fas fa-user-circle' style='font-size:130%; color: #EEE'  ></i>
                                        <span class='name mr-2'>".$_SESSION['UserName']."</span>
                                        <div class='account'>
                                            <div><a href='#'>Tài khoản của tôi</a></div>
                                            <div><a href='#'>Đơn mua</a></div> 
                                            <div><a href='logout.php'>Đăng xuất</a></div> 
                                        </div>
                                </div>";
                        }else {
                            echo '<a href="login.php" class="signin">Đăng nhập</a>';
                        }
                        ?>
                    </div>
            </div>
        </div>