<?php
class MysqlConnector{
    public $username;
    public $password;
    public $database;
    public $hostname;

    function __construct(){
        $this->username='root';
        $this->password='root';
        $this->database='student';
        $this->hostname='localhost';
        $this->connectDb();
    }

    function connectDb(){
        $this->connection = new mysqli(
            $this->hostname,
            $this->username,
            $this->password,
            $this->database
        );
        if($this->connection->connect_error) {
            die("connection failed:" . $this->connection->connect_error);
        }
    }

    public function select($sql){
        return $this->connection->query($sql);
        }
    public function modify($sql){
         $success = $this->connection->query($sql);
         return $success;
 }
}
