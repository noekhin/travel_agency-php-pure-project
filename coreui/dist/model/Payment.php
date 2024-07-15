<?php
include_once './includes/travel_db.php';

class Payment
{
  private $conn;

  public function __construct()
  {
    $this->conn = Database::connect();
  }

  public function getPayment()
  {
    $sql = "SELECT p.*
            FROM payment p
            JOIN booking b ON p.booking_id = b.id
            WHERE b.payment_status = 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getPaymentByID($id)
  {
    $sql = "SELECT p.*
            FROM payment p
            JOIN booking b ON p.booking_id = b.id
            WHERE b.payment_status = 1
            AND p.id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: false;
  }
  public function deletePayment($id)
  {
    $sql = "DELETE FROM payment WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
}
