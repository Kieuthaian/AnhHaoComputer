<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Chỉnh sửa tin tức
        <small><?php  echo $news['name']; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=news">Danh sách tin tức</a></li>
        <li class="active">Chỉnh sửa tin tức : <?php  echo $news['id']; ?></li>
    </ol>
</section>
<div class="box box-danger">
    <div class="box-body">
        <form role="form" id="news_form" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="name">Tên tin tức :</label>
                <input type="text" name="name" id="name" value="<?php echo isset($news["name"]) ? $news["name"] : $_POST['name'] ?>" class="form-control" placeholder="Tên của tin tức ...">
            </div>
            <!-- textarea -->
            <div class="form-group">
                <label for="avatar">Ảnh đại diện : </label>
                <input type="file" name="avatar" id="avatar">
                <?php if (!empty($news['avatar'])): ?>
                    <img style="margin: 10px 0px; border-radius: 3px" src="assets/uploads/news/<?php echo $news['avatar']; ?>" height="70" width="100"/>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="category_id">Chọn danh mục tin tức :</label>
                <select name="category_id" class="form-control" id="category_id">
                    <?php if(empty($categories)): ?>
                        <option value="">Không có danh mục nào</option>
                    <?php else: ?>
                        <option value="">-- Tất cả danh mục -- </option>
                        <?php foreach ($categories as $category):
                            $selected = '';
                            if ($category['id'] == $news['category_id']) {
                                $selected = 'selected';
                            }
                            if (isset($_POST['category_id']) && $category['id'] == $_POST['category_id']) {
                                $selected = 'selected';
                            }
                            ?>
                            <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                                <?php echo $category['name'] ?>
                            </option>
                        <?php endforeach;
                    endif;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="summary">Miêu tả ngăn tin tức :</label>
                <textarea class="form-control" name="summary" id="summary" rows="5"
                          placeholder="Miêu tả chi tiết tin tức ..."
                ><?php echo isset($news['summary']) ? $news["summary"] : "" ?></textarea>
            </div>
            <div class="form-group">
                <label for="content">Miêu tả chi tiết tin tức :</label>
                <textarea class="form-control" name="content" id="content" rows="5"
                          placeholder="Miêu tả chi tiết tin tức ..."
                ><?php echo isset($news['content']) ? $news["content"] : "" ?></textarea>
            </div>
            <!-- input states -->
            <div class="form-group">
                <?php
                $selected_disabled = '';
                $selected_active = '';
                if ($news['status'] == 0) {
                    $selected_disabled = 'selected';
                } else {
                    $selected_active = 'selected';
                }
                ?>

                <label for="status">Trạng thái của tin tức</label>
                <select name="status" id="status" class="form-control">
                    <option value=""> --- Trạng thái của tin tức ---</option>
                    <option value="1" <?php echo $selected_active;  ?>>Active</option>
                    <option value="0" <?php echo $selected_disabled; ?>>Disable</option>
                </select>
            </div>
            <!-- checkbox -->
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input name="hotnews" type="checkbox" <?php if(isset($news["hotnews"]) && $news["hotnews"]== 1 ) : ?> checked <?php endif; ?>
                               value="<?php echo isset($news["hotnews"]) ? $news["hotnews"] : '' ?>">
                        tin tức sản phẩm
                    </label>
                </div>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="Sửa tin tức" name="submit">
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
        news_status : {required:true},
      },
    messages :
      {
        name :{ required: " * Bạn phải nhập tên tin tức" },
        avatar : { extension: "Phải tải ảnh lên đúng định dạng "},
        status : {required: " * Chọn trạng thái của tin tức"},
        news_status : { required : " * Chọn phân loại cho tin tức"}


      }
  });
</script>
