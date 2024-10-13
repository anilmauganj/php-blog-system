<?php

class Database {
  
  private $host = 'localhost';
  private $username = "root";
  private $password = "";
  private $db_name =  "blog_db";

  public $conn;


  //Establish Database Connection

  public function connect() {
    $this->conn = null;

    try {
      
       $this->conn = new PDO(
        'mysqli:host='. $this->host . ';dbname='.$this->db_name,
         $username, $password
       );
      //Enable exceptions on errors 
     $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    }catch(PDOException $e) {
      echo "Connection Error: " . $e->getMessage();
    }

    return $this->conn; // Return connection object
  }
  
}