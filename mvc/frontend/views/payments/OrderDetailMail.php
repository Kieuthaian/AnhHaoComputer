<style>
  p
  {
    padding: 0px;
    margin: 0px;
  }
</style>
<div class="container">
  <p>Chào <span style="font-weight: bold"><?php echo  $_SESSION["order"]["fullname"];  ?></span> !!!</p>
  <h3>Mã đơn hàng của bạn là : #<span style="font-weight: bold"><?php echo  $_SESSION["order"]["id"];  ?></span></h3>
  <p>Số tiền bạn cần phải thanh toán là : <?php echo number_format($_SESSION["order"]["price_total"]); ?> VNĐ</p>
  <p>Để thanh toán đơn hàng , bạn có thể thanh toán khi nhận được hàng hoặc chuyển khoản theo thông tin sau :</p>
  <h4>Kiều Thái An (Ngân hàng TechComBank-Chi nhánh Hà Tây)</h4>
  <h4>STK : 0395679339</h4>
  <p>Nội dung chuyển khoản : Thanh toán đơn hàng mã : #<span style="font-weight: bold"><?php echo  $_SESSION["order"]["id"];  ?></span></p>
  <p>Hoặc bạn có  thể liên hệ trực tiếp với chúng tôi qua SĐT : <a href="tel:0335257862">033.525.7862</a></p>
  <br>
</div>
<div style="margin: auto;width: 800px">
  <h3 style="text-align: center" >THÔNG TIN NGƯỜI MUA HÀNG</h3>
  <table style="border-collapse: collapse;width: 100%" border="1px solid #dadada;">
    <tbody>
    <tr>
      <th width="20%">Họ Tên</th>
      <th width="20%">Số Điện Thoại </th>
      <th width="30%">Email</th>
      <th width="30%">Địa Chỉ</th>
    </tr>
    <tr>
      <td style="text-align: center">
        <?php echo $_SESSION["order"]["fullname"] ?>
      </td>
      <td  style="text-align: center">
        <?php echo $_SESSION["order"]["phone"] ?>
      </td>
      <td  style="text-align: center">
        <?php echo $_SESSION["order"]["email"] ?>
      </td>
      <td  style="text-align: center">
        <?php echo $_SESSION["order"]["address"] ?>
      </td>
    </tr>
    </tbody>
  </table>
</div>
<br>
<div style="margin: auto;width: 800px">
  <h3 style="text-align: center" >THÔNG TIN ĐƠN HÀNG</h3>
  <?php
  $total_cart=0;
  $total_discount=0;
  $total=0;
  $total_product=0;
  if (isset($_SESSION['cart'])):
    ?>
    <table style=" border-collapse: collapse;" border="1px solid #dadada;">
      <tbody>
      <tr>
        <th width="25%">Tên sản phẩm</th>
        <th width="12%">Số lượng</th>
        <th width="15%">Giá</th>
        <th width="12%">% Khuyến Mại</th>
        <th width="20%">Thành tiền</th>

      </tr>
      <?php foreach ($_SESSION['cart'] AS $product_id => $cart):
        ?>
        <tr>
          <td style="text-align: center">
            <?php echo $cart['name']; ?>
          </td>
          <td style="text-align: center">
            <?php echo $cart['quality']; ?>
          </td>
          <td style="text-align: center">
            <?php echo number_format($cart['price'], 0, '.', '.') ?> VND
          </td>
          <td style="text-align: center">
            <?php echo $cart['discount']; ?> %
          </td>
          <td style="text-align: center">
            <?php
            $total_item_discount=($cart["price"] * ($cart["discount"]/100)) * $cart["quality"] ;
            $total_item=($cart["price"] * $cart["quality"]);
            $total_product=$total_item-$total_item_discount;
            $total_cart += $total_item;
            $total_discount += $total_item_discount;
            $total +=$total_product;
            echo number_format($total_product);
            ?>
            VND
          </td>
        </tr>
      <?php endforeach; ?>
      <tr>
      <tr>
        <?php if($total_discount > 0): ?>
        <td colspan="6" style="text-align: right;">
          <p style="font-size: 16px;font-weight: bold;">
            Thành Tiền :
            <span class="product-price">
                        <?php echo number_format($total_cart); ?> VND
                    </span>
          </p>
          <p style="font-size: 16px;font-weight: bold;">
            Giảm giá :
            <span class="product-price">
                        <?php echo number_format($total_discount); ?> VND
                    </span>
          </p >
          <?php endif; ?>
          <p style="font-size: 17px;font-weight: bold;">
            Tổng tiền thanh toán :
            <span class="product-price">
                        <?php echo number_format($total); ?> VND
                        </span>
          </p>
        </td>
      </tr>
      </tbody>
    </table>
  <?php endif; ?>
</div>
<br>
<span style="font-weight: bold">Lưu ý :</span> Qúy khách cần hỗ trợ về đơn hàng liên hệ với chúng tôi qua hottline :<a href="tel:0335257862">033.525.7862</a>
