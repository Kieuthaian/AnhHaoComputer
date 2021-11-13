<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Danh sách tin tức
        <small>SammiShop</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li class="active">Danh sách tin tức</li>
    </ol>
</section>
<div style="text-align: right;margin-bottom: 15px;">
    <a href="index.php?area=backend&controller=news&action=create" class="btn btn-success"><i class="fa fa-plus"></i> Thêm tin tức</a>
</div>
<div class="box box-danger">
    <div class="box-body table-responsive no-padding ">
        <table class="table table-bordered table-hover dataTable">
            <tr>
                <th>Số thứ tự</th>
                <th style="width: 20%">Tên tin tức</th>
                <th>Ảnh đại diện</th>
                <th>Phân loại tin tức</th>
                <th>Trạng thái</th>
                <th>tin tức nổi bật</th>
                <th>Ngày tạo</th>
                <th style="text-align: center;">Chức năng</th>
            </tr>
            <?php if(!empty($news)): ?>
                <?php foreach ($news as $new): ?>
                    <tr>
                        <td><?php echo $new["id"]  ?></td>
                        <!--                -->
                        <td><?php echo $new["name"] ?></td>
                        <!--              -->
                        <!--                -->
                        <td>
                            <?php if(!empty($new['avatar'])): ?>
                                <img style="margin: 10px 0px;border-radius: 3px;" src="assets/uploads/news/<?php echo $new['avatar']; ?>" width="90" height="80"/>
                            <?php endif; ?>
                        </td>
                        <td>
                           <?php echo $new['category_name']; ?>
                        </td>
                        <td>
                            <?php
                            if($new['status']==1):
                                ?>
                                <span class="label label-success"> <i class="fa fa-check"></i> tin tức được hiển thị</span>
                            <?php else: ?>
                                <span class="label label-danger"> <i class="fa fa-times"></i>   tin tức đã bị ẩn</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php
                            if($new['hotnews']==1):
                                ?>
                                <span class="label label-danger"><i class="fa fa-check"></i> Tin tức nổi bật </span>
                                <!--                    --><?php //else: ?>
                                <!--                      <span class="label label-danger">tin tức đã bị ẩn</span>-->
                            <?php endif; ?>
                        </td>
                        <!--              -->
                        <td><?php echo date('d/m/Y - H:i:s', strtotime($new['created_at'])); ?></td>
                        <!--              -->
                        <td style="text-align: center">
                            <a style="margin-right: 10px;" href="index.php?area=backend&controller=news&action=detail&id=<?php echo $new['id']; ?>">
                                <i class="fa fa-eye "></i></a>
                            <a style="margin-right: 10px;" href="index.php?area=backend&controller=news&action=update&id=<?php echo $new['id'] ?>">
                                <i class="fa fa-pencil"></i></a>
                            <a  style="margin-right: 10px;"
                                href="index.php?area=backend&controller=news&action=delete&id=<?php echo $new['id']?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                                <i class="fa fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không có tin tức sản phẩm nào</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
