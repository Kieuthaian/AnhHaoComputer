<?php
require_once 'mvc/backend/models/report.php';
class ReportController extends Controller{
  public  function index(){
    $report_model=new report();
    $products=$report_model->hotProduct();
    $this->content=$this->render("mvc/backend/views/reports/index.php",['products' => $products]);
    require_once 'mvc/backend/views/layouts/main.php';
  }
  public function ProductNoData(){
    $report_model=new report();
    $products=$report_model->ProductNoData();
    $this->content=$this->render("mvc/backend/views/reports/ProductNoData.php",['products' => $products]);
    require_once 'mvc/backend/views/layouts/main.php';
  }
  public function SellingProduct(){
    $report_model=new report();
    $products=$report_model->sellingProducts();
    $this->content=$this->render("mvc/backend/views/reports/SellingProduct.php",['products' => $products]);
    require_once 'mvc/backend/views/layouts/main.php';
  }
  public function moneyProduct(){
    $ngaybatdau=date('Y-m-01 00:00:00') ;
    $ngayketthuc=date("Y-m-d 23:59:59") ;
    $ngaybatdau1=date('d-m-Y', strtotime($ngaybatdau));
    $ngayketthuc1=date('d-m-Y', strtotime($ngayketthuc));
    if(isset($_POST['submit'])){
      $ngaybatdau=$_POST['ngayBatDau'];
      $ngayketthuc=$_POST['ngayKetThuc'];
      $ngaybatdau=date("$ngaybatdau 00:00:00",) ;
      $ngayketthuc=date("$ngayketthuc 23:59:59") ;
      $report_model=new report();
      $sumprice=$report_model->moneyProduct($ngaybatdau,$ngayketthuc);
      $ngaybatdau1=date('d-m-Y', strtotime($ngaybatdau));
      $ngayketthuc1=date('d-m-Y', strtotime($ngayketthuc));
      $output=[
          "ngaybatdau" => $ngaybatdau1,
          "ngayketthuc" => $ngayketthuc1,
          'sumprice' => $sumprice
      ];
      $this->content=$this->render("mvc/backend/views/reports/moneyProduct.php",$output);
      require_once 'mvc/backend/views/layouts/main.php';
    }else{
      $report_model=new report();
      $sumprice=$report_model->moneyProduct($ngaybatdau,$ngayketthuc);
      $output=[
          "ngaybatdau" => $ngaybatdau1,
          "ngayketthuc" => $ngayketthuc1,
          'sumprice' => $sumprice
      ];
      $this->content=$this->render("mvc/backend/views/reports/moneyProduct.php",$output);
      require_once 'mvc/backend/views/layouts/main.php';
    }

  }
}