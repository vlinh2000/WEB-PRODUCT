<?php
            include_once './header.php';
            if(count($_SESSION['Cart'])==0 ) header("Location:cart.php");
            if(!isset($_SESSION['ID'])) header("Location:login.php");
            if(isset($_GET['action']) && $_GET['action']=="confirm") {
                include '../mysql.php';
                $SoDonDH = 'HD' . rand(0,9999999);
                $date = getdate();
                $NgayDH = $date['year'] . "/" . $date['mon'] . "/" . $date['mday'] ;
                // $NgayGH = $date['year'] . "/" . $date['mon'] . "/" . ($date['mday'] + 2) ;
                $total=30000;
                        foreach ($_SESSION['Cart'] as $product) {
                                $total+=(int)$product['Gia'] * (int)$product['SoLuong'];
                        }
                $sql = "insert into dathang (SoDonDH,MSKH,MSNV,NgayDH,TongTien) values('".$SoDonDH."','".$_SESSION['ID']."','NV01','".$NgayDH."','".$total."')";
                $status=false;
                if(mysqli_query($conn,$sql)){
                    $status = true;
                }
                foreach($_SESSION['Cart'] as $product){
                $sql1 = "insert into chitietdathang values('".$SoDonDH."','".$product['MSHH']."','".$product['SoLuong']. "','".(int)$product['Gia']."','0')";
                  if(mysqli_query($conn,$sql1)){
                    $status = $status*true;
                }
            };
            mysqli_close($conn);
                if($status = true) {
                    unset($_SESSION['Cart']);
                    echo '<script>window.localStorage.clear();</script>';
                    echo "<script>window.location.href='bill-done.php'</script>";
                }
            }
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
            <div class="cart-detail-bill">
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
                               <span >30.000 ₫</span>
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
                            <div class="total-bill">
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
                    <div class="container pay-btn mb-4">
                        <a href='bill.php?action=confirm'>Đặt hàng</a>
                    </div>
        <?php
            include_once './footer.php'
        ?>
     
