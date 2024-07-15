<?php
include_once './includes/travel_db.php';

class Customer
{
  private $conn;

  public function __construct()
  {
    $this->conn = Database::connect();
  }

  public function getAllCustomer()
  {
    $sql = "SELECT * FROM customer";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public function getCustomer($id){
    $sql = "SELECT c.*
            FROM customer c
            WHERE c.id = :id";
             $stmt = $this->conn->prepare($sql);
             $stmt->bindParam(':id', $id, PDO::PARAM_INT);
             $stmt->execute();
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
             return $result ?: false;
  }


  public function deleteCustomer($id)
  {
    $sql = "DELETE FROM customer WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
}
