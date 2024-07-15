<?php

include_once './model/Booking.php';

class BookingController
{
  private $bookingModel;

  public function __construct()
  {
    $this->bookingModel = new Booking();
  }

  public function getAllBooking()
  {
    return $this->bookingModel->getAllBooking();
  }

  public function updateBookingStatus($id, $status)
  {
    return $this->bookingModel->updateBookingStatus($id, $status);
  }

  public function deleteBooking($id)
  {
    $this->bookingModel->deleteBooking($id);
  }
  public function updateBooking($id)
  {
    $this->bookingModel->updateBooking($id);
  }

  public function insertPayment($bookingId, $customerName, $tourName, $tourStatus, $paymentAmount)
  {
    $this->bookingModel->insertPayment($bookingId, $customerName, $tourName, $tourStatus, $paymentAmount);
  }
  function countBooking()
  {
    return sizeof($this->bookingModel->getAllBookings());
  }
  public function maxBookedTour()
  {
    return $this->bookingModel->getMaxBookedTour();
  }

  public function showLastChangedBookings()
  {
    $lastChangedBookings = $this->bookingModel->getLastChangedBookings();
    $bookingStatusCounts = $this->bookingModel->getBookingStatusCounts();
    return compact('lastChangedBookings', 'bookingStatusCounts');
  }

  public function updateBookingStatus1()
  {
    if (isset($_POST['bookingId']) && isset($_POST['status'])) {
      $bookingId = $_POST['bookingId'];
      $status = $_POST['status'];
      return $this->bookingModel->updateBookingStatus($bookingId, $status);
    }
    header('Location: index.php');
  }
}
