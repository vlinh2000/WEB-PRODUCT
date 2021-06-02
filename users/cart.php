        <?php
            include_once './header.php';
        ?>
        <?php
        if(isset($_POST['Cart'])){
            if($_POST['Cart'] == 'null') $_SESSION['Cart']=array();
            else $_SESSION['Cart']=$_POST['Cart'];
        }
        // if(isset($_GET['pay']) && $_GET['pay'] == 'true'){
            
        // }
        ?>

        <div class="container mt-5 mb-5">
            <div class="cart-detail">
                <table class="table list-item">
                    <tr>
                        <th>STT</th>
                        <th>Hình Ảnh</th>
                        <th>Sản phẩm</th>                     
                        <th>Đơn giá </th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php 
                    $STT=1;
                    $total=0;
                        foreach ($_SESSION['Cart'] as $product) {
                           $checkDecrease = $product['SoLuong'] == "1" ? true : "";
                           $checkOnclickDecrease = $product['SoLuong'] != "1" ? 'onclick=addToCart(this.parentElement.parentElement.id,"DECREASE")':"";
                            echo '<tr id='.$product['MSHH'].'>
                                    <td>'.$STT.'</td>
                                    <td>
                                        <img src="'.$product['HinhAnh'].'" width="100px" heigh="120px" id="product-image" />
                                    </td>
                                    <td id="product-detail-name">'.$product['TenHH'].'</td>    
                                    <td id="price">'.number_format((int)$product['Gia'],0,',','.').' ₫</td>             
                                    <td class="number-of-product"><i class="fas fa-plus-square" onclick=addToCart(this.parentElement.parentElement.id,"INCREASE")></i><span id="product-number">'.$product['SoLuong'].'</span><i  class="fas fa-minus-square Status'.$checkDecrease.'"  '.$checkOnclickDecrease.' ></i></td>
                                    <td>'. number_format((int)$product['Gia'] * (int)$product['SoLuong'],0,',','.').' ₫</td>
                                    <td class="action">
                                        <i class="fas fa-trash-alt action-Icon-Delete" onclick="Delete(this.parentElement.parentElement.id)"></i> 
                                    </td>
                                </tr>'
                                ;
                                $STT++;
                                $total+=(int)$product['Gia'] * (int)$product['SoLuong'];
                        }
                        if(count($_SESSION['Cart'])==0 ) echo '<tr><td rowspan="5" class="not-add">Chưa thêm sản phẩm vào giỏ hàng</td></tr>';
                     ?>                            
                </table>
                </div>
                <div class= <?php echo (count($_SESSION['Cart'])!=0) ? 'bill':'not-products'?>>
                    <span class="total">Tổng tiền (<?php echo isset($_SESSION['Cart']) ? count($_SESSION['Cart']) : 0 ;echo ' sản phẩm) : ' . number_format($total,0,',','.'). ' đ</span>';?>
                    <a href='bill.php'>Mua hàng</a>
                </div>
            </div>
       
        <?php
            include_once './footer.php'
        ?>
     
