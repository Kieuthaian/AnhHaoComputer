<?php
class News extends Model{
    public function hotNews(){
        $sql_select="select news.*,categories.name as category_name from categories inner join news 
                    on categories.id=news.category_id where news.status=1 and hotnews=1 ORDER BY news.created_at  desc limit 4 ";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function countHotNews(){
      $sql_select="select count(news.id) from  news  where news.status=1 and hotnews=1";
      $obj_select=$this->connection->prepare($sql_select);
      $obj_select->execute();
      $product=$obj_select->fetchColumn();
      return $product;
    }
    public function detailNews($id){
        $sql_select="select news.*,categories.name as category_name 
                  from  news inner  join categories on news.category_id = categories.id 
                  where news.id=$id";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $product=$obj_select->fetch(PDO::FETCH_ASSOC);
        return $product;
}
}