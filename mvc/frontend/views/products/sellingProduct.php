<div class="container ">
  <div class="background">
    <div class="row">
      <div class="col-sm-12">
        <div class="danhmuc">
          <div class="title_category">Sản phẩm bán chạy</div>
          <div class="category_hot">
            <a href="danh-sach-san-pham"> <i class="fa fa-hand-o-right"></i> Xem tất cả sản phẩm</a>
          </div>
          <div style="clear: both;"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="dienthoai">
          <ul>
            <?php if (!empty($products)):
              foreach ($products as $product):
                $product_title = $product['title'];
                $product_slug = Helper::getSlug($product_title);
                $product_id = $product['id'];
                $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
                ?>
                <li class="product__hot">
                  <div class="product_cart">
                    <?php if($product['quality'] > 0): ?>
                      <div class="product_detail"><a href="<?php echo $product_link; ?>"><i class="fa fa-eye"></i>&nbsp; Xem chi tiết</a></div>
                      <div class="product_detail line_left"><a href="them-vao-gio-hang/<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i>&nbsp; Mua
                          Ngay</a></div>
                      <div style="clear: both"></div>
                    <?php else: ?>
                      <div class="product__hottline"><a href="tel:0395679339"><i class="fa fa-mobile-phone"></i> <span>Liên hệ</span></a></div>
                    <?php endif; ?>
                  </div>
                  <a href="<?php echo $product_link; ?>">
                    <div style="position: relative">
                      <img src="assets/uploads/products/<?php echo $product['avatar']; ?>" alt="">
                      <?php if($product["discount"] > 0): ?>
                        <div class="tragop"><p><b>- <?php echo $product["discount"]; ?>%</b></p></div>
                      <?php endif; ?>
                    </div>
                    <h3><?php echo $product['title']; ?></h3>
                    <div class="ram_drive">
                      <?php if(!empty($product['ram'])): ?>
                        <span style="padding: 4px 5px;background: grey;font-size: 11px;color: white;border-radius: 3px;"> <span style="font-weight: bold"><?php echo $product['ram']; ?></span>GB</span>
                      <?php endif; ?>
                      <?php if(!empty($product['hard_drive'])): ?>
                        <span style="padding: 4px 5px;background: grey;font-size: 11px;color: white;border-radius: 3px;"> <span style="font-weight: bold"><?php echo $product['hard_drive']; ?></span>GB</span>
                      <?php endif; ?>
                    </div>
                    <ul class="product_star">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><span> ( 3 Đánh giá )</span></li>
                    </ul>
                    <?php if($product["discount"] > 0): ?>
                      <div class="price">
                        <strong> <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?> ₫</strong>
                        <span><?php echo number_format($product["price"]); ?> ₫</span>
                      </div>
                    <?php else: ?>
                      <div class="price">
                        <strong><?php echo number_format($product["price"]); ?>₫</strong>
                      </div>
                    <?php endif; ?>
                    <?php if($product["discount"] > 0): ?>
                      <p>Tiết kiệm ngay <b><?php echo number_format($product["price"] * ($product["discount"] / 100)); ?>₫</b></p>
                    <?php endif; ?>
                  </a>
                </li>
              <?php endforeach; endif;  ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>