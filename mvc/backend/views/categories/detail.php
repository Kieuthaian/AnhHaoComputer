<!---->
<section class="content-header" style="margin-bottom: 15px;">
    <h1>
      Chi tiết của danh mục
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=category"> Danh sách danh mục</a></li>
        <li class="active">Chi tiết danh mục : <?php  echo $category['name']; ?></li>
    </ol>
</section>
<!--    -->
<div class="box box-danger">
    <div class="box-body">
    <table class="table table-bordered">
        <tr>
            <th>Mã danh mục</th>
            <td><?php echo $category['id']; ?></td>
        </tr>
        <tr>
            <th>Tên danh mục</th>
            <td><?php echo $category['name']; ?></td>
        </tr>
        <tr>
            <th>Avatar</th>
            <td>
                <?php if (!empty($category['avatar'])): ?>
                    <img style="border-radius: 3px;" src="assets/uploads/categories/<?php echo $category['avatar'] ?>" width="90" height="60"/>
                <?php endif; ?>
            </td>
        </tr>
      <tr>
        <th>Phân loại danh mục</th>
        <td>
            <?php
            if($category['category_status']==1):
                ?>
              <span class="label label-success"><i class="fa fa-check"></i> Danh mục sản phẩm</span>
            <?php else: ?>
              <span class="label label-danger"> <i class="fa fa-times"></i> Danh mục tin tức</span>
            <?php endif; ?>
        </td>
      </tr>
        <tr>
            <th>Mô tả danh mục</th>
            <td><?php echo $category['content']; ?></td>
        </tr>
        <tr>
            <th>Trạng thái</th>
            <td>
                <?php
                if($category['status']==1):
                    ?>
                    <span class="label label-success"><i class="fa fa-check"></i> Danh mục được hiển thị</span>
                <?php else: ?>
                    <span class="label label-danger"> <i class="fa fa-times"></i> Danh mục đã bị ẩn</span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Danh Mục Nổi Bật</th>
            <td><?php if(isset($category["hotcategory"]) && $category["hotcategory"]== 1 ): ?>
                    <span class="label label-warning"><i class="fa fa-check"></i> Danh mục hot</span>
                <?php else: ?>
                    <div><i class="fa fa-times"></i></div>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Ngày tạo</th>
            <td>
                <?php echo date('d/m/Y - H:i:s', strtotime($category['created_at'])); ?>
            </td>
        </tr>
        <tr>
            <th>Ngày cập nhật cuối </th>
            <td>
                <?php
                if(isset($category["updated_at"]))
                {
                    echo date('d/m/Y H:i:s', strtotime($category['updated_at']));
                }else{
                    echo "---";
                }
                ?>

            </td>
        </tr>
    </table>
    </div>
</div>
<a class="btn btn-danger" href="index.php?area=backend&controller=category">Back</a>


