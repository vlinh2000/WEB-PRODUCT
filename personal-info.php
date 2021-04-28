<?php
include './header.php';
?>
<?php
if(isset($_POST['UserName'])){
    include 'mysql.php';
    $sql = "update khachhang set HoTenKH='".$_POST['HoTenKH']."' , TenCongTy='".$_POST['TenCongTy']."' ,SoDienThoai='".$_POST['SoDienThoai']."' ,Email='".$_POST['Email']."'  where MSKH='".$_SESSION['ID']."'"; 
    $check=false;
    if (mysqli_query($conn, $sql)) {
        $check=true;
     } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
     }
     $sql1 = "update diachikh set DiaChi='".$_POST['DiaChi']."' where MSKH='".$_SESSION['ID']."'" ; 
     if (mysqli_query($conn, $sql1)) {
         $check*=true;
      } else {
         echo "Error: " . $sql1 . "" . mysqli_error($conn);
      }
     mysqli_close($conn);
     if($check = true){
        $_SESSION['FullName'] = $_POST['HoTenKH'];
        $_SESSION['Phone']= $_POST['SoDienThoai'];
        $_SESSION['DiaChi']= $_POST['DiaChi'];
        $_SESSION['UserName'] = $_POST['UserName'];
     }
}

?>
    <div class="container personal-info">
        <h5>Hồ sơ của tôi</h5>
        <hr>
       <?php
            if(isset($check) && $check=true)echo '<p>Cập nhật thành công</p>';
            include 'mysql.php';
            $sql = "select a.HoTenKH , a.SoDienThoai , a.Email , a.UserName ,a.TenCongTy , b.DiaChi  from khachhang a , diachikh b where  a.MSKH = b.MSKH and a.MSKH='".$_SESSION['ID']."'"; 
            $result = mysqli_query($conn,$sql);
            while($row=$result->fetch_assoc()){
                echo " 
                <form action='personal-info.php' method='POST'>
                    <div class='form-item'>
                        <label  >Tên đăng nhập</label>
                        <input type='text' class='form-control' name='UserName' readonly value='".$row['UserName']."' required>
                    </div>
                    <div class='form-item'>
                        <label  >Họ tên</label>
                        <input type=text' class='form-control' name='HoTenKH' value='".$row['HoTenKH']."' required>
                    </div>
                    <div class='form-item'>
                        <label  >Địa chỉ</label>
                        <input type='text' class='form-control' name='DiaChi' value='".$row['DiaChi']."' required>
                    </div>
                    <div class='form-item'>
                        <label  >Số điện thoại</label>
                        <input type='text' class='form-control' name='SoDienThoai' value='".$row['SoDienThoai']."' required>
                    </div>
                    <div class='form-item'>
                        <label  >Tên Công ty</label>
                        <input type='text' class='form-control' name='TenCongTy' value='".$row['TenCongTy']."' required>
                    </div>
                    <div class='form-item'>
                        <label  >Email</label>
                        <input type='email' class='form-control' name='Email' value='".$row['Email']."' required>
                    </div>";
                
                                            }
                mysqli_close($conn);
           
       ?>
            <button type="submit" class="btn-info">Lưu</button>
</form>
    </div>
<?php
include './footer.php';
?>
