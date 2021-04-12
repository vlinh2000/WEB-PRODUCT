        <?php
            include_once './header.php';
        ?>
        <div class="container">
            <div class="row mt-2">
            <?php 
                include './mysql.php';
                $sql = 'select * from HangHoa where MSHH="'.$_GET['MSHH'].'"';
                $result = mysqli_query($conn,$sql);
                while($row=$result->fetch_assoc()){
                    echo '<h3 class="name-product">'.$row['TenHH'].'</h3>';
                    echo '<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <div class="thumbnail">
                                    <img src="'.$row['HinhAnh'].'">
                                </div>
                                <div class="price"><span class="label label-success">₫ '.$row['Gia'].' </span></div>
                         </div>';
                    echo '<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                            <div class="km">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">KHUYẾN MÃI</h3>
                                        <span style="font-size: 12px;">Giá và khuyến mãi dự kiến áp dụng đến
                                            23:00
                                            31/12/2021</span>
                                    </div>
                                    <div class="panel-body">
                                        <div><i class="fas fa-check-circle" mr-2 style="color: green;"></i>
                                            <span>Giảm giá 1,000,000đ khi tham gia thu cũ đổi mới</span>
                                        </div>
                                        <a href="#">Xem chi tiết</a>
                                        <div>(*) Giá hoặc khuyến mãi không áp dụng đối với 1 số gói trả góp</div>
                                    </div>
                                </div>
                            </div>
                            <div class="service">
                                <h5>Chọn thêm các dịch vụ</h5>
                                <div>
                                    <input type="checkbox" name="ship">
                                    <span>Giao ngay từ cửa hàng gần bạn nhất</span>
                                </div>
                                <div>
                                    <input type="checkbox" name="ship">
                                    <span>Chuyển danh bạ, dữ liệu qua máy mới</span>
                                </div>
                                <div>
                                    <input type="checkbox" name="ship">
                                    <span>Mang thêm điện thoại khác để bạn xem</span>
                                </div>
                            </div>
                            <div class="buy-it" onclick="addToCart(this.id)" id="'.$row['MSHH'].'">
                                <button  >Mua ngay</button>
                                <span>Giao hàng tận nơi miễn phí</span>
                            </div>
                        </div>';
                    echo '<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <div class="tskt">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">THÔNG SỐ KỸ THUẬT</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>Màn hình:</td>
                                                    <td>'.$row['ManHinh'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Hệ điều hành:</td>
                                                    <td>'.$row['HeDieuHanh'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Camera sau:</td>
                                                    <td>'.$row['CamSau'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Camera trước:</td>
                                                    <td>'.$row['CamTruoc'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Chip xử lý:</td>
                                                    <td>'.$row['Chip'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>RAM:</td>
                                                    <td>'.$row['Ram'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Bộ nhớ trong:</td>
                                                    <td>'.$row['Rom'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>SIM:</td>
                                                    <td>'.$row['Sim'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Pin:</td>
                                                    <td>'.$row['Pin'].'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                mysqli_close($conn);
            ?>  
            </div>
        </div>
        
   
        <?php
            include_once './footer.php'
        ?>