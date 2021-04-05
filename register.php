<?php
if(isset($_POST['txtName'])){
    include 'mysql.php';
    $MSKH = 'KH'. rand(0,99999999);
    $sql = "insert into KhachHang values('"
        . $MSKH . "','" 
        . $_POST['txtName'] . "','" 
        . $_POST['txtAddress'] . "','" 
        . $_POST['txtPhone'] . "','"
        . $_POST['txtEmail'] . "','" 
        . $_POST['txtUsername'] . "','" 
        . md5($_POST['txtPassword']) ."')" ; 
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('Tạo tài khoản " . $_POST['txtUsername'] . " thành công !');</script>";
     } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
     }
     mysqli_close($conn);
     //header('Location: login.php');
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>

    <!-- Optional theme -->
    <link rel="stylesheet" href="./lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./lib/fontawesome-free-5.15.3-web/css/all.min.css">
</head>

<body>
    <div class="container-fluid form">
        <form action="register.php" method="POST" role="form" id="registerForm">
            <legend>Đăng ký</legend>
            <div class="form-group" id='name'>
                <i class="fas fa-user-circle"></i>
                <input type="text" class="form-control" name="txtName" placeholder="Full Name" onchange="validate(this.value,'name')">
            </div>
            <div class="form-group" id='phone'>
                <i class="fas fa-phone-volume"></i>
                <input type="text" class="form-control" name="txtPhone" placeholder="Phone Number" onchange="validate(this.value,'phone',checkPhoneNumber(this.value))">
            </div>
            <div class="form-group" id='email'>
                <i class="fas fa-envelope-square"></i>
                <input type="text" class="form-control" name="txtEmail" placeholder="Email" onchange="validate(this.value,'email',checkEmail(this.value))">
            </div>
            <div class="form-group " id='username'>
                <i class="far fa-user"></i>
                <input type="text" class="form-control" name="txtUsername" placeholder="Username" onchange="validate(this.value,'username')">
            </div>
            <div class="form-group " id='pass'>
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="txtPassword" placeholder="Password" onchange="validate(this.value,'pass')">
            </div>
            <div class="form-group " id='repass'>
                <i class="fas fa-key" ></i>
                <input type="password" class="form-control" name="txtRepassword" placeholder="Repassword" onchange="validate(this.value,'repass',checkSamePass('pass',this.value))">
            </div>
            <div class="form-group " id='address'>
                <i class="fas fa-map-marker-alt"></i>
                <textarea placeholder="Address" cols="10" rows="4" type="text" class="form-control" name="txtAddress"  onchange="validate(this.value,'address')"></textarea>
            </div>
            <button type='button' class="btnRegister" id='btnSubmit' onclick="onSubmitForm();" >Đăng ký</button>
            <div class="redirectLogin">
                <span>Đã có tài khoản?</span><a href="login.php"> Đăng nhập</a>
            </div>
        </form>
    </div>
    <script>
        //check null
        let check={};
        function checkNull(data){
         if (!data) return false;
        return true;
        }
        function checkEmail(email){
            const regex = new RegExp(/([a-zA-Z0-9_/./-])+\@gmail.com/g);
            return regex.test(email);
        }

        function checkPhoneNumber(phoneNumber){
            if(Number.isNaN(phoneNumber) || phoneNumber.length !==10 ) return false;
            return true  ;
        }
        function checkSamePass(idPass,repass){
            var pass = document.getElementById(idPass).children[1].value;
            if(pass !== repass) return false;
            return true;
        }

        function validate(e,id , checked=true){
            var form = document.getElementById(id);
                var i;
            if((checkNull(e) && checked)) {
                let valueChecked={[id]:true};
                check={...check,...valueChecked};
                if(form.children.length == 2){
                 i = document.createElement("i");
                 i.setAttribute("class", "fas fa-check-circle ml-5");
                 i.setAttribute("style", "color: green");
                
                }else{
                    i= form.lastChild;
                    i.className = 'fas fa-check-circle ml-5';
                    i.style="color: green";
                }
            }else{
                let valueChecked={[id]:false};
                check={...check,...valueChecked};
                if(form.children.length == 2){
                 i = document.createElement("i");
                 i.setAttribute("class", "fas fa-times-circle ml-5");
                 i.setAttribute("style", "color:#800000");
                }else{
                    i= form.lastChild;
                    i.className = 'fas fa-times-circle ml-5'; 
                    i.style='color:#800000';
                }
            }
            form.appendChild(i);
        }
       function onSubmitForm(){
        const registerForm = document.getElementById('registerForm');
        registerForm.addEventListener('submit',function(e){
            e.preventDefault();
        });
        if(Object.keys(check).length === 7){
             for([key,value] of Object.entries(check)){
                 if(value === false) {
                    const input = document.getElementById(key).children[1];
                    input.focus();
                    return;
                 }
             }
        }
       registerForm.submit();
       }
    </script>
</body>
</html>