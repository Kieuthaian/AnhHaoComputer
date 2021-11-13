<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Danh sách tài khoản
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li class="active"> <i class="fa fa-address-book"></i>  Danh sách tài khoản</li>
  </ol>
</section>
<?php
//echo "<pre>";
//    print_r($products);
//echo "</pre>";
?>
<div class="box box-success">

  <table class="table table-bordered">
    <thead>
    <tr class="table-active">
      <th scope="col">Mã</th>
      <th style="width: 20%;" scope="col">Họ và tên</th>
      <th style="width: 25%;" scope="col">Email</th>
      <th style="width:20%;" scope="col">Số điện thoại</th>
      <th style="width:15%;" scope="col">Quyền</th>
      <th style="width: 20%;" scope="col">Ngày tạo</th>
    </tr>
    </thead>
    <tbody>

    <?php if (!empty($users)): ?>

      <?php
      foreach ($users as $user):
        ?>
        <tr>
          <td><?php echo $user["id"]; ?></td>
          <td>
            <?php echo $user["fullname"]; ?>
          </td>
          <td><?php echo $user["email"]; ?> </td>
          <td><?php echo $user["phone"] ?></td>
          <td>
            <?php
            $status_user = "";
            if ($user["status"] == 1) {
              $status_user = "Tài khoản Admin";
            } else {
              $status_user = "Tài khoản khách hàng";
            }
            echo $status_user;
            ?>
          </td>
          <td><?php echo date('d/m/Y', strtotime($user["created_at"])); ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="9">Không có tài khoản nào !!!</td>
      </tr>
    <?php endif; ?>
  </table>
