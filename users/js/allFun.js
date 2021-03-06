function ordered() {
    console.log('ok');
}
function checkProductExistInCart(Cart, product, action) {
    if (Cart.find(x => x.MSHH === product.MSHH) == undefined) return [...Cart, product];
    switch (action) {
        case 'INCREASE':
            return Cart.map(x => {
                if (x.MSHH == product.MSHH) return { ...x, SoLuong: x.SoLuong += 1 };
                else return x;
            });
            // $('#product-number').html(Number($('#product-number').html()) + 1);
            break;
        case 'DECREASE':
            return Cart.map(x => {
                if (x.MSHH == product.MSHH) return { ...x, SoLuong: x.SoLuong -= 1 };
                else return x;
            });
            break;
        default:
            return Cart.map(x => {
                if (x.MSHH == product.MSHH) return { ...x, SoLuong: x.SoLuong += 1 };
                else return x;
            });
            break;
    }
}

function addToCart(MSHH, action = 'ADD') {
    const Cart = localStorage.getItem('Cart') ? JSON.parse(localStorage.getItem('Cart')) : [];
    let product = { MSHH: MSHH, TenHH: $('#product-detail-name').html(), HinhAnh: $('#product-image').attr('src'), Gia: $('#price').html().split(".").join(""), SoLuong: 1 };
    localStorage.setItem('Cart', JSON.stringify(checkProductExistInCart(Cart, product, action)));
    $.ajax({
        type: 'POST',
        url: 'cart.php',
        contentType: "application/x-www-form-urlencoded",
        data: { Cart: JSON.parse(localStorage.getItem('Cart')) },
        success: function (result) {
            window.location.href = '/SHOPPINGWEB/users/cart.php';
        }
    });
}

function loadCart() {
    if (localStorage.getItem('Cart')) {
        $.ajax({
            type: 'POST',
            url: 'cart.php',
            contentType: "application/x-www-form-urlencoded",
            data: { Cart: JSON.parse(localStorage.getItem('Cart')) },
            success: function (result) {
                window.location.reload();
            }
        });
    }
}

function Delete(MSHH) {
    // console.log(MSHH);
    let Cart = localStorage.getItem('Cart') ? JSON.parse(localStorage.getItem('Cart')) : [];
    Cart = Cart.filter((product) => product.MSHH !== MSHH);
    localStorage.setItem('Cart', JSON.stringify(Cart));
    let data = Cart.length == 0 ? { Cart: 'null' } : { Cart: Cart };
    console.log(data);
    $.ajax({
        type: 'POST',
        url: 'cart.php',
        data: data,
        success: function (result) {
            window.location.href = '/SHOPPINGWEB/users/cart.php';
        }
    });
}

function statusGoods(SoDonDH) {
    window.scrollTo(0, 0); // scroll on top 
    $('body').css('overflow', 'hidden')
    $(".confirm").show();
    $("#wrapper").addClass("background");
    $('#receivedBtn').click(function () {
        var d = new Date();
        var ngayGH = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + (d.getDate());
        $.ajax({
            type: 'POST',
            url: 'bill-done.php',
            data: { TrangThai: "???? giao", SoDonDH: SoDonDH, NgayGH: ngayGH },
            success: function (result) {
                window.location.reload();
            }
        });
    });
}
function exit() {
    $("#wrapper").removeClass();
    $(".confirm").hide();
    $('body').css('overflow', 'scroll')
}

function cancled(SoDonDH) {
    if (confirm(`B???n c?? mu???n h???y ????n h??ng ${SoDonDH} ?`)) {
        $.ajax({
            type: 'POST',
            url: 'bill-done.php',
            data: { TrangThai: "???? h???y", SoDonDH: SoDonDH },
            success: function (result) {
                window.location.reload();
            }
        });
    }
}