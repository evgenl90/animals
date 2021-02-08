<?php 

class Database {

    private $db_name = "animals.s3db";
    public $conn;

    public function getConnection(){

        $this->conn = null;

        if(file_exists(DB)){
            $this->conn = new SQLite3(DB);
        }else{
            echo "Нет подключения к базе данных!";
        exit();
        }

        return $this->conn;
    }
}