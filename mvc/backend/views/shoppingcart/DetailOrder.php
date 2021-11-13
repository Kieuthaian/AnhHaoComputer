<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Danh sách đơn hàng
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li class="active"> <i class="fa fa-address-book"></i>  Danh sách đơn hàng</li>
  </ol>
</section>
<?php
$total_cart=0;
$total_discount=0;
$total=0;
$total_product=0;
$id=$_GET['id'];
?>

<?php
if($order["payment_status"] !=1  && $order["status"] !=3):
  ?>
  <a href="index.php?area=backend&controller=ShoppingCart&action=send_payment&id=<?php echo $id; ?> " onclick="return confirm('Bạn có chắc chắn người này đã thanh toán ?')"  class="btn btn-primary">Xác nhận đã thanh toán</a>
<?php endif;
?>
<?php
if($order["status"] !=1 && $order["status"] !=3):
  ?>
  <a href="index.php?area=backend&controller=ShoppingCart&action=send_status&id=<?php echo $id; ?> " onclick="return confirm('Bạn có chắc chắn xác nhận đơn hàng này không ?')"  class="btn btn-success">Xác nhận đơn hàng</a>
<?php endif;
?>
<br>
<br>
<div class="box">
  <table class="table table-bordered" style="text-align: center;">
    <tr>
      <th style="text-align: center;">Tên Sản Phẩm</th>
      <th style="text-align: center;">Số Lượng</th>
      <th style="text-align: center;">Đơn giá</th>
      <th style="text-align: center;"> % Khuyến Mại</th>
      <th style="text-align: center;">Thành Tiền</th>
    </tr>
    <?php if (!empty($oders)): ?>
      <?php foreach ($oders as $product):?>
        <tr>
          <td>
            <?php echo $product["product_name"];?>
          </td>
          <td>
            <?php echo $product["quality"];  ?>
          </td>
          <td>
            <?php echo number_format($product["product_price"]);  ?> VNĐ
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
    <?php else:?>
      <tr>
        <td colspan="11">No data found</td>
      </tr>
    <?php endif;?>
  </table>
  <div align="right" style="font-size: 17px; font-weight: bold;padding:10px 20px 20px 0px;">
    <p> Tổng Tiền : <?php echo number_format($total_cart); ?> VND</p>
    <p> Giảm Giá : <?php echo number_format($total_discount); ?> VND</p>
    <p> Thành Tiền : <?php echo number_format($total); ?> VND</p>
  </div>
  <div>
    <a style="margin-left: 15px" href="index.php?area=backend&controller=home&action=OrderNoUser" class="btn btn-primary">Quay lại</a>
  </div>
  <br>
</div>



