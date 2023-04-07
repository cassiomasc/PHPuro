<?php

namespace src\Models;

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

    
    private function setParams($statement, $parameters = array()) {

      foreach ($parameters as $key => $value) {
          $this->setParam($statement, $key, $value);
      }

    }

    private function setParam($statement, $key, $value){
      $statement->bindParam($key, $value);
    }

    public function runQuery($rawQuery, $params = array()) {

      $stmt = $this->conn->prepare($rawQuery);

      $this->setParams($stmt, $params);

      $stmt->execute();

      return $stmt;

    }

    public function select($rawQuery, $params = array()){

        $stmt = $this->runQuery($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }    
}