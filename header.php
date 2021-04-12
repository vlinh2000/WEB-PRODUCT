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
                        <input type="text" placeholder="Gõ tên sản phẩm cần tìm (VD: iPhone 12, Galaxy S21)" required minlength='1' maxlength='50'>
                        <button type="submit">
                            <i class='fa fa-search'></i>
                        </button>
                        </form>
                    </div>
               
                
                    <div class="cart">
                        <a href="cart.php"><i class="fas fa-cart-plus fa-lg"></i></a>
                        <div class="products-in-cart">
                            <ul>
                                <li>
                                    aa
                                </li>
                                <li>
                                    aa
                                </li>
                                <li>
                                    aa
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class='in-out'>
                        <?php
                        session_start();
                        if(isset($_SESSION['ID'])){
                            echo "<div class='logged'>
                                        <span class='name'>".$_SESSION['FullName']."</span>
                                        <a class='signout' href='logout.php'><i class='fas fa-sign-out-alt'></i></a>
                                </div>";
                        }else {
                            echo '<a href="login.php" class="signin">Đăng nhập</a>';
                        }
                        ?>
                    </div>
                <a href="javascript:void(0);" class="icon" onclick="navResponsive()">
                    <i class="fa fa-bars"></i>
                </a>
                    
            </div>
        </div>