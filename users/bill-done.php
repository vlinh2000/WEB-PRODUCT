<?php
include './header.php';
?>
<?php
if(isset($_POST['SoDonDH'])){
    include '../mysql.php';
    if(isset($_POST['NgayGH'])) $sql = "update dathang set TrangThai='".$_POST['TrangThai']."',NgayGH='".$_POST['NgayGH']."' where SoDonDH='".$_POST['SoDonDH']."'"; 
    else $sql = "update dathang set TrangThai='".$_POST['TrangThai']."' where SoDonDH='".$_POST['SoDonDH']."'"; 
    if (mysqli_query($conn, $sql)) {
     } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
     }
     mysqli_close($conn);
}

?>
    <div class="container all-ordered">
        <h5 class="title-ordered">Hóa đơn của tôi</h5>
        <?php
        include '../mysql.php';
        if(!isset($_SESSION['ID'])) {
            header("location:login.php");
            return;
        }
        $sql = 'select * from dathang where MSKH="'.$_SESSION['ID'].'" ORDER BY NgayDH DESC';
        $result = mysqli_query($conn,$sql);
        $check =false;
            while($row=$result->fetch_assoc()){
                $check=true;
                echo ' <div class="ordered">
                         <p class="top"><span class="code-bill">'.$row['SoDonDH'].'</span>';
                         if($row['TrangThai']=='Đang vận chuyển') echo '<span onclick="statusGoods(this.parentElement.children[0].innerHTML);" class="shipping">'.$row['TrangThai'].'</span></p>';
                         else if($row['TrangThai']=='Chờ xác nhận') echo '<span><span class="wait-confirm">'.$row['TrangThai'].'</span></span</p>';
                         else if($row['TrangThai']=='Đã hủy') echo '<span class="canceled">'.$row['TrangThai'].'</span></p>';
                         else echo '<span class="ship-done">'.$row['TrangThai'].'</span></p>';
                         echo ' <table class="table"> ';
                         $sql1 = "select b.HinhAnh, b.TenHH, a.SoLuong, a.GiaDatHang from chitietdathang a , hanghoa b where a.MSHH= b.MSHH and a.SoDonDH='".$row['SoDonDH']."'";
                         $result1 = mysqli_query($conn,$sql1);
                         while($row1=$result1->fetch_assoc()){
                          echo     ' <tr>
                                             <td>
                                                 <img width="60px" heigh="80px" src="'.$row1['HinhAnh'].'" alt="product">
                                             </td>
                                             <td colspan="4">
                                                 <p>'.$row1['TenHH'].'</p>
                                             </td>
                                             <td><span class="num">x'.$row1['SoLuong'].'</span></td>
                                             <td><span class="price">₫ '.number_format($row1['GiaDatHang']*$row1['SoLuong'],0,',','.').'</span></td>
                                         </tr> ' ;
                         }
                             
                         echo '</table>
                             <hr>
                             <div class="date-total">
                             <p><span>Ngày mua hàng: </span><span>'.$row['NgayDH'].'</span></p>
                             <p><span>Ngày giao hàng dự kiến: </span><span>'.$row['NgayGH'].'</span></p>
                             <p><span>Phí vận chuyển: </span><span>₫ 30.000</span></p>
                             <p><span>Tổng tiền:</span><span class="total">₫ '.number_format($row['TongTien'],0,',','.').'</span></p>';
                             if($row['TrangThai']=='Chờ xác nhận') echo '<p><span class="btn-cancel" id="'.$row['SoDonDH'].'" onclick="cancled(this.id)">Hủy đơn hàng</span></p>';
                           echo '  </div>
                                    </div>';     
             }
             if($check== false) echo '<p class="notif-bill">Bạn chưa mua hàng tại shop :( </p>';
        mysqli_close($conn);
        ?>
       <div class="confirm">
         <p>Bạn đã nhận được hàng?</p>
         <hr>
         <button class='btn btn-primary ' id='receivedBtn' >Đã nhận</button>
         <button  class='btn btn-warning' onclick='exit();'>Thoát</button>
       </div>
            
            
    </div>
<?php
include './footer.php';
?>
