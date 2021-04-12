
 <h1 class="title">Quản lí đặt hàng</h1>
 <div class="container-fluid">
    <div class="add" >
        <button disabled onclick="add()" class="btn btn-success add-Icon">
            <i class="fas fa-plus-square"></i>
            <span> Thêm HD</span>
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
                    <th>SoDonDH</th>
                    <th>MSKH</th>
                    <th>MSNV</th>
                    <th>NgayDH</th>
                    <th>NgayGH</th>
                    <th>TrangThai</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include '../mysql.php';
                $sql = 'select * from dathang';
                $result = mysqli_query($conn,$sql);
                $STT=1;
                while($row=$result->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'.$STT.'</td>';
                    echo '<td>'.$row['SoDonDH'].'</td>';
                    echo '<td>'.$row['MSKH'].'</td>';
                    echo '<td>'.$row['MSNV'].'</td>';
                    echo '<td>'.$row['NgayDH'].'</td>';
                    echo '<td>'.$row['NgayGH'].'</td>';
                    if($row['TrangThai'] == 'Đang vận chuyển' ) echo '<td><span class="label label-warning">'.$row['TrangThai']. '</span></td>';
                    else echo '<td><span class="label label-success">'.$row['TrangThai']. '</span></td>';
                    echo '<td>
                            <i class="fas fa-pencil-alt mr-3 action-Icon-Update"  onclick="Update(this.parentElement.parentElement.children[1].innerText)" ></i>                           
                            <i class="fas fa-trash-alt action-Icon-Delete" onclick="Delete(this.parentElement.parentElement.children[1].innerText)"></i>                   
                          </td>';
                    echo '<td><a href="order-detail.php?SoDonDH='.$row['SoDonDH'].'"> <i class="fas fa-search mr-3"></i>Xem chi tiết hóa đơn</a></td>';
                    echo '</tr>';
                 $STT++;
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>


</div>