<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Thêm thương hiệu mới
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=producer">Danh sách thương hiệu</a></li>
        <li class="active">Thêm thương hiệu mới</li>
    </ol>
</section>
<div class="box box-danger">
    <div class="box-body">
        <form role="form" id="producer_form" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="name">Tên thương hiệu mới :</label>
                <input type="text" name="name" id="name" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : '' ?>" class="form-control" placeholder="Tên của thương hiệu ...">
            </div>
            <!-- textarea -->
            <div class="form-group">
                <label for="avatar">Ảnh đại diện : </label>
                <input type="file" name="avatar" id="avatar">
            </div>
          <div class="form-group">
            <label for="address">Nơi sản xuất :</label>
            <input type="text" name="address" id="address" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : '' ?>" class="form-control" placeholder="Nơi sản xuất  ...">
          </div>
            <!--          -->
            <div class="form-group">
                <?php
                $selected_status_a="";
                $selected_status_d="";
                if(isset($_POST["status"])){
                    switch ($_POST["status"]){
                        case 0:
                            $selected_status_d="selected";
                            break;
                        case 1:
                            $selected_status_a="selected";
                            break;
                    }
                }
                ?>
                <label for="status">Trạng thái của thương hiệu</label>
                <select name="status" id="status" class="form-control">
                    <option value=""> --- Trạng thái của thương hiệu ---</option>
                    <option value="1" <?php echo $selected_status_a;  ?>>Active</option>
                    <option value="0" <?php echo $selected_status_d; ?>>Disable</option>
                </select>
            </div>
            <!-- checkbox -->
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input name="hotproducer" type="checkbox" <?php if(isset($_POST["hotproducer"]) && $_POST["hotproducer"]== 1 ) : ?> checked <?php endif; ?>
                               value="<?php echo isset($_POST["hotproducer"]) ? $_POST["hotproducer"] : '' ?>">
                        Thương hiệu nổi bật
                    </label>
                </div>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="Thêm thương hiệu" name="submit">
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
