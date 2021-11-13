<?php
require_once 'mvc/frontend/models/Login.php';
require_once  "mvc/frontend/models/Order.php";
require_once  "mvc/frontend/models/OrderDetail.php";
class LoginController extends Controller{
  public function index(){
    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      if (empty($this->error)) {
        $user_model = new Login();
        $password = md5($password);
        $user = $user_model->getUserLogin($email, $password);
        if (empty($user)) {
          $_SESSION['error'] = 'Tên tài khoản và mật khẩu không đúng';
          $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
          header("Location: $url_redirect");
          exit();
        } else {
//                    $_SESSION['success'] = 'Đăng nhập thành công';
          $_SESSION['user_account'] = $user;
          header('Location: index.php');
          exit();
        }
      }
    }
    $this->content=$this->render("mvc/frontend/views/login/index.php");
    require_once "mvc/frontend/views/layouts/main.php";
  }
  public function validateEmail()
  {
    $email =  $_POST["email"];
    $user_model = new Login();
    $user = $user_model->getUser($email);
    if(!empty($user))
    {
      echo "True";
    }
    else
    {
      echo "false";
    }
  }
  public function validatePhone()
  {
    $phone =$_POST["phone"];
    $user_model = new Login();
    $user = $user_model->getUserPhone($phone);
    if(!empty($user))
    {
      echo "True";
    }
    else
    {
      echo "false";
    }
  }
  public function register(){

    if(isset($_POST["submit"])) {
      $fullname=$_POST["fullname"];
      $email=$_POST["email"];
      $phone=$_POST["phone"];
      $address=$_POST["address"];
      $password=$_POST["password"];
      $status=$_POST["status"];
      if(empty($this->error))
      {
        $user_model=new Login();
        $user=$user_model->getUser($email);
        $mobile_model=$user_model->getUserPhone($phone);
        if(!empty($mobile_model))
        {
          $_SESSION["error"]=" Số điện thoại đã được đăng ký";
        } else if(!empty($user))
        {
          $_SESSION["error"]="  Email đã được đăng ký";
        }
        else
        {
          $user_model->fullname=$fullname;
          $user_model->phone=$phone;
          $user_model->address=$address;
          $user_model->status=$status;
          $user_model->email=$email;
          $user_model->password = md5($password);
          $is_register = $user_model->register();
          if($is_register) {
            $_SESSION['success'] = 'Đăng ký tài khoản thành công';
          } else {
            $_SESSION['error'] = 'Đăng ký tài khoản thất bại';
          }

          $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
          header("Location: $url_redirect");
          exit();
        }
      }
    }
    $this->content=$this->render("mvc/frontend/views/login/register.php");
    require_once 'mvc/frontend/views/layouts/main.php';
  }
  public function logout() {
    unset($_SESSION['user_account']);
    $_SESSION['success'] = ' Đăng xuất tài khoản thành công';
    $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
    header("Location: $url_redirect");
    exit();
  }
  public function updateUser(){
    $this->content=$this->render("mvc/frontend/views/login/updateUser.php");
    require_once "mvc/frontend/views/layouts/main.php";
  }
  public function history()
  {
    $id=$_SESSION["user_account"]["id"];
    $order_model=new Order();
    $orders=$order_model->listOrder($id);
    $this->content=$this->render('mvc/frontend/views/login/shoppingCart.php',["orders" => $orders]);
    require_once 'mvc/frontend/views/layouts/main.php';
  }
  public function historyallproduct()
  {
    $id=$_GET["id"];
    $order_model=new OrderDetail();
    $products=$order_model->listProduct($id);
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
//        die();
    $this->content=$this->render('mvc/frontend/views/login/HistoryAllProduct.php',["products" => $products]);
    require_once 'mvc/frontend/views/layouts/main.php';

  }
  public function delete_orders()
  {

    $id = $_GET['id'];
    $order_model=new Order();
    $is_delete = $order_model->delete_Oder($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Ban đã hủy đơn hàng thành công';
    } else {
      $_SESSION['error'] = 'Đơn hàng có vấn đề - Hãy liên hệ với Shop để được giải quyết';
    }
    $url_redireact=$_SERVER["SCRIPT_NAME"]."/lich-su-mua-hang";
    header("location: $url_redireact ");
    exit();
  }

}