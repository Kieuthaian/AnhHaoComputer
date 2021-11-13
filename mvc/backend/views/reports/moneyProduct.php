<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Thống kê doanh thu theo ngày tháng
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li><a href="index.php?area=backend&controller=report"> <i class="fa fa-table"></i>  Thống kê - báo cáo</a></li>
    <li class="active"> <i class="fa fa-address-book"></i>  Danh sách sản phẩm</li>
  </ol>
</section>
    <h3 style="text-align: center"></h3>
    <div style="width: 500px;margin: 20px auto">
      <form action="" method="POST" id="report_money">
        <div class="col-sm-6 form-group">
          <lable for="ngayBatDau">Ngày bắt đầu :</lable>
          <input type="date" class="form-control" id="ngayBatDau" name="ngayBatDau">
        </div>
        <div class="col-sm-6 form-group">
          <lable for="ngayKetThuc">Ngày kết thúc :</lable>
          <input type="date" class="form-control" id="ngayKetThuc" name="ngayKetThuc">
        </div>
        <div class="col-sm-12 form-group">
          <input  type="submit" value="Tra cứu" name="submit" class="btn btn-success form-control">
        </div>
      </form>
      <br>
     <h4 style="text-align: center;margin-top: 20px;"> Doanh thu của :</h4>
       <h4  style="text-align: center;margin-top: 20px;font-weight: bold"><?php  echo date($ngaybatdau); ?> <i class="fa fa-arrow-right"></i> ngày <?php echo $ngayketthuc; ?> là :</h4>
      <h2 style="text-align: center"><?php echo number_format($sumprice); ?> VNĐ</h2>
    </div>



