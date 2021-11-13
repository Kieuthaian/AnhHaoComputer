<?php
class Producer extends Model{
    public function producerProduct(){

            $sql_select="select * from producers where status=1 order by producers.created_at desc limit 6";
            $obj_select=$this->connection->prepare($sql_select);
            $obj_select->execute();
            return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProducerById($id){
        $sql_select_one="select * from producers where id=$id";
        $obj_select=$this->connection->prepare($sql_select_one);
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
}