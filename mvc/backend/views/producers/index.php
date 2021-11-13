<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Danh sách thương hiệu
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li class="active">Danh sách thương hiệu</li>
    </ol>
</section>
<div style="text-align: right;margin-bottom: 15px;">
    <a href="index.php?area=backend&controller=producer&action=create" class="btn btn-success"><i class="fa fa-plus"></i> Thêm thương hiệu</a>
</div>
<div class="box box-danger">
    <div class="box-body table-responsive no-padding ">
        <table class="table table-bordered table-hover dataTable">
            <tr>
                <th>Số thứ tự</th>
                <th>Tên thương hiệu</th>
                <th>Ảnh đại diện</th>
                <th>Trạng thái</th>
                <th>Địa chỉ sản xuất</th>
                <th>Ngày tạo</th>
                <th style="text-align: center;">Chức năng</th>
            </tr>
            <?php if(!empty($producers)): ?>
                <?php foreach ($producers as $producer): ?>
                    <tr>
                        <td><?php echo $producer["id"]  ?></td>
                        <!--                -->
                        <td><?php echo $producer["name"] ?></td>
                        <!--              -->
                        <!--                -->
                        <td>
                            <?php if(!empty($producer['avatar'])): ?>
                                <img style="margin: 10px 0px;border-radius: 3px;" src="assets/uploads/producers/<?php echo $producer['avatar']; ?>" width="90" height="80"/>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php
                            if($producer['status']==1):
                                ?>
                                <span class="label label-success"> <i class="fa fa-check"></i> Thương hiệu được hiển thị</span>
                            <?php else: ?>
                                <span class="label label-danger"> <i class="fa fa-times"></i>  Thương hiệu đã bị ẩn</span>
                            <?php endif; ?>
                        </td>
                        <td>
                           <?php echo $producer["address"]; ?>
                        </td>
                        <!--              -->
                        <td><?php echo date('d/m/Y - H:i:s', strtotime($producer['created_at'])); ?></td>
                        <!--              -->
                        <td style="text-align: center">
                            <a style="margin-right: 10px;" href="index.php?area=backend&controller=producer&action=detail&id=<?php echo $producer['id']; ?>">
                                <i class="fa fa-eye "></i></a>
                            <a style="margin-right: 10px;" href="index.php?area=backend&controller=producer&action=update&id=<?php echo $producer['id'] ?>">
                                <i class="fa fa-pencil"></i></a>
                            <a  style="margin-right: 10px;"
                                href="index.php?area=backend&controller=producer&action=delete&id=<?php echo $producer['id']?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                                <i class="fa fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Không có danh mục sản phẩm nào</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
