<?php

include_once './includes/travel_db.php';


class Booking
{
  private $conn;

  public function __construct()
  {
    $this->conn = Database::connect();
  }

  public function getAllBooking()
  {
    $sql = "SELECT b.id, b.customer_id, b.tour_id, b.tour_status, b.booking_status,b.payment_status,
                       pt.name AS tour_name,
                       c.name AS customer_name,
                       pt.cost AS cost
                FROM booking b
                LEFT JOIN package_tour pt ON pt.id = b.tour_id
                LEFT JOIN customer c ON c.id = b.customer_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateBookingStatus($id, $status)
  {
    $query = "UPDATE booking SET booking_status = :status WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }
  public function updateBooking($id)
  {
    $query = "UPDATE booking SET payment_status = 1 WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    // $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }

  public function deleteBooking($id)
  {
    $sql = "DELETE FROM booking WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function insertPayment($bookingId, $customerName, $tourName, $tourStatus, $paymentAmount)
  {
    $paymentDate = date('Y-m-d H:i:s');

    $sqlInsert = "INSERT INTO payment (booking_id, customer_name, tour_name, tour_status, amount, payment_date)
                  VALUES (:booking_id, :customer_name, :tour_name, :tour_status, :payment_amount, :payment_date)";
    $stmtInsert = $this->conn->prepare($sqlInsert);
    $stmtInsert->bindParam(':booking_id', $bookingId);
    $stmtInsert->bindParam(':customer_name', $customerName);
    $stmtInsert->bindParam(':tour_name', $tourName);
    $stmtInsert->bindParam(':tour_status', $tourStatus);
    $stmtInsert->bindParam(':payment_amount', $paymentAmount);
    $stmtInsert->bindParam(':payment_date', $paymentDate);

    if ($stmtInsert->execute()) {
      $query = "UPDATE booking SET payment_status = 1 , booking_status = 'Comfirmed' WHERE id = :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $bookingId);

      if ($stmt->execute()) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
  public function getAllBookings()
  {
    $sql = "SELECT * FROM booking";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function getMaxBookedTour()
  {
    $conn = Database::connect();
    $sql = "
            SELECT t.name, COUNT(b.tour_id) AS total_bookings
            FROM booking b
            JOIN package_tour t ON b.tour_id = t.id
            GROUP BY b.tour_id
            ORDER BY total_bookings DESC
            LIMIT 1
        ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public static function getLastChangedBookings()
  {
    $conn = Database::connect();
    $sql = "
          SELECT b.*, t.name AS tour_name
          FROM booking b
          JOIN package_tour t ON b.tour_id = t.id
          WHERE b.booking_status IN ('pending', 'confirm')

          LIMIT 10
      ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function updateBookingStatus1($bookingId, $status)
  {
    $conn = Database::connect();
    $sql = "UPDATE booking SET booking_status = :status, updated_at = NOW() WHERE id = :bookingId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':bookingId', $bookingId);
    return $stmt->execute();
  }

  public static function getBookingStatusCounts()
  {
    $conn = Database::connect();
    $sql = "
          SELECT
              SUM(CASE WHEN booking_status = 'pending' THEN 1 ELSE 0 END) AS pending_count,
              SUM(CASE WHEN booking_status = 'confirm' THEN 1 ELSE 0 END) AS confirm_count
          FROM booking
      ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
