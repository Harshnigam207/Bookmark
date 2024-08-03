<?php
class connection{
    public $conn;
    public function __construct(){
        $this->conn=new mysqli("localhost","root","","bookmark");
        if($this->conn->connect_error){
            die("connection error->".$this->conn->connect_error);
        }
    }
}

?>