<?php
class User extends Model{
  public function countUser(){
    $select_count="Select count(id) from users where  status=0";
    $obj_select=$this->connection->prepare($select_count);
    $obj_select->execute();
    return $obj_select->fetchColumn();
  }
  public function getAll()
  {
    $sql_select="select * from users";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $users=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $users;
  }
  public function CountNoUser(){
    $sql_select="SELECT COUNT(*) FROM orders WHERE orders.user_id NOT IN(SELECT users.id FROM users
                                                                         WHERE users.id = orders.user_id)";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $users=$obj_select->fetchColumn();
    return $users;
  }
  public function OrderNoUser(){
    $sql_select="SELECT * FROM orders WHERE orders.user_id NOT IN(SELECT users.id FROM users
                                                                         WHERE users.id = orders.user_id)";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $users=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $users;
  }

}