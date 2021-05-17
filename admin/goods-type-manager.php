<?php 
//DELETE
$status="";
 if(isset($_POST['action']) && $_POST['action'] == 'delete'){    
            include '../mysql.php';
            $sql = 'delete from  loaihanghoa  where MaLoaiHang="'.$_POST['id'].'"';
           if( mysqli_query($conn,$sql)) $status='<span class="text-success">Xóa loại hàng thành công !</span>';
           else $status='<span class="text-danger">Xóa loại hàng thất bại !</span>';
            mysqli_close($conn);    
     }
     //UPDATE 
     if(isset($_POST['id']) && isset($_POST['TenLoaiHang'])) {
        include '../mysql.php';
        $sql = 'update LoaiHangHoa set TenLoaiHang="'.$_POST['TenLoaiHang'].'" where MaLoaiHang="'.$_POST['id'].'"';
        if(!mysqli_query($conn,$sql)){
            echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
    header("location:index.php?page=goods-type-manager.php");
    }
    // ADD 
    else if(isset($_POST['TenLoaiHang'])){
        include '../mysql.php';
        $MaLoaiHang = 'LH' . rand(0,9999999);
        $sql = 'insert into LoaiHangHoa values ("'.$MaLoaiHang.'","'.$_POST['TenLoaiHang'].'")';
        
        if(mysqli_query($conn,$sql)){
         $status = 'Thêm loại hàng ' .$_POST['TenLoaiHang'] .' thành công!';
        }else{
         $status = 'Thêm loại hàng ' .$_POST['TenLoaiHang'] .' thất bại!';
        } 
        mysqli_close($conn);
        header("location:index.php?page=goods-type-manager.php");
}
?>
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
<div class="container-fluid pt-5">
   <div class="container-fluid"> <?php echo $status?>
    <div class="add">
        <button onclick="add()" class="btn btn-success add-Icon">
            <i class="fas fa-plus-square"></i>
            <span> Thêm loại HH</span>
        </button>
    </div></div>
    <div class="container-fluid table-data shadow">
    <table class="table">
            <thead>
                <tr>
                    <th>#</th>
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