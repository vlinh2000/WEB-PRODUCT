        <?php
            include_once './header.php';
           if(isset($_POST['Cart'])) echo '1';
           else echo '0';
        ?>
        <div class="container mt-5">
            <div class="cart">
                <table class="table table-hover list-item">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Đơn giá </th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                        <th>Thao tác</th>
                    </tr>
                    <!--PRODUCT IN CART -->
                   
                    
                </table>
                <div class="bill">
                    <span class="total">Tổng tiền (<?php echo isset($_SESSION['Cart']) ? count($_SESSION['Cart']) : 0 ?> sản phẩm) : 20.000.000đ</span>
                    <button type="button" class="btn btn-danger">Mua hàng</button>
                </div>


            </div>
        </div>
        <?php
            include_once './footer.php'
        ?>
     
