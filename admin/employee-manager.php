<?php 
//DELETE
$status="";
 if(isset($_POST['action']) && $_POST['action'] == 'delete'){    
            include '../mysql.php';
            $sql = 'delete from  nhanvien  where MSNV="'.$_POST['id'].'"';
           if( mysqli_query($conn,$sql)) $status='<span class="text-success">Xóa nhân viên thành công !</span>';
           else $status='<span class="text-danger">Xóa nhân viên thất bại !</span>';
            mysqli_close($conn);    
     }
     //UPDATE 
     if(isset($_POST['id']) && isset($_POST['HoTenNV'])) {
        include '../mysql.php';
        $sql = 'update nhanvien set HoTenNV="'.$_POST['HoTenNV'].'",SoDienThoai="'.$_POST['SoDienThoai'].'",ChucVu="'.$_POST['ChucVu'].'",DiaChi="'.$_POST['DiaChi'].'",Luong="'.$_POST['Luong'].'" where MSNV ="'.$_POST['id'].'"';
        echo $sql;
        if(mysqli_query($conn,$sql)){
    }else{
        echo "Error: " . $sql1 . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
    header("location:index.php?page=employee-manager.php");
    }
    // ADD 
    else if(isset($_POST['HoTenNV'])){
            include '../mysql.php';
            $MSNV = 'NV'. rand(0,99999999);
            $sql = "insert into NhanVien values('"
                . $MSNV . "','" 
                . $_POST['HoTenNV'] . "','" 
                . $_POST['ChucVu'] . "','"
                . $_POST['DiaChi'] . "','" 
                . $_POST['SoDienThoai'] . "','" 
                . $_POST['Luong'].  "')"; 
                echo $sql;
            if (mysqli_query($conn, $sql)) {
                $status=true;
             } else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
             }
    mysqli_close($conn);
    header("location:index.php?page=employee-manager.php"); 
}
   
    ?>
 <div class="container formAdd">
        <div class="add-goods-header">
            <h5 class="panel-title">Thêm nhân viên</h5>
            <i class="fas fa-window-close icon-close" onclick="exit()"></i>
        </div>
        <form action="employee-manager.php" method="POST" role="form" class="h-50">
                    <div class="form-group">
                        <label>Họ Tên </label>
                        <input type="text" class="form-control" name='HoTenNV' required>
                    </div>
                    <div class="form-group">
                        <label>Chức vụ</label>
                        <input type="text" class="form-control" name='ChucVu' required>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name='DiaChi' required>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name='SoDienThoai' required>
                    </div>
                    <div class="form-group">
                        <label>Lương</label>
                        <input type="text" class="form-control" name='Luong' required>
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
    
<div class="container-fluid">
   <div class="container-fluid pt-5">
   <?php echo $status?>
    <div class="add">   
        <button onclick="add()" class="btn btn-success add-Icon">
            <i class="fas fa-plus-square"></i>
            <span> Thêm NV</span>
        </button>
    </div>
   </div>
    <div class="container-fluid  table-data shadow">
    <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã NV</th>
                    <th>Họ tên</th>
                    <th>Chức vụ</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Lương</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                                        include '../mysql.php';
                                        $sql = 'select * from nhanvien';
                                        $result = mysqli_query($conn,$sql);
                                        $STT=1;
                                        while($row=$result->fetch_assoc()){
                                        echo '<tr>
                                            <td>'.$STT.'</td>
                                            <td>'.$row['MSNV'].'</td>
                                            <td>'.$row['HoTenNV'].'</td>
                                            <td>'.$row['ChucVu'].'</td>
                                            <td>'.$row['DiaChi'].'</td>
                                            <td>'.$row['SoDienThoai'].'</td>
                                            <td>'.$row['Luong'].'</td>
                                            <td>
                                                <i class="fas fa-pencil-alt mr-3 action-Icon-Update"  onclick="updateNotPost(this.parentElement.parentElement.children)" ></i>                           
                                                <i class="fas fa-trash-alt action-Icon-Delete" onclick="Delete(this.parentElement.parentElement.children[1].innerText)"></i>
                                            </td>
                                        </tr>';
                                        $STT++;
                                        }
                                        mysqli_close($conn);
                                        ?>
                
            </tbody>
        </table>
    </div>
    
</div>