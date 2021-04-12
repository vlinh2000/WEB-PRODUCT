                       <!--QUẢN LÍ KHÁCH HÀNG-->
                        <h1 class="title">Quản lí khách hàng</h1>
                        <div class="container formAdd  w-50" >
                            <div class="panel panel-info">
                            <div class="panel-heading add-goods-header">
                                <h3 class="panel-title">Thêm KH</h3>
                                <i class="fas fa-window-close icon-close" onclick="exit()"></i>
                            </div>
                            <div class="panel-body">
                            <form action="goods-type-manager.php" method="POST" role="form">
                                    <div class="form-group">
                                            <label>Họ Tên</label>
                                            <input type="text" class="form-control" name='HoTenKH' required>
                                        </div>
                                        <div class="form-group">
                                            <label>SĐT</label>
                                            <input type="number" class="form-control" name='SoDienThoai' required>
                                        </div>
                                        <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control" name='DiaChi' required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name='Email' required>
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
                                    <span> Thêm KH</span>
                                </button>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">KHÁCH HÀNG</div>
                                <div class="panel-body">
                                    <p>Cập nhật từ ngày 18-3-2021</p>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>MSKH</th>
                                            <th>Họ tên</th>
                                            <th>SĐT</th>
                                            <th>Email</th>
                                            <th>UserName</th>
                                            <th>PassWord</th>
                                            <th>Địa chỉ</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        include '../mysql.php';
                                        $sql = 'select * from KhachHang';
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
                                            echo '<td>'.$row['PassWord'].'</td>';
                                            echo '<td>'.$row['DiaChi'].'</td>';
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