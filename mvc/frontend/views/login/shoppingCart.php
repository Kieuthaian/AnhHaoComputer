<?php
//echo "<pre>";
//    print_r($orders);
//echo "<pre>";
//    die();
//
//?>
<div class="container">
  <div class="row">
    <div class="col-sm-12" style="margin: 30px 0px">
      <h5 style="font-size: 15px;text-align: center;margin-bottom: 10px;font-family: 'Times New Roman';font-weight: bold;padding-bottom: 20px"> - LỊCH SỬ ĐẶT HÀNG -</h5>
      <?php if(!empty($orders)):
        foreach ($orders as $cart):
          ?>
          <table   class="table table-striped table-bordered table-list">
            <th  colspan="3"> Mã đơn hàng : #<?php echo $cart["id"]; ?></th>
            <th style="text-align: right" colspan="3"><?php  echo date('d/m/Y -- H:i:s',strtotime($cart["created_at"]));?></th>
            <tr style="text-align: center">
              <th width="20%">Người đặt hàng</th>
              <th  width="10%">SĐT</th>
              <th  width="25%">Địa chỉ</th>
              <th  width="20%">Trạng thái đơn hàng</th>
              <th  width="15%">Thanh toán</th>
              <th  width="10%">Chi tiết ĐH</th>

            </tr>
            <tr style="text-align: center">
              <td><?php echo $cart["fullname"]; ?></td>
              <td>0<?php echo $cart["phone"]; ?></td>
              <td><?php echo $cart["address"]; ?></td>
              <td>
                <?php
                if($cart["status"] == 0)
                {
                  echo "<i style='color: red' class='fa fa-retweet'></i> <span style='color:red'> Đang xử lý</span>";
                }
                elseif ($cart["status"] == 1)
                {
                  echo "<i style='color: #0bb827' class='fa fa-check'></i> <span style='color: #0bb827'>Đã xác nhận thành công</span>";
                }
                elseif($cart["status"] == 3)
                {
                  echo "<i style='color: red' class='fa fa-check'></i> <span style='color:red'> Đang hàng của bạn đã hủy</span>";
                }
                ?>
              </td>
              <td>
                <?php
                if($cart["payment_status"] == 0)
                {
                  echo "<p style='color:blue'>Thanh toán tại nhà </p>";
                }
                elseif ($cart["status"] == 1)
                {
                  echo "<p style='color:green'>Đã thanh toán</p>";
                }
                ?>

              </td>
              <td>
                <a  title="" href="san-pham-don-hang/<?php echo $cart["id"]; ?>"><i class="fa fa-eye"></i></a> &nbsp;
                <?php if ($cart["status"] == 0): ?>
                  <a title="Update" href=" huy-don-hang/<?php echo $cart["id"]; ?>" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không ?')"><i
                        class="fa fa-trash"></i></a> &nbsp;
                <?php endif; ?>
              </td>
            </tr>
            <th colspan="6" style="text-align: right">Tổng giá trị đơn hàng : <?php echo number_format($cart["price_total"]); ?> VNĐ</th>
          </table>
        <?php endforeach;
      else:
        ?>
        <h5 style="text-align: center;">Bạn chưa có đơn hàng nào !!!</h5>
      <?php endif; ?>
    </div>
  </div>
</div>
