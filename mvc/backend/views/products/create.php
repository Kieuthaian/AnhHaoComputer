<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Thêm sản phẩm mới
        <small>AnhHao Computer</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=product"><i class="fa fa-address-book"></i> Danh sách sản phẩm</a></li>
        <li class="active">Thêm Sản phẩm</li>
    </ol>
</section>
<form role="form" method="POST" action="" enctype="multipart/form-data" id="product_create">
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="form-group">
                        <label for="c_name">Tên Sản phẩm :</label>
                        <input type="text" minlength="6" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>" class="form-control required" name="title" placeholder="Nhập tên sản phẩm ..." >
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện :</label>
                        <input type="file" class="form-control" name="avatar">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh mô tả sản phẩm  :</label>
                        <input type="file" class="form-control" multiple="multiple" name="avatars[]">
                    </div>
                    <div class="form-group">
                        <label for="summary">Thông số kỹ thuật :</label>
                        <textarea cols="30" rows="5" class="form-control " placeholder="Mô tả chi tiết sản phâm" name="summary"><?php echo isset($_POST['summary']) ? $_POST['summary'] : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="summary">Mô tả chi tiết sản phẩm :</label>
                        <textarea cols="30" rows="5" class="form-control " placeholder="Mô tả chi tiết sản phâm" name="content"><?php echo isset($_POST['content']) ? $_POST['content'] : '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box box-danger">
                <div class="box-body">
                  <div class="form-group">
                    <label for="present">Qùa tặng sản phẩm :</label>
                    <textarea cols="30" rows="5" class="form-control " placeholder="Mô tả chi tiết sản phâm" name="present"><?php echo isset($_POST['present']) ? $_POST['present'] : '' ?></textarea>
                  </div>
                    <!--            -->
                    <div class="form-group">
                        <label for="category_id">Chọn danh mục :</label>
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
<!--                  -->
                  <div class="form-group">
                    <label for="producer_id">Chọn Thương hiệu :</label>
                    <select name="producer_id" class="form-control" id="producer_id">
                        <?php if(empty($producers)): ?>
                          <option value="">Không có thương hiệu nào</option>
                        <?php else: ?>
                          <option value="">-- Tất cả thương hiệu -- </option>
                            <?php foreach ($producers as $producer):?>
                            <option value="<?php echo $producer['id'] ?>"><?php echo $producer['name']; ?></option>
                            <?php endforeach;
                        endif;
                        ?>
                    </select>
                  </div>
<!--                  -->
                  <div class="form-group">
                    <label for="ram">Ram :</label>
                    <input type="number" name="ram" value="<?php echo isset($_POST['ram']) ? $_POST['ram'] : '' ?>" class="form-control" id="ram">
                  </div>
                  <div class="form-group">
                    <label for="hard_drive">Ổ cứng :</label>
                    <input type="number" name="hard_drive" value="<?php echo isset($_POST['hard_drive']) ? $_POST['hard_drive'] : '' ?>" class="form-control" id="hard_drive">
                  </div>
                  <div class="form-group">
                    <label for="product_year">Ngày sản xuất :</label>
                    <input type="date" name="product_year" value="<?php echo isset($_POST['product_year']) ? $_POST['product_year'] : '' ?>" class="form-control" id="product_year">
                  </div>
                    <div class="form-group">
                        <label for="price">Giá sản phẩm :</label>
                        <input type="number" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>" class="form-control" id="price">
                    </div>
                    <div class="form-group">
                        <label for="discount">% Khuyến Mại :</label>
                        <input type="number" name="discount" value="<?php echo isset($_POST['discount']) ? $_POST['discount'] : 0 ?>" class="form-control" id="discount">
                    </div>
                    <div class="form-group">
                        <label for="quality">Số Lượng :</label>
                        <input type="number" name="quality" value="<?php echo isset($_POST['quality']) ? $_POST['quality'] : '' ?>" class="form-control" id="quality">
                        <p class="error"></p>
                    </div>
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
                        <label for="p_status">Trạng thái :</label>
                        <select name="status" id="p_status" class="form-control required" aria-required="true">
                            <option value="">Trạng thái sản phẩm</option>
                            <option value="1" <?php echo $selected_status_a;  ?>>Active</option>
                            <option value="0" <?php echo $selected_status_d;  ?>>Disabled</option>
                        </select>
                    </div>
                    <div class="checkbox">
                        <label for="hotproduct">
                            <input type="checkbox" value="" name="hotproduct" id="hotproduct"> Sản Phẩm Nổi Bật
                        </label>
                    </div>
                    <div class="box-footer">
                        <input type="submit" value="Thêm Sản Phẩm" name="submit" class=" btn btn-success">
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
        product_year:{required:true},

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
        product_year:{required: " * Nhập ngày sản xuất của sản phẩm"},
      },
  });
</script>
