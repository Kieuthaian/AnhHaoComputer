<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Danh sách danh mục
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li class="active">Danh sách danh mục</li>
  </ol>
</section>
<div style="text-align: right;margin-bottom: 15px;">
  <a href="index.php?area=backend&controller=category&action=create" class="btn btn-success"><i class="fa fa-plus"></i> Thêm danh mục</a>
</div>
<div class="box box-danger">
    <div class="box-body table-responsive no-padding ">
        <table class="table table-bordered table-hover dataTable">
            <tr>
                <th>Số thứ tự</th>
                <th>Tên danh mục</th>
                <th>Ảnh đại diện</th>
                <th>Phân loại danh mục</th>
                <th>Trạng thái</th>
                <th>Danh mục nổi bật</th>
                <th>Ngày tạo</th>
                <th style="text-align: center;">Chức năng</th>
            </tr>
            <?php if(!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category["id"]  ?></td>
<!--                -->
                <td><?php echo $category["name"] ?></td>
<!--              -->
<!--                -->
                <td>
                  <?php if(!empty($category['avatar'])): ?>
                  <img style="margin: 10px 0px;border-radius: 3px;" src="assets/uploads/categories/<?php echo $category['avatar']; ?>" width="90" height="80"/>
                  <?php endif; ?>
                </td>
                <td>
                    <?php
                    if($category['category_status']==1):
                        ?>
                      <span class="label label-success"><i class="fa fa-product-hunt"></i> Danh mục sản phẩm</span>
                    <?php else: ?>
                      <span class="label label-danger"> <i class="fa fa-hacker-news"></i> Danh mục tin tức</span>
                    <?php endif; ?>
                </td>
                <td>
                  <?php
                  if($category['status']==1):
                  ?>
                  <span class="label label-success"> <i class="fa fa-check"></i> Danh mục được hiển thị</span>
                  <?php else: ?>
                    <span class="label label-danger"> <i class="fa fa-times"></i>   Danh mục đã bị ẩn</span>
                  <?php endif; ?>
                </td>
                <td>
                    <?php
                    if($category['hotcategory']==1):
                        ?>
                      <span class="label label-warning"><i class="fa fa-check"></i> Danh mục hot</span>
<!--                    --><?php //else: ?>
<!--                      <span class="label label-danger">Danh mục đã bị ẩn</span>-->
                    <?php endif; ?>
                </td>
<!--              -->
                <td><?php echo date('d/m/Y - H:i:s', strtotime($category['created_at'])); ?></td>
<!--              -->
                <td style="text-align: center">
                  <a style="margin-right: 10px;" href="index.php?area=backend&controller=category&action=detail&id=<?php echo $category['id']; ?>">
                    <i class="fa fa-eye "></i></a>
                  <a style="margin-right: 10px;" href="index.php?area=backend&controller=category&action=update&id=<?php echo $category['id'] ?>">
                    <i class="fa fa-pencil"></i></a>
                  <a  style="margin-right: 10px;"
                      href="index.php?area=backend&controller=category&action=delete&id=<?php echo $category['id']?>"
                      onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                    <i class="fa fa-trash"></i>
                  </a>

                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không có danh mục sản phẩm nào</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
