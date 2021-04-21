<!-- FOOTER-->
<div class="container-fluid footer">
            <div class="container list-info">
                 <div class="item-footer">
                        <p>CHĂM SÓC KHÁCH HÀNG</p>
                        <ul class="list-detail">
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
                        <ul class="list-detail">
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
                        <ul class="list-detail list-icon-pay">
                            <li>
                                <div class="icon-pay visa-icon"></div>
                            </li>
                            <li>
                                <div class="icon-pay master-card-icon"></div>
                            </li>
                            <li>
                                <div class="icon-pay amex-icon"></div>
                            </li>
                            <li>
                                <div class="icon-pay code-icon"></div>
                            </li>
                            <li>
                                <div class="icon-pay jcb-icon"></div>
                            </li>
                            <li>
                                <div class="icon-pay airpay-icon"></div>
                            </li>
                            <li>
                                <div class="icon-pay installment-icon"></div>
                            </li>   
                        </ul>
                    </div>    
                    <div class="item-footer">
                        <p>THEO DÕI CHÚNG TÔI TRÊN</p>
                        <ul class="list-detail">
                        <li>
                            <a href="#">
                            <i class="fab fa-facebook"></i>Facebook</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>Instagram
                                </a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-linkedin"></i>LinkedIn</a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitter-square"></i>Twitter</a>
                            </li> 
                        </ul>
                    </div>               
                    <div class="item-footer">
                        <p>ĐƠN VỊ VẬN CHUYỂN</p>
                        <ul class="list-detail list-icon-transport">
                            <li>
                                <div class="icon-pay ghn-icon"></div>
                            </li>
                            <li>
                                <div class="icon-pay viettel-icon"></div>
                            </li>
                            <li>
                                <div class="icon-pay vnpost-icon"></div>
                            </li>
                            <li>
                                <div class="icon-pay jandt-icon"></div>
                            </li>
                            <li>
                                <div class="icon-pay nowship-icon"></div>
                            </li>
                            <li>
                                <div class="icon-pay shoppe-icon"></div>
                            </li>  
                            <li>
                                <div class="icon-pay bestexpress-icon"></div>
                            </li> 
                        </ul>
                    </div>                        
            </div>
        </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="./lib/bootstrap-3.3.7-dist/js/jquery-360.min.js"> </script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./lib/fontawesome-free-5.15.3-web/js/all.min.js"></script>
    <script src="./lib/bootstrap-3.3.7-dist/js/jquery-360.min.js"></script>
    <script>

        function checkProductExistInCart(Cart, product,action){
            if(Cart.find(x=>x.MSHH===product.MSHH) == undefined) return [...Cart,product];
            switch(action){
            case 'INCREASE' : 
                return Cart.map(x=> {
                    if(x.MSHH == product.MSHH) return {...x,SoLuong: x.SoLuong+=1}; 
                    else return x;
                } );
            // $('#product-number').html(Number($('#product-number').html()) + 1);
                break;
            case 'DECREASE' : 
                return Cart.map(x=> {
                if(x.MSHH == product.MSHH) return {...x,SoLuong: x.SoLuong-=1}; 
                else return x;
                } );
                break;
            default:
                return Cart.map(x=> {
                    if(x.MSHH == product.MSHH) return {...x,SoLuong: x.SoLuong+=1}; 
                    else return x;
                } );
                break;
        }
           
        }

        function addToCart(MSHH,action='ADD'){
        const Cart = localStorage.getItem('Cart') ? JSON.parse(localStorage.getItem('Cart')) : [];
        let product = {MSHH:MSHH ,TenHH: $('#product-detail-name').html(), HinhAnh : $('#product-image').attr('src') , Gia: $('#price').html().split(".").join("")  , SoLuong: 1};
        localStorage.setItem('Cart',JSON.stringify(checkProductExistInCart(Cart, product,action)));
         $.ajax({
        type: 'POST',
        url:'cart.php',
        contentType: "application/x-www-form-urlencoded",
        data: {Cart:JSON.parse(localStorage.getItem('Cart'))} , 
        success: function(result){
          window.location.href = '/SHOPPINGWEB/cart.php';
        }  
        });
        }

        function loadCart(){
        if(localStorage.getItem('Cart')) {
            $.ajax({
                type: 'POST',
                url:'cart.php',
                contentType: "application/x-www-form-urlencoded",
                data: {Cart:JSON.parse(localStorage.getItem('Cart'))} , 
                success: function(result){
                //
                }  
        });
        }
        }

        function Delete(MSHH){
            console.log(MSHH);
            let Cart = localStorage.getItem('Cart') ? JSON.parse(localStorage.getItem('Cart')) : [];
             Cart = Cart.filter((product)=> product.MSHH !== MSHH);
            localStorage.setItem('Cart',JSON.stringify(Cart));
            let data = Cart.length == 0 ? {Cart:'null'} : {Cart: Cart};
            console.log(data);
            $.ajax({
            type: 'POST',
            url:'cart.php',
            data: data , 
            success: function(result){
              window.location.href = '/SHOPPINGWEB/cart.php';
            }  
        });
        }
    </script>

</body>

</html>