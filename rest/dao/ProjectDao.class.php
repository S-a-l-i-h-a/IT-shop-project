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
    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
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

  public function get_by_id($id){
    $stmt = $this->conn->prepare("SELECT * FROM sql11480890 WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return reset($result);
  }

  /**
  * Method used to add todo to the database
  */
  public function add($sql11480890){
    $stmt = $this->conn->prepare("INSERT INTO sql11480890 (description, created) VALUES (:description, :created)");
    $stmt->execute($sql11480890);
    $sql11480890['id'] = $this->conn->lastInsertId();
    return $sql11480890;
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
  public function update($sql11480890){
    $stmt = $this->conn->prepare("UPDATE sql11480890 SET description=:description, created=:created WHERE id=:id");
    $stmt->execute($sql11480890);
    return $sql11480890;
  }

}

?>
