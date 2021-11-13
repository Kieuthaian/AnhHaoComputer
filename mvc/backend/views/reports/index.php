  <div class="row">
    <div class="col-sm-3">
      <a href="index.php?area=backend&controller=report&action=SellingProduct" class="btn btn-success">Danh sách sản phẩm
        bán chạy</a>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <a href="index.php?area=backend&controller=report&action=ProductNoData" class="btn btn-success">Danh sách sản phẩm
        không bán được</a>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-3">
      <a href="index.php?area=backend&controller=report&action=moneyProduct " class="btn btn-success">Doanh thu theo theo
        ngày tháng</a>
    </div>
  </div>
<!--  <div class="row">-->
<!---->
<!--    <div class="col-sm-9"></div>-->
<!--    <div class="col-sm-3">-->
<!--      <a href="" class="btn btn-success">Doanh thu theo tháng</a>-->
<!--    </div>-->
<!--  </div>-->

  <div class="row">
    <div class="col-xs-12">
      <div class="box" style="margin-top: 30px">
        <div class="box-header">
          <h3 class="box-title">Danh sách sản phẩm nổi bật</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
              <th  width="10%">Mã sản phẩm</th>
              <th width="30%">Tên sản phẩm</th>
              <th  width="20%">Tên danh mục</th>
              <th  width="20%">Ảnh sản phẩm</th>
              <th  width="20%">Số lượng</th>

            </tr>
            <?php foreach ($products as $product): ?>
            <tr>
              <td style="text-align: center"><?php echo $product['id']; ?></td>
              <td><a style="color: black !important;" href="index.php?area=backend&controller=product&action=detail&id=<?php echo $product['id']; ?>"><?php echo $product['title']; ?></a></td>
              <td><?php echo $product['category_name']; ?></td>
              <td><img width="50" height="50" src="assets/uploads/products/<?php echo $product['avatar']; ?>" alt=""></td>
              <td><span class="label label-success"><?php echo $product['quality'] ?> chiếc</span></td>

            </tr>
           <?php endforeach; ?>
            </tbody></table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>

