<?php
$total_cart=0;
$total_discount=0;
$total=0;
$total_product=0;
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12" style="margin: 30px 0px">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="lich-su-mua-hang">Danh sách đơn hàng</a></li>
          <li class="breadcrumb-item active" aria-current="page">Chi Tiết Đơn Hàng</li>
        </ol>
      </nav>
      <!--            -->
      <table class="table table-bordered" style="text-align: center;">
        <tr>
          <th style="text-align: center;">Tên Sản Phẩm</th>
          <th style="text-align: center;">Đơn giá</th>
          <th style="text-align: center;">Số Lượng</th>
          <th style="text-align: center;"> % Khuyến Mại</th>
          <th style="text-align: center;">Thành Tiền</th>
        </tr>
        <?php if (!empty($products)): ?>
          <?php foreach ($products as $product):
            $product_id=$product["product_id"];
            $slug=Helper::getSlug($product["product_name"]);
            $url_detail="chi-tiet-san-pham/$slug/$product_id";
            ?>
            <tr>
              <td>
                <a href="<?php echo $url_detail; ?>"><?php echo $product["product_name"];?></a>
              </td>

              <td>
                <?php echo number_format($product["product_price"]);  ?> VNĐ
              </td>
              <td>
                <?php echo $product["quality"];  ?>
              </td>
              <td>
                <?php echo $product["product_discount"];  ?> %
              </td>

              <td><?php
                $total_item_discount=($product["product_price"] * ($product["product_discount"]/100)) * $product["quality"] ;
                $total_item=($product["product_price"] * $product["quality"]);
                $total_product=$total_item-$total_item_discount;
                echo number_format($total_product);
                $total_cart += $total_item;
                $total_discount += $total_item_discount;
                $total +=$total_product;
                ?>
                VND
              </td>
            </tr>
          <?php endforeach;?>
          <div class="row">
            <div class="col-sm-7"></div>
            <div class="col-sm-5" style="font-size: 16px;">
              <table class="table table-striped table-bordered table-list">
                <?php if($total_discount>0): ?>
                  <tr>
                    <td width="50%">Thành tiền</td>
                    <th> <?php echo number_format($total_cart); ?> VND</th>
                  </tr>
                  <tr>
                    <td width="50%">Giảm giá </td>
                    <th>- <?php echo number_format($total_discount); ?> VND</th>
                  </tr>
                  <tr>
                    <td width="50%">Tổng số tiền thanh toán :</td>
                    <th><?php echo number_format($total); ?> VND</th>
                  </tr>
                <?php else: ?>
                  <tr>
                    <td width="50%">Tổng số tiền thanh toán :</td>
                    <th><?php echo number_format($total); ?> VND</th>
                  </tr>
                <?php endif; ?>
              </table>
            </div>
          </div>
        <?php else:?>
          <tr>
            <td colspan="11">Không có sản phẩm nào !!!</td>
          </tr>
        <?php endif;?>
      </table>
    </div>
  </div>
</div>




