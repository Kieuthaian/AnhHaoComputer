<?php
require_once 'mvc/frontend/models/Product.php';
class CartController extends Controller
{
  public function __construct()
  {
    if(isset($_SESSION["cart"])== false)
      $_SESSION["cart"]=array();
  }
  public function add(){
      $id = $_GET["id"];
      $product_model = new Product();
      $product = $product_model->detailProduct($id);
      $cart =
          [
              "name" => $product["title"],
              "price" => $product["price"],
              "avatar" => $product["avatar"],
              "discount" => $product["discount"],
              "quality" => 1,
          ];

      if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"][$id] = $cart;
      }
      else {
        if (!array_key_exists($id, $_SESSION["cart"])) {
          $_SESSION["cart"][$id] = $cart;
        } else {
          if($product['quality'] <= $_SESSION["cart"][$id]["quality"]){
            $_SESSION["error"]='Sản phẩm '.$product["title"].'chỉ còn lại '.$product['quality'].' chiếc';
          }else{
            $_SESSION["cart"][$id]["quality"]++;
          }
        }
      }
    $url_redirect=$_SERVER["SCRIPT_NAME"].'/gio-hang-cua-ban';
    header("location:  $url_redirect");
    exit();
  }
  public function index()
  {
    if(isset($_POST["submit"]))
    {
      foreach ($_SESSION["cart"] as $product_id=>$cart)
      {
        $product_model=new Product();
        $products=$product_model->detailProduct($product_id);
        if($products['quality'] < $_POST[$product_id]){
          $_SESSION["error"]= "Sản phẩm ".$products['title'].' chỉ còn số lượng'.$products["quality"] . "chiếc";
        }
        else if( $_POST[$product_id] <= 0)
        {
          unset($_SESSION['cart'][$product_id]);
        }
        else if( $_POST[$product_id] > 10){
          $_SESSION["error"]= " Không được mua quá 10 sản phẩm";
        }
        else {
          $_SESSION["cart"][$product_id]["quality"] = $_POST[$product_id];
        }
      }
    }
    $this->content=$this->render(
        'mvc/frontend/views/carts/index.php');
    require_once "mvc/frontend/views/layouts/main.php";
  }
  public function delete()
  {
    $product_id=$_GET['id'];
    unset($_SESSION["cart"][$product_id]);
    if(empty($_SESSION["cart"]))
    {
      unset($_SESSION["cart"]);
    }
    $_SESSION["success"] =" Xóa sản phẩm khỏi giỏ hàng thành công";
    $url_redireact=$_SERVER["SCRIPT_NAME"]."/gio-hang-cua-ban";
    header("location: $url_redireact ");
    exit();
  }
  public function destroy()
  {
    $_SESSION['cart'] = array();
    $url_redireact=$_SERVER["SCRIPT_NAME"]."/gio-hang-cua-ban";
    header("location: $url_redireact ");
  }
}
