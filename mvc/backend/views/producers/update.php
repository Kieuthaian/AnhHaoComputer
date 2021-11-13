<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Chỉnh sửa thương hiệu
        <small><?php  echo $producer['name']; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=producer">Danh sách thương hiệu</a></li>
        <li class="active">Chỉnh sửa thương hiệu : <?php  echo $producer['id']; ?></li>
    </ol>
</section>
<div class="box box-danger">
    <div class="box-body">
        <form role="form" id="producer_form" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="name">Tên thương hiệu :</label>
                <input type="text" readonly name="name" id="name" value="<?php echo isset($producer["name"]) ? $producer["name"] : $_POST['name'] ?>" class="form-control" placeholder="Tên của thương hiệu ...">
            </div>
            <!-- textarea -->
            <div class="form-group">
                <label for="avatar">Ảnh đại diện : </label>
                <input type="file" name="avatar" id="avatar">
                <?php if (!empty($producer['avatar'])): ?>
                    <img style="margin: 10px 0px; border-radius: 3px" src="assets/uploads/producers/<?php echo $producer['avatar']; ?>" height="70" width="100"/>
                <?php endif; ?>
            </div>
          <div class="form-group">
            <label for="address">Nơi sản xuất :</label>
            <input type="text" name="address" id="address"
                   value="<?php echo isset($producer["address"]) ? $producer["address"] : $_POST['address'] ?>"
                   class="form-control" placeholder="Nơi sản xuất  ...">
          </div>
            <!-- input states -->
            <div class="form-group">
                <?php
                $selected_disabled = '';
                $selected_active = '';
                if ($producer['status'] == 0) {
                    $selected_disabled = 'selected';
                } else {
                    $selected_active = 'selected';
                }
                ?>

                <label for="status">Trạng thái của thương hiệu</label>
                <select name="status" id="status" class="form-control">
                    <option value=""> --- Trạng thái của thương hiệu ---</option>
                    <option value="1" <?php echo $selected_active;  ?>>Active</option>
                    <option value="0" <?php echo $selected_disabled; ?>>Disable</option>
                </select>
            </div>
            <!-- checkbox -->
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input name="hotproducer" type="checkbox" <?php if(isset($producer["hotproducer"]) && $producer["hotproducer"]== 1 ) : ?> checked <?php endif; ?>
                               value="<?php echo isset($producer["hotproducer"]) ? $producer["hotproducer"] : '' ?>">
                        thương hiệu nổi bật
                    </label>
                </div>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="Sửa thương hiệu" name="submit">
                <a class="btn btn-danger" href="index.php?area=backend&controller=producer">Hủy</a>
            </div>
        </form>
    </div>
</div>
<script>
  $("#producer_form").validate({
      rules:
          {
              name: { required:true },
              avatar : { extension: "jpg|png|jpeg|gif|pdf" },
              status : {required:true},
              address :{required:true},
          },
      messages :
          {
              name :{ required: " * Bạn phải nhập tên thương hiệu" },
              avatar : { extension: "Phải tải ảnh lên đúng định dạng "},
              status : {required: " * Chọn trạng thái của thương hiệu"},
              address:{required: " * Nhập địa chỉ của thương hiệu"}
          }
  });
</script>
