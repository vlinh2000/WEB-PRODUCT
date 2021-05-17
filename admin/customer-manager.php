<?php 
//DELETE
$status="";
 if(isset($_POST['action']) && $_POST['action'] == 'delete'){    
    include '../mysql.php';
    $sql = 'delete from  diachikh  where MSKH="'.$_POST['id'].'"';
   if( mysqli_query($conn,$sql)) $status='<span class="text-success">Xóa khách hàng thành công !</span>';
   else $status='<span class="text-danger">Xóa khách hàng thất bại !</span>';
    mysqli_close($conn);
     }
     //UPDATE 
     if(isset($_POST['id']) && isset($_POST['HoTenKH'])) {
        include '../mysql.php';
                $sql = 'update khachhang set HoTenKH="'.$_POST['HoTenKH'].'",SoDienThoai="'.$_POST['SoDienThoai'].'",Email="'.$_POST['Email'].'",UserName="'.$_POST['UserName'].'",PassWord="'.md5($_POST['PassWord']).'",TenCongTy="'.$_POST['TenCongTy'].'" where MSKH ="'.$_POST['id'].'"';
                if(mysqli_query($conn,$sql)){
            $status = true;
            }else{
            $status =false;
            $sql1 = 'update diachikh set DiaChi="'.$_POST['DiaChi'].'" where MSKH ="'.$_POST['id'].'"';
                if(mysqli_query($conn,$sql1)){
            $status *= true;
            }else{
                echo "Error: " . $sql1 . "" . mysqli_error($conn);
            }
            }
            mysqli_close($conn);
            header("location:index.php?page=customer-manager.php");
    }
    // ADD 
    else if(isset($_POST['HoTenKH'])){
        include '../mysql.php';
        $MSKH = 'KH'. rand(0,99999999);
        $sql = "insert into KhachHang values('"
            . $MSKH . "','" 
            . $_POST['HoTenKH'] . "','" 
            . $_POST['SoDienThoai'] . "','"
            . $_POST['Email'] . "','" 
            . $_POST['UserName'] . "','" 
            . md5($_POST['PassWord']) . "','"
            . $_POST['TenCongTy'] .  "')"; 
            $status=false;
        if (mysqli_query($conn, $sql)) {
            $status=true;
         } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
         }
         $MADC = 'DC' . rand(0,99999999);
         $sql1 = "insert into DiaChiKH values('". $MADC . "','". $_POST['DiaChi'] . "','" . $MSKH . "')"; 
         if (mysqli_query($conn, $sql1)) {
            $status*=true;
         } else {
            echo "Error: " . $sql1 . "" . mysqli_error($conn);
}
mysqli_close($conn);
header("location:index.php?page=customer-manager.php"); }
?>                  
                       <!--QUẢN LÍ KHÁCH HÀNG-->
                        <div class="container formAdd" >
                                 <div class="add-goods-header">
                                <h5 class="panel-title">Thêm khách hàng</h5>
                                <i class="fas fa-window-close icon-close" onclick="exit()"></i>
                            </div>
                            <form action="customer-manager.php" method="POST" role="form">
                                <div class="row">
                                    <div class="col-6">
                                    <div class="form-group">
                                            <label>Họ Tên</label>
                                            <input type="text" class="form-control" name='HoTenKH' required value='<?php if(isset($HoTenKH)) echo $HoTenKH ; else echo ""?>'>
                                        </div>
                                        <div class="form-group">
                                            <label>SĐT</label>
                                            <input type="number" class="form-control" name='SoDienThoai' required value='<?php if(isset($_POST)) echo $SDT ; else echo ""?>'>
                                        </div>                      
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name='Email' required value='<?php if(isset($Email)) echo $Email ; else echo ""?>'>
                                            </div>  
                                            <div class="form-group">
                                                <label>UserName</label>
                                                <input type="text" class="form-control" name='UserName' required value='<?php if(isset($UserName)) echo $UserName ; else echo ""?>'>
                                            </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                                <label>PassWord</label>
                                                <input type="text" class="form-control" name='PassWord' required>
                                            </div>     
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control" name='DiaChi' required value='<?php if(isset($DiaChi)) echo $DiaChi ; else echo ""?>'>
                                            </div>   
                                            <div class="form-group">
                                                <label>Tên công ty</label>
                                                <input type="text" class="form-control" name='TenCongTy' required value='<?php if(isset($TenCongTy)) echo $TenCongTy ; else echo ""?>'>
                                            </div>      
                                    </div>
                                </div>
                                   
                                                                                                                                               
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Lưu
                                </button>
                                <a type="button" class="btn btn-warning" onclick="exit()">
                                    <i class="fas fa-undo-alt"></i>
                                    Thoát</a>
                            </form>  
                     </div>
                       <div class="container-fluid pt-5">
                           <div class="container-fluid">
                            <?php if(isset($status)) echo $status; ?>
                                <div class="add">
                                    <button onclick="add()" class="btn btn-success add-Icon">
                                        <i class="fas fa-plus-square"></i>
                                        <span> Thêm KH</span>
                                    </button>
                                </div>
                           </div>
                           <div class="container-fluid table-data shadow">
                           <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>MSKH</th>
                                            <th>Họ tên</th>
                                            <th>SĐT</th>
                                            <th>Email</th>
                                            <th>UserName</th>
                                            <th>PassWord</th>
                                            <th>Địa chỉ</th>
                                            <th>Tên CTY</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        include '../mysql.php';
                                        $sql = 'select * from KhachHang a , diachikh b where a.MSKH = b.MSKH';
                                        $result = mysqli_query($conn,$sql);
                                        $STT=1;
                                        while($row=$result->fetch_assoc()){
                                            echo '<tr>';
                                            echo '<td>'.$STT.'</td>';
                                            echo '<td>'.$row['MSKH'].'</td>';
                                            echo '<td>'.$row['HoTenKH'].'</td>';
                                            echo '<td>'.$row['SoDienThoai'].'</td>';
                                            echo '<td>'.$row['Email'].'</td>';
                                            echo '<td>'.$row['UserName'].'</td>';
                                            echo '<td>****</td>';
                                            echo '<td>'.$row['DiaChi'].'</td>';
                                            echo '<td>'.$row['TenCongTy'].'</td>';
                                            echo '<td>
                                            <i class="fas fa-pencil-alt mr-3 action-Icon-Update"  onclick="updateNotPost(this.parentElement.parentElement.children)" ></i>                           
                                                    <i class="fas fa-trash-alt action-Icon-Delete" onclick="Delete(this.parentElement.parentElement.children[1].innerText)"></i>                            
                                                </td>';
                                            echo '</tr>';
                                        $STT++;
                                        }
                                        mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>
                           </div>
                           
                               
                            
                        </div> 