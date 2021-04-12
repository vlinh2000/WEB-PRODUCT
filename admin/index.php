<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping every day.</title>

    <!-- Optional theme -->
    <link rel="stylesheet" href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/media.css">
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
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </li>
                    <li>
                        <i class="fa fa-user iconUser"></i>
                    </li>
                </div>
            </div>
        </div>
        <div class="container-fluid section">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 padding-0">
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

                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" id='main-board'>
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

    <script src="../lib/bootstrap-3.3.7-dist/js/jquery-360.min.js"> </script>
    <script src="../lib/fontawesome-free-5.15.3-web/js/all.min.js"></script>
    <script src="../lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script>
        //   $("li").click(function(e){
        //      $("li>a>span").addClass('active');
           
        //   });
        

        function exit() {
            $("#wrapper").removeClass();
            $(".formAdd").hide();
        }
        function add() {
            //show and hide form 
            $(".formAdd").show();
            $("#wrapper").addClass("background");
        }

        function Update(idProduct) {
            // code php to get data by id
            console.log(idProduct);
        }
        function Delete(idProduct) {
            console.log(idProduct);
            if (confirm(`Bạn có chắc muốn xóa sản phẩm với ID là ${idProduct} ?`)) {
                // code php to delete data by id
                console.log('ok');
            } else return;

        }
        let onOff = false;
        function onOffSidebar(){
            onOff = !onOff;
           if(onOff) {
            $('.sidebar').hide();
            $('#main-board').removeClass('col-xs-12 col-sm-10 col-md-10 col-lg-10');
            $('#main-board').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12');
           }else{
            $('.sidebar').show();
            $('#main-board').removeClass('col-xs-12 col-sm-12 col-md-12 col-lg-12');
            $('#main-board').addClass('col-xs-12 col-sm-10 col-md-10 col-lg-10');
           }
        }

        // function save(location='goods-type-manager.php'){
        //     $(".formAdd").submit(function(e){
        //         e.preventDefault();
        //     });
        //     $(".formAdd").submit();
        //     alert("Lưu thành công");
        //     window.location = `?page=${location} `;
        // }
    </script>

</body>

</html>