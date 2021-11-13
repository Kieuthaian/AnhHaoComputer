<?php if(!empty($news)): ?>
<div class="container">
  <div class="background">
    <div class="article-homepage bg-w">
      <div class="row">
        <div class="col-sm-12">
          <div class="danhmuc">
            <div class="title_category">Tin tức mỗi ngày</div>
            <div class="category_hot">
              <a href=""> <i class="fa fa-hand-o-right"></i> Xem tất cả <b> <?php echo $countnews; ?></b> tin tức</a>
            </div>
            <div style="clear: both;"></div>
          </div>
        </div>
      </div>
      <div class="row">
  <?php  foreach ($news as $new):
    $new_id=$new["id"];
    $new_slug=Helper::getSlug($new['name']);
    $new_link="blogs/$new_slug/$new_id";
    ?>
        <div class="col-sm-3">
          <div class="item">
            <a href="<?php echo $new_link; ?>" class="n-home-img"><img src='assets/uploads/news/<?php echo $new['avatar']; ?>' alt=""></a>
            <div class="n-home-info">
              <div class="time-n-home"><span class="n-day"> <?php echo date('d', strtotime($new['created_at'])); ?> </span>
                <span class="n-month">TH<span class="n-month-add"><?php echo date('m', strtotime($new['created_at'])); ?></span></span>
              </div>
              <div class="nhf-right"><span class="news"><?php echo $new['category_name']; ?></span>
                <a href="<?php echo $new_link ?>" class="n-home-name"><?php echo $new['name']; ?></a>
              </div>
              <div style="clear: both"></div>
            </div>
          </div>
        </div>
  <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>