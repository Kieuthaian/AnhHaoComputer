<?php
require_once "mvc/backend/models/User.php";
class UserController extends Controller
{
  public function index()
  {
    $usermodel=new User();
    $users=$usermodel->getAll();
    $this->content=$this->render("mvc/backend/views/users/index.php",["users"=> $users]);
    require_once "mvc/backend/views/layouts/main.php";
  }
}