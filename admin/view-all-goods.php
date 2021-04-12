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
            <div class="panel-heading">HÀNG HÓA</div>
            <div class="panel-body">
                <p>Cập nhật từ ngày 18-3-2021</p>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>MSHH</th>
                        <th>TenHH</th>
                        <th>HinhAnh</th>
                        <th>MaLoaiHang</th>
                        <th>Gia</th>
                        <th>SoLuongHang</th>
                        <th>Ghichu</th>
                        <th>QuyCach</th>
                        <th>ManHinh</th>
                        <th>HeDieuHanh</th>
                        <th>CamSau</th>
                        <th>CamTruoc</th>
                        <th>Chip</th>
                        <th>Ram</th>
                        <th>Rom</th>
                        <th>Sim</th>
                        <th>Pin</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                                        include '../mysql.php';
                                        $sql='select * from HangHoa';
                                        $result = mysqli_query($conn,$sql);
                                        $STT=1;
                                        while($row = $result->fetch_assoc()){
                                          echo '<tr>' ;
                                          echo '<td>'.$STT.'</td>';
                                          echo '<td>'.$row['MSHH'].'</td>';
                                          echo '<td>'.$row['TenHH'].'</td>';
                                          echo ' <td class="product-image">
                                                    <img src="'.$row['HinhAnh'].'"
                                                        alt="'.$row['MSHH'].'">
                                                </td>';
                                          echo '<td>'.$row['MaLoaiHang'].'</td>';
                                          echo '<td>'.$row['Gia'].'</td>';
                                          echo '<td>'.$row['SoLuongHang'].'</td>';
                                          echo '<td>'.$row['Ghichu'].'</td>';
                                          echo '<td>'.$row['QuyCach'].'</td>';
                                          echo '<td>'.$row['ManHinh'].'</td>';
                                          echo '<td>'.$row['HeDieuHanh'].'</td>';
                                          echo '<td>'.$row['CamSau'].'</td>';
                                          echo '<td>'.$row['CamTruoc'].'</td>';
                                          echo '<td>'.$row['Chip'].'</td>';
                                          echo '<td>'.$row['Ram'].'</td>';
                                          echo '<td>'.$row['Rom'].'</td>';
                                          echo '<td>'.$row['Sim'].'</td>';
                                          echo '<td>'.$row['Pin'].'</td>';
                                          echo '</tr>';  
                                          $STT++;
                                        }                                                                  
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