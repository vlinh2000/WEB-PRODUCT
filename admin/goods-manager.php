<?php 
if(isset($_POST['action']) && $_POST['action']=='delete'){
       
            include '../mysql.php';
            $sql = 'delete from  HangHoa  where MSHH="'.$_POST['id'].'"';
           if( mysqli_query($conn,$sql)) $status='<span class="text-success">Xóa sản phẩm thành công !</span>';
           else $status='<span class="text-danger">Xóa sản phẩm thất bại !</span>';
            mysqli_close($conn);      
}
if(isset($_POST['id']) && isset($_POST['TenHH'])) {
    include '../mysql.php';
    $sql = 'update HangHoa set TenHH="'.$_POST['TenHH'].'", MaLoaiHang="'.$_POST['MaLoaiHang'].'", QuyCach="'.$_POST['QuyCach'].'", Gia="' .$_POST['Gia'].'",SoLuongHang="'.$_POST['SoLuongHang'].'",GhiChu="'.$_POST['Ghichu'].'", ManHinh="'.$_POST['ManHinh'].'",HeDieuHanh="'.$_POST['HeDieuHanh'].'",CamSau="'.$_POST['CamSau'].'",CamTruoc="'.$_POST['CamTruoc'].'",Chip="'.$_POST['Chip'].'",Ram="'.$_POST['Ram'].'",Rom="'.$_POST['Rom'].'",Sim="'.$_POST['Sim'].'",Pin="'.$_POST['Pin'].'",HinhAnh="'.$_POST['HinhAnh'].'" where MSHH="'.$_POST['id'].'"';
    if(mysqli_query($conn,$sql)){
$status = 'Sửa sản phẩm ' .$_POST['TenHH'] .' thành công!';
}else{
$status = 'Sửa sản phẩm ' .$_POST['TenHH'] .' thất bại!';
}
mysqli_close($conn);
header("location:index.php?page=goods-manager.php"); 
}

