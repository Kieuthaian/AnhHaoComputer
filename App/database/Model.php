<?php
    require_once 'App/database/Database.php';
    class Model{
        public $connection;
        public function __construct(){
            $this->connection=$this->getConnection();
        }
        public function getConnection(){
            $connection=new PDO(Database::DB_DSN,
                                Database::DB_USERNAME,
                                Database::DB_PASSWORD);
            return $connection;
        }
}
