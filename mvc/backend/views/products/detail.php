<!---->
<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Chi tiết của sản phẩm
        <small> <?php echo $product['title']; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=product"> <i class="fa fa-address-book"></i>  Danh sách sản phẩm</a></li>
        <li class="active">Chi tiết sản phẩm : <?php  echo $product['id']; ?></li>
    </ol>
</section>
<!--    -->
<div class="box box-danger">
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>Mã sản phẩm</th>
                <td><?php echo $product['id']; ?></td>
            </tr>
            <tr>
                <th>Tên sản phẩm</th>
                <td><?php echo $product['title']; ?></td>
            </tr>
          <tr>
            <th>Tên thương hiệu</th>
            <td><?php echo $product['producer_name']; ?></td>
          </tr>
            <tr>
                <th>Tên danh mục sản phẩm</th>
                <td><?php echo $product['category_name']; ?></td>
            </tr>
          <tr>
            <th>Năm sản xuất</th>
            <td><?php echo date('d/m/Y',strtotime($product['product_year'])); ?></td>
          </tr>
          <tr>
            <th>Nơi sản xuất của sản phẩm</th>
            <td><?php echo $product['producer_address']; ?></td>
          </tr>
          <tr>
            <th>Ram</th>
            <td><?php echo $product['ram']; ?> GB</td>
          </tr>
          <tr>
            <th>Ổ cứng</th>
            <td><?php echo $product['hard_drive']; ?> GB</td>
          </tr>
            <tr>
              <th>Giá sản phẩm</th>
              <td><?php echo number_format($product['price']); ?> VNĐ</td>
            </tr>
            <tr>
              <th>% Khuyến mãi sản phẩm</th>
              <td><?php echo $product['discount']; ?></td>
            </tr>
            <tr>
              <th>Số lượng sản phẩm</th>
              <td><?php echo $product['quality']; ?></td>
            </tr>
            <tr>
                <th>Ảnh sản phẩm</th>
                <td>
                    <?php if (!empty($product['avatar'])): ?>
                        <img style="border-radius: 3px;" src="assets/uploads/products/<?php echo $product['avatar'] ?>" width="90" height="75"/>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Ảnh mô tả sản phẩm</th>
                <td>
                    <?php if (!empty($product_image)):
                        foreach($product_image as $img):
                        ?>
                        <img style="border-radius: 3px;" src="assets/uploads/product_images/<?php echo $img['avatar'] ?>" width="90" height="75"/>
                    <?php
                        endforeach;
                    else: ?>
                    Không có ảnh mô tả sản phẩm
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Mô tả ngắn sản phẩm</th>
                <td><?php echo $product['summary']; ?></td>
            </tr>
            <tr>
                <th>Mô tả chi tiết sản phẩm</th>
                <td><?php echo $product['content']; ?></td>
            </tr>
            <tr>
                <th>Trạng thái sản phẩm</th>
                <td>
                    <?php
                    if($product['status']==1):
                        ?>
                        <span class="label label-success"><i class="fa fa-check"></i> Sản phảm được hiển thị</span>
                    <?php else: ?>
                        <span class="label label-danger"> <i class="fa fa-times"></i> Sản phẩm đã bị ẩn</span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Danh Mục Nổi Bật</th>
                <td><?php if(isset($product["hotproduct"]) && $product["hotproduct"]== 1 ): ?>
                        <span class="label label-warning"><i class="fa fa-check"></i> Sản phẩm hot</span>
                    <?php else: ?>
                        <div><i class="fa fa-times"></i></div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Ngày tạo</th>
                <td>
                    <?php echo date('d/m/Y - H:i:s', strtotime($product['created_at'])); ?>
                </td>
            </tr>
            <tr>
                <th>Ngày cập nhật cuối </th>
                <td>
                    <?php
                    if(isset($product["updated_at"]))
                    {
                        echo date('d/m/Y - H:i:s', strtotime($product['updated_at']));
                    }else{
                        echo "---";
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<a class="btn btn-danger" href="index.php?area=backend&controller=product">Back</a>


