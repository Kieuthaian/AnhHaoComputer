<?php
class News extends Model{
    public $name;
    public $avatar;
    public $content;
    public $status;
    public $category_id;
    public $summary;
    public $hotnews;
    public $created_at;
    public $updated_at;
// lấy ra danh sách danh mục
    public function getAll(){
        $sql_select="select news.*,categories.name as category_name from news inner join categories 
                      on news.category_id=categories.id order by news.created_at desc";
        $obj_select_all=$this->connection->prepare($sql_select);
        $obj_select_all->execute();
        $categories=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    public function getCategoryNews(){
        $sql_select="select * from categories where category_status=0";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
// lấy ra tên danh mục
    public function getNews($name){
        $sql_select='select name from news where `name`=:name';
        $obj_select_one=$this->connection->prepare($sql_select);
        $obj_select=[ ':name' => $name ];
        $obj_select_one->execute($obj_select);
        $news_name=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $news_name;
    }
// thêm danh mục sản phẩm
    public function insert(){
        $sql_insert="Insert into news(`name`,`avatar`,`content`,`status`,`category_id`,`summary`,`hotnews`)
        VALUES (:name,:avatar,:content,:status,:category_id,:summary,:hotnews)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=[
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':content' => $this->content,
            ':status' => $this->status,
            ':category_id' => $this->category_id,
            ':summary' => $this->summary,
            ':hotnews' => $this->hotnews,
        ];
        return $obj_insert->execute($arr_insert);
    }
//    chi tiết của danh mục
    public function getNewsById($id){
        $select_one="select news.*,categories.name as category_name from news inner join categories on news.category_id=categories.id where news.id=$id";
        $obj_select=$this->connection->prepare($select_one);
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
//    lấy ra ảnh sản phẩm
    public function images($id)
    {
        $obj_delete_img=$this->connection->prepare("select avatar from news where id=$id");
        $obj_delete_img->execute();
        $result=$obj_delete_img->fetch(PDO::FETCH_ASSOC);
        if($result["avatar"] != "" && file_exists("assets/uploads/news/".$result["avatar"]))
        {
            unlink("assets/uploads/news/".$result["avatar"]);
        }
    }
//    chỉnh sửa danh mục
    public function update($id){
        $sql_update="Update news set `name`=:name,`status`=:status,`category_id`=:category_id,`avatar`=:avatar,`summary`=:summary,`content`=:content,
                      `hotnews`=:hotnews,`updated_at`=:updated_at where id=$id";
        $obj_update=$this->connection->prepare($sql_update);
        $arr_update=[
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':content' => $this->content,
            ':status' => $this->status,
            ':category_id' => $this->category_id,
            ':summary' => $this->summary,
            ':hotnews' => $this->hotnews,
            ":updated_at" => $this->updated_at,
        ];
        return $obj_update->execute($arr_update);

    }
    public function delete($id)
    {
        $obj_delete = $this->connection->prepare("DELETE FROM news WHERE id = $id");
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }
}