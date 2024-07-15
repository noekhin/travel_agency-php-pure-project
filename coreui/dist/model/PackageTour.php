<?php

include_once './includes/travel_db.php';
class Photo
{
  private $conn;

  public function __construct()
  {
    $this->conn = Database::connect();
  }

  public function getPhoto($package_id)
  {
    $sql = "SELECT * FROM package_tour WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $package_id, PDO::PARAM_INT);
    $stmt->execute();
    $package = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($package) {
      $sql_photos = "
          SELECT pd.*, a.name AS accommodation_name
          FROM package_details pd
          LEFT JOIN accommodation a ON pd.accommodation_id = a.id
          WHERE pd.package_tour_id = :package_tour_id
          ";
      $stmt_photos = $this->conn->prepare($sql_photos);
      $stmt_photos->bindParam(':package_tour_id', $package_id, PDO::PARAM_INT);
      $stmt_photos->execute();
      $photos = $stmt_photos->fetchAll(PDO::FETCH_ASSOC);

      return [
        'package' => $package,
        'photos' => $photos
      ];
    } else {
      return null;
    }
  }

  public function getAllPackages()
  {
    $sql = "
    SELECT
        pt.*,
        c_departure.name AS departure_name,
        c_destination.name AS destination_name
    FROM
        package_tour pt
    LEFT JOIN
        city c_departure ON pt.departure = c_departure.id
    LEFT JOIN
        city c_destination ON pt.destination = c_destination.id
";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public function getPackage($id)
  {
    $sql = "
    SELECT
        pt.*,
        c_departure.name AS departure_name,
        c_destination.name AS destination_name
    FROM
        package_tour pt
    LEFT JOIN
        city c_departure ON pt.departure = c_departure.id
    LEFT JOIN
        city c_destination ON pt.destination = c_destination.id
    WHERE pt.id = :id
";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  public function addPackage($data)
  {
    $sql = "INSERT INTO package_tour (name, departure, destination, services, start_date, end_date, duration, cost, photo) VALUES (:name, :departure, :destination, :services, :start_date, :end_date, :duration, :cost, :photo)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':name', $data['name']);
    $stmt->bindParam(':departure', $data['departure']);
    $stmt->bindParam(':destination', $data['destination']);
    $stmt->bindParam(':services', $data['services']);
    $stmt->bindParam(':start_date', $data['start_date']);
    $stmt->bindParam(':end_date', $data['end_date']);
    $stmt->bindParam(':duration', $data['duration']);
    $stmt->bindParam(':cost', $data['cost']);
    $stmt->bindParam(':photo', $data['photo']);
    $stmt->execute();
  }


  public function updatePackage($id, $data)
  {
    $sql = "UPDATE package_tour SET
            name = :name,
            departure = :departure,
            destination = :destination,
            services = :services,
            start_date = :start_date,
            end_date = :end_date,
            duration = :duration,
            cost = :cost,
            photo = :photo
            WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
      ':name' => $data['name'],
      ':departure' => $data['departure'],
      ':destination' => $data['destination'],
      ':services' => $data['services'],
      ':start_date' => $data['start_date'],
      ':end_date' => $data['end_date'],
      ':duration' => $data['duration'],
      ':cost' => $data['cost'],
      ':photo' => $data['photo'],
      ':id' => $id
    ]);
  }

  public function deletePackage($id)
  {
    $sql = "DELETE FROM package_tour WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function getAllCities()
  {
    $sql = "SELECT id, name FROM city";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function filter($min, $max)
  {
    $sql = "
    SELECT pt.*, c_departure.name AS departure_name , c_destination.name AS destination_name
    FROM package_tour pt
    LEFT JOIN city c_departure ON pt.departure = c_departure.id
    LEFT JOIN city c_destination ON pt.destination = c_destination.id
    WHERE cost >= :min AND cost <= :max";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':min', $min);
    $stmt->bindParam(':max', $max);
    if ($stmt->execute()) {
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return [];
  }
}
