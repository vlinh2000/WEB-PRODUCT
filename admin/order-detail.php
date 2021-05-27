
                                        <?php          //API TO GET DATA FOR VIEW DETAIL BILL
                                                   if(isset($_GET['SoDonDH'])){
                                                    header("Content-Type: application/json; charset=UTF-8");                
                                                    include '../mysql.php';
                                                    $sql='select b.MSHH , a.TenHH , b.SoLuong , b.GiaDatHang , b.GiamGia from hanghoa a , ChiTietDatHang b where b.SoDonDH="'.$_GET['SoDonDH'].'" and b.MSHH = a.MSHH ';
                                                    $result = mysqli_query($conn,$sql);                                                                                                     
                                                    $outp = $result->fetch_all(MYSQLI_ASSOC);                                               
                                                    echo json_encode($outp);   
                                                    mysqli_close($conn);      
                                                    return;   
                                                   }      
                                                   // API GET DATA FOR statistical
                                                   if(isset($_GET['action']) && $_GET['action']=='listBill'){
                                                    header("Content-Type: application/json; charset=UTF-8");                
                                                    include '../mysql.php';
                                                    $sql='select COUNT(SoDonDH) as TongHD, sum(TongTien) as TongTien ,month(NgayDH) as Thang from dathang where TrangThai="Đã giao" or TrangThai="Đang vận chuyển" GROUP BY month(NgayDH)';
                                                    $result = mysqli_query($conn,$sql);                                                                                                     
                                                    $outp = $result->fetch_all(MYSQLI_ASSOC);                                               
                                                    echo json_encode($outp);   
                                                    mysqli_close($conn);      
                                                    return;  
                                                   }
                                                       
                                        ?>