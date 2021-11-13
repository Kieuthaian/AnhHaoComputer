<div class="banner__slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php require_once 'mvc/frontend/controllers/CategoryController.php';
                $category_controller = new CategoryController();
                $category_controller->getCategoryProduct();
                ?>
            </div>
            <div class="col-sm-6">
                <div class="slider">
                    <img src="assets/frontend/images/banner_slider1.png" alt="">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="img_banner_center">
                    <img src="assets/frontend/images/banner55.png" alt="">
                </div>
                <div class="img_banner_center">
                    <img src="assets/frontend/images/banner77.png" alt="">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="assets/frontend/images/banner14.jpg" width="100%" alt="">
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-sm-6">
                <img src="assets/frontend/images/banner16.jpg" width="100%" alt="">
            </div>
            <div class="col-sm-6">
                <img src="assets/frontend/images/banner15.jpg" width="100%" alt="">
            </div>
        </div>
    </div>
    <?php require_once 'mvc/frontend/controllers/ProductController.php';
    $product_controller = new ProductController();
    $product_controller->hotProduct();
    ?>
    <div class="container">
        <div class="row" style="margin-top: 10px">
            <div class="col-sm-6">
                <img src="assets/frontend/images/banner22.jpg" width="100%" alt="">
            </div>
            <div class="col-sm-6">
                <img src="assets/frontend/images/banner33jpg.jpg" width="100%" alt="">
            </div>
        </div>
    </div>
    <?php require_once 'mvc/frontend/controllers/ProductController.php';
    $product_controller = new ProductController();
    $product_controller->NewsProduct();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="img__banner_center">
                    <img src="assets/frontend/images/banner12.jpg" alt="">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="img__banner_center">
                    <img src="assets/frontend/images/banner13.jpg" alt="">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="img__banner_center">
                    <img src="assets/frontend/images/banner12.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
<!--    --><?php //require_once 'mvc/frontend/controllers/ProductController.php';
//    $product_controller = new ProductController();
//    $product_controller->SellingProducts();
////    ?>
    <!--<div class="article-homepage bg-w loaded" id="js-article-homepage" style="margin-bottom: 100px;">-->
    <?php require_once 'mvc/frontend/controllers/NewsController.php';
    $new_controller = new NewsController();
    $new_controller->hotNews();
    ?>
</div>