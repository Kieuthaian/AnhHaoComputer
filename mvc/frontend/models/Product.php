<?php

class Product extends Model
{
  public function ProductCategory($id,$query="")
  {
    $sql_select = "select products.*,categories.name from categories inner join products 
                    on categories.id=products.category_id where products.status=1 and products.category_id=$id $query
                    ORDER BY products.updated_at desc ";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function ProductProducer($id)
  {
    $sql_select = "select products.*,categories.name from categories inner join products 
                    on categories.id=products.category_id where products.status=1 and products.producer_id=$id 
                    ORDER BY products.updated_at desc ";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  public function hotProduct()
  {
    $sql_select = "select products.*,categories.name from categories inner join products 
                    on categories.id=products.category_id where products.status=1 and products.hotproduct=1 
                    ORDER BY products.updated_at limit 8 ";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  public function newProduct()
  {
    $sql_select = "select products.*,categories.name from categories inner join products 
                    on categories.id=products.category_id where products.status=1 ORDER BY products.created_at  desc limit 10 ";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  public function sellingProducts()
  {
    $sql_select = "SELECT products.*, SUM(order_details.quality) AS TONG 
                    FROM products INNER JOIN order_details
                    on products.id = order_details.product_id
                    GROUP BY products.title ORDER BY TONG DESC limit 4";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  public function countHotProduct()
  {
    $sql_select = "select count(products.id) from  products  where products.status=1 and hotproduct=1";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $product = $obj_select->fetchColumn();
    return $product;
  }

  public function UpdateQuality($id)
  {
    $sql_select = "update products set `quality` = :quality  where id=$id";
    $obj_select = $this->connection->prepare($sql_select);
    $arr_update = [
        ':quality' => $this->quality
    ];
    return $obj_select->execute($arr_update);
  }

  public function detailProduct($id)
  {
    $sql_select = "select products.*,categories.name as category_name,producers.name as producer_name  
                    from categories inner join products inner join producers
                    on categories.id=products.category_id and producers.id=products.producer_id where products.id=$id";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetch(PDO::FETCH_ASSOC);
    return $products;
  }

  public function getImages($id)
  {
    $sql_select = "select * from product_images where product_id=$id";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $images = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $images;
  }
  public function search($search)
  {
    $sql_query ="select * from products where status=1 and title like '%$search%'";
    $obj_select=$this->connection->prepare($sql_query);
    $obj_select->execute();
    $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
}