<?php
class Product extends Model
{
    public $id;
    public $category_id;
    public $title;
    public $avatar;
    public $product_year;
    public $hard_drive;
    public $ram;
    public $price;
    public $quality;
    public $discount;
    public $producer_id;
    public $summary;
    public $content;
    public $present;
    public $status;
    public $hotproduct;
    public $created_at;
    public $updated_at;
//validdate dữ liệu
    public function getProduct($title)
    {
        $sql_select_one = "SELECT * FROM products WHERE `title` = :title";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $arr_select = [
            ':title' => $title,
        ];
        $obj_select_one->execute($arr_select);
        return $obj_select_one->fetch(PDO::FETCH_ASSOC);
    }
//     lấy all bản ghi
    public function getAll($pageSize,$page)
    {
        $from=($page-1) * $pageSize;
        $sql_select="select products.*,categories.name as category_name,producers.name as producer_name from products 
                      inner join categories inner join producers
                    on products.category_id=categories.id and producers.id=products.producer_id
                    where TRUE order by products.created_at desc limit $from,$pageSize";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
//    search
    public function search($search,$pageSize,$page)
    {
        $from=($page-1) * $pageSize;
        $sql_query ="select products.*,categories.name as category_name,producers.name as producer_name from products 
                      inner join categories inner join producers
                    on products.category_id=categories.id and producers.id=products.producer_id
                    where title like '%$search%' order by products.created_at desc limit $from,$pageSize";
        $obj_select=$this->connection->prepare($sql_query);
        $obj_select->execute();
        $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    /* Tính tổng số bản ghi đang có trong bảng products*/
    public function countTotal()
    {
        $sql_count="select count(products.id) from products";
        $obj_select = $this->connection->prepare($sql_count);
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
    public function countTotalSearch($search)
    {
        $sql_count="select count(products.id) from products  where  title like '%$search%'";
        $obj_select = $this->connection->prepare($sql_count);
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
//    lấy chi tiết của sản phẩm
    public function getById($id)
    {
        $sql_select="select products.*,categories.name as category_name,producers.name as producer_name,producers.address as producer_address from products 
                      inner join categories inner join producers
                    on products.category_id=categories.id and producers.id=products.producer_id where products.id=$id";
        $obj_select_one=$this->connection->prepare($sql_select);
        $obj_select_one->execute();
        $product=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
//    thêm mới sản phẩm
    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO products(category_id,producer_id ,title,hard_drive,ram,present,
                                avatar,product_year, price , quality , discount ,summary, content, status , hotproduct) 
                                VALUES (:category_id,:producer_id ,:title,:hard_drive,:ram,:present, :avatar, :product_year,:price, :quality ,
                                 :discount , :summary, :content, :status , :hotproduct)");

        $arr_insert = [
            ':category_id' => $this->category_id,
            ':producer_id' => $this->producer_id,
            ':title' => $this->title,
            ':present' => $this->present,
            ':avatar' => $this->avatar,
             ':product_year' => $this->product_year,
            ':hard_drive' => $this->hard_drive,
            ':ram'=> $this->ram,
            ':price' => $this->price,
            ':quality' => $this->quality,
            ':discount' => $this->discount,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':status' => $this->status,
            ':hotproduct' => $this->hotproduct
        ];
        $obj_insert->execute($arr_insert);
        $product_id = $this->connection->lastInsertId();
        return $product_id;
    }
//    update sản phẩm
    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE products SET category_id=:category_id,producer_id=:producer_id ,title=:title, 
                                quality=:quality , present=:present, discount=:discount,product_year=:product_year,
                                hard_drive=:hard_drive,ram=:ram,avatar=:avatar, price=:price,summary=:summary, 
                                content=:content, status=:status, hotproduct=:hotproduct ,
                                 updated_at=:updated_at WHERE id = $id");
        $arr_update = [
            ':category_id' => $this->category_id,
            ':producer_id' => $this->producer_id,
            ':title' => $this->title,
            ':hard_drive' => $this->hard_drive,
            ':ram'=> $this->ram,
            ':present' => $this->present,
            ':avatar' => $this->avatar,
            ":product_year"=>$this->product_year,
            ':price' => $this->price,
            ':quality' => $this->quality,
            ':discount' => $this->discount,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
            ':hotproduct' => $this->hotproduct
        ];
        return $obj_update->execute($arr_update);
    }
////lấy ra ảnh của sản phẩm
    public function images($id)
    {
        $obj_delete_img=$this->connection->prepare("select avatar from products where id=$id");
        $obj_delete_img->execute();
        $result=$obj_delete_img->fetch(PDO::FETCH_ASSOC);

        if($result["avatar"] != "" && file_exists("assets/uploads/products/".$result["avatar"]))
        {
            unlink("assets/uploads/products/".$result["avatar"]);
        }
    }
////xóa sản phẩm
    public function delete($id)
    {
        $obj_delete = $this->connection->prepare("DELETE FROM products WHERE id = $id");
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }
    public function countProductOut(){
      $sql_select="SELECT count(id) from products WHERE STATUS=1 and quality<=0";
      $obj_select=$this->connection->prepare($sql_select);
      $obj_select->execute();
      $users=$obj_select->fetchColumn();
      return $users;
    }
  public function ProductOut(){
    $sql_select= "select products.*,categories.name as category_name,producers.name as producer_name,producers.address as producer_address from products 
                      inner join categories inner join producers
                    on products.category_id=categories.id and producers.id=products.producer_id WHERE products.STATUS=1 and products.quality<=0";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $users=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $users;
  }
}

