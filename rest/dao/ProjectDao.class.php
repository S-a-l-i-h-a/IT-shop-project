<?php

class ProjectDao{

  private $conn;

  /**
  * constructor of dao class
  */
  public function __construct(){
    $servername = "sql11.freemysqlhosting.net";
    $username = "sql11480890";
    $password = "MH8WN3j8qs";
    $schema = "sql11480890";
    $this->conn = new PDO("mysql:host=sql11.freemysqlhosting.net;dbname= sql11480890", "sql11480890", "MH8WN3j8qs");
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


      echo 'connected';

    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  /**
  * Method used to read all todo objects from database
  */
  public function get_all(){
    $stmt = $this->conn->prepare("SELECT * FROM sql11480890");
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
    $stmt = $this->conn->prepare("DELETE FROM sql11480890 WHERE id=:id");
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
