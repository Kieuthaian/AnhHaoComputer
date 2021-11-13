<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Chỉnh sửa sản phẩm
        <small><?php echo $product["title"]; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=product"><i class="fa fa-address-book"></i> Danh sách sản phẩm</a></li>
        <li class="active">Chỉnh sửa sản phẩm: <?php echo $product["id"];?></li>
    </ol>
</section>
<form role="form" method="POST" action="" enctype="multipart/form-data" id="product_create">
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="form-group">
                        <label for="c_name">Tên Sản phẩm :</label>
                        <input type="text" minlength="6" value="<?php echo isset($product["title"]) ? $product["title"] : $_POST["title"] ?>" class="form-control required" name="title" placeholder="Nhập tên sản phẩm ..." >
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện :</label>
                        <input type="file" class="form-control" name="avatar">
                        <?php if (!empty($product['avatar'])): ?>
                            <div>
                            <img style="margin: 10px 0px; border-radius: 3px" src="assets/uploads/products/<?php echo $product['avatar']; ?>" height="80" width="90"/>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh mô tả sản phẩm  :</label>
                        <input type="file" class="form-control" multiple="multiple" name="avatars[]">
                        <?php if (!empty($product_image)): ?>
                            <?php foreach ($product_image as $value):?>
                                <img style="margin: 10px 0px; border-radius: 3px" height="80" width="90" src="assets/uploads/product_images/<?php echo $value['avatar']; ?>"/>
                            <?php endforeach; ?>
                        <?php else: ?>
                        <div>Không có ảnh mô tả</div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="summary">Mô tả ngắn sản phẩm :</label>
                        <textarea cols="30" rows="5" class="form-control " placeholder="Mô tả chi tiết sản phâm" name="summary"><?php echo isset($product["summary"]) ? $product["summary"] : $_POST["summary"] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="summary">Mô tả chi tiết sản phẩm :</label>
                        <textarea cols="30" rows="5" class="form-control " placeholder="Mô tả chi tiết sản phâm" name="content"><?php echo isset($product["content"]) ? $product["content"] : $_POST["content"] ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box box-danger">
                <div class="box-body">
                  <div class="form-group">
                    <label for="present">Qùa tặng sản phẩm :</label>
                    <textarea cols="30" rows="5" class="form-control " placeholder="Mô tả chi tiết sản phâm" name="present"><?php echo isset($product["present"]) ? $product["present"] : '' ?></textarea>
                  </div>
                    <!--            -->
                    <div class="form-group">
                      <label for="producer_id">Chọn  thương hiệu :</label>
                      <select name="producer_id" class="form-control" id="producer_id">
                            <?php if(empty($producers)): ?>
                                <option value="">Không có thương hiệu nào</option>
                            <?php else: ?>
                                <option value="">-- Tất cả thương hiệu  -- </option>
                                <?php foreach ($producers as $producer):
                                    $selected = '';
                                    if ($producer['id'] == $product['producer_id']) {
                                        $selected = 'selected';
                                    }
                                    if (isset($_POST['producer_id']) && $producer['id'] == $_POST['producer_id']) {
                                        $selected = 'selected';
                                    }
                                ?>
                                    <option value="<?php echo $producer['id'] ?>" <?php echo $selected; ?>>
                                        <?php echo $producer['name'] ?>
                                    </option>
                                <?php endforeach;
                            endif;
                            ?>
                        </select>
                    </div>
