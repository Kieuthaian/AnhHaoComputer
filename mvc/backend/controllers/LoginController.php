<?php
require_once 'mvc/backend/models/Login.php';
class LoginController extends Controller{
  public function index(){
    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      if (empty($email)) {
        $this->error = ' * Tên đăng nhập không được để trống';
      }
      if (empty($password)) {
        $this->error = ' * Mật khẩu không được để trống';
      }
      if (empty($this->error)) {
        $user_model = new Login();
        $password = md5($password);
        $user = $user_model->getUserLogin($email, $password);
        if (empty($user)) {
          $_SESSION['error'] = 'Sai username hoặc password';
          header("Location:index.php?area=backend&controller=login");
          exit();
        } else {
          $_SESSION['success'] = 'Đăng nhập thành công';
          $_SESSION['user_admin'] = $user;
          header('Location: index.php?area=backend');
          exit();
        }
      }
    }
    $this->content=$this->render("mvc/backend/views/users/login.php");
    echo $this->content;
  }
  public function logout() {
    unset($_SESSION['user_admin']);
    $_SESSION['success'] = ' Đăng xuất thành công';
    header("Location:index.php?area=backend&controller=login");
    exit();
  }
}