        <?php
            include_once './header.php'
        ?>
        <div class="container mt-5">
            <div class="cart">
                <table class="table table-hover list-item">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Đơn giá </th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                        <th>Thao tác</th>
                    </tr>
                    <!--PRODUCT IN CART -->
                    <tr>
                        <td>IPhone 7 Plus Cũ 256Gb Nguyên Bản Đẹp Như Mới</td>
                        <td>₫ 7,090,000</td>
                        <td>
                            <div class="changeAmout">

                                <button type="button">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <span class="viewAmout">1</span>
                                <button type="button">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </td>
                        <td>₫ 7,090,000</td>
                        <th>
                            <button type="button" class="btn btn-primary">Xóa</button>
                        </th>
                    </tr>
                </table>
                <div class="bill">
                    <span class="total">Tổng tiền (3 sản phẩm) : 20.000.000đ</span>
                    <button type="button" class="btn btn-danger">Mua hàng</button>
                </div>


            </div>
        </div>
        <?php
            include_once './footer.php'
        ?>
     
