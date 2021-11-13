<!---->
<section class="content-header" style="margin-bottom: 15px;">
    <h1>
        Chi tiết của tin tức
        <small>SammiShop</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=news"> Danh sách tin tức</a></li>
        <li class="active">Chi tiết tin tức : <?php  echo $news['name']; ?></li>
    </ol>
</section>
<!--    -->
<div class="box box-danger">
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>Mã tin tức</th>
                <td><?php echo $news['id']; ?></td>
            </tr>
            <tr>
                <th>Tên tin tức</th>
                <td><?php echo $news['name']; ?></td>
            </tr>
            <tr>
                <th>Avatar</th>
                <td>
                    <?php if (!empty($news['avatar'])): ?>
                        <img style="border-radius: 3px;" src="assets/uploads/news/<?php echo $news['avatar'] ?>" width="90" height="60"/>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Danh mục tin tức</th>
                <td>
                    <?php echo $news["category_name"]; ?>
                </td>
            </tr>
            <tr>
                <th>Mô tả tin tức</th>
                <td><?php echo $news['content']; ?></td>
            </tr>
            <tr>
                <th>Trạng thái</th>
                <td>
                    <?php
                    if($news['status']==1):
                        ?>
                        <span class="label label-success"><i class="fa fa-check"></i> tin tức được hiển thị</span>
                    <?php else: ?>
                        <span class="label label-danger"> <i class="fa fa-times"></i> tin tức đã bị ẩn</span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>tin tức Nổi Bật</th>
                <td><?php if(isset($news["hotnews"]) && $news["hotnews"]== 1 ): ?>
                        <span class="label label-danger"><i class="fa fa-check"></i> tin tức hot</span>
                    <?php else: ?>
                        <div><i class="fa fa-times"></i></div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Ngày tạo</th>
                <td>
                    <?php echo date('d/m/Y - H:i:s', strtotime($news['created_at'])); ?>
                </td>
            </tr>
            <tr>
                <th>Ngày cập nhật cuối </th>
                <td>
                    <?php
                    if(isset($news["updated_at"]))
                    {
                        echo date('d/m/Y H:i:s', strtotime($news['updated_at']));
                    }else{
                        echo "---";
                    }
                    ?>

                </td>
            </tr>
        </table>
    </div>
</div>
<a class="btn btn-danger" href="index.php?area=backend&controller=news">Back</a>


