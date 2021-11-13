<?php
class OrderDetail extends  Model
{
    public $order_id;
    public $product_id;
    public $quality;
    public function insert()
    {
        $sql_insert="insert into order_details(`order_id`,`product_id`,`quality`) values (:order_id,:product_id,:quality)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=
            [
                ":order_id" => $this->order_id,
                ":product_id" => $this->product_id,
                ":quality" => $this->quality
            ];
        return $obj_insert->execute($arr_insert);
    }
    public function listProduct($id)
    {
        $sql_select_product = "select order_details.*,products.title as product_name,products.discount as product_discount,
                              products.price as product_price
                              from  order_details inner join products 
                              on order_details.product_id=products.id 
                              where order_details.order_id=$id ";
        $obj_select= $this->connection->prepare($sql_select_product);
        $obj_select->execute();
        $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}