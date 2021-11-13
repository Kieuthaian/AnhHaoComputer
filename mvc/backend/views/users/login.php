
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Anh Hào Computer</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/backend/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/backend/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/backend/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/backend/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/backend/css/blue.css">
  <link rel="stylesheet" href="assets/backend/css/style.css">

  <script src="assets/backend/js/jquery.min.js"></script>
  <script src="assets/backend/js/bootstrap.min.js"></script>
  <script src="assets/backend/js/adminlte.min.js"></script>
  <script src="assets/backend/js/jquery.validate.min.js"></script>
  <script src="assets/backend/js/script.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Anh Hào </b>Computer</a>
  </div>

  <div class="login-box-body">
    <?php if (!empty($this->error)): ?>
      <div class="alert alert-danger error_check">
        <?php echo "<i class='fa fa-times'></i>" .$this->error; ?>
      </div>
    <?php endif ?>

    <?php  if(isset($_SESSION['success'])): ?>
      <div class="alert alert-success alert-dismissible fade in"role="alert">
        <p style="color: white" class="close" data-dismiss="alert" aria-label="close">&times;</p>
        <?php echo "<i class='fa fa-check'></i>" . $_SESSION["success"];
        unset($_SESSION["success"]); ?>
      </div>
    <?php endif;?>
    <?php  if(isset($_SESSION['error'])): ?>
      <div class="alert alert-danger alert-dismissible fade in"role="alert">
        <p style="color: white"  class="close" data-dismiss="alert" aria-label="close">&times;</p>
        <?php echo "<i class='fa fa-times'></i>" .$_SESSION["error"];
        unset($_SESSION["error"]); ?>
      </div>
    <?php endif;?>
    <p class="login-box-msg">Cửa hàng máy tính Anh Hào</p>
    <form action="" method="post" id="login">
      <div class="form-group has-feedback">
        <span class="fa fa-envelope form-control-feedback"></span>
        <input type="email" class="form-control" value="" placeholder="Nhập email của bạn..." name="email">

      </div>
      <div class="form-group has-feedback">
        <span class="fa fa-lock form-control-feedback"></span>
        <input type="password" class="form-control" placeholder="Nhập password..." name="password">

      </div>
      <div class="row">
        <div class="col-xs-12">
          <input type="submit" class="btn btn-success btn-block btn-flat" value="Đăng nhập" name="submit">
        </div>
      </div>
    </form>
  </div>

</div>
<script>
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
                    required: " *Email không được để trống",
                    email: " *Tên đăng nhâp phải đúng định dạng là Email"
                },

                password: {
                    required: " * Mật khẩu không được để trống",
                },
            }
    });
</script>
</body>
</html>
