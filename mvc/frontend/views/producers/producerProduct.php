<div class="banner-left">
  <div class="menu-trai">
    <ul>
      <?php if(!empty($producers)):
        foreach ($producers as $producer):
          $producer_id=$producer["id"];
          $producer_name=$producer["name"];
          $producer_slug=Helper::getSlug($producer_name);
          $producer_link="san-pham-thuong-hieu/$producer_slug/$producer_id"
          ?>
          <li class="menu-cha">
            <a href="<?php echo $producer_link; ?>">

              <img src="assets/uploads/producers/<?php echo $producer["avatar"]; ?>" alt="">

              <span><?php echo $producer["name"]; ?></span>
<!--              <i style="line-height: 33px;" class="fa fa-chevron-right"></i>-->
              <div style="clear: both"></div>
            </a>
          </li>
        <?php endforeach; else: ?>
        <li class="menu-cha">
          <a href="">
            Không có danh mục thương hiệu nào !!!
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</div>