<!-- FOOTER-->
<div class="container-fluid footer mt-5">
            <div class="container list-info">
                 <div class="item-footer">
                        <p>CHĂM SÓC KHÁCH HÀNG</p>
                        <ul>
                            <li>
                                <a href="#">Trung Tâm Trợ Giúp</a>
                            </li>
                            <li>
                                <a href="#">PhoneStore Blog</a>
                            </li>
                            <li>
                                <a href="#">Hướng Dẫn Mua Hàng</a>
                            </li>
                            <li>
                                <a href="#">Hướng Dẫn Bán Hàng</a>
                            </li>
                            <li>
                                <a href="#">Chính Sách Bảo Hành</a>
                            </li>
                        </ul>
                    </div>    
                    <div class="item-footer">
                        <p>VỀ PHONESTORE</p>
                        <ul>
                            <li>
                                <a href="#">Giới thiệu về PHONESTORE</a>
                            </li>
                            <li>
                                <a href="#">Tuyển dụng</a>
                            </li>
                            <li>
                                <a href="#">Điều khoản PhoneStore</a>
                            </li>
                            <li>
                                <a href="#">Chính sách bảo mật</a>
                            </li>
                            <li>
                                <a href="#">Chính hãng</a>
                            </li>
                        </ul>
                    </div>    
                    <div class="item-footer">
                        <p>THANH TOÁN</p>
                        <ul>
                            <li>
                                <a href="#">Trung Tâm Trợ Giúp</a>
                            </li>
                            <li>
                                <a href="#">Shopee Blog</a>
                            </li>
                            <li>
                                <a href="#">Shopee Mall</a>
                            </li>
                            <li>
                                <a href="#">Hướng Dẫn Mua Hàng</a>
                            </li>
                            <li>
                                <a href="#">Hướng Dẫn Bán Hàng</a>
                            </li>
                        </ul>
                    </div>    
                    <div class="item-footer">
                        <p>CHĂM SÓC KHÁCH HÀNG</p>
                        <ul>
                            <li>
                                <a href="#">Trung Tâm Trợ Giúp</a>
                            </li>
                            <li>
                                <a href="#">Shopee Blog</a>
                            </li>
                            <li>
                                <a href="#">Shopee Mall</a>
                            </li>
                            <li>
                                <a href="#">Hướng Dẫn Mua Hàng</a>
                            </li>
                            <li>
                                <a href="#">Hướng Dẫn Bán Hàng</a>
                            </li>
                        </ul>
                    </div>               
                    <div class="item-footer">
                        <p>CHĂM SÓC KHÁCH HÀNG</p>
                        <ul>
                            <li>
                                <a href="#">Trung Tâm Trợ Giúp</a>
                            </li>
                            <li>
                                <a href="#">Shopee Blog</a>
                            </li>
                            <li>
                                <a href="#">Shopee Mall</a>
                            </li>
                            <li>
                                <a href="#">Hướng Dẫn Mua Hàng</a>
                            </li>
                            <li>
                                <a href="#">Hướng Dẫn Bán Hàng</a>
                            </li>
                        </ul>
                    </div>                        
            </div>
        </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="./lib/bootstrap-3.3.7-dist/js/jquery-360.min.js"> </script>
    <script src="./lib/fontawesome-free-5.15.3-web/js/all.min.js"></script>
    <script src="./lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script>

        function checkProductExistInCart(Cart, product){
            if(Cart.find(x=>x.MSHH===product.MSHH) == undefined) return [...Cart,product];
            return Cart.map(x=> {
                if(x.MSHH == product.MSHH) return {...x,SoLuong: x.SoLuong+=1}; 
                else return x;
            } );
        }

        function addToCart(MSHH){
        const Cart = localStorage.getItem('Cart') ? JSON.parse(localStorage.getItem('Cart')) : [];
        const product = {MSHH:MSHH ,TenHH: $('.name-product').html(), HinhAnh : $('img').attr('src') , Gia: $('.price span').html()  , SoLuong: 1};
        localStorage.setItem('Cart',JSON.stringify(checkProductExistInCart(Cart, product)));
            $.ajax({
        url:'cart.php',
        type: 'post',
        data: { Cart:localStorage.getItem('Cart')} , 
        dataType: "json",
        success: function(result){
        console.log(result)
        }  
        });
          //  window.location.href = '/SHOPPINGWEB/cart.php'
        }
        function navResponsive() {
            var x = document.getElementById("myTopnav");
            console.log(x);
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>

</body>

</html>