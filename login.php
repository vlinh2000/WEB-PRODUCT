<?php
if(isset($_POST['txtUsername'])){
    include 'mysql.php';
    $sql = "select a.MSKH,a.HoTenKH,a.SoDienThoai,a.UserName,a.PassWord ,b.DiaChi from KhachHang a, DiaChiKH b where a.MSKH=b.MSKH and a.UserName='". $_POST['txtUsername']."'";
    $result = mysqli_query($conn,$sql);
    $row =mysqli_fetch_array($result);
    echo md5($_POST['txtPassword']);
    if(isset($row)){
          if(md5($_POST['txtPassword']) == $row['PassWord'] ){
            session_start();
           $_SESSION['ID']= $row['MSKH'];
           $_SESSION['FullName'] = $row['HoTenKH'];
           $_SESSION['Phone']= $row['SoDienThoai'];
           $_SESSION['DiaChi']= $row['DiaChi'];
           $_SESSION['UserName'] = $row['UserName'];
           header('location:index.php');
          }else{
            echo "<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu không chính xác !');</script>";
          }
    }
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Optional theme -->
    <link rel="stylesheet" href="./lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./lib/fontawesome-free-5.15.3-web/css/all.min.css">
</head>

<body>
    <div class="container-fluid form">
        <form action="login.php" method="POST" role="form">
            <legend>Đăng nhập</legend>
            <div class="form-group ">
                <i class="far fa-user"></i>
                <input type="text" class="form-control" name="txtUsername" placeholder="Username">
            </div>
            <div class="form-group ">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="txtPassword" placeholder="Password">
            </div>
            <button type="submit" class="login">Đăng nhập</button>
            <div class="register">
                <span>Bạn mới biết đến Shop?</span><a href="register.php"> Đăng ký</a>
            </div>
        </form>
    </div>
</body>
</html>