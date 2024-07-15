<?php
include_once './includes/db.php';

class CustomizedTour {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
        if (!$this->conn) {
            die("Database connection failed!");
        }
    }

    public function getAllCustomizedTour() {
        $sql = "
        SELECT ct.*, departure_city.name AS departure_name, destination_city.name AS destination_name
        FROM customized_tour ct
        LEFT JOIN city departure_city ON departure_city.id = ct.departure
        LEFT JOIN city destination_city ON destination_city.id = ct.destination
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllCities() {
        $sql = "SELECT * FROM city";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

   
    public function createBooking($departure, $destination, $duration, $start_date, $name, $phone, $email, $address, $seats, $tour_status, $booking_status) {
        try {
            // Start a transaction
            $this->conn->beginTransaction();
    
            // Insert into customer table
            $sql = "INSERT INTO customer (name, phone, email, address, seats) VALUES (:cus_name, :phone, :email, :cus_address, :seats)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cus_name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cus_address', $address);
            $stmt->bindParam(':seats', $seats);
            
            if ($stmt->execute()) {
                // Retrieve the customer_id
                $customer_id = $this->conn->lastInsertId();
    
                // Insert into customized_tour table
                $sql = "INSERT INTO customized_tour (customer_id, departure, destination, duration, start_date) 
                        VALUES (:customer_id, :departure, :destination, :duration, :start_date)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':customer_id', $customer_id);
                $stmt->bindParam(':departure', $departure);
                $stmt->bindParam(':destination', $destination);
                $stmt->bindParam(':duration', $duration);
                $stmt->bindParam(':start_date', $start_date);
    
                if ($stmt->execute()) {
                    // Insert into booking table
                    $sql = "INSERT INTO booking (customer_id, tour_status, booking_status) 
                            VALUES (:customer_id, :tour_status, :booking_status)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(':customer_id', $customer_id);
                    // $stmt->bindParam(':tour_id', $tour_id);
                    $stmt->bindParam(':tour_status', $tour_status);
                    $stmt->bindParam(':booking_status', $booking_status);
    
                    if ($stmt->execute()) {
                        
                        $this->conn->commit();
                        return true;
                    } else {
                        
                        $this->conn->rollBack();
                        return false;
                    }
                } else {
                    
                    $this->conn->rollBack();
                    return false;
                }
            } else {
                // Rollback if customer insertion fails
                $this->conn->rollBack();
                return false;
            }
        } catch (PDOException $e) {
            // Rollback and return false on any exception
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
        
}

?>
