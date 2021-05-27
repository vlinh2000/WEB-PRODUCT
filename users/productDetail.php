        <?php
            include_once './header.php';
        ?>
        <div class="container product-detail mb-4">
            <div class="row mt-2">
            <?php 
                include '../mysql.php';
                $sql = 'select * from HangHoa where MSHH="'.$_GET['MSHH'].'"';
                $result = mysqli_query($conn,$sql);
                while($row=$result->fetch_assoc()){
                    echo '<h3 class="product-detail-name" id="product-detail-name">'.$row['TenHH'].'</h3><div class="line-down"></div>';
                    echo '<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 mb-4">
                                <div class="view-product">
                                <img src="'.$row['HinhAnh'].'" class="product-image" id="product-image">                              
                                <div class="price" id="price">'.number_format($row['Gia'],0,',','.').' ₫ </div>
                         </div>
                         </div>';
                         
                    echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 mb-4">
                            <div class="km">
                                        <h3 >KHUYẾN MÃI</h3>
                                        <div><i class="fas fa-check-circle" mr-2 style="color: green;"></i>
                                            <span>Giảm giá 1,000,000đ khi tham gia thu cũ đổi mới</span>
                                        </div>
                                        <a href="#">Xem chi tiết</a>
                                        <div>(*) Giá hoặc khuyến mãi không áp dụng đối với 1 số gói trả góp</div>
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
                                <span>Mua ngay</span>
                                <span>Giao hàng tận nơi miễn phí</span>
                            </div>
                        </div>';
                    echo '<div class="col-xs-12 col-sm-12 col-md-7 col-lg-5 mb-4">
                            <div class="tskt">
                                        <h3 >THÔNG SỐ KỸ THUẬT</h3>
                                        <table class="table">
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
        
   
        <?php
            include_once './footer.php'
        ?>