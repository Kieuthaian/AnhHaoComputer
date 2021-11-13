<?php

class Login extends Model{
  public function getUserLogin($email,$password){
    $sql_select_one =
        "SELECT * FROM users  WHERE `email` = :email AND `password` = :password and status=1";
    $obj_select_one = $this->connection->prepare($sql_select_one);
    $arr_select = [
        ':email' => $email,
        ':password' => $password
    ];
    $obj_select_one->execute($arr_select);
    $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $user;
  }
}