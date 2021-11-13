<!---->
<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Chi tiết của thương hiệu
        <small>SammiShop</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=producer"> Danh sách thương hiệu</a></li>
        <li class="active">Chi tiết thương hiệu : <?php  echo $producer['name']; ?></li>
    </ol>
</section>
<!--    -->
<div class="box box-danger">
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>Mã thương hiệu</th>
                <td><?php echo $producer['id']; ?></td>
            </tr>
            <tr>
                <th>Tên thương hiệu</th>
                <td><?php echo $producer['name']; ?></td>
            </tr>
            <tr>
                <th>Avatar</th>
                <td>
                    <?php if (!empty($producer['avatar'])): ?>
                        <img style="border-radius: 3px;" src="assets/uploads/producers/<?php echo $producer['avatar'] ?>" width="90" height="60"/>
                    <?php endif; ?>
                </td>
            </tr>
          <tr>
            <th>Nơi sản xuất</th>
            <td>
             <?php  echo $producer["address"] ?>
            </td>
          </tr>
            <tr>
                <th>Trạng thái</th>
                <td>
                    <?php
                    if($producer['status']==1):
                        ?>
                        <span class="label label-success"><i class="fa fa-check"></i> thương hiệu được hiển thị</span>
                    <?php else: ?>
                        <span class="label label-danger"> <i class="fa fa-times"></i> thương hiệu đã bị ẩn</span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Thương hiệu Nổi Bật</th>
                <td><?php if(isset($producer["hotproducer"]) && $producer["hotproducer"]== 1 ): ?>
                        <span class="label label-warning"><i class="fa fa-check"></i> thương hiệu hot</span>
                    <?php else: ?>
                        <div><i class="fa fa-times"></i></div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Ngày tạo</th>
                <td>
                    <?php echo date('d/m/Y - H:i:s', strtotime($producer['created_at'])); ?>
                </td>
            </tr>
            <tr>
                <th>Ngày cập nhật cuối </th>
                <td>
                    <?php
                    if(isset($producer["updated_at"]))
                    {
                        echo date('d/m/Y H:i:s', strtotime($producer['updated_at']));
                    }else{
                        echo "---";
                    }
                    ?>

                </td>
            </tr>
        </table>
    </div>
</div>
<a class="btn btn-danger" href="index.php?area=backend&controller=producer">Back</a>


