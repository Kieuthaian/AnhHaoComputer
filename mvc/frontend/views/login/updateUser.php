<div class="container">
  <div class="row">
    <div class="col-md-5 col-md-offset-3" style="margin: 10px auto">
      <form action="" method="POST" id="register_form">
        <div class="login__title">THÔNG TIN CÁ NHÂN</div>
        <div class="form__login">
          <div class="form-group">
            <input type="text" name="phone" class="form-control" readonly
                   placeholder="Nhập số điện thoại đăng ký ... *"
                   value="<?php
                   if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['phone'])){
                          echo $_SESSION['user_account']['phone'];
                   }else{
                   echo "";
                   }
                          ?>" >
          </div>
          <!--                  -->
          <div class="form-group">
            <input type="text" readonly name="email" class="form-control" id="register_email" placeholder="Nhập email... *"
                   value="<?php
                   if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['email'])){
                   echo $_SESSION['user_account']['email'];}
                   else{
                   echo "";
                   }
                   ?>">
          </div>
          <div class="form-group">
            <input type="text" readonly name="fullname" class="form-control" id="fullname" placeholder="Nhập họ tên ... * "
                   value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['fullname'])) {
                     echo $_SESSION['user_account']['fullname'];
                   }else{
                   echo "";
                   }

                   ?>">

          </div>
          <div class="form-group">
            <input type="text" readonly name="address" class="form-control" id="address" placeholder="Nhập địa chỉ... *"
                   value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['address'])){
            echo $_SESSION['user_account']['address'];}
            else{
              echo "";
            }
            ?>">

          </div>

          <input type="hidden" value="0" name="status">
        </div>
<!--        <div class="form-group mt-20 mp-15" >-->
<!--          <input type="submit" value="Cập nhật tài khoản" name="submit" class="btn btn-success form-control" id="button_submit"-->
<!--        </div>-->
      </form>
      <br>
      <br>
      <div class="form-group mt-20 mp-15">
        <a href="logout" style="font-size: 13px;" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không ?')"  class="btn btn-primary form-control">Đăng xuất</a>
      </div>

    </div>
  </div>
</div>
</div>