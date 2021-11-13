<?php
class Controller{
    public $error=[];
    public $content;
    public function __construct()
    {

      if(isset($_GET["area"]) && strtolower($_GET["area"])== strtolower("Backend") )
      {
        if (!isset($_SESSION["user_admin"]) && $_GET["controller"] != 'login') {
          header("location:index.php?area=backend&controller=login");
          exit();
        }
      }
    }

  public function render($file,$variable=[]){
        extract($variable);
        ob_start();
        require_once $file;
        $view= ob_get_clean();
        return $view;
    }
}