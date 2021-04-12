
   <?php
   include_once './header.php'
   ?>
        <!--CAROUSEL-->
        <div class="container mt-10">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 mb-5">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="https://cdn.tgdd.vn/2021/03/banner/renomarvel-800-300-800x300.png"
                                    alt="slide1" style="width:100%;">
                            </div>

                            <div class="item">
                                <img src="https://cdn.tgdd.vn/2021/03/banner/800-300-800x300-23.png" alt="slide2"
                                    style="width:100%;">
                            </div>

                            <div class="item">
                                <img src="https://cdn.tgdd.vn/2021/03/banner/800-300-800x300-4.png" alt="slide3"
                                    style="width:100%;">
                            </div>
                        </div>
                        

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                    <div class="banner">
                        <img src="https://cdn.tgdd.vn/2021/03/banner/a02-398-110-398x110-5.png" alt="banner1">
                        <img src="https://cdn.tgdd.vn/2021/03/banner/iphone-chung-398-110-398x110-2.png" alt="banner2">
                        <img src="https://cdn.tgdd.vn/2020/11/banner/IntelEvo-390x80.png" alt="banner3">
                    </div>
                </div>


            </div>
        </div>
        
        <!-- PRODUCTS-->
 <div class="container mt-5 products ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        ĐIỆN THOẠI
                    </h3>
                </div>
                <div class="panel-body">
                   <div class="row">
                   <?php 
                                        include './mysql.php';
                                        $sql = 'select MSHH,TenHH,Gia,HinhAnh from HangHoa';
                                        $result = mysqli_query($conn,$sql);
                                        while($row=$result->fetch_assoc()){
                                            echo '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">';
                                            echo '<a href="productDetail.php?MSHH='.$row['MSHH'].'" class="thumbnail"> 
                                                        <img src="'.$row['HinhAnh'].'"alt="'.$row['MSHH'].'"> 
                                                        <div class="caption">
                                                            <h5>'.$row['TenHH'].'</h5>
                                                            <span class="label label-success">'.$row['Gia'].' VNĐ ₫</span>
                                                        </div>   
                                                   </a>';
                                            echo '</div>';
                                        }
                                        mysqli_close($conn);
                                        ?>                                                          
                   </div>

                </div>

                <!-- PAGENATION-->
                <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <?php
            include_once './footer.php'
        ?>