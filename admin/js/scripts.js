function statusGoods(SoDonDH) {
    window.scrollTo(0, 0); // scroll on top 
    $('body').css('overflow', 'hidden')
    $(".confirm").show();
    $("#wrapper").addClass("background");
    $('#confirmBtn').click(function () {
        var d = new Date();
        var ngayGH = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + (d.getDate() + 2);
        $.ajax({
            type: 'POST',
            url: '../bill-done.php',
            data: { TrangThai: "Đang vận chuyển", SoDonDH: SoDonDH, NgayGH: ngayGH },
            success: function (result) {
                window.location.reload();
            }
        });
    });
}
function exitStatusGoods() {
    $("#wrapper").removeClass();
    $(".confirm").hide();
    $('body').css('overflow', 'scroll')
}
function exit() {
    $("#wrapper").removeClass();
    $('body').css('overflow', 'scroll')
    $(".formAdd").hide();
    resetForm();

}
function resetForm() {
    var inputs = document.querySelectorAll(".formAdd .form-group input");
    for (var input of inputs) {
        input.value = "";
    }
    if ($("select")) {
        $("select option[value='LH1181895 - Vivo']").attr("selected", "selected");
        $("select option[value='4G']").attr("selected", "selected");
        $("select option[value='32G']").attr("selected", "selected");
    }

}

function add() {
    //show and hide form 
    if (arguments.length == 0) {
        $(".panel-title").html($(".panel-title").html().replace("Sửa", "Thêm"));
    }
    window.scrollTo(0, 0); // scroll on top 
    $(".formAdd").show();
    $('body').css('overflow', 'hidden')
    $("#wrapper").addClass("background");
}

function addNewField(id) {
    $(".formAdd form").append('<input type="text" name="id" style="display:none" required value="' + id + '">')
}



function Delete(id) {
    if (confirm(`Bạn có chắc muốn xóa ID là ${id} ? nếu xóa sẽ xóa tất cả dữ liệu của bảng khác có ID này`)) {
        // code php to delete data by id
        // code php to get data by id
        const url = document.forms[1].action;
        $.ajax({
            type: 'POST',
            url: url,
            contentType: "application/x-www-form-urlencoded",
            data: { action: "delete", id: id },
            success: function (result) {
                $(".main").html(result);
            }
        });
    } else return;

}
let onOff = false;
function onOffSidebar() {
    onOff = !onOff;
    if (onOff) {
        $('.sidebar').hide();
        $('#main-board').removeClass('col-xs-12 col-sm-10 col-md-10 col-lg-10');
        $('#main-board').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12');
    } else {
        $('.sidebar').show();
        $('#main-board').removeClass('col-xs-12 col-sm-12 col-md-12 col-lg-12');
        $('#main-board').addClass('col-xs-12 col-sm-10 col-md-10 col-lg-10');
    }
}

function updateNotPost(listInfo) {
    $(".panel-title").html($(".panel-title").html().replace("Thêm", "Sửa"));
    listInfo = Object.values(listInfo);
    listInfo = listInfo.map(info => { if (info.children[0]) return info.children[0].src; else return info.innerHTML }).slice(1, listInfo.length - 1);
    var inputForm = $(".formAdd form input");
    var selectedForm = $(".formAdd form select");
    if (selectedForm.length > 0) {
        const selectedValue = [listInfo[3], listInfo[13], listInfo[14]];
        for (var j = 0; j < 3; j++) {
            var options = Object.values(selectedForm[j].children);
            options.map((option) => { if (option.value == selectedValue[j]) option.selected = 'selected'; return option });
        }
        listInfo = listInfo.filter((info) => info.indexOf("LH") == -1 || info.indexOf("G") == -1);
        console.log(listInfo);
        var i = 1;
        for (var input of inputForm) {
            if (i == 3) {
                input.value = listInfo[i + 1];
                i += 2;
            } else if (i == 13 || i == 14) {
                input.value = listInfo[i + 2];
                i++;
            } else {
                input.value = listInfo[i];
                i++;
            }

        };
    } else {
        var i = 1;
        for (var input of inputForm) {
            input.value = listInfo[i];
            i++;
        };
    }
    addNewField(listInfo[0]);
    add("update");
}

function fillPrice(parentTag, selectTag, MSHH) {
    selectTag = Object.values(selectTag);
    var priceTag = selectTag.find((option) => option.value == MSHH);
    var newField = `  <div class="form-inline mt-2" id="product">                                 
                    <input type="text" class="form-control" name='MSHH' readonly required  placeholder="Sản phẩm" value="${priceTag.innerHTML}">
                    <input type="number" class="form-control ml-2 mr-2" name='Gia' required disabled  placeholder="Giá" id="${priceTag.id}" value="${priceTag.id}">
                    <input type="number" class="form-control" name='SoLuong' required  placeholder="SL" min="1" value="1" onchange="fillPriceWithNum(this.parentElement.children[1],this.value)">
                </div>  `;
    parentTag.innerHTML += newField;
    fillTotal();
}
function fillPriceWithNum(inputPrice, num) {
    inputPrice.value = inputPrice.id * num;
    fillTotal();
}

function fillTotal() {
    var priceTags = document.getElementsByName("Gia");
    var total = 0;
    for (var priceTag of priceTags) {
        total += Number(priceTag.value);
    }
    document.getElementsByName("TongTien")[0].value = total;
}

var addNewPDStatus = false;
function addnewPD() {
    addNewPDStatus = !addNewPDStatus;
    if (addNewPDStatus) $(".add-new-product").show();
    else $(".add-new-product").hide();

}