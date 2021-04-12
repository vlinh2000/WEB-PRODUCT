<?php 
if(isset($_POST['TenLoaiHang'])){
    include '../mysql.php';
    $MaLoaiHang = 'LH' . rand(0,9999999);
    $sql = 'insert into LoaiHangHoa values ("'.$MaLoaiHang.'","'.$_POST['TenLoaiHang'].'")';
    
    if(mysqli_query($conn,$sql)){
     $status = 'Thêm loại hàng ' .$_POST['TenLoaiHang'] .' thành công!';
    }else{
     $status = 'Thêm loại hàng ' .$_POST['TenLoaiHang'] .' thất bại!';
    } 
    // echo  '<script> windown.history.back()<script>';
    //
    mysqli_close($conn);
    header("location:index.php?page=goods-type-manager.php");
}

?>


 <h1 class="title">Quản lí loại hàng hóa</h1>
    <div class="container formAdd ">
        <div class="panel panel-info">
        <div class="panel-heading add-goods-header">
            <h3 class="panel-title">Thêm hàng hóa</h3>
            <i class="fas fa-window-close icon-close" onclick="exit()"></i>
        </div>
    <div class="panel-body">
        <form action="goods-type-manager.php" method="POST" role="form">
                    <div class="form-group">
                        <label>TenLoaiHang</label>
                        <input type="text" class="form-control" name='TenLoaiHang' required>
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
    </div>
    
    </div>
<div class="container-fluid">
    <div class="add">
        <button onclick="add()" class="btn btn-success add-Icon">
            <i class="fas fa-plus-square"></i>
            <span> Thêm loại HH</span>
        </button>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">LOẠI HÀNG HÓA</div>
        <div class="panel-body">
            <p>Cập nhật từ ngày 18-3-2021</p>
            <?php if(isset($status)) echo 1 ;  ?>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã loại hàng</th>
                    <th>Tên loại hàng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include '../mysql.php';
                $sql = 'select * from LoaiHangHoa';
                $result = mysqli_query($conn,$sql);
                $STT=1;
                while($row=$result->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'.$STT.'</td>';
                    echo '<td>'.$row['MaLoaiHang'].'</td>';
                    echo '<td>'.$row['TenLoaiHang'].'</td>';
                    echo '<td>
                             <i class="fas fa-pencil-alt mr-3 action-Icon-Update"  onclick="Update(this.parentElement.parentElement.children[1].innerText)" ></i>                           
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