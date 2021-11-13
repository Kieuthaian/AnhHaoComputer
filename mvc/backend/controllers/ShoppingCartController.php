<?php
require_once "mvc/backend/models/ShoppingCart.php";
//require_once 'PDF/fpdf.php';
//require_once "TCPDF/tcpdf.php";
//require_once 'TCPDF/examples/lang/eng.php';

class ShoppingCartController extends Controller
{
  public function index()
  {
    $pageSize = 10;
    $page = "";
    if (isset($_POST["page"]) && is_numeric($_POST["page"])) {
      $page = $_POST["page"];
    } else {
      $page = 1;
    }
    $order_model = new ShoppingCart();
    $countOrder = $order_model->countTotal();
    $numPage = ceil($countOrder / $pageSize);
    $carts = $order_model->listOrder($pageSize, $page);
    $this->content = $this->render("mvc/backend/views/shoppingcart/index.php", [
        "carts" => $carts,
        "numPage" => $numPage,
        "page" => $page
    ]);
    require_once "mvc/backend/views/layouts/main.php";
  }

  public function search()
  {
    $pageSize = 10;
    $page = "";
    if (isset($_POST["page"]) && is_numeric($_POST["page"])) {
      $page = $_POST["page"];
    } else {
      $page = 1;
    }
    $order_model = new ShoppingCart();
    if (isset($_POST["query"]) && $_POST["query"] != "") {
      $search = $_POST["query"];
      $countOrder = $order_model->countorderSearch($search);
      $numPage = ceil($countOrder / $pageSize);
      $carts = $order_model->orderSearch($search, $pageSize, $page);
      $this->content = $this->render("mvc/backend/views/shoppingcart/search.php", [
          "carts" => $carts,
          "numPage" => $numPage,
          "page" => $page]);
      echo $this->content;
    } else {
      $countOrder = $order_model->countTotal();
      $numPage = ceil($countOrder / $pageSize);
      $carts = $order_model->listOrder($pageSize, $page);
      $this->content = $this->render("mvc/backend/views/shoppingcart/search.php",
          ["carts" => $carts,
              "numPage" => $numPage,
              "page" => $page]);
      echo $this->content;
    }
  }

  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?area=backendcontroller=ShoppingCart');
      exit();
    }
    $id = $_GET["id"];
    $order_model = new ShoppingCart();
    $order = $order_model->order($id);
    $products = $order_model->listProduct($id);
    $this->content = $this->render("mvc/backend/views/shoppingcart/detail.php", [
        "products" => $products,
        "order" => $order

    ]);
    require_once 'mvc/backend/views/layouts/main.php';
  }

  public function send_payment()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?area=backendcontroller=ShoppingCart');
      exit();
    }
    $id = $_GET["id"];
    $order_model = new ShoppingCart();
    $order_model->updated_at = date('Y-m-d H:i:s');
    $is_update = $order_model->sentPaymentOrder($id);
    if ($is_update) {
      $_SESSION['success'] = 'Đã thanh toán đơn hàng';
    } else {
      $_SESSION['error'] = 'Thanh toán thất bại';
    }
    header('Location: index.php?area=backend&controller=ShoppingCart');
    exit();
  }

  public function send_status()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?area=backendcontroller=ShoppingCart');
      exit();
    }
    $id = $_GET["id"];
    $order_model = new ShoppingCart();
    $order_model->updated_at = date('Y-m-d H:i:s');
    $is_update = $order_model->sentStatusOrder($id);
    if ($is_update) {
      $_SESSION['success'] = 'Đã xác nhân đơn hàng';
    } else {
      $_SESSION['error'] = 'Đơn hàng có vấn đề';
    }
    header('Location: index.php?area=backend&controller=ShoppingCart');
    exit();
  }

  public function send_statusAll()
  {
    $order_model = new ShoppingCart();
    $order_model->updated_at = date('Y-m-d H:i:s');
    $is_update = $order_model->sentStatusAll();
    if ($is_update) {
      $_SESSION['success'] = 'Đã xác nhân đơn hàng';
    } else {
      $_SESSION['error'] = 'Có đơn hàng gặp vấn đề';
    }
    header('Location: index.php?area=backend&controller=ShoppingCart');
    exit();

  }

  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?area=backendcontroller=ShoppingCart');
      exit();
    }
    $id = $_GET["id"];
    $order_model = new ShoppingCart();
    $order_model->updated_at = date('Y-m-d H:i:s');
    $is_update = $order_model->delete_Oder($id);
    if ($is_update) {
      $_SESSION['success'] = 'Đã hàng đã được hủy';
    } else {
      $_SESSION['error'] = 'Đơn hàng có vấn đề';
    }
    header('Location: index.php?area=backend&controller=ShoppingCart');
    exit();
  }