<!--                  -->
                  <div class="form-group">
                    <label for="category_id">Chọn danh mục :</label>
                    <select name="category_id" class="form-control" id="category_id">
                        <?php if(empty($categories)): ?>
                          <option value="">Không có danh mục nào</option>
                        <?php else: ?>
                          <option value="">-- Tất cả danh mục -- </option>
                            <?php foreach ($categories as $category):
                                $selected = '';
                                if ($category['id'] == $product['category_id']) {
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
                    <label for="ram">Ram :</label>
                    <input type="number" name="ram" value="<?php echo isset($product['ram']) ? $product['ram'] : $_POST['ram'] ?>" class="form-control" id="ram">
                  </div>
                  <div class="form-group">
                    <label for="hard_drive">Ổ cứng :</label>
                    <input type="number" name="hard_drive" value="<?php echo isset($product['hard_drive']) ? $product['hard_drive'] :  $_POST['hard_drive'] ?>" class="form-control" id="hard_drive">
                  </div>
                  <div class="form-group">
                    <label for="product_year">Ngày sản xuất :</label>
                    <input type="date" name="product_year" value="<?php echo isset($product['product_year']) ? $product['product_year'] : $_POST['product_year'] ?>" class="form-control" id="product_year">
                  </div>
                    <div class="form-group">
                        <label for="price">Giá sản phẩm :</label>
                        <input type="number" name="price" value="<?php echo isset($product["price"]) ? $product["price"] : $_POST["price"] ?>" class="form-control" id="price">
                    </div>
                    <div class="form-group">
                        <label for="discount">% Khuyến Mại :</label>
                        <input type="number" name="discount" value="<?php echo isset($product["discount"]) ? $product["discount"] : 0 ?>" class="form-control" id="discount">
                    </div>
                    <div class="form-group">
                        <label for="quality">Số Lượng :</label>
                        <input type="number" name="quality" value="<?php echo isset($product["quality"]) ? $product["quality"] : $_POST["quality"] ?>" class="form-control" id="quality">
                        <p class="error"></p>
                    </div>
                    <div class="form-group">
                        <label for="p_status">Trạng thái :</label>
                        <select name="status" id="p_status" class="form-control required" aria-required="true">
                            <?php
                            $selected_disabled = '';
                            $selected_active = '';
                            if ($product['status'] == 0) {
                                $selected_disabled = 'selected';
                            } else {
                                $selected_active = 'selected';
                            }
                            if (isset($_POST['status'])) {
                                switch ($_POST['status']) {
                                    case 0:
                                        $selected_disabled = 'selected';
                                        break;
                                    case 1:
                                        $selected_active = 'selected';
                                        break;
                                }
                            }
                            ?>
                            <option value="">Trạng thái sản phẩm</option>
                            <option value="1" <?php echo $selected_active; ?>>Active</option>
                            <option value="0"  <?php echo $selected_disabled; ?>>Disabled</option>
                        </select>
                    </div>
                    <div class="checkbox">
                        <label for="hotproduct">
                            <input type="checkbox" value="" name="hotproduct" id="hotproduct" <?php if(isset($product["hotproduct"]) && $product["hotproduct"]== 1 ) : ?> checked <?php endif; ?>> Sản Phẩm Nổi Bật
                        </label>
                    </div>
                    <div class="box-footer">
                        <input type="submit" value="Sửa Sản Phẩm" name="submit" class=" btn btn-success">
                        <a href="index.php?area=backend&controller=product" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
  $("#product_create").validate({
    rules:
      {
        title: { required:true },
        avatar : { extension: "jpg|png|jpeg|gif" },
        status : {required:true},
        category_id:{required:true},
        price:{required:true},
        quality:{required:true},
        producer_id:{required:true},

      },
    messages :
      {
        title :{ required: " * Bạn phải nhập tên danh mục" },
        avatar : { extension: "Chỉ tải lên các file có định dạng  jpg , png , jpeq , gif "},
        category_id:{required : " * Chọn danh mục cho sản phẩm"},
        status : {required: " * Chọn trạng thái của danh mục"},
        price:{required:" * Bạn phải nhập giá cho sản phẩm"},
        quality:{required: " * Bạn phải nhập số lượng cho sản phẩm"},
        producer_id:{required: " * Chọn thương hiệu cho sản phẩm"},
      },
  });
</script>
