<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Danh sách sản phẩm hết hàng
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li class="active"> <i class="fa fa-address-book"></i>  Danh sách sản phẩm</li>
  </ol>
</section>
<div id="order_table_text">
  <div class="box box-danger">
    <div class="box-body table-responsive no-padding ">
      <table class="table table-bordered table-hover dataTable">
        <tr>
          <th  style="text-align: center;">Số thứ tự</th>
          <th style="text-align: center;width: 15%">Tên sản phẩm</th>
          <th style="text-align: center">Tên thương hiệu</th>
          <th style="text-align: center;width: 10%"";>Tên danh mục</th>
          <th style="text-align: center">Ảnh đại diện</th>
          <th style="text-align: center">số lượng</th>
          <th style="text-align: center">Ngày tạo</th>
          <th style="text-align: center;">Chức năng</th>
        </tr >
        <?php if(!empty($products)): ?>
          <?php foreach ($products as $product): ?>
            <tr style="text-align: center">
              <td><?php echo $product["id"]  ?></td>
              <!--                -->
              <td><?php echo $product["title"] ?></td>
              <!--              -->
              <td>
                <?php echo $product["producer_name"]; ?>
              </td>
              <td><?php echo $product['category_name']; ?></td>
              <!--                -->
              <td>
                <?php if(!empty($product['avatar'])): ?>
                  <img style="margin: 10px 0px;border-radius: 3px;" src="assets/uploads/products/<?php echo $product['avatar']; ?>" width="70" height="40"/>
                <?php endif; ?>
              </td>
              <td>
                <?php
                if($product['quality']==0):?>
                  <span class="label label-danger"> <i class="fa fa-check"></i>   Hết hàng</span>
                <?php endif; ?>
              </td>
              <!--              -->
              <td><?php echo date('d/m/Y - H:i:s', strtotime($product['created_at'])); ?></td>
              <!--              -->
              <td style="text-align: center">
                <a style="margin-right: 10px;" href="index.php?area=backend&controller=product&action=detail&id=<?php echo $product['id']; ?>">
                  <i class="fa fa-eye "></i></a>
                <a style="margin-right: 10px;" href="index.php?area=backend&controller=product&action=update&id=<?php echo $product['id'] ?>">
                  <i class="fa fa-pencil"></i></a>
                <a  style="margin-right: 10px;"
                    href="index.php?area=backend&controller=product&action=delete&id=<?php echo $product['id']?>"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                  <i class="fa fa-trash"></i>
                </a>

              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="8">Không có danh mục sản phẩm nào</td>
          </tr>
        <?php endif; ?>
      </table>
    </div>
  </div>
</div>

