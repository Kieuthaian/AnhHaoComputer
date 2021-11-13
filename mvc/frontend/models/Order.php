<?php
class Order extends Model
{
    public $fullname;
    public $address;
    public $phone;
    public $email;
    public $note;
    public $user_id;
    public $status;
    public $price_total;
    public $payment_status;

    public function insert()
    {
        $sql_insert= " Insert into orders(`user_id`,`fullname`,`address`,`phone`,`email`,`note`,`price_total`,`payment_status`,`status`)  
                          values (:user_id,:fullname,:address,:phone,:email,:note,:price_total,:payment_status,:status)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=[
            ":user_id" => $this->user_id,
            ":fullname" => $this->fullname,
            ":address" => $this->address,
            ":phone" => $this->phone,
            ":email" => $this->email,
            ":note" =>$this->note,
            ":price_total" => $this->price_total,
            ":payment_status" => $this->payment_status,
            ":status" => $this->status,
        ];
        $obj_insert->execute($arr_insert);
        $order_id=$this->connection->lastInsertId();
        return $order_id;
    }
    public function listOrder($id){
        $obj_select=$this->connection->prepare("select * from orders where user_id=$id
                    order by orders.created_at desc ");
        $obj_select->execute();
        $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }
    public function delete_Oder($id){

        $update_order = "update orders set status= 3,updated_at=:updated_at where id=$id";
        $obj_update=$this->connection->prepare($update_order);
        $arr_update=[  ':updated_at' => $this->updated_at];
        return $obj_update->execute($arr_update);
    }

}
