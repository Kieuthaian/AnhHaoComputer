<div class="container">
  <div class="row">
    <div class="col-md-5 col-md-offset-3" style="margin: 10px auto">
      <form action="" method="POST" id="login_frontend">
        <div class="login__title">ĐĂNG KÝ THÀNH VIÊN</div>
        <div class="form__login">
          <div class="form-group">
            <input type="text"  name="email" class="form-control"  placeholder="Nhập email... *"
                   value="<?php echo isset($_POST["email"]) ? $_POST["email"] : "" ?>">
          </div>

          <div class="form-group">
            <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu... *">
          </div>
        </div>
        <div class="form-group mt-20 mp-15" >
          <input type="submit" value="Đăng nhập" name="submit" class="btn btn-success form-control" id="button_submit"
        </div>
      </form>
      <p style="margin-top: 10px;">Bạn chưa có tài khoản,<a style="color: #dc1c4c;font-weight: bold" href="dang-ky">đăng ký</a> ngay</p>
    </div>
  </div>
</div>
</div>