//
//  public function PrintCart()
//  {
//    $id=$_GET['id'];
//    $order_model=new ShoppingCart();
//    $order=$order_model->order($id);
//    $list_order=$order_model->listProduct($id);
//    $order_name=$order['fullname'];
//    $order_phone=$order['phone'];
//    $order_email=$order['email'];
//    $order_address=$order['address'];
//    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//    $pdf->AddPage();
//    $pdf->SetFont('freeserif', 'B', 18);
//    $pdf->Cell(0, 6, 'Showroom Tú Hoàng ', 0, 1, 'C', 0, '', 1);
//    $pdf->SetFont('freeserif', '', 11);
//    $pdf->Cell(0, 6, 'Đia chỉ : Triều Khúc - Thanh Trì - Hà Nội.', 0, 1, 'C', 0, '', 1);
//    $pdf->SetFont('freeserif', '', 11);
//    $pdf->Cell(0, 6, 'Số điện thoại: 039.567.9339 ', 0, 1, 'C', 0, '', 1);
//    $pdf->Cell(181, 0, '______________________________________________________________________', 0, 1, 'C', 0, '', 0);
//    $pdf->ln(5);
//    $pdf->SetFont('freeserif', '', 15);
//    $pdf->Cell(0, 5, 'HÓA ĐƠN THANH TOÁN', 0, 1, 'C', 0, '', 1);
//    $pdf->Cell(0, 0, '-------oOo-------', 0, 1, 'C', 0, '', 0);
//    $pdf->ln(10);
//    $pdf->SetFont('freeserif', '', 12);
//    $pdf->Cell(100,5,'Họ vào tên: ' .$order_name,0,0);
//    $pdf->Cell(79,5,'Điện thoại: ' .$order_phone,0,1,'C');
//    $pdf->ln(2);
//    $pdf->Cell(150,5,'Địa chỉ: '.$order_address,0,1);
//    $pdf->ln(2);
//    $pdf->Cell(100,5,'Email: ' .$order_email,0,1,);
//    $pdf->ln(2);
//
//    $pdf->ln(10);
//    $pdf->SetFont('freeserif', '', 13);
//    $pdf->Cell(0, 5, '--- CHI TIẾT ĐƠN HÀNG ---', 0, 1, 'C', 0, '', 1);
//    $pdf->SetFont('freeserif', '', 11);
//    $pdf->setFillColor(222,228,255);
//    $pdf->ln(4);
//    $pdf->Cell(70,10,'Tên sản phẩm',1,0,'C',1);
//    $pdf->Cell(35,10,'Giá',1,0,'C',1);
//    $pdf->Cell(20,10,'Số lượng',1,0,'C',1);
//    $pdf->Cell(30,10,'% Khuyến mãi',1,0,'C',1);
//    $pdf->Cell(35,10,'Thành tiền',1,0,'C',1);
//    $total_cart=0;
//    $total_discount=0;
//    $total=0;
//    $total_product=0;
//    foreach ($list_order as $key=>$order){
//      $total_item_discount=($order["product_price"] * ($order["product_discount"]/100)) * $order["quality"] ;
//      $total_item=($order["product_price"] * $order["quality"]);
//      $total_product=$total_item-$total_item_discount;
//      $total_cart += $total_item;
//      $total_discount += $total_item_discount;
//      $total +=$total_product;
//      $pdf->ln(10);
//      $pdf->Cell(70,10,$order['product_name'],1,0,'',1,'','',false);
//      $pdf->Cell(35,10,number_format($order['product_price']).'VNĐ',1,0,'C',1);
//      $pdf->Cell(20,10,$order['quality'],1,0,'C',1);
//      $pdf->Cell(30,10,$order['product_discount'].'%',1,0,'C',1);
//      $pdf->Cell(35,10,number_format($total_product).'VNĐ',1,0,'C',1);
//    }
//    $pdf->ln(10);
//    $pdf->Cell(0,10,'Tổng tiền cần thanh toán : '.number_format($total) .'VNĐ',1,0,'R',1);
//
//    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
//    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
//    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//
//    $pdf->Output('example_001.pdf', 'I');
//  }
}