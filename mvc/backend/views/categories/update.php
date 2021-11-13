<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Chỉnh sửa danh mục
        <small><?php  echo $category['name']; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=category">Danh sách danh mục</a></li>
      <li class="active">Chỉnh sửa danh mục : <?php  echo $category['id']; ?></li>
    </ol>
</section>
<div class="box box-danger">
    <div class="box-body">
        <form role="form" id="category_form" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="name">Tên danh mục :</label>
                <input type="text" readonly name="name" id="name" value="<?php echo isset($category["name"]) ? $category["name"] : $_POST['name'] ?>" class="form-control" placeholder="Tên của danh mục ...">
            </div>
            <div class="form-group">
                <label for="avatar">Ảnh đại diện : </label>
                <input type="file" name="avatar" id="avatar">
                <?php if (!empty($category['avatar'])): ?>
                    <img style="margin: 10px 0px; border-radius: 3px" src="assets/uploads/categories/<?php echo $category['avatar']; ?>" height="70" width="100"/>
                <?php endif; ?>
            </div>
          <div class="form-group">
              <?php
              $selected_disabled = '';
              $selected_active = '';
              if ($category['category_status'] == 0) {
                  $selected_disabled = 'selected';
              } else {
                  $selected_active = 'selected';
              }
              ?>
            <label for="category_status">Phân loại của danh mục</label>
            <select name="category_status" id="category_status" class="form-control">
              <option value=""> --- Phân loại của danh mục ---</option>
              <option value="1" <?php echo $selected_active;  ?>>Sản phẩm</option>
              <option value="0" <?php echo $selected_disabled; ?>>Tin tức</option>
            </select>
          </div>
            <div class="form-group">
                <label for="content">Miêu tả danh mục :</label>
                <textarea class="form-control" name="content" id="content" rows="5"
                          placeholder="Miêu tả chi tiết danh mục ..."
                ><?php echo isset($category['content']) ? $category["content"] : "" ?></textarea>
            </div>
            <div class="form-group">
                <?php
                $selected_disabled = '';
                $selected_active = '';
                if ($category['status'] == 0) {
                    $selected_disabled = 'selected';
                } else {
                    $selected_active = 'selected';
                }
                ?>

                <label for="status">Trạng thái của danh mục</label>
                <select name="status" id="status" class="form-control">
                    <option value=""> --- Trạng thái của danh mục ---</option>
                    <option value="1" <?php echo $selected_active;  ?>>Hiển thị danh mục</option>
                    <option value="0" <?php echo $selected_disabled; ?>>Không hiển thị</option>
                </select>
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input name="hotcategory" type="checkbox" <?php if(isset($category["hotcategory"]) && $category["hotcategory"]== 1 ) : ?> checked <?php endif; ?>
                               value="<?php echo isset($category["hotcategory"]) ? $category["hotcategory"] : '' ?>">
                        Danh mục sản phẩm
                    </label>
                </div>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="Sửa danh mục" name="submit">
                <a class="btn btn-danger" href="index.php?area=backend&controller=category">Hủy</a>
            </div>
        </form>
    </div>
</div>
<script>
  $("#category_form").validate({
    rules:
      {
        name: { required:true },
        avatar : { extension: "jpg|png|jpeg|gif|pdf" },
        status : {required:true},
        category_status : {required:true},
      },
    messages :
      {
        name :{ required: " * Bạn phải nhập tên danh mục" },
        avatar : { extension: "Phải tải ảnh lên đúng định dạng "},
        status : {required: " * Chọn trạng thái của danh mục"},
        category_status : { required : " * Chọn phân loại cho danh mục"}


      }
  });
</script>
