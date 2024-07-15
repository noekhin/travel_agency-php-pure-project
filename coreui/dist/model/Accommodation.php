<?php

include_once './includes/travel_db.php';


class Accommodation
{
  private $conn;

  public function __construct()
  {
    $this->conn = Database::connect();
  }

  public function addAccommodation($data)
  {
    $sql = "INSERT INTO accommodation (name, type, address, email, phone, rating) VALUES (:name, :type, :address, :email, :phone, :rating)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':name', $data['name']);
    $stmt->bindParam(':type', $data['type']);
    $stmt->bindParam(':address', $data['address']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':phone', $data['phone']);
    $stmt->bindParam(':rating', $data['rating']);
    return $stmt->execute();
  }

  public function updateAccommodation($id, $data)
  {
    $sql = "UPDATE accommodation SET name = :name,type=:type,address=:address,email=:email,phone=:phone,rating=:rating WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':name', $data['name']);
    $stmt->bindParam(':type', $data['type']);
    $stmt->bindParam(':address', $data['address']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':phone', $data['phone']);
    $stmt->bindParam(':rating', $data['rating']);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }

  public function deleteAccommodation($id)
  {
    $sql = "DELETE FROM accommodation WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }

  public function getAllAccommodation()
  {
    $sql = "SELECT * FROM accommodation";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAccommodationById($id)
  {
    $sql = "SELECT a.* FROM accommodation a WHERE a.id= :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
