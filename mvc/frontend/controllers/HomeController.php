<?php
class HomeController extends Controller{
    public function index(){
//        echo "<pre>";
//        print_r($_SESSION);
//        echo "</pre>";
        $this->content=$this->render("mvc/frontend/views/home/home.php");
       require_once 'mvc/frontend/views/layouts/main.php';
    }
}