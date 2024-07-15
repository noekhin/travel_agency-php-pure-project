<?php

include_once './includes/travel_db.php';

class City
{
  private $conn;

  public function __construct()
  {
    $this->conn = Database::connect();
  }

  public function addCity($data)
  {
    $sql = "INSERT INTO city (name) VALUES (:name)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':name', $data['name']);
    return $stmt->execute();
  }

  public function updateCity($id, $data)
  {
    $sql = "UPDATE city SET name = :name WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':name', $data['name']);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }

  public function deleteCity($id)
  {
    $sql = "DELETE FROM city WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }

  public function getAllCities()
  {
    $sql = "SELECT * FROM city";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCityById($id)
  {
    $sql = "SELECT c.* FROM city c WHERE c.id= :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function getCustomerCountByCity()
  {
    $query = "SELECT c.name AS city_name, COUNT(ct.customer_id) AS customer_count
              FROM city c
              LEFT JOIN customized_tour ct ON c.name = ct.departure
              GROUP BY c.id,c.name";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
