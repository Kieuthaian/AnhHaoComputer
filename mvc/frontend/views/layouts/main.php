
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <base href="<?php echo $_SERVER['SCRIPT_NAME']; ?>" />
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/frontend/icon/icon.css">
  <link rel="stylesheet" href="assets/frontend/css/app.css">
  <link rel="stylesheet" href="assets/frontend/css/style.css">
  <script src="assets/frontend/js/jquery-3.5.1.min.js"></script>
  <script src="assets/backend/js/jquery.validate.min.js"></script>
  <script src="assets/backend/js/additional-methods.min.js"></script>
<!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"-->
<!--          integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"-->
<!--          crossorigin="anonymous"></script>-->
  <title>Cửa hàng máy tính Anh Hào</title>
</head>
<body>
<div class="app">
  <?php require_once 'mvc/frontend/views/layouts/header.php'; ?>
  <!---->
  <?php  if(isset($_SESSION['success'])): ?>
    <div class="container">
      <div class="alert alert-success alert-dismissible "role="alert" style="margin-top: 10px">
        <?php echo "<i class='fa fa-check'></i>" . $_SESSION["success"];
        unset($_SESSION["success"]); ?>
      </div>
    </div>
  <?php endif;?>
  <?php  if(isset($_SESSION['error'])): ?>
    <div class="container">
      <div class="alert alert-danger alert-dismissible"role="alert" style="margin-top: 10px">
        <?php echo "<i class='fa fa-times'></i>" .$_SESSION["error"];
        unset($_SESSION["error"]); ?>
      </div>
    </div>
  <?php endif;?>
  <?php echo $this->content; ?>
<!--  -->
  <?php require_once 'mvc/frontend/views/layouts/footer.php'; ?>
</body>
<script>
    function changeImage(id) {

        // lấy giá trị của thuộc tính src
        var srcImg = document.getElementById(id).getAttribute("src");
        //
        // tác động vào thuộc tính src của thẻ html co id=img-main
        document.getElementById("img-main").setAttribute("src", srcImg);
    }
    $("#register_form").validate({
        rules:  {
            fullname : "required",
            email :{
                required: true,
                email: true
            },
            phone :
                {
                    required : true,
                    number: true,
                    maxlength:10,
                    minlength:10
                },
            password: {
                required: true,
                minlength: 5
            },
        },
        messages :
            {
                fullname : " * Họ tên không được để trống",
                email :{
                    required: " * Email không được để trống",
                    email: " * Phải đúng định dạng là Email"
                },
                phone :
                    {
                        required : " * Số điện thoại không được để trống",
                        number: "* Phải nhập số không được nhập chữ hay ký tự đăc biệt",
                        minlength: " * Số điện thoại phải có ít nhất 10 số",
                        maxlength :" * Số điện thoại không được quá 10 số",
                    },
                password: {
                    required: " * Mật khẩu không được để trống",
                    minlength: " * Mật khẩu phải có ít nhất 5 ký tự",
                },
            }
    });
    $("#register_email").keyup(function () {
        let email = $(this).val();
        $.post("index.php?area=frontend&controller=login&action=validateEmail",
            {email: email},
            function (data) {
                if (data == "True") {
                    $("#emailerror").text(" * Email này đã được đăng ký");
                    $("#emailerror").css("font-style","italic");
                    $("#emailerror").css("font-size","12px");
                    $("#emailerror").css("color","red");
                    document.getElementById("button_submit").disabled = true;
                }
                else {
                    document.getElementById("button_submit").disabled = false;
                    $("#emailerror").text("");
                }
            });
    });
    $("#register_phone").keyup(function () {
        let phone = $(this).val();
        $.post("index.php?area=frontend&controller=login&action=validatePhone",
            {phone: phone},
            function (data) {

                if (data == "True") {
                    $("#phoneerror").text(" * Số điện thoại này đã được đăng ký");
                    $("#phoneerror").css("font-style","italic");
                    $("#phoneerror").css("font-size","12px");
                    $("#phoneerror").css("color","red");
                    document.getElementById("button_submit").disabled = true;
                }
                else {
                    document.getElementById("button_submit").disabled = false;
                    $("#phoneerror").text("");
                }
            });
    });
    $("#login_frontend").validate({
        rules:  {
            email :{
                required: true,
                email: true
            },
            password: {
                required: true,
            },
        },
        messages :
            {
                email :{
                    required: " *Email không được để trống",
                    email: " *Tên đăng nhâp phải đúng định dạng là Email"
                },

                password: {
                    required: " * Mật khẩu không được để trống",
                },
            }
    });

    $("#shopping_pay").validate({

        rules:  {
            fullname : "required",
            email :{
                required: true,
                email: true
            },
            phone :
                {
                    required : true,
                    number: true,
                },
            address: {
                required: true,
            },
        },
        messages :
            {
                fullname : " * Họ tên không được để trống",
                email :{
                    required: " * Email không được để trống",
                    email: " * Phải đúng định dạng là Email"
                },
                phone :
                    {
                        required: " * Số điện thoại không được để trống",
                        number: "* Phải nhập số không được nhập chữ hay ký tự đăc biệt",
                    },
                address: {
                    required: " * Địa chỉ nhận hàng không được để trống",
                },
            }
    });
    ////////////////////////////////
    $(document).ready(function(){

        filter_data();

        function filter_data()
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var id=$('.get_id').val();
            var brand = get_filter('brand');
            if(brand  && id ){
                $.ajax({
                    url:"index.php?area=frontend&controller=Product&action=searchProduct",
                    method:"POST",
                    data:{
                        id:id,
                        brand:brand,
                    },
                    success:function(data){
                        $('.filter_data').html(data);
                    }
                });
            }
        }
        function get_filter(class_name)
        {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common_selector').click(function(){
            filter_data();
        });
    $("#product__search").keyup(function () {
        let name=$(this).val();
        let search = $.trim(name);
        if(search != '')
        {
            $(".result__product").css("display","block");
            $(".result__product").css("height","300px");
            $(".result__product").css("padding-top","10px");
            $(".result__product").css("overflow","auto");
            $.ajax({
                url :"index.php?area=frontend&controller=product&action=searchProductName",
                method: "POST",
                data : {
                    search : search
                },
                dataType: "text",
                success:function (data) {
                    console.log(data);
                    $(".result__product").html(data);
                }
            });
        }
        else
        {
            $(".result__product").css("display","none");
        }
    });
    });
</script>
</html>
