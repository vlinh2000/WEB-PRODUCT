                        <!-- <h1 class="title">Dashboard</h1> -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 view-total">
                                        <div class="view-up">
                                            <i class="fas fa-wallet icon-view"></i>
                                            <div>
                                                <p>Số đơn hàng hôm nay</p>
                                                <p class="total">
                                                <?php 
                                                    include '../mysql.php';
                                                    $today = getdate()['year']."-". getdate()['mon']."-". getdate()['mday'];
                                                    $sql = 'select count(SoDonDH) as TongHD from dathang where (TrangThai="Đã giao" or TrangThai="Đang vận chuyển") and NgayDh="'.$today.'"';                              
                                                    $result = mysqli_query($conn,$sql);
                                                    while($row=$result->fetch_assoc()){
                                                    echo '<span>'.$row["TongHD"].'</span>';
                                                    }
                                                    mysqli_close($conn);
                                                    ?>                                                   
                                                </p>
                                            </div>
                                        </div>
                                                  
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 view-total">
                                <div class="view-up">
                                            <i class="fas fa-money-bill-alt icon-view"></i>
                                            <div>
                                                <p>Doanh thu hôm nay</p>
                                                <p class="total">
                                                <?php 
                                                    include '../mysql.php';
                                                    $today = getdate()['year']."-". getdate()['mon']."-". getdate()['mday'];
                                                    $sql = 'select COALESCE(sum(TongTien), 0) as TongTien from dathang where (TrangThai="Đã giao" or TrangThai="Đang vận chuyển") and NgayDh="'.$today.'"';                                   
                                                    $result = mysqli_query($conn,$sql);
                                                    while($row=$result->fetch_assoc()){
                                                    echo '<span>₫ '. number_format($row['TongTien'],0,',','.').'</span>';
                                                    }
                                                    mysqli_close($conn);
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                                  
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 view-total">
                                
                                        <div class="view-up">
                                            <i class="fas fa-users icon-view"></i>
                                            <div>
                                                <p>Tổng khách hàng</p>
                                                <p class="total">
                                                <?php 
                                                    include '../mysql.php';                                          
                                                    $sql = 'select count(MSKH) as TongKH from khachhang';                              
                                                    $result = mysqli_query($conn,$sql);
                                                    while($row=$result->fetch_assoc()){
                                                    echo '<span>'.$row["TongKH"].'</span>';
                                                    }
                                                    mysqli_close($conn);
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                       
                              
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 view-total">
                                   
                                        <div class="view-up">
                                            <i class="fas fa-mobile-alt icon-view"></i>
                                            <div>
                                                <p>Tổng sản phẩm đã bán</p>
                                                <p class="total">
                                                <?php 
                                                    include '../mysql.php';                                          
                                                    $sql = 'select count(DISTINCT MSHH) as TongHH from chitietdathang';                              
                                                    $result = mysqli_query($conn,$sql);
                                                    while($row=$result->fetch_assoc()){
                                                    echo '<span>'.$row["TongHH"].'</span>';
                                                    }
                                                    mysqli_close($conn);
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        
                             
                                </div> 
                            </div>
                        </div>
                        <div class="confirm">
                            <p>Xác nhận đơn đặt hàng?</p>
                            <hr>
                            <button class='btn btn-primary ' id='confirmBtn'>Xác nhận</button>
                            <button  class='btn btn-warning' onclick='exitStatusGoods();'>Thoát</button>
                        </div>               
                                <div class="container bill-confirm shadow mb-5 mt-3">
                           <h5>Hóa đơn chờ xác nhận</h5>
                       <table class="table">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Khách đặt hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        include '../mysql.php';
                                        $sql = 'select a.SoDonDH ,b.HoTenKH , a.NgayDH , a.TongTien ,a.TrangThai from dathang a , khachhang b where a.TrangThai="Chờ xác nhận" and a.MSKH = b.MSKH order by ngaydh desc ';
                                        $result = mysqli_query($conn,$sql);
                                        $STT=1;
                                        while($row=$result->fetch_assoc()){
                                           echo ' <tr>
                                                    <td scope="row">'.$STT.'</td>
                                                    <td>'.$row["HoTenKH"].'</td>
                                                    <td>'.$row['NgayDH'].'</td>
                                                    <td>'. number_format($row['TongTien'],0,',','.').' ₫</td>
                                                    <td><span id="'.$row['SoDonDH'].'" onclick="statusGoods(this.id)" class="wait-confirm">'.$row['TrangThai'].'</span></td>
                                                  </tr>';
                                        $STT++;
                                        }
                                        if($STT == 1) echo '<tr><td class="not-bill-canceled">Chưa có hóa đơn cần xác nhận</td></tr>';
                                        mysqli_close($conn);
                                        ?>
                                </tbody>
                        </table>
                       </div>
                                
                                <div class="container bill-confirm shadow mb-5">
                                    <h5>Hóa đơn bị hủy</h5>
                                <table class="table">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>#</th>
                                                <th>Khách đặt hàng</th>
                                                <th>Ngày đặt hàng</th>
                                                <th>Tổng tiền</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                    include '../mysql.php';
                                                    $sql = 'select b.HoTenKH , a.NgayDH , a.TongTien ,a.TrangThai from dathang a , khachhang b where a.TrangThai="Đã hủy" and a.MSKH = b.MSKH order by ngaydh desc ';
                                                    $result = mysqli_query($conn,$sql);
                                                    $STT=1;
                                                    while($row=$result->fetch_assoc()){
                                                    echo ' <tr>
                                                                <td scope="row">'.$STT.'</td>
                                                                <td>'.$row["HoTenKH"].'</td>
                                                                <td>'.$row['NgayDH'].'</td>
                                                                <td>'. number_format($row['TongTien'],0,',','.').' ₫</td>
                                                                <td><span class="canceled">'.$row['TrangThai'].'</span></td>
                                                            </tr>';
                                                    $STT++;
                                                    }
                                                    if($STT == 1) echo '<tr><td class="not-bill-canceled">Chưa có hóa đơn nào bị hủy</td></tr>';
                                                    mysqli_close($conn);
                                                    ?>
                                            </tbody>
                                    </table>                     
                            </div>
                       
                      
                        