else if(isset($_POST['TenHH'])){
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
                            
                            
                            <div class="container formAdd">

                                 <div class="panel panel-info">
                                    <div class="panel-heading add-goods-header">
                                        <h3 class="panel-title" ><?php if(isset($_POST['action']) && $_POST['action']=="createFromUpdate") echo "Sửa hàng hóa"; else echo "Thêm hàng hóa" ?></h3>
                                        <i class="fas fa-window-close icon-close" onclick="exit()"></i>
                                    </div>
                                <div class="panel-body">
                                    <form action="goods-manager.php" method="POST" role="form">
                                    <?php 
                                    echo ' <div class="row">

                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                        <label>Link ảnh sản phẩm</label>
                                        <input type="link" class="form-control" name="HinhAnh" required>
                                    </div>
                                        <div class="form-group">
                                            <label>Tên hàng hóa</label>
                                            <input type="text" class="form-control" name="TenHH" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã loại hàng</label>
                                            <select name="MaLoaiHang" class="form-control" required="required">';
                                               
                                                 include '../mysql.php';
                                                 $sql = "select * from LoaiHangHoa";
                                                 $result = mysqli_query($conn,$sql);
                                                while($row = $result->fetch_assoc()){
                                                    if(isset($MaLoaiHang) && $MaLoaiHang == $row['MaLoaiHang']) echo '<option selected value="'.$row['MaLoaiHang'].'">'.$row['MaLoaiHang'] . ' - ' . $row['TenLoaiHang'] .' </option>';
                                                    else echo '<option value="'.$row['MaLoaiHang'].'">'.$row['MaLoaiHang'] . ' - ' . $row['TenLoaiHang'] .' </option>';
                                                }
                                                mysqli_close($conn);
                                               
                                          echo  '</select>
                                        </div>
                                        <div class="form-group">
                                            <label>Quy cách</label>
                                            <input type="text" class="form-control" name="QuyCach" required value="'.$QuyCach.'">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá</label>
                                            <input type="text" class="form-control" name="Gia" required value="'.$Gia.'">
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng hàng</label>
                                            <input type="number" class="form-control" name="SoLuongHang" required value="'.$SoLuongHang.'">
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                        <label>Ghi chú</label>
                                        <input type="text" class="form-control" name="Ghichu" required value="'.$GhiChu.'">
                                    </div>           
                                        <div class="form-group">
                                            <label>Màn hình</label>
                                            <input type="text" class="form-control" name="ManHinh" required value="'.$ManHinh.'">
                                        </div>
                                        <div class="form-group">
                                            <label>Hệ điều hành</label>
                                            <input type="text" class="form-control" name="HeDieuHanh" required value="'.$HeDieuHanh.'">
                                        </div>
                                        <div class="form-group">
                                            <label>Camera sau</label>
                                            <input type="text" class="form-control" name="CamSau" required value="'.$CamSau.'">
                                        </div>
                                        <div class="form-group">
                                            <label>Camera trước</label>
                                            <input type="text" class="form-control" name="CamTruoc" required value="'.$CamTruoc.'">
                                        </div>
                                        <div class="form-group">
                                            <label>Chip</label>
                                            <input type="text" class="form-control" name="Chip" required value="'.$Chip.'">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                            <label>Ram</label>                                                   
                                            <select name="Ram" class="form-control" required="required">';
                                               echo ' <option '. ($Ram == "4G" ? "selected": "") . ' value="4G">4G</option>
                                                        <option '. ($Ram == "6G" ? "selected": "") . ' value="6G">6G</option>
                                                        <option '. ($Ram == "8G" ? "selected": "") . ' value="8G">8G</option>
                                                        <option '. ($Ram == "16G" ? "selected": "") . ' value="16G">16G</option>';
                                           echo '</select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Rom</label>
                                            <select name="Rom" class="form-control" required="required">
                                                <option  '. ($Rom == "16G" ? "selected": "") . ' value="16G">16G</option>
                                                <option '. ($Rom == "32G" ? "selected": "") . ' value="32G">32G</option>
                                                <option '. ($Rom == "64G" ? "selected": "") . ' value="64G">64G</option>
                                                <option '. ($Rom == "128G" ? "selected": "") . ' value="128G">128G</option>
                                                <option '. ($Rom == "256G" ? "selected": "") . ' value="256G">256G</option>
                                                <option '. ($Rom == "512G" ? "selected": "") . ' value="512G">512G</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Sim</label>
                                            <input type="text" class="form-control" name="Sim" required value="'.$Sim.'">
                                        </div>
                                        <div class="form-group">
                                            <label>Pin</label>
                                            <input type="text" class="form-control" name="Pin" required value="'.$Pin.'">
                                        </div>
                                       
                                    </div>
                                </div>';
                                    
                                    ?>
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


                       

                        <div class="container-fluid goods pt-5">     
                            <div class="container-fluid">          
                            <div class="add">
                                <button onclick="add()" class="btn btn-success add-Icon">
                                    <i class="fas fa-plus-square"></i>
                                    <span> Thêm HH</span>
                                </button>
                            </div>
                            </div>     
                            
                            <div class="conatiner-fluid table-data shadow">                          
                                <table>
                                    <thead>
                                        <tr class="category">  
                                            <th>#</th>
                                            <th>MSHH</th>
                                            <th>Ảnh</th>            
                                            <th>Tên HH</th>                                                                      
                                            <th>Mã loại</th>
                                            <th>Quy cách</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Ghi chú</th>                                                                                
                                            <th>Màn hình</th>
                                            <th>Hệ ĐH</th>        
                                            <th>Cam sau</th>
                                            <th>Cam trước</th>
                                            <th>Chip</th>
                                            <th>Ram</th>
                                            <th>Rom</th>
                                            <th>Sim</th>
                                            <th>Pin</th>
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
                                          echo '<td id="selected">'.$row['MaLoaiHang'].'</td>';
                                          echo '<td>'.$row['QuyCach'].'</td>';
                                          echo '<td>'.$row['Gia'].'</td>';
                                          echo '<td>'.$row['SoLuongHang'].'</td>';
                                          echo '<td>'.$row['GhiChu'].'</td>';
                                         
                                          echo '<td>'.$row['ManHinh'].'</td>';
                                          echo '<td>'.$row['HeDieuHanh'].'</td>';
                                          echo '<td>'.$row['CamSau'].'</td>';
                                          echo '<td>'.$row['CamTruoc'].'</td>';
                                          echo '<td>'.$row['Chip'].'</td>';
                                          echo '<td id="selected">'.$row['Ram'].'</td>';
                                          echo '<td id="selected">'.$row['Rom'].'</td>';
                                          echo '<td>'.$row['Sim'].'</td>';
                                          echo '<td>'.$row['Pin'].'</td>';
                                          echo '<td>
                                                    <i class="fas fa-pencil-alt mr-3 action-Icon-Update"  onclick="updateNotPost(this.parentElement.parentElement.children)" ></i>                           
                                                    <i class="fas fa-trash-alt action-Icon-Delete" onclick="Delete(this.parentElement.parentElement.children[1].innerText,)"></i>                            
                                                </td>';
                                          echo '</tr>';  
                                          $STT++;
                                        }                                                                  
                                        ?>                               
                                    </tbody>
                                </table>
                            </div>
                                        
                        </div>