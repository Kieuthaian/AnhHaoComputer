
<div class="container">
    <div class="row">
        <div class="col-12 news" style="margin: 30px 0px;padding: 30px;font-size: 16px; !important;">
            <div style="text-align: center">
            <h3><?php echo $news['name']; ?></h3>
            <div class="news__category">
                <?php echo $news['category_name']; ?>
            </div>
            <div class="news__datetime">
                <?php echo date('d/m/Y - H:i:s', strtotime($news['created_at'])); ?>
            </div>
            </div>
            <div class="news__summary">
                        <?php echo $news['summary']; ?>
            </div>
            <div class="news__img">
                <img src="assets/uploads/news/<?php echo $news['avatar']; ?>" alt="">
            </div>
            <div class="news__content">
        <?php echo $news['content']; ?>
            </div>
        </div>
    </div>
</div>