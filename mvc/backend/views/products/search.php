<div class="box box-danger" id="order_table_text">
    <div class="box-body table-responsive no-padding" >
        <table class="table table-bordered table-hover dataTable" >
            <tr>
              <th  style="text-align: center;">Số thứ tự</th>
              <th style="text-align: center;width: 15%">Tên sản phẩm</th>
              <th style="text-align: center">Tên thương hiệu</th>
              <th style="text-align: center;width: 10%"";>Tên danh mục</th>
              <th style="text-align: center">Ảnh đại diện</th>
              <th style="text-align: center">Trạng thái</th>
              <th style="text-align: center">Ngày tạo</th>
              <th style="text-align: center;">Chức năng</th>
            </tr >
            <?php if(!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <tr style="text-align: center">
                        <td><?php echo $product["id"]  ?></td>
                        <!--                -->
                        <td><?php echo $product["title"] ?></td>
                        <!--              -->
                      <td>
                          <?php echo $product["producer_name"]; ?>
                      </td>
                        <td><?php echo $product['category_name']; ?></td>
                        <!--                -->

                      <td>
                        <?php if(!empty($product['avatar'])): ?>
                          <img style="margin: 10px 0px;border-radius: 3px;" src="assets/uploads/products/<?php echo $product['avatar']; ?>" width="70" height="40"/>
                        <?php endif; ?>
                      </td>

                        <td>
                            <?php
                            if($product['status']==1):
                                ?>
                                <span class="label label-success"> <i class="fa fa-check"></i> Sản phẩm được hiển thị</span>
                            <?php else: ?>
                                <span class="label label-danger"> <i class="fa fa-times"></i>  Sản phẩm đã bị ẩn</span>
                            <?php endif; ?>
                        </td>
                        <!--              -->
                        <td><?php echo date('d/m/Y - H:i:s', strtotime($product['created_at'])); ?></td>
                        <!--              -->
                        <td style="text-align: center">
                            <a style="margin-right: 10px;" href="index.php?area=backend&controller=product&action=detail&id=<?php echo $product['id']; ?>">
                                <i class="fa fa-eye "></i></a>
                            <a style="margin-right: 10px;" href="index.php?area=backend&controller=product&action=update&id=<?php echo $product['id'] ?>">
                                <i class="fa fa-pencil"></i></a>
                            <a  style="margin-right: 10px;"
                                href="index.php?area=backend&controller=product&action=delete&id=<?php echo $product['id']?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                                <i class="fa fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không có danh mục sản phẩm nào</td>
                </tr>
            <?php endif; ?>
        </table>
    <div align="center">
        <ul class='pagination text-center' id="pagination">
            <?php if($numPage == 1){
                return '';
            }
            ?>
            <?php  if($page > 1):
                $prev_page=$page-1;
                ?>
                <li class="page-item" id="<?php echo $prev_page; ?>">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php for($i=1;$i<= $numPage;$i++):
                if($i == $page): ?>
                    <li class="page-item active" id="<?php echo $i ?>">
                        <a class="page-link active" href="#"><?php echo $i; ?></a>
                    </li>
                <?php else: ?>
                    <li class="page-item" id="<?php echo $i ?>">
                        <a class="page-link " href="#"><?php echo $i ?></a>
                    </li>
                <?php endif;
            endfor; ?>
            <?php   if($page < $numPage ):
                $next_page=$page + 1;
                ?>
                <li class="page-item" id="<?php echo $next_page; ?>">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif;?>
    </div>
    </div>
</div>

