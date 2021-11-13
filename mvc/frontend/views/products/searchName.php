
  <?php if(!empty($products)):
      foreach ($products as $product):
        $product_title = $product['title'];
        $product_slug = Helper::getSlug($product_title);
        $product_id = $product['id'];
        $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
  ?>
  <div class="product__1">
    <a href="<?php echo $product_link; ?>">
    <div class="img">
     <img src="assets/uploads/products/<?php echo $product['avatar']; ?>" alt="">
    </div>
    <div class="title__product">
      <a href="<?php echo $product_link; ?>"><?php echo $product['title']; ?></a>
      <?php if($product["discount"] > 0): ?>
      <p>
        <span class="price"><?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?> ₫</span>
        <span class="price_sale"><?php echo number_format($product["price"]); ?> ₫</span></p>
      <?php else: ?>
      <p><span class="price"><?php echo number_format($product["price"]); ?> ₫</span></p>
      <?php endif; ?>
    </div>
    <div style="clear: both"></div>
    </a>
  </div>
  <?php endforeach; else: ?>
  <div style="text-align: center">Không có sản phẩm nào !!!</div>
  <?php endif; ?>