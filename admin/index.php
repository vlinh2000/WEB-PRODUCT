<?php
session_start();
//CHECK LOGIN
if(!isset($_SESSION['IdAdmin'])) header("location:login.php");
//LOG OUT
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    unset($_SESSION['IdAdmin']);
    unset($_SESSION['HoTenNV']);
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
    <!-- <link rel="stylesheet" href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../lib/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/media.css">
    <script src="../lib/bootstrap-3.3.7-dist/js/jquery-360.min.js"></script>
    <script type="text/javascript" src="./js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="wrapper">
        <!-- HEADER-->
        <div id="header">
            <div class="navbar" id="myTopnav">
                <div id="nav">
                    <li>
                        <a href="/SHOPPINGWEB/admin/">ADMIN</a>
                    </li>
                    <li id="control" onclick= 'onOffSidebar()'>
                        <i class="fa fa-bars icon" ></i>
                    </li>
                </div>
                <div id="navRight">
                    <li>
                        <form action="" method="POST" class="form-inline" role="form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Search ">
                            </div>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </li>
                    <li class='user-info'>
                        <i class="fa fa-user iconUser" onclick="viewInfo()"></i>
                        <div class='info-admin'>       
                            <?php if($_SESSION['IdAdmin'] == 'NV15806194') echo '<div><img src="../img/avtAdminroot.jpg" alt="avt"><span>'.$_SESSION['HoTenNV'].'</span></div>'; 
                            else  echo '<div><img src="../img/avtAdminDefault.png" alt="avt"><span>'.$_SESSION['HoTenNV'].'</span></div>';
                             ?>
                            <a href='index.php?action=logout'>Đăng xuất</a>    
                            <div class="triangle"></div>
                        </div>
                    </li>
                </div>
            </div>
        </div>
        <div class="container-fluid section">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2  p-left-0">
                    <div class="sidebar" id='sidebar'>
                        <ul class="core">
                            <p>CORE</p>
                            <li class="<?php if($_GET['page'] == 'dashboard.php') echo 'active'; else if(!$_GET['page']) echo 'active';?>">
                                <a href="?page=dashboard.php">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span>Dash board</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu">
                            <p>MENU</p>
                            <li class="<?php if($_GET['page'] == 'employee-manager.php') echo 'active'; else echo ' '; ?>">
                                <a href="?page=employee-manager.php">
                                    <i class="fa fa-user"></i>
                                    <span>Quản lí nhân viên</span>
                                </a>
                            </li>
                            <li class="<?php if($_GET['page'] == 'customer-manager.php') echo 'active'; else echo ' ';?>"'>
                                <a href="?page=customer-manager.php">
                                    <i class="fas fa-list-alt"></i>
                                    <span>Quản lí khách hàng</span>
                                </a>
                            </li>
                            <li class="<?php if($_GET['page'] == 'goods-manager.php') echo 'active'; else echo ' ';?>"'>
                                <a href="?page=goods-manager.php">
                                    <i class="fas fa-gift"></i>
                                    <span>Quản lí hàng hóa</span>
                                </a>
                            </li>
                            <li class="<?php if($_GET['page'] == 'goods-type-manager.php') echo 'active'; else echo ' ';?>"'>
                                <a href="?page=goods-type-manager.php">
                                    <i class="fas fa-receipt"></i>
                                    <span>Quản lí loại hàng hóa</span>
                                </a>
                            </li>
                            <li class="<?php if($_GET['page'] == 'order-manager.php') echo 'active'; else echo ' ';?>"'>
                                <a href="?page=order-manager.php">
                                <i class="fas fa-file-invoice-dollar"></i>
                                    <span>Quản lí đặt hàng</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10" id='main-board'>
                    <div class="main">
                        <?php
                         if(isset($_GET['page'])){
                            include($_GET['page']);
                         }else include 'dashboard.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->

    <!-- <script src="../lib/bootstrap-3.3.7-dist/js/jquery-360.min.js"> </script>
   
    <script src="../lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="../lib/fontawesome-free-5.15.3-web/js/all.min.js"></script>
    <script src="../lib/bootstrap-3.3.7-dist/js/jquery-360.min.js"></script>
    

</body>

</html>