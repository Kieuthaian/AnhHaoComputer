<?php
class Category extends Model{
    public function getCategoryProduct(){
        $sql_select="select * from categories where status=1 and category_status=1 order by categories.created_at asc limit 0,10";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function hotCategory(){
        $sql_select="select * from categories where status=1 and hotcategory=1";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCategoryById($id){
            $sql_select_one="select * from categories where id=$id";
            $obj_select=$this->connection->prepare($sql_select_one);
            $obj_select->execute();
            return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
}