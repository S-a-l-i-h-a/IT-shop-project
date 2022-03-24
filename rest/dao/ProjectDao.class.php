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
    $stmt = $this->conn->prepare("SELECT * FROM Customers");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_by_id($id){
    $stmt = $this->conn->prepare("SELECT * FROM Customers WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return reset($result);
  }

  /**
  * Method used to add todo to the database
  */
  public function add($Customers){
    $stmt = $this->conn->prepare("INSERT INTO Customers (customer_name, customer_surname, customer_phone, customer_email, customer_origin) VALUES (:customer_name, :customer_surname, :customer_phone,:customer_email, :customer_origin)");
    $stmt->execute($Customers);
    $Customers['id'] = $this->conn->lastInsertId();
    return $Customers;
  }

  /**
  * Delete todo record from the database
  */
  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM Customers WHERE id=:id");
    $stmt->bindParam(':id', $id); // SQL injection prevention
    $stmt->execute();
  }

  /**
  * Update todo record
  */
  public function update($Customers){
    $stmt = $this->conn->prepare("UPDATE Customers SET customer_email=:customer_email WHERE id=:id");
    $stmt->execute($Customers);
    return $Customers;
  }

}

?>
