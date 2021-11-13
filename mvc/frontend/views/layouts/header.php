<div class="banner">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="sale_block">
          <i class="fa fa-phone"></i>&nbsp; Bán hàng Online
        </div>
        <div class="sale_block">
          <i class="fa fa-phone"></i>&nbsp; Bán hàng Doanh Nghiệp
        </div>
        <div class="sale_block">
          <i class="fa fa-phone"></i>&nbsp; Hệ thống Showroom
        </div>
      </div>
      <div class="col-sm-4">
        <div class="right">
          <?php if(isset($_SESSION['user_account'])): ?>
          <div class="right_banner">
            <a href="lich-su-mua-hang">Lịch sử đơn hàng</a>
          </div>
          <?php endif; ?>
          <div class="right_banner">
            <?php if(!isset($_SESSION['user_account'])): ?>
            <span><a href="dang-ky">Đăng ký</a></span> | <span><a href="dang-nhap">Đăng nhập</a></span>
            <?php else: ?>
            <span><a href="thong-tin-ca-nhan"><?php echo $_SESSION['user_account']['fullname']; ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!---->
<div class="banner-center">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="logo">
          <a href=""><img src="assets/frontend/images/logo_ah.PNG" alt=""></a>
        </div>
      </div>
      <div class="col-sm-5">
        <div class="search_input">
          <div class="">
            <input type="text" id="product__search" name="search_text" placeholder="Nhập sản phẩm cần tìm kiếm ...">
          </div>
          <div class="icon">
            <i class="fa fa-search"></i>
          </div>
          <div class="result__product">
          <?php require_once 'mvc/frontend/controllers/ProductController.php';
                $obj_controller=new ProductController();
                  $obj_controller->searchProductName();
          ?>
          </div>
        </div>
      </div>
      <div class="col-sm-2 right">
        <div class="banner-center_right right_pt">
          <a href="tel:0335257862">
            <div class="banner_text">
              <p class="hottline_text">Hãy gọi ngay :</p>
              <a href="tel:0335257862" class="hottline">033.525.7862</a>
            </div>
          </a>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="banner-center_right shopping right_pt">
          <a href="gio-hang-cua-ban">
            <?php
            $total=0;
            if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
            {
              foreach ($_SESSION["cart"] as $list)
              {
                $total +=$list["quality"];
              }
            }
            ?>
            <i class="fa fa-shopping-cart"></i>&nbsp; Giỏ hàng (<?php echo $total; ?>)
            <?php else: ?>
              <i class="fa fa-shopping-cart"></i>&nbsp; Giỏ hàng
            <?php endif; ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!---->
<div class="menu">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="home__title__category category__product1">
          <i id="icon-bar" class="fa fa-bars"></i> &nbsp;&nbsp; Danh mục sản phẩm
        </div>
      </div>
      <div class="col-sm-9">
       <div class="row">
         <div class="col-sm-4">
           <div class="home__title__category present">
             <i class="fa fa-gift"></i>  GIÁ ƯU ĐÃI NHẤT
           </div>
         </div>
         <div class="col-sm-4">
           <div class="home__title__category present">
             <i class="fa fa-star"></i> SẢN PHẨM CHÍNH HÃNG
           </div>
         </div>
         <div class="col-sm-4">
           <div class="home__title__category present">
             <i class="fa fa-bus"></i> MIỄN PHÍ VẬN CHUYỂN
           </div>
         </div>
       </div>
      </div>
    </div>
  </div>
</div>
<!----->