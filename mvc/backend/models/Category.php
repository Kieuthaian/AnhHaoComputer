<?php
class Category extends Model{
    public $name;
    public $avatar;
    public $content;
    public $status;
    public $category_status;
    public $hotcategory;
    public $created_at;
    public $updated_at;
// lấy ra danh sách danh mục
    public function getAll(){
        $sql_select="select * from categories";
        $obj_select_all=$this->connection->prepare($sql_select);
        $obj_select_all->execute();
        $categories=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    public function getCategoryProduct(){
            $sql_select="select * from categories where status=1 and category_status=1";
            $obj_select=$this->connection->prepare($sql_select);
            $obj_select->execute();
            return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
// lấy ra tên danh mục
    public function getCategory($name){
        $sql_select='select name from categories where `name`=:name';
        $obj_select_one=$this->connection->prepare($sql_select);
        $obj_select=[ ':name' => $name ];
        $obj_select_one->execute($obj_select);
        $category_name=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $category_name;
    }
// thêm danh mục sản phẩm
    public function insert(){
        $sql_insert="Insert into categories(`name`,`avatar`,`content`,`status`,`category_status`,`hotcategory`)
        VALUES (:name,:avatar,:content,:status,:category_status,:hotcategory)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=[
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':content' => $this->content,
            ':status' => $this->status,
            ':category_status' => $this->category_status,
            ':hotcategory' => $this->hotcategory,
        ];
        return $obj_insert->execute($arr_insert);
    }
//    chi tiết của danh mục
    public function getCategoryById($id){
        $select_one="select * from categories where id=$id";
        $obj_select=$this->connection->prepare($select_one);
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
//    lấy ra ảnh sản phẩm
    public function images($id)
    {
        $obj_delete_img=$this->connection->prepare("select avatar from categories where id=$id");
        $obj_delete_img->execute();
        $result=$obj_delete_img->fetch(PDO::FETCH_ASSOC);
        if($result["avatar"] != "" && file_exists("assets/uploads/categories/".$result["avatar"]))
        {
            unlink("assets/uploads/categories/".$result["avatar"]);
        }
    }
//    chỉnh sửa danh mục
    public function update($id){
        $sql_update="Update categories set `name`=:name,`status`=:status,`category_status`=:category_status,`avatar`=:avatar,`content`=:content,
                      `hotcategory`=:hotcategory,`updated_at`=:updated_at where id=$id";
        $obj_update=$this->connection->prepare($sql_update);
        $arr_update=[
            ':name'=> $this->name,
            ":status" => $this->status,
            ':category_status' => $this->category_status,
            ":avatar" => $this->avatar,
            ":content" => $this->content,
            ":updated_at" => $this->updated_at,
            ":hotcategory" => $this->hotcategory
        ];
        return $obj_update->execute($arr_update);

    }
    public function delete($id)
    {
        $obj_delete = $this->connection->prepare("DELETE FROM categories WHERE id = $id");
        $is_delete = $obj_delete->execute();
        $obj_delete_product = $this->connection->prepare("DELETE FROM products WHERE category_id = $id");
        $obj_delete_product->execute();
        return $is_delete;
    }
}