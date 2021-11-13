<header class="main-header">
  <!-- Logo -->
  <a href="index.php?area=backend" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">AH</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Anh Hào</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="assets/backend/images/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION['user_admin']["fullname"]; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="assets/backend/images/user2-160x160.jpg" class="img-circle" alt="User Image">

              <p>
                <?php echo $_SESSION['user_admin']["fullname"]; ?>
                <small>Member since March. 2021</small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Thông tin cá nhan</a>
              </div>
              <div class="pull-right">
                <a href="index.php?area=backend&controller=login&action=logout"
                   class="btn btn-default btn-flat"
                   onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không ?')">Đăng xuất</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>