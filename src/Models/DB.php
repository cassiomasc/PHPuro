<?php

namespace src\Model;

use \PDO;

class DB extends PDO{

    public $conn;

    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";

    public function __construct(){
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=Caravela",  
            $this->username,  
            $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    } 

    public function getConn(){
        return $this->conn;
    }
}