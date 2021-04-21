<?php
            include_once './header.php';
        ?>
        <?php
       
        ?>
        <div class="container pay-title"></i>Thanh toán</div>
        <div class="container address">
            <span><i class="fas fa-map-marker-alt mr-2"></i>Địa chỉ nhận hàng</span>
            <div class='address-detail'>
                <?php 
                echo "<span class='name-phone'>".$_SESSION['FullName']." (+84) ".$_SESSION['Phone']."</span>
                        <span class='location'>".$_SESSION['DiaChi']."</span>
                        <span class='address-default'>Mặc định</span>"
                
                ?>
                <a href="personal-info.php">Thay đổi</a>
            </div>
        </div>
        <div class="container mt-3 item-in-cart"> 
            <div class="cart-detail">
                <table class="table list-item ">
                    <tr>
                        <th></th>
                        <th>Sản phẩm</th>                     
                        <th>Đơn giá </th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php 
                    $total=0;
                        foreach ($_SESSION['Cart'] as $product) {
                           $checkDecrease = $product['SoLuong'] == "1" ? true : "";
                           $checkOnclickDecrease = $product['SoLuong'] != "1" ? 'onclick=addToCart(this.parentElement.parentElement.id,"DECREASE")':"";
                            echo '<tr id='.$product['MSHH'].'>
                                    <td>
                                        <img src="'.$product['HinhAnh'].'" width="50px" heigh="70px" id="product-image" />
                                    </td>
                                    <td >'.$product['TenHH'].'</td>    
                                    <td id="price">'.number_format((int)$product['Gia'],0,',','.').' ₫</td>             
                                    <td>'.$product['SoLuong'].'</td>
                                    <td>'. number_format((int)$product['Gia'] * (int)$product['SoLuong'],0,',','.').' ₫</td>
                                </tr>'
                                ;
                                $total+=(int)$product['Gia'] * (int)$product['SoLuong'];
                        }
                     ?>              
                     <tr class='transport'>
                         <td></td>
                         <td></td>
                         <td>
                            <span class='transport-title'>Đơn vị vận chuyển</span>
                         </td>
                         <td class='transporter'> 
                             <p>Vận Chuyển Nhanh</p>
                             <span>Giao hàng tiết kiệm</span>
                        
                         </td>
                         <td class='transport-price'> 
                               <span >49.000 đ</span>
                        </td>
                     </tr>              
                </table>
                
                </div>
                </div>
                <div class="container pay-method">
                    <p>Phương thức thanh toán</p>
                    <span>Thanh toán khi nhận hàng</span>
                </div>    
                    <div class="container over-done-bill">
                        <div></div>
                        <div class='done-bill'>
                            <div class="total">
                                <p>Tổng tiền hàng</p>
                                <?php echo '<span >' . number_format($total,0,',','.'). ' đ</span>';?>
                            </div>
                            <div class='fee' >
                                 <p>Phí vận chuyển: </p>
                                 <span>30.000đ</span>
                            </div>
                            <div class='all-total'>
                                <p >Tổng thanh toán : </p>
                                <?php echo '<span >' . number_format($total+30000,0,',','.'). ' đ</span>';?>
                            </div>
                        </div>
                    </div>          
                <div class="container pay-btn">
                    <button type="button" >Đặt hàng</button>
                </div>
                </div>
            
        
        <?php
            include_once './footer.php'
        ?>
     
