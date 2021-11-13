<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3" style="margin: 10px auto">
            <form action="" method="POST" id="register_form">
                <div class="login__title">ĐĂNG KÝ THÀNH VIÊN</div>
                <div class="form__login">
                 <div class="form-group">
                   <input type="text" name="phone" class="form-control" id="register_phone" placeholder="Nhập số điện thoại đăng ký ... *"
                          value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : "" ?>" >
                   <p id="phoneerror"></p>
                 </div>
<!--                  -->
                  <div class="form-group">
                  <input type="text"  name="email" class="form-control" id="register_email" placeholder="Nhập email... *"
                           value="<?php echo isset($_POST["email"]) ? $_POST["email"] : "" ?>">
                    <p id="emailerror"></p>
                  </div>
                  <div class="form-group">
                  <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Nhập họ tên ... * "
                           value="<?php echo isset($_POST["fullname"]) ? $_POST["fullname"] : "" ?>">

                  </div>
                  <div class="form-group">
                  <input type="text" name="address" class="form-control" id="address" placeholder="Nhập địa chỉ... *"
                           value="<?php echo  isset($_POST["address"]) ? $_POST["address"] : "" ?>">

                  </div>
                  <div class="form-group">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu... *">
                  </div>
                  <input type="hidden" value="0" name="status">
                </div>
                <div class="form-group mt-20 mp-15" >
                    <input type="submit" value="Đăng ký tài khoản" name="submit" class="btn btn-success form-control" id="button_submit"
                </div>
            </form>
            <p style="margin-top: 10px;">Bạn đã có tài khoản,<a style="color: #dc1c4c;font-weight: bold" href="dang-nhap">đăng nhập</a> ngay</p>
        </div>
    </div>
</div>
</div>