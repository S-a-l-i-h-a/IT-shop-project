<?php

class ProjectDao{

  private $conn;

  /**
  * constructor of dao class
  */
  public function __construct(){
    $servername = "sql.freedb.tech";
    $username = "freedb_IT-shop";
    $password = "*fU%3EmTt!qz@4r";
    $schema = "freedb_freedb_root123";
    $this->conn = new PDO("mysql:host=sql.freedb.tech;dbname=freedb_freedb_root123", "freedb_IT-shop", "*fU%3EmTt!qz@4r");
    // set the PDO error mode to exception


      echo 'connected';

    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  /**
  * Method used to read all todo objects from database
  */
  public function get_all(){
    $stmt = $this->conn->prepare("SELECT * FROM todos");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Method used to add todo to the database
  */
  public function add($description, $created){
    $stmt = $this->conn->prepare("INSERT INTO todos (description, created) VALUES (:description, :created)");
    $stmt->execute(['description' => $description, 'created' => $created]);
  }

  /**
  * Delete todo record from the database
  */
  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM todos WHERE id=:id");
    $stmt->bindParam(':id', $id); // SQL injection prevention
    $stmt->execute();
  }

  /**
  * Update todo record
  */
  public function update($id, $description, $created){
    $stmt = $this->conn->prepare("UPDATE todos SET description=:description, created=:created WHERE id=:id");
    $stmt->execute(['id' => $id, 'description' => $description, 'created' => $created]);
  }

}

?>