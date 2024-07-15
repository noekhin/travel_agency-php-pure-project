<?php

include_once './controller/BookingController.php';

$controller = new BookingController();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
  $controller->deleteBooking($id);
}

?>

<?php
header('Location: booking.php');
?>
