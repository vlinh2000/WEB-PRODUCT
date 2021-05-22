<?php 
//DELETE
$status="";
 if(isset($_POST['action']) && $_POST['action'] == 'delete'){    
    include '../mysql.php';
    $sql1 = 'delete from  chitietdathang  where SoDonDH="'.$_POST['id'].'"';
    $sql = 'delete from  dathang  where SoDonDH="'.$_POST['id'].'"';
    mysqli_query($conn,$sql1);
   if( mysqli_query($conn,$sql)) $status='<span class="text-success">Xóa hóa đơn thành công !</span>';
   else $status='<span class="text-danger">Xóa hóa đơn thất bại !</span>';
    mysqli_close($conn);
     }
     //UPDATE 
     if(isset($_POST['id']) && isset($_POST['MSHH'])) {
        include '../mysql.php';
        //Xóa chi tiết đặt hàng để cập nhật lại
              $sql = "delete from chitietdathang where SoDonDH='".$_POST['id']."'";
              if(!mysqli_query($conn, $sql)) echo  mysqli_error($conn);
              $sql2 = "update dathang set TongTien='".$_POST['TongTien']."' ,MSKH='".$_POST['MSKH']."',MSNV='".$_POST['MSNV']."',NgayDH='".$_POST['NgayDH']."',NgayGH='".$_POST['NgayGH']."'  where SoDonDH='".$_POST['id']."'";
              echo $sql2;
              if(!mysqli_query($conn, $sql2)) echo  mysqli_error($conn);
              $i=0;
                foreach ($_POST['MSHH'] as $MSHH){
                    $MSHH = explode(" - ",$MSHH)[0];
                    $sql1 = "insert into chitietdathang values('"
                    . $_POST['id'] . "','" 
                    . $MSHH . "'," 
                    . $_POST['SoLuong'][$i] . ","
                    . ((int)$_POST['Gia'][$i] / (int)$_POST['SoLuong'][$i]) . ",0)";                
                    if (mysqli_query($conn, $sql1)) {
                    $status*=true;
                } else {
                    echo "Error: " . $sql1 . "" . mysqli_error($conn);
                }                                       
                    $i++;
                }
            mysqli_close($conn);
            header("location:index.php?page=order-manager.php");
    }
    // ADD 
    else if(isset($_POST['MSKH'])){
        include '../mysql.php';
        $SoDonDH = 'HD'. rand(0,99999999);
        $sql = "insert into dathang values('"
            . $SoDonDH . "','" 
            . $_POST['MSKH'] . "','" 
            . $_POST['MSNV'] . "','"
            . $_POST['NgayDH'] . "','" 
            . $_POST['NgayGH'] . "','" 
            . $_POST['TongTien'] . "','Đang vận chuyển')"; 
            $status=false;
        if (mysqli_query($conn, $sql)) {
            $status=true;
         } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
         }
         $i=0;
         foreach ($_POST['MSHH'] as $MSHH){
             $MSHH = explode(" - ",$MSHH)[0];
             $sql1 = "insert into chitietdathang values('"
             . $SoDonDH . "','" 
             . $MSHH . "','" 
             . $_POST['SoLuong'][$i] . "','"
             . ((int)$_POST['Gia'][$i] / (int)$_POST['SoLuong'][$i]) . "',0)";      
             echo $sql1;          
            if (mysqli_query($conn, $sql1)) {
            $status*=true;
         } else {
            echo "Error: " . $sql1 . "" . mysqli_error($conn);
        }                                       
             $i++;
         }
mysqli_close($conn);
header("location:index.php?page=order-manager.php"); }
?>    
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
                                    <div class="col-8 ">
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
                                                <div id="list-products">
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
                $sql = 'select a.SoDonDH , a.MSKH ,a.MSNV , a.NgayDH ,a.NgayGH ,a.TongTien,a.TrangThai, b.HoTenKH , c.HoTenNV from dathang a,khachhang b, nhanvien c where (a.TrangThai="Đã giao" or a.TrangThai="Đang vận chuyển" ) and a.MSKH=b.MSKH and a.MSNV=c.MSNV order by ngaydh desc';
                $result = mysqli_query($conn,$sql);
                $STT=1;
                while($row=$result->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'.$STT.'</td>';
                    echo '<td>'.$row['SoDonDH'].'</td>';
                    echo '<td id="'.$row['HoTenKH'].'">'.$row['MSKH'].'</td>';
                    echo '<td id="'.$row['HoTenNV'].'">'.$row['MSNV'].'</td>';
                    echo '<td>'.$row['NgayDH'].'</td>';
                    echo '<td>'.$row['NgayGH'].'</td>';
                    echo '<td>'.$row['TongTien'].'</td>';
                    if($row['TrangThai'] == 'Đang vận chuyển' ) echo '<td><span class="shipping">'.$row['TrangThai']. '</span></td>';
                    else echo '<td><span class="ship-done">'.$row['TrangThai']. '</span></td>';                 
                    echo '<td>
                            <i class="fas fa-pencil-alt mr-3 action-Icon-Update" onclick="updateForBill(this.parentElement.parentElement.children)" ></i>                           
                            <i class="fas fa-trash-alt mr-3 action-Icon-Delete" onclick="Delete(this.parentElement.parentElement.children[1].innerText)"></i>     
                            <i class="fas fa-eye action-Icon-Detail"  onclick="viewBillDetail(this.parentElement.parentElement.children)"></i>              
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
                    <div class="container view-detail-Bill shadow" >
                                        <div class="add-goods-header">
                                        <h5 id="bill-code">xxx</h5>
                                        <i class="fas fa-window-close icon-close" onclick="exitDetail()"></i>
                                    </div>
                                             <div class="row mt-3">
                                                 <div class="col-6">
                                                            <div class="info-detail-bill">
                                                                <label>Tên khách hàng:</label>
                                                                <span id="TenKH">Trương Việt linh</span>
                                                        </div>
                                                        <div class="info-detail-bill">
                                                                <label>Nhân viên bán:</label>
                                                                <span id="TenNV">Nguyễn Văn A</span>
                                                        </div>
                                                 </div>
                                              <div class="col-6">
                                                <div class="info-detail-bill">
                                                        <label>Ngày đặt hàng:</label>
                                                        <span id="NgayDH">2021/21/21</span>
                                                </div>
                                                <div class="info-detail-bill"> 
                                                        <label>Ngày giao hàng:</label>
                                                        <span id="NgayGH">2021/21/21</span>
                                                </div>
                                              </div>
                                              
                                              </div>
                                          <div class="table-data">
                                          <table class="table">
                                              <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>MSHH</th>
                                                      <th>Tên HH</th>
                                                      <th>Giá đặt hàng</th>
                                                      <th>Số lượng</th>
                                                      <th>Giảm giá</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  
                                              </tbody>
                                          </table>                                       
                                          </div>
                                        <p>Tổng tiền: <span class="price">100000000</span></p>
                                                                                                                                                                                               
                           
                                </div>