<?php
class product_images extends Model
{
    public $product_id;
    public $avatar;
    public function insert()
    {
        $sql_insert="insert into product_images(`product_id`,`avatar`) values (:product_id,:avatar)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=
            [
                ":product_id" => $this->product_id,
                ":avatar" => $this->avatar
            ];
        return $obj_insert->execute($arr_insert);
    }
    public function get_images($id)
    {
        $sql_select="select * from product_images where product_id=$id ";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $product_images=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $product_images;
    }
//lấy ra ảnh của sản phẩm
    public function detail_images($id)
    {
        $obj_delete_img=$this->connection->prepare("select * from product_images where product_id=$id");
        $obj_delete_img->execute();
        $result=$obj_delete_img->fetchAll(PDO::FETCH_ASSOC);
        for($i=0;$i<count($result);$i++) {
            if ($result[$i]["avatar"] != "" && file_exists("assets/uploads/product_images/" . $result[$i]["avatar"])) {
                unlink("assets/uploads/product_images/" . $result[$i]["avatar"]);
            }
        }
        $sql_delete="delete from product_images where product_id=$id";
        $obj_delete=$this->connection->prepare($sql_delete);
        $is_delete=$obj_delete->execute();
    }
    public function update($id)
    {
        $sql_update="UPDATE products SET avatar=:avatar where product_id=$$id";
        $obj_update=$this->connection->prepare($sql_update);
        $arr_update=
            [
                ":avatar" => $this->avatar
            ];
        return $obj_update->execute($arr_update);
    }
}