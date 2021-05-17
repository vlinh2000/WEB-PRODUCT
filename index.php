
   <?php
   include_once './header.php'
   ?>
        <!--CAROUSEL-->
        <div class="container main mt-3">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-8 pl-0 mb-2 pr-1">
                    <div id="banner-carosel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#banner-carosel" data-slide-to="0" class="active"></li>
                            <li data-target="#banner-carosel" data-slide-to="1"></li>
                            <li data-target="#banner-carosel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="https://cdn.tgdd.vn/2021/04/banner/800-300-800x300-5.png" width='90%'
                                        alt="slide1" >
                            </div>
                            <div class="carousel-item">
                                <img src="https://cdn.tgdd.vn/2021/03/banner/800-300-800x300-23.png" alt="slide2" 
                                    >
                            </div>
                            <div class="carousel-item">
                                <img src="https://cdn.tgdd.vn/2021/03/banner/800-300-800x300-4.png" alt="slide3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#banner-carosel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#banner-carosel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>


                <div class="d-{xl}-none col-xl-4 p-0">
                    <div class="banner">
                        <img src="https://cdn.tgdd.vn/2021/03/banner/a02-398-110-398x110-5.png" alt="banner1">
                        <img src="https://cdn.tgdd.vn/2021/03/banner/iphone-chung-398-110-398x110-2.png" alt="banner2">
                        <img src="https://cdn.tgdd.vn/2020/11/banner/IntelEvo-390x80.png" alt="banner3">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-2 mb-4 p-0">
                    <img src="https://cdn.tgdd.vn/2021/04/banner/1200-75-1200x75-3.png" alt="banner4" width='99.9%' >
                </div>
                
            </div>
        </div>
        
        <!--Khuuyen mai-->
        <div class="container products ">
                    <h4  class="category">
                        TOP SẢN PHẨM HOT NHẤT
                    </h4>
                    <hr>
                    <div id="hot-products" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#hot-products" data-slide-to="0" class="active"></li>
                            <li data-target="#hot-products" data-slide-to="1"></li>
                            <li data-target="#hot-products" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                        <?php 
                         include './mysql.php';
                         $sql = 'select a.MSHH , sum(a.SoLuong) as SoLuong ,b.HinhAnh,b.TenHH,b.Gia  from chitietdathang a, HangHoa b where a.MSHH=b.MSHH group by a.MSHH';
                         $result = mysqli_query($conn,$sql);
                         $rowcount=mysqli_num_rows($result);
                         for($i=0;$i<$rowcount;$i+=4){
                             $countProduct = 0;
                            if($i<1) echo '<div class="carousel-item active">';
                            else echo '<div class="carousel-item ">';
                             echo ' <div class="row">';
                             while($row=$result->fetch_assoc()){
                                    echo ' <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 mb-4 pd-0">
                                            <a class="phone">
                                            <img class="card-img-top" src="'.$row['HinhAnh'].'" alt="">
                                            <h5 class="name-product">'.$row['TenHH'].'</h5>
                                            <div class="price">
                                                <span class="new-price">'.number_format($row['Gia'],0,',','.').' ₫ </span>
                                                <strike class="old-price">'.number_format($row['Gia']+2000000,0,',','.').' ₫</strike> 
                                            </div>
                                            <div class="raiting-status">
                                                <span class="raiting"></span>
                                                <span class="num-raiting">đã bán: '.$row['SoLuong'].'</span>
                                            </div>
                                        </a>
                                    </div>';
                                    $countProduct++;
                                    if($countProduct==4) break;
                             }
                             echo ' </div>
                                    </div>';
                                  
                         }
                         mysqli_close($conn);
                         ?>                                                                                        
                        </div>
                        <a class="carousel-control-prev" href="#hot-products" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#hot-products" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
        </div>

        <!-- PRODUCTS-->
        <div class="container mt-5 products mb-5">
                     <h4 class='category'>
                        ĐIỆN THOẠI
                    </h4>
                    <hr>
                   <div class="row">

                   <?php 
                                        include './mysql.php';
                                        $sql = 'select MSHH,TenHH,Gia,HinhAnh from HangHoa ';
                                        $result = mysqli_query($conn,$sql);
                                        while($row=$result->fetch_assoc()){
                                            echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 mb-4 pd-0">
                                                        <a class="phone" href="productDetail.php?MSHH='.$row['MSHH'].'">
                                                            <img class="card-img-top" src="'. $row['HinhAnh'].'" alt="">
                                                            <h5 class="name-product">'. $row['TenHH'].'</h5>
                                                            <div class="price">
                                                                <span class="new-price">'. number_format($row['Gia'],0,',','.').' ₫ </span>
                                                                <strike class="old-price">'.number_format($row['Gia']+2000000,0,',','.').' ₫</strike> 
                                                            </div>
                                                            <div class="raiting-status">
                                                                <span class="raiting"></span>
                                                                <span class="num-raiting">6 đánh giá</span>
                                                            </div>
                                                        </a>
                                                    </div>';
                                        }
                                        mysqli_close($conn);
                                        ?>          
                    </div>  
                    <hr>
                    <nav aria-label="Page navigation">
                      <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav>                                            
                    </div>
        <?php
            include_once './footer.php'
        ?>