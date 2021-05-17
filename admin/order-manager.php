
                            <div class="container formAdd" >
                                 <div class="add-goods-header">
                                <h5 class="panel-title">Thêm hóa đơn</h5>
                                <i class="fas fa-window-close icon-close" onclick="exit()"></i>
                            </div>
                            <form action="order-manager.php" method="POST" role="form">
                                <div class="row">
                                    <div class="col-4">
                                    <div class="form-group">
                                            <label>Tên khách hàng</label>
                                            <select name="MSKH" class="form-control" required="required">';
                                           <?php 
                                            include '../mysql.php';
                                            $sql = "select MSKH,HoTenKH from khachhang";
                                            $result = mysqli_query($conn,$sql);
                                           while($row = $result->fetch_assoc()){
                                            echo '<option  value="'. $row['MSKH'] .'"> '. $row['MSKH'] .' - ' . $row['HoTenKH'] . '</option>';
                                           }
                                           mysqli_close($conn);
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tên nhân viên</label>
                                            <select name="MSNV" class="form-control" required="required">';
                                           <?php 
                                            include '../mysql.php';
                                            $sql = "select MSNV,HoTenNV from nhanvien";
                                            $result = mysqli_query($conn,$sql);                                      
                                           while($row = $result->fetch_assoc()){   
                                            echo '<option  value="'. $row['MSNV'] .'"> '. $row['MSNV'] .' - ' . $row['HoTenNV'] . '</option>';
                                               $STT++;
                                           }
                                           mysqli_close($conn);
                                            ?>
                                            </select>
                                        </div>                      
                                            <div class="form-group">
                                                <label>Ngày đặt</label>
                                                <input type="date" class="form-control" name='NgayDH' required>
                                            </div>  
                                            <div class="form-group">
                                                <label>Ngày giao</label>
                                                <input type="date" class="form-control" name='NgayGH' required>
                                            </div> 
                                            <div class="form-group">
                                            <label>Tổng tiền</label>
                                            <input type="number" class="form-control" readonly name='TongTien' value="0" required>
                                        </div> 

                                    </div>
                                    <div class="col-8">
                                    <label>Danh sách sản phẩm</label>  <span class="add-product" onclick = "addnewPD()"><i class="fas fa-plus-square"></i> Thêm</span>
                                                <select class="form-control add-new-product" required onchange="fillPrice(this.parentElement,this.children,this.value)">
                                                                    <?php 
                                                                include '../mysql.php';
                                                                $sql = "select Gia,MSHH,TenHH from hanghoa";
                                                                $result = mysqli_query($conn,$sql);                                      
                                                            while($row = $result->fetch_assoc()){   
                                                                echo '<option  id="'.$row['Gia'].'"  value="'. $row['MSHH'] .'"> '. $row['TenHH'] .'</option>';
                                                                $STT++;
                                                            }
                                                    mysqli_close($conn);
                                                    ?>
                                                </select>      
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
    <div class="add" >
            <button onclick="add()" class="btn btn-success add-Icon" >
                    <i class="fas fa-plus-square"></i>
                    <span> Thêm HD</span>
                </button>
            </div>
    </div>
    <div class="container-fluid table-data shadow">
    <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Số đơn ĐH</th>
                    <th>MSKH</th>
                    <th>MSNV</th>
                    <th>Ngày đặt</th>
                    <th>Ngày giao</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include '../mysql.php';
                $sql = 'select * from dathang where TrangThai="Đã giao" or TrangThai="Đang vận chuyển" order by ngaydh desc';
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
                    echo '<td>'. number_format($row['TongTien'],0,',','.').' ₫</td>';
                    if($row['TrangThai'] == 'Đang vận chuyển' ) echo '<td><span class="shipping">'.$row['TrangThai']. '</span></td>';
                    else echo '<td><span class="ship-done">'.$row['TrangThai']. '</span></td>';                 
                    echo '<td>
                            <i class="fas fa-pencil-alt mr-3 action-Icon-Update"onclick="updateNotPost(this.parentElement.parentElement.children)" ></i>                           
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