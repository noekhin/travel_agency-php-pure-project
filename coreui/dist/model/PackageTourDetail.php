<?php

include_once './includes/travel_db.php';
class PackageTourDetail
{
  private $conn;

  public function __construct()
  {
    $this->conn = Database::connect();
  }
  public function getAllPackageTourDetail()
  {
    $sql = "SELECT pd.* , a.name AS accommodation_name,pt.name AS package_tour_name
            FROM package_details pd
            LEFT JOIN accommodation a ON pd.accommodation_id = a.id
            LEFT JOIN package_tour pt ON pd.package_tour_id = pt.id

    ";
    $stmt = $this->conn->query($sql);

    if ($stmt === false) {
      error_log('Error executing SQL query: ');
      return [];
    }

    $packages = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $packages[] = $row;
    }
    return $packages;
  }

  public function getPackageTour($id)
  {
    $sql = "SELECT pd.*, a.name AS accommodation_name, pt.name AS package_tour_name
                FROM package_details pd
                LEFT JOIN accommodation a ON pd.accommodation_id = a.id
                LEFT JOIN package_tour pt ON pd.package_tour_id = pt.id
                WHERE pd.id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: false;
  }

  public function updatePackageTour($id, $data)
  {
    if (!empty($_FILES['photo']['name'])) {
      $uploadDir = './upload_image/';
      $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

      if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        $this->updatePackagePhoto($id, $uploadFile);
      } else {
        error_log("Failed to move uploaded file for package with ID: $id");
      }
    }

    $sql = "UPDATE package_details SET package_tour_id=:package_tour_id, content=:content, activities=:activities, meals=:meals, title=:title, accommodation_id=:accommodation_id WHERE id=:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':package_tour_id', $data['package_tour_id']);
    $stmt->bindParam(':content', $data['content']);
    $stmt->bindParam(':activities', $data['activities']);
    $stmt->bindParam(':meals', $data['meals']);
    $stmt->bindParam(':title', $data['title']);
    $stmt->bindParam(':accommodation_id', $data['accommodation_id']);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function updatePackagePhoto($id, $photoPath)
  {
    try {
      $sql = "UPDATE package_details SET photo = :photo WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':photo', $photoPath, PDO::PARAM_STR);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);

      $result = $stmt->execute();

      if ($result) {
        return true;
      } else {
        error_log("Failed to update photo for package with ID: $id");
        return false;
      }
    } catch (PDOException $e) {
      error_log("PDOException in updatePackagePhoto(): " . $e->getMessage());
      return false;
    }
  }

  public function deletePackageTour($id)
  {
    $sql = "DELETE FROM package_details WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function addPackageTourDetail($data)
  {
    $sql = "INSERT INTO package_details (package_tour_id, photo, content, activities, meals, title, accommodation_id)
            VALUES (:package_tour_id, :photo, :content, :activities, :meals, :title, :accommodation_id)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':package_tour_id', $data['package_tour_id']);
    $stmt->bindParam(':photo', $data['photo']);
    $stmt->bindParam(':content', $data['content']);
    $stmt->bindParam(':activities', $data['activities']);
    $stmt->bindParam(':meals', $data['meals']);
    $stmt->bindParam(':title', $data['title']);
    $stmt->bindParam(':accommodation_id', $data['accommodation_id']);
    $stmt->execute();
  }

  public function getAllAccommodations()
  {
    $sql = "SELECT * FROM accommodation";
    $stmt = $this->conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAllPackageTourDetails()
  {
    $sql = "SELECT id, name FROM package_tour";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function filter($ptname)
  {
    $sql = "SELECT pd.* , a.name AS accommodation_name,pt.name AS package_tour_name
            FROM package_details pd
            LEFT JOIN accommodation a ON pd.accommodation_id = a.id
            LEFT JOIN package_tour pt ON pd.package_tour_id = pt.id
            WHERE pt.name = :ptname

    ";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':ptname', $ptname);
    if ($stmt->execute()) {
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return [];
  }
}
