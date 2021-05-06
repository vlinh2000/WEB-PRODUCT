<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View ALL</title>

    <!-- Optional theme -->
    <link rel="stylesheet" href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/media.css">
</head>

<body>
    <!--MANAGER GOODS -->
    <div class="container-fluid mt-3 mb-5 ml-10">
        <a type="button" href="javascript: window.history.back()" class="btn btn-success back-Icon">
            <i class="fas fa-arrow-alt-circle-left"></i>
            <span>Back</span>
        </a>
    </div>


    <div class="container-fluid goods">
        <div class="panel panel-primary">
            <div class="panel-heading">CHI TIẾT HÓA ĐƠN <?php echo '<span class="label label-warning">'.$_GET['SoDonDH'].'</span>' ?> </div>
            <div class="panel-body">
                <p>Cập nhật từ ngày 18-3-2021</p>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>SoDonDH</th>
                        <th>MSHH</th>
                        <th>TenHH</th>
                        <th>SoLuong</th>
                        <th>GiaDatHang</th>
                        <th>GiamGia</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                                        include '../mysql.php';
                                        $sql='select b.SoDonDH,b.MSHH,a.TenHH,b.SoLuong,b.GiaDatHang,b.GiamGia from HangHoa a , ChiTietDatHang b where b.SoDonDH="'.$_GET['SoDonDH'].'" and b.MSHH = a.MSHH';
                                        $result = mysqli_query($conn,$sql);
                                        $STT=1;
                                        while($row = $result->fetch_assoc()){
                                          echo '<tr>' ;
                                          echo '<td>'.$STT.'</td>';
                                          echo '<td>'.$row['SoDonDH'].'</td>';
                                          echo '<td>'.$row['MSHH'].'</td>';
                                          echo '<td>'.$row['TenHH'].'</td>';
                                          echo '<td>'.$row['SoLuong'].'</td>';
                                          echo '<td>'.$row['GiaDatHang'].'</td>';
                                          echo '<td>'.$row['GiamGia'].'</td>';
                                          echo '</tr>';  
                                          $STT++;
                                        }                
                                        mysqli_close($conn);                                                  
                                        ?>              
                </tbody>
            </table>
        </div>


    </div>



    </div>

    </div>


    </div>
    </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="../lib/bootstrap-3.3.7-dist/js/jquery-360.min.js"> </script>
    <script src="../lib/fontawesome-free-5.15.3-web/js/all.min.js"></script>
    <script src="../lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>

</html>