<?php
if(isset($_POST['txtUsername'])){
    include '../mysql.php';
    $sql = "select a.HoTenNV ,b.MSNV , b.PassWord from admin b , nhanvien a where a.MSNV=b.MSNV and b.UserName='". $_POST['txtUsername']."'";
    $result = mysqli_query($conn,$sql);
    $row =mysqli_fetch_array($result);
    if(isset($row)){
          if($_POST['txtPassword'] == $row['PassWord'] ){
            session_start();
           $_SESSION['IdAdmin']= $row['MSNV'];
           $_SESSION['HoTenNV']= $row['HoTenNV'];
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
    <link rel="stylesheet" href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="../lib/fontawesome-free-5.15.3-web/css/all.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container-fluid login-admin shadow-lg">
        <form action="login.php" method="POST" role="form">
            <h3>Đăng nhập vào hệ thống</h3>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-control" name="txtUsername" placeholder="Username" required>
            </div>
            <div class="form-group ">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="txtPassword" placeholder="Password" required>
            </div>
            <button type="submit" class="loginBtn">Đăng nhập</button>
        </form>
    </div>
</body>

</html>