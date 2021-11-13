<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang Quản Trị Admin</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="assets/backend/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/backend/css/font-awesome.min.css">
<!--    <link rel="stylesheet" href="assets/backend/css/ionicons.min.css">-->
    <link rel="stylesheet" href="assets/backend/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/backend/css/_all-skins.min.css">
    <link rel="stylesheet" href="assets/backend/css/css.css">
    <link rel="stylesheet" href="assets/backend/css/style.css">
    <script src="assets/backend/js/jquery.min.js"></script>
    <script src="assets/backend/js/bootstrap.min.js"></script>
    <script src="assets/backend/js/adminlte.min.js"></script>
    <script src="assets/backend/js/jquery.validate.min.js"></script>
    <script src="assets/backend/js/additional-methods.min.js"></script>
  <script src="assets/backend/js/script.js"></script>
</head>
<body class=" skin-blue sidebar-mini">
<div class="wrapper">
    <?php require_once 'mvc/backend/views/layouts/header.php'; ?>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="assets/backend/images/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo isset($_SESSION["user_admin"]["fullname"]) ? $_SESSION["user_admin"]["fullname"] : ''; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree" style="border-top: 1px solid #000000;">
                <li class="header" style="text-align: center">DANH SÁCH CHỨC NĂNG</li>
                <?php if(!isset($_GET["controller"]) || $_GET["controller"]=="home"):?>
                <li class="active">
                    <a href="index.php?area=backend">
                        <i class="fa fa-home"></i> <span> Trang Chủ </span>
                    </a>
                </li>
              <?php else: ?>
                  <li>
                    <a href="index.php?area=backend">
                      <i class="fa fa-home"></i> <span> Trang Chủ </span>
                    </a>
                  </li>
              <?php endif; ?>
                <?php if(isset($_GET["controller"]) && $_GET["controller"]=="category"): ?>

                  <li class="active">
                    <a href="index.php?area=backend&controller=category">
                      <i class="fa fa-home"></i> <span> Quản lý danh mục </span>
                    </a>
                  </li>
              <?php else: ?>
                  <li>
                    <a href="index.php?area=backend&controller=category">
                      <i class="fa fa-home"></i> <span> Quản lý danh mục </span>
                    </a>
                  </li>

              <?php endif; ?>
                <?php if(isset($_GET["controller"]) && $_GET["controller"]=="producer"): ?>

                  <li class="active">
                    <a href="index.php?area=backend&controller=producer">
                      <i class="fa fa-home"></i> <span> Quản lý thương hiệu </span>
                    </a>
                  </li>
                <?php else: ?>
                  <li>
                    <a href="index.php?area=backend&controller=producer">
                      <i class="fa fa-home"></i> <span> Quản lý thương hiệu </span>
                    </a>
                  </li>

                <?php endif; ?>

                <?php if(isset($_GET["controller"]) && $_GET["controller"]=="product"): ?>
                  <li class="active">
                    <a href="index.php?area=backend&controller=product">
                      <i class="fa fa-home"></i> <span> Quản lý sản phẩm </span>
                    </a>
                  </li>
                <?php else: ?>
                  <li>
                    <a href="index.php?area=backend&controller=product">
                      <i class="fa fa-home"></i> <span> Quản lý sản phẩm </span>
                    </a>
                  </li>

              <?php endif; ?>

                <?php if(isset($_GET["controller"]) && $_GET["controller"]=="news"): ?>
                  <li class="active">
                    <a href="index.php?area=backend&controller=news">
                      <i class="fa fa-home"></i> <span> Quản lý tin tức</span>
                    </a>
                  </li>
                <?php else: ?>
                  <li>
                    <a href="index.php?area=backend&controller=news">
                      <i class="fa fa-home"></i> <span> Quản lý tin tức</span>
                    </a>
                  </li>
                <?php endif; ?>
              <?php if(isset($_GET["controller"]) && $_GET["controller"]=="ShoppingCart"): ?>
                <li class="active">
                    <a href="index.php?area=backend&controller=ShoppingCart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Quản lý đơn hàng</span>
                    </a>
                </li>
              <?php else: ?>
                <li>
                  <a href="index.php?area=backend&controller=ShoppingCart">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Quản lý đơn hàng</span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if(isset($_GET["controller"]) && $_GET["controller"]=="user"): ?>
                <li class="active">
                    <a href="index.php?area=backend&controller=user">
                        <i class="fa fa-user-plus"></i>
                        <span>Quản lý tài khoản</span>
                    </a>
                </li>
              <?php else: ?>
              <li >
                <a href="index.php?area=backend&controller=user">
                  <i class="fa fa-user-plus"></i>
                  <span>Quản lý tài khoản</span>
                </a>
              </li>
              <?php endif; ?>
              <?php if(isset($_GET["controller"]) && $_GET["controller"]=="report"): ?>
                <li class="active">
                  <a href="index.php?area=backend&controller=report">
                    <i class="fa fa-table"></i> <span>Thống kê - Báo Cáo</span>

                  </a>
                </li>
              <?php else: ?>
                <li>
                    <a href="index.php?area=backend&controller=report">
                        <i class="fa fa-table"></i> <span>Thống kê - Báo Cáo</span>

                    </a>
                </li>
              <?php endif; ?>
                <li><a href="index.php?area=backend&controller=login&action=logout"  onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không ?')"><i class="fa fa-lock"></i> <span>Đăng xuất</span></a></li>

            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <?php if (!empty($this->error)): ?>
                    <div class="alert alert-danger error_check">
                        <?php echo "<i class='fa fa-times'></i>" .$this->error; ?>
                    </div>
                <?php endif ?>
                <!-- Content Header (Page header) -->
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
                    <!--        content -->
                    <?php  echo $this->content; ?>
                </div>
            </div>
        </section>
    </div>
    <?php require_once 'mvc/backend/views/layouts/footer.php'; ?>
</div>
<script src="assets/backend/ckeditor/ckeditor.js"></script>
<script>
    $("#report_money").validate({
        rules:
            {
                ngayBatDau: {
                    required:true,
                },
                ngayKetThuc: {
                    required:true,
                },
            },
        messages :
            {
                ngayBatDau: {
                    required:"Chọn ngày bắt đầu",
                },
                ngayKetThuc: {
                    required:"Chọn ngày kết thúc",
                },
            }
    });
</script>
</body>
</html>