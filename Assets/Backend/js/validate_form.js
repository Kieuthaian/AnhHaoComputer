$(document).ready(function(){
    $("#c_name").keyup(function () {
        let c_name = $(this).val();
        $.post("index.php?area=backend&controller=category&action=validateCategory",
            {c_name: c_name},
            function (data) {
            console.log(data);
                if (data == "True") {
                    $("#nhacloi").text(" * Tên danh mục đã tồn tại");
                    $("#nhacloi").css("font-style","italic");
                    $("#nhacloi").css("color","red");
                    $("#c_submit").css("display","none");
                    $('input[type=submit]').addClass('disabled');
                }
                else {
                    $("#c_submit").css("display","inline-block");
                    $('input[type=submit]').removeClass('disabled');
                    $("#nhacloi").text("");
                }
            });
    });
    $("#create_cform").validate({

    rules:
        {
            name: {
                required:true,
                minlength:6,
                // equalTo: c_name,
            },
            description : "required",
            status : "required",
            avatar: {
                extension: "jpg|png|jpeg|gif",
            }
        },
    messages :
        {
            name :{ required: " * Bạn phải nhập tên danh mục",
                    minlength: "* Tên danh mục phải có ít nhất 6 ký tự",
                    equalTo : "Tên danh mục đã tồn tại",
            },
            description : " * Bạn phải mô tả cho danh mục",
            status : " * Bạn vui lòng chọn trạng thái của danh mục",
            avatar : {
                extension :  " * Chỉ được tải file ảnh jpg , png , jpeq , gif",

            }
        }
});
$("#update_cform").validate({
    rules:
        {
            name: {
                required:true,
                minlength:6
            },
            description : "required",
            status : "required",
            avatar: {
                extension: "jpg|png|jpeg|gif",
            }
        },
    messages :
        {
            name :{ required: " * Bạn phải nhập tên danh mục",
                minlength: "* Tên danh mục phải có ít nhất 6 ký tự"
            },
            description : " * Bạn phải mô tả cho danh mục",
            status : " * Bạn vui lòng chọn trạng thái của danh mục",
            avatar : {
                extension :  " * Chỉ được tải file ảnh jpg , png , jpeq , gif",
            }
        }
});
    $("#create_producerform").validate({
        rules:
            {
                name: {
                    required:true,
                    minlength:6
                },
                description : "required",
                status : "required",
                avatar: {
                    extension: "jpg|png|jpeg|gif",
                }
            },
        messages :
            {
                name :{ required: " * Bạn phải nhập tên nhà SX hoặc thương hiệu",
                    minlength: "* Tên nhà SX hoặc thương hiệu phải có ít nhất 6 ký tự"
                },
                description : " * Bạn phải mô tả cho hà SX hoặc thương hiệu",
                status : " * Bạn vui lòng chọn trạng thái của nhà SX hoặc thương hiệu",
                avatar : {
                    extension :  " * Chỉ được tải file ảnh jpg , png , jpeq , gif",
                }
            }
    });
    $("#p_title").keyup(function () {
        let p_title = $(this).val();
        $.post("index.php?area=backend&controller=product&action=validateProduct",
            {p_title: p_title},
            function (data) {
                console.log(data);
                if (data == "True") {
                    $("#nhacloi").text(" * Tên sản phẩm đã tồn tại");
                    $("#nhacloi").css("font-style","italic");
                    $("#nhacloi").css("font-size","12px");
                    $("#nhacloi").css("font-weight","12px");
                    $("#nhacloi").css("color","red");
                    $("#p_submit").css("display","none");
                    $('input[type=submit]').addClass('disabled');
                }
                else {
                    $("#p_submit").css("display","inline-block");
                    $('input[type=submit]').removeClass('disabled');
                    $("#nhacloi").text("");
                }
            });
    });
    $("#create_productform").validate({
       rules:  {
           title: {
               required:true,
               minlength:6
           },
           avatar: {
               extension: "jpg|png|jpeg|gif",
           },
           "avatars[]": {
               extension: "jpg|png|jpeg|gif",
           },
           producer_id : {required:true},
           category_id : {required:true},
           price: {required:true,
               min:1

           },
           quality : {required:true,
               min:1},
           status : {required:true},
       },
        messages :
            {
                title :{ required: " * Tên sản phẩm không được để trống ",
                    minlength: "* Tên sản phẩm phải có ít nhất 6 ký tự"
                },
                avatar : {
                    extension :  " * Chỉ được tải file ảnh jpg , png , jpeq , gif",
                },
                'avatars[]' : {
                    extension :  " *Đã có 1 or nhiều file không phải file ảnh.Chỉ được tải file các ảnh jpg,png,jpeq,gif",
                },
                producer_id : " * Bạn vui lòng chọn thương hiệu or NSX",
                category_id : " * Bạn vui lòng chọn danh mục sản phẩm",
                price :{ required :" * Gía sản phẩm không được để trống ",
                            min : "Gía sản phẩm phải lớn hơn 1"
                },
                quality :{required: " * Số lượng sản phẩm không được để trống ",
                    min : "Số lượng sản phẩm phải lớn hơn 1"},
                status :
                    { required : " * Bạn vui lòng chọn trạng thái của sản phẩm"},
            }
    });
    $("#register").validate({
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
                confirm_password: {
                    required: true,
                    equalTo: "#password"
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
                confirm_password: {
                    required: " * Nhập lại mật khẩu không được để trống",
                    equalTo: " * Phải giống mật khẩu đã nhập phía trên",
                },
            }
    });

//     valdiate email
    $("#email_regester").keyup(function () {
        let email = $(this).val();
        $.post("index.php?area=backend&controller=login&action=validateEmail",
            {email: email},
            function (data) {
                console.log(data);
                if (data == "True") {
                    $("#usernameerror").text(" * Email này đã được đăng ký ");
                    $("#usernameerror").css("font-style","italic");
                    $("#usernameerror").css("font-weight","12px");
                    $("#usernameerror").css("font-size","12px");
                    $("#usernameerror").css("color","red");
                    $("#submit_regester").css("display","none");
                }
                else {
                    $("#submit_regester").css("display","inline-block");
                    $("#usernameerror").text("");
                }
            });
    });
//    validate form login
    $("#login").validate({
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
                    required: " * Tên đăng nhập không được để trống",
                    email: " *Tên đăng nhâp phải đúng định dạng là Email"
                },

                password: {
                    required: " * Mật khẩu không được để trống",
                },
            }
    });
});


