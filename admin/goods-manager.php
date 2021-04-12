<?php 
if(isset($_POST['TenHH'])){
    include '../mysql.php';
    $MSHH = 'HH' . rand(0,9999999);
    $sql = 'insert into HangHoa values ("'.$MSHH.'","'
                                          .$_POST['TenHH'].'","'
                                          .$_POST['MaLoaiHang'].'","'
                                          .$_POST['QuyCach'].'","'
                                          .$_POST['Gia'].'","'
                                          .$_POST['SoLuongHang'].'","'
                                          .$_POST['Ghichu'].'","'
                                          .$_POST['ManHinh'].'","'
                                          .$_POST['HeDieuHanh'].'","'
                                          .$_POST['CamSau'].'","'
                                          .$_POST['CamTruoc'].'","'
                                          .$_POST['Chip'].'","'
                                          .$_POST['Ram'].'","'
                                          .$_POST['Rom'].'","'
                                          .$_POST['Sim'].'","'
                                          .$_POST['Pin'].'","'
                                          .$_POST['HinhAnh']
                                          .'")';
    echo $sql;
    if(mysqli_query($conn,$sql)){
     $status = 'Thêm hàng ' .$_POST['TenHH'] .' thành công!';
    }else{
     $status = 'Thêm hàng ' .$_POST['TenHH'] .' thất bại!';
    }
    mysqli_close($conn);
    header("location:index.php?page=goods-manager.php"); 
}

?>  
                            
                            
                            <h1 class="title">Quản lí hàng hóa</h1>
                            <div class="container formAdd">
                                 <div class="panel panel-info">
                                    <div class="panel-heading add-goods-header">
                                        <h3 class="panel-title">Thêm hàng hóa</h3>
                                        <i class="fas fa-window-close icon-close" onclick="exit()"></i>
                                    </div>
                                <div class="panel-body">
                                    <form action="goods-manager.php" method="POST" role="form">

                                        <div class="row">

                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <!-- <div class="form-group">
                                                    <label>MSHH</label>
                                                    <input type="text" class="form-control">
                                                </div> -->
                                                <div class="form-group">
                                                    <label>TenHH</label>
                                                    <input type="text" class="form-control" name="TenHH" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>MaLoaiHang</label>
                                                    <select name="MaLoaiHang" class="form-control" required="required">
                                                        <?php
                                                         include '../mysql.php';
                                                         $sql = "select * from LoaiHangHoa";
                                                         $result = mysqli_query($conn,$sql);
                                                        while($row = $result->fetch_assoc()){
                                                            if($row['TenLoaiHang'] == 'Iphone') echo '<option selected value="'.$row['MaLoaiHang'].'">'.$row['MaLoaiHang'] . ' - ' . $row['TenLoaiHang'] .' </option>';
                                                            else echo '<option value="'.$row['MaLoaiHang'].'">'.$row['MaLoaiHang'] . ' - ' . $row['TenLoaiHang'] .' </option>';
                                                        }
                                                        mysqli_close($conn);
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>QuyCach</label>
                                                    <input type="text" class="form-control" name="QuyCach" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Gia</label>
                                                    <input type="text" class="form-control" name="Gia" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>SoLuongHang</label>
                                                    <input type="number" class="form-control" name="SoLuongHang" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ghichu</label>
                                                    <input type="text" class="form-control" name="Ghichu" required>
                                                </div>
                                            </div>

                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                                                <div class="form-group">
                                                    <label>ManHinh</label>
                                                    <input type="text" class="form-control" name="ManHinh" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>HeDieuHanh</label>
                                                    <input type="text" class="form-control" name="HeDieuHanh" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>CamSau</label>
                                                    <input type="text" class="form-control" name="CamSau" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>CamTruoc</label>
                                                    <input type="text" class="form-control" name="CamTruoc" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Chip</label>
                                                    <input type="text" class="form-control" name="Chip" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ram</label>                                                   
                                                    <select name="Ram" class="form-control" required="required">
                                                        <option value="4G">4G</option>
                                                        <option value="6G">6G</option>
                                                        <option value="8G">8G</option>
                                                        <option value="16G">16G</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label>Rom</label>
                                                    <select name="Rom" class="form-control" required="required">
                                                        <option value="16G">16G</option>
                                                        <option value="32G">32G</option>
                                                        <option value="64G">64G</option>
                                                        <option value="128G">128G</option>
                                                        <option value="256G">256G</option>
                                                        <option value="512G">512G</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sim</label>
                                                    <input type="text" class="form-control" name="Sim" required >
                                                </div>
                                                <div class="form-group">
                                                    <label>Pin</label>
                                                    <input type="text" class="form-control" name="Pin" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Link ảnh sản phẩm</label>
                                                    <input type="link" class="form-control" name="HinhAnh" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
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


                       

                        <div class="container-fluid goods">
                            <div class="add">
                                <button onclick="add()" class="btn btn-success add-Icon">
                                    <i class="fas fa-plus-square"></i>
                                    <span> Thêm HH</span>
                                </button>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">HÀNG HÓA</div>
                                <div class="panel-body">
                                    <span class="label label-warning">
                                        <a href="view-all-goods.php">
                                            <i class="fas fa-search"></i>
                                            Xem bảng đầy đủ
                                        </a>
                                    </span>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr class="category">
                                            <th>STT</th>        
                                            <th>MSHH</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên hàng hóa</th>
                                            <th>Mã loại</th>
                                            <th>Hệ điều hành</th>
                                            <th>Chip</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../mysql.php';
                                        $sql='select * from HangHoa';
                                        $result = mysqli_query($conn,$sql);
                                        $STT=1;
                                        while($row = $result->fetch_assoc()){
                                          echo '<tr>' ;
                                          echo '<td>'.$STT.'</td>';
                                          echo '<td>'.$row['MSHH'].'</td>';
                                          echo ' <td class="product-image">
                                                    <img src="'.$row['HinhAnh'].'"
                                                    alt="'.$row['MSHH'].'">
                                                </td>';
                                          echo '<td>'.$row['TenHH'].'</td>';
                                          echo '<td>'.$row['MaLoaiHang'].'</td>';
                                          echo '<td>'.$row['HeDieuHanh'].'</td>';
                                          echo '<td>'.$row['Chip'].'</td>';
                                          echo '<td>'.$row['Gia'].'</td>';
                                          echo '<td>'.$row['SoLuongHang'].'</td>';
                                          echo '<td>
                                                    <i class="fas fa-pencil-alt mr-3 action-Icon-Update"  onclick="Update(this.parentElement.parentElement.children[1].innerText)" ></i>                           
                                                    <i class="fas fa-trash-alt action-Icon-Delete" onclick="Delete(this.parentElement.parentElement.children[1].innerText)"></i>                            
                                                </td>';
                                          echo '</tr>';  
                                          $STT++;
                                        }                                                                  
                                        ?>                               
                                    </tbody>
                                </table>
                            </div>
                        </div>