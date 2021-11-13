<div>
  <div class="container">
    <nav aria-label="breadcrumb" >
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
        <?php
        $category_id=$product["category_id"];
        $category_name=$product["category_name"];
        $category_slug=Helper::getSlug($category_name);
        $category_link="danh-sach-san-pham/$category_slug/$category_id"
        ?>
        <li class="breadcrumb-item"><a href="<?php echo $category_link ?>"><?php echo $product['category_name'];  ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $product['title'];  ?></li>
      </ol>
    </nav>
  </div>
  <div class="container" style="margin-bottom: 15px">
    <div class="row" style="margin: 0px !important;">
      <div class="col-sm-9 detail__left" >
        <h2><?php echo $product['title'] ;?></h2>
       <div class="row">
         <div class="col-6">
           <div class="block_img">
             <img src="assets/uploads/products/<?php echo $product['avatar']; ?>" id="img-main" alt="">
           </div>
           <?php  if(!empty($product_images)): ?>
           <ul class="des_img">
             <?php  foreach ($product_images as $image):?>
             <li> <img src="assets/uploads/product_images/<?php echo $image['avatar']; ?>" id="<?php echo $image['id'] ?>" alt="" onclick="changeImage(<?php echo $image['id'] ?>)"></li>
            <?php endforeach; ?>
           </ul>
           <?php endif; ?>
         </div>
         <div class="col-6">
           <div class="detail_banner_center">
             <ul>
               <li>Mã SP: <span>#<?php echo $product['id']; ?></span></li>
               <li> | </li>
               <li>Đánh giá:

                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
               </li>
               <li> (<span>4</span>) đánh giá </li>
             </ul>
           </div>
           <?php if(!empty($product['ram']) || !empty($product['hard-drive'])): ?>
             <div style="margin: 10px 0px" ">
               <?php  if(!empty($product['ram'])):  ?>
                 Ram : <span style="font-weight: bold;color: red"><?php echo $product['ram']; ?></span> GB
               <?php endif; ?>
               <?php  if(!empty($product['hard_drive'])):  ?>
                 | Ổ cứng : <span style="font-weight: bold;color: red"> <?php echo $product['hard_drive']; ?></span> GB
               <?php endif;  ?>
           <?php if($product['quality'] <= 0): ?>
             <span style="margin-left: 12px;font-weight: bold;color: red"> <i class="fa fa-check"></i> Hết Hàng</span>
           <?php endif; ?>
             </div>
           <?php endif;  ?>
           <?php if(!empty($product['present'])): ?>
           <div class="detail__desc">
             <div class="title">Quà tặng sản phẩm : </div>
             <ul>
              <?php echo $product['present']; ?>
             </ul>
           </div>
           <?php endif; ?>
           <div class="detail__category">
             Dannh mục sản phẩm : <span><?php echo $product['category_name']; ?></span>
           </div>
           <?php if($product["discount"] > 0): ?>
             <div class="detail_price">
               <div class="detail__price1">
                 Giá niêm yết:<span><?php echo number_format($product["price"]); ?> đ</span>
               </div>
               <div class="detail__saleprice">
                 Giá khuyến mại: <span>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?>  đ</span>
               </div>
             </div>
           <?php else: ?>
             <div class="detail_price">
               <div class="detail__saleprice">
                 Giá  ưu đãi: <span><?php echo number_format($product["price"]); ?> đ</span>
               </div>
             </div>
           <?php endif; ?>
            <?php if($product['quality'] > 0): ?>
           <div class="by_phone">
             <a href="them-vao-gio-hang/<?php echo $product['id']; ?>">
               <div class="by_now">
                 <span> Mua Ngay </span><br>Giao hàng tận nơi hoặc tại cửa hàng
               </div>
             </a>
           </div>
         <?php else: ?>
              <div class="by_phone">
                <a href="tel:0395679339">
                  <div class="by_now">
                    <span> Liên hệ </span><br>cửa hàng đển biết thêm về sản phẩm
              </div>
                </a>
              </div>
         <?php endif; ?>
         <div class="priduct_social">
           <ul>
             <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
             <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
             <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
             <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
             <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
           </ul>
         </div>
         </div>
       </div>
      </div>
      <div class="col-sm-3">
        <div class="detail__right">
          <div class="title"><i class="fa fa-gamepad"></i> &nbsp;&nbsp;CHÍNH SÁCH MUA HÀNG</div>
          <ul>
            <li>Bảo hành chính hãng</li>
            <li>Bảo hành lỗi 1 đổi 1 ngay</li>
            <li>Đổi mới khi lỗi 30 ngày đầu</li>
            <li>Bảo hành tận nơi siêu tốc</li>
            <li>Trả góp lãi suất 0%</li>
            <li>Trả góp lãi suất 0%</li>
          </ul>
        </div>
        <div class="detail__right">
          <div class="title"><i class="fa fa-mobile-phone"> </i> &nbsp;&nbsp;HỖ TRỢ MUA HÀNG</div>
          <ul>
            <li>Tổng đài : <span>039.567.9339</span></li>
            <li>Kinh doanh 1 : <span>039.567.9339</span></li>
            <li>Kinh doanh 2 : <span>039.567.9339</span></li>
            <li>Kinh doanh 3 : <span>039.567.9339</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <hr>
   <div class="container"> <div class="row">

       <div class="col-sm-8 detail__content">
         <h2><?php echo $product['title']; ?></h2>
         <div class="content">
          <?php echo $product['content']; ?>
         </div>
       </div>

       <div class="col-sm-4 ">
        <div class="detail_presnt">
          <h2 >THÔNG SỐ KỸ THUẬT</h2>
          <ul>
            <?php echo $product['summary']; ?>
          </ul>
        </div>
       </div>
     </div>
  </div>
</div>

