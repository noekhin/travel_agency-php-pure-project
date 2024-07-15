<?php

include_once './includes/db.php';

class PackageTour
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function getAllPackageTour()
    {
        $sql = "SELECT pt.*,departure_city.name AS departure_name
    FROM package_tour pt 
      LEFT JOIN city departure_city ON departure_city.id = pt.departure
      
      
      
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

    public function getPhoto($package_id)
    {
        $sql = "SELECT * FROM package_tour WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $package_id, PDO::PARAM_INT);
        $stmt->execute();
        $package = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($package) {
            $sql_photos =  "
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

    public function updatePhoto($packageId, $photoPath)
    {
        $sql = "UPDATE package_tour SET photo = :photo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':photo', $photoPath, PDO::PARAM_STR);
        $stmt->bindParam(':id', $packageId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
