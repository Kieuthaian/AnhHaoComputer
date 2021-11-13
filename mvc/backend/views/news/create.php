<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Thêm tin tức mới
        <small>SammiShop</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=news">Danh sách tin tức</a></li>
        <li class="active">Thêm tin tức mới</li>
    </ol>
</section>
<div class="box box-danger">
    <div class="box-body">
        <form role="form" id="news_form" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="name">Tên tin tức mới :</label>
                <input type="text" name="name" id="name" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : '' ?>" class="form-control" placeholder="Tên của tin tức ...">
            </div>
            <!-- textarea -->
            <div class="form-group">
                <label for="avatar">Ảnh đại diện : </label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <!--          -->
            <div class="form-group">
                <label for="category_id">Chọn danh mục tin tức :</label>
                <select name="category_id" class="form-control" id="category_id">
                    <?php if(empty($categories)): ?>
                        <option value="">Không có danh mục nào</option>
                    <?php else: ?>
                        <option value="">-- Tất cả danh mục -- </option>
                        <?php foreach ($categories as $category):?>
                            <option value="<?php echo $category['id'] ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach;
                    endif;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="summary">Mô tả ngắn tin tức :</label>
                <textarea class="form-control" name="summary" id="summary" rows="5" placeholder="Miêu tả ngắn tin tức ..."><?php echo isset($_POST['content']) ? $_POST["content"] : "" ?></textarea>
            </div>
            <!--       -->
            <div class="form-group">
                <label for="content">Mô tả chi tiết tin tức :</label>
                <textarea class="form-control" name="content" id="content" rows="5" placeholder="Miêu tả chi tiết tin tức ..."><?php echo isset($_POST['content']) ? $_POST["content"] : "" ?></textarea>
            </div>

            <!-- input states -->
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
                <label for="status">Trạng thái của tin tức</label>
                <select name="status" id="status" class="form-control">
                    <option value=""> --- Trạng thái của tin tức ---</option>
                    <option value="1" <?php echo $selected_status_a;  ?>>Active</option>
                    <option value="0" <?php echo $selected_status_d; ?>>Disable</option>
                </select>
            </div>
            <!-- checkbox -->
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input name="hotnews" type="checkbox" <?php if(isset($_POST["hotnews"]) && $_POST["hotnews"]== 1 ) : ?> checked <?php endif; ?>
                               value="<?php echo isset($_POST["hotnews"]) ? $_POST["hotnews"] : '' ?>">
                        tin tức hot
                    </label>
                </div>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="Thêm tin tức mới" name="submit">
                <a class="btn btn-danger" href="index.php?area=backend&controller=news">Hủy</a>
            </div>
        </form>
    </div>
</div>
<script>
  $("#news_form").validate({
    rules:
      {
        name: { required:true },
        avatar : { extension: "jpg|png|jpeg|gif|pdf" },
        status : {required:true},
        category_id : {required:true},
      },
    messages :
      {
        name :{ required: " * Bạn phải nhập tên tin tức" },
        avatar : { extension: "Phải tải ảnh lên đúng định dạng "},
        status : {required: " * Chọn trạng thái của tin tức"},
        category_id : { required : " * Chọn danh mục cho tin tức"}
      }
  });
</script>
