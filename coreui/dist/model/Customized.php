<?php

include_once './includes/travel_db.php';


class Customize
{
  private $conn;
  public function __construct()
  {
    $this->conn = Database::connect();
  }
  public function getAllCustomized()
  {
    $sql = "
    SELECT
        customized.*,
        c_departure.name AS departure_name,
        c_destination.name AS destination_name,
        customer.name AS customer_name
    FROM
        customized_tour customized
    LEFT JOIN
        city c_departure ON customized.departure = c_departure.id
    LEFT JOIN
        city c_destination ON customized.destination = c_destination.id
    LEFT JOIN
        customer ON customer.id = customized.customer_id
";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCustomized($id)
  {
    $sql = "
    SELECT
        customized.*,
        c_departure.name AS departure_name,
        c_destination.name AS destination_name,
        customer.name AS customer_name
    FROM
        customized_tour customized
    LEFT JOIN
        city c_departure ON customized.departure = c_departure.id
    LEFT JOIN
        city c_destination ON customized.destination = c_destination.id
    LEFT JOIN
        customer ON customer.id = customized.customer_id
    WHERE customized.id = :id
";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function deleteCustomized($id)
  {
    $sql = "DELETE FROM customized_tour WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
  public function getAllCustomize()
  {
    $sql = "SELECT * FROM customized_tour";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
