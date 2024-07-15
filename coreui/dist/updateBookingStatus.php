<?php
include_once 'controller/BookingController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $bookingId = $_POST['bookingId'];
  $bookingStatus = $_POST['bookingStatus'];

  $controller = new BookingController();
  $result = $controller->updateBookingStatus($bookingId, $bookingStatus);

  if ($result) {
    echo 'Success';
  } else {
    echo 'Error';
  }
}
