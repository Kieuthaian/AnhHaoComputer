<input type="hidden" class="get_id" value="<?php echo $_GET['id']; ?>">
<div style="margin: 10px 0px 30px 0px">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <?php require_once 'mvc/frontend/controllers/CategoryController.php';
        $category_controller = new CategoryController();
        $category_controller->getCategoryProduct();
        ?>
<!--        <div style="margin-top: 30px;padding: 10px 0px;background: #fff">-->
<!--          --><?php //require_once 'Mvc/frontend/controllers/ProducerController.php';
//          $category_controller = new ProducerController();
//          $category_controller->producerProduct();
//          ?>
<!--        </div>-->
        <div style="background: #fff">
          <?php require_once 'mvc/frontend/controllers/ProducerController.php';
          $category_controller = new ProducerController();
          $category_controller->checkProducer();
          ?>
        </div>
<!--        <div style="margin: 30px 0px;">-->
<!--          <div class="menu-trai">-->
<!--            <ul style="padding: 20px 0px 10px 0px" class="">-->
<!--                <label class="producers"> Dưới 1 triệu-->
<!--                  <input type="checkbox" value="" name="producer[]">-->
<!--                  <span class="w3docs"></span>-->
<!--                </label>-->
<!--              <label class="producers"> Từ 1 triệu - 5 triệu-->
<!--                <input type="checkbox" value="" name="producer[]">-->
<!--                <span class="w3docs"></span>-->
<!--              </label>-->
<!--              <label class="producers"> Dưới 5 triệu - 10 triệu-->
<!--                <input type="checkbox" value="" name="producer[]">-->
<!--                <span class="w3docs"></span>-->
<!--              </label>-->
<!--              <label class="producers"> Từ 10 triệu - 15 triệu-->
<!--                <input type="checkbox" value="" name="producer[]">-->
<!--                <span class="w3docs"></span>-->
<!--              </label>-->
<!--              <label class="producers"> Trên 15 triệu-->
<!--                <input type="checkbox" value="" name="producer[]">-->
<!--                <span class="w3docs"></span>-->
<!--              </label>-->
<!--            </ul>-->
<!--          </div>-->
<!--        </div>-->
      </div>
      <div class="col-sm-9" style="margin-bottom: 50px">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh mục : <?php echo $category["name"]; ?></li>
          </ol>
        </nav>
        <div class="row background1 filter_data">
          <div class="dienthoai1">
            <?php if(!empty($products)): ?>
            <ul>
            <?php foreach ($products as $product):
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
                        <?php if ($product["discount"] > 0): ?>
                          <div class="tragop"><p><b>- <?php echo $product["discount"]; ?>%</b></p></div>
                        <?php endif; ?>
                      </div>
                      <h3><?php echo $product['title']; ?></h3>
                      <div class="ram_drive">
                        <?php if (!empty($product['ram'])): ?>
                          <span
                              style="padding: 4px 5px;background: grey;font-size: 11px;color: white;border-radius: 3px;"> <span
                                style="font-weight: bold"><?php echo $product['ram']; ?></span>GB</span>
                        <?php endif; ?>
                        <?php if (!empty($product['hard_drive'])): ?>
                          <span
                              style="padding: 4px 5px;background: grey;font-size: 11px;color: white;border-radius: 3px;"> <span
                                style="font-weight: bold"><?php echo $product['hard_drive']; ?></span>GB</span>
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
                      <?php if ($product["discount"] > 0): ?>
                        <div class="price">
                          <strong> <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?>
                            ₫</strong>
                          <span><?php echo number_format($product["price"]); ?> ₫</span>
                        </div>
                      <?php else: ?>
                        <div class="price">
                          <strong><?php echo number_format($product["price"]); ?>₫</strong>
                        </div>
                      <?php endif; ?>
                      <?php if ($product["discount"] > 0): ?>
                        <p >Tiết kiệm ngay
                          <b><?php echo number_format($product["price"] * ($product["discount"] / 100)); ?>₫</b>
                        </p>
                      <?php endif; ?>
                    </a>
                  </li>
                <?php endforeach;?>
            </ul>
            <?php else: ?>
           <h5 style="padding: 20px 0px;text-align: center;">Danh mục này chưa có sản phẩm nào !!!</h5>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>