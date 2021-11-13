<?php

class report extends Model
{
//  public $ngaybatdau;
//  public $ngayketthuc;
  public function ProductNoData()
  {
    $sql_select = "select products.*,categories.name as category_name,producers.name as producer_name,producers.address as producer_address from products 
                      inner join categories inner join producers
                    on products.category_id=categories.id and producers.id=products.producer_id  WHERE products.id NOT IN(
                                    SELECT order_details.product_id FROM order_details)";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function sellingProducts()
  {
    $sql_select = "SELECT products.*, SUM(order_details.quality) AS TONG ,categories.name as category_name,producers.name as producer_name
                    FROM products INNER JOIN order_details inner join categories inner join producers
                    on products.category_id=categories.id and producers.id=products.producer_id
                 and products.id = order_details.product_id
                    GROUP BY products.title ORDER BY TONG DESC ";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function moneyProduct($ngaybatdau,$ngayketthuc)
  {
    $sql_select = "select SUM(orders.price_total) from orders WHERE orders.created_at >= '$ngaybatdau' and orders.created_at <='$ngayketthuc' ";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchColumn();
    return $products;
  }
  public function hotProduct()
  {
    $sql_select = "select products.*,categories.name as category_name from categories inner join products 
                    on categories.id=products.category_id where products.status=1 and products.hotproduct=1 
                    ORDER BY products.updated_at ";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
}