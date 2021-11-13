<?php
class ShoppingCart extends Model {
  public $updated_at;
  public function listOrder($pageSize,$page){
    $from=($page-1) * $pageSize;
    $obj_select=$this->connection->prepare("select * from orders
                    order by orders.created_at desc limit $from,$pageSize");
    $arr_select = [];
    $obj_select->execute($arr_select);
    $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $orders;
  }
  public function countTotal()
  {
    $sql_count="select count(orders.id) from orders ";
    $obj_select = $this->connection->prepare($sql_count);
    $obj_select->execute();
    return $obj_select->fetchColumn();
  }
  public function orderSearch($search,$pageSize,$page)
  {
    $from=($page-1) * $pageSize;
    $obj_select=$this->connection->prepare
    ("select * from orders where  phone like '%$search%' or fullname like '%$search%' order by created_at desc limit $from,$pageSize");
    $obj_select->execute();
    $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $orders;
  }
  public function order($id)
  {
    $obj_select=$this->connection->prepare("select * from orders where id=$id
                    order by orders.created_at desc");
    $arr_select = [];
    $obj_select->execute($arr_select);
    $orders = $obj_select->fetch(PDO::FETCH_ASSOC);
    return $orders;
  }
  public function countorderSearch($search)
  {
    $obj_select=$this->connection->
    prepare("select count(orders.id) from orders where  phone like '%$search%' or fullname like '%$search%'");

    $obj_select->execute();
    return $obj_select->fetchColumn();
  }
  public function listProduct($id)
  {
    $sql_select_product = "select order_details.*,products.title as product_name,products.discount as product_discount,
                              products.price as product_price ,orders.payment_status as payment_status,orders.status as o_status
                              from  order_details inner join products inner join orders
                              on order_details.product_id=products.id and orders.id=order_details.order_id
                              where order_details.order_id=$id";
    $obj_select= $this->connection->prepare($sql_select_product);
    $obj_select->execute();
    $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function sentPaymentOrder($id){

    $update_order = "update orders set payment_status=1,updated_at=:updated_at where id=$id and payment_status=0";
    $obj_update=$this->connection->prepare($update_order);
    $arr_update=[  ':updated_at' => $this->updated_at];
    return $obj_update->execute($arr_update);
  }
  public function sentStatusOrder($id){
    $update_order = "update orders set status=1,updated_at=:updated_at where id=$id";
    $obj_update=$this->connection->prepare($update_order);
    $arr_update=[  ':updated_at' => $this->updated_at];
    return $obj_update->execute($arr_update);
  }
  public function sentStatusAll(){

    $update_order = "update orders set status=1,updated_at=:updated_at";
    $obj_update=$this->connection->prepare($update_order);
    $arr_update=[  ':updated_at' => $this->updated_at];
    return $obj_update->execute($arr_update);
  }
  public function delete_Oder($id){

    $update_order = "update orders set status= 3,updated_at=:updated_at where id=$id";
    $obj_update=$this->connection->prepare($update_order);
    $arr_update=[  ':updated_at' => $this->updated_at];
    return $obj_update->execute($arr_update);
  }

  public function countOrder0()
  {
    $obj_select=$this->connection->prepare("select count(orders.id) from orders where status=0");
    $obj_select->execute();
    return $obj_select->fetchColumn();
  }
}
?>