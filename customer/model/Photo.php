<?php
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

    public function addBooking($name, $phone, $email, $address, $seats, $tour_id, $tour_status, $booking_status, $payment_status)
    {
        try {
            $sql = "INSERT INTO customer (name, phone, email, address, seats) VALUES (:cus_name, :phone, :email, :cus_address, :seats)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':cus_name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cus_address', $address);
            $stmt->bindParam(':seats', $seats);

            if ($stmt->execute()) {
                $customer_id = $this->conn->lastInsertId();

                $sql = "INSERT INTO booking (customer_id, tour_id, tour_status, booking_status, payment_status) VALUES (:customer_id, :tour_id, :tour_status, :booking_status, :payment_status)";
                $stmt = $this->conn->prepare($sql);

                $stmt->bindParam(':customer_id', $customer_id);
                $stmt->bindParam(':tour_id', $tour_id);
                $stmt->bindParam(':tour_status', $tour_status);
                $stmt->bindParam(':booking_status', $booking_status);
                $stmt->bindParam(':payment_status', $payment_status);

                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
