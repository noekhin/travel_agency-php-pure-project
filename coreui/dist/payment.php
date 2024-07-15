<?php
include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './controller/BookingController.php';
include_once './controller/paymentController.php';
include_once './model/Booking.php';



$bookingId = '';
$customerName = '';
$tourName = '';
$tourStatus = '';
$bookingStatus = '';
$cost = '';
$paymentAmountReadOnly = '';
$paymentStatus = '';

if (isset($_GET['bookingId'])) {
  $bookingId = $_GET['bookingId'];
}
if (isset($_GET['customerName'])) {
  $customerName = $_GET['customerName'];
}
if (isset($_GET['tourName'])) {
  $tourName = $_GET['tourName'];
}
if (isset($_GET['tourStatus'])) {
  $tourStatus = $_GET['tourStatus'];
}
if (isset($_GET['bookingStatus'])) {
  $bookingStatus = $_GET['bookingStatus'];
}
if (isset($_GET['paymentStatus'])) {
  $paymentStatus = $_GET['paymentStatus'];
}
if (isset($_GET['cost']) && !empty($_GET['cost'])) {
  $cost = $_GET['cost'];
  $paymentAmountReadOnly = 'readonly';
}

if (empty($tourName)) {
  $tourName = "This is a customized Tour";
}

?>
<?php
include_once 'layout/nagivation.php';
?>


<div class="container">
  <div class="card col-lg-12">
    <div class="card-header bg-dark text-white">
      <h3>Payment Form</h3>
    </div>
    <div class="card-body">
      <form method="post" action="payment.php">
        <div class="form-group mb-3">
          <strong>Booking ID:</strong>
          <input type="text" class="form-control" id="bookingId" name="bookingId" value="<?php echo htmlspecialchars($bookingId); ?>" readonly>
        </div>
        <div class="form-group mb-3">
          <strong>Customer Name:</strong>
          <input type="text" class="form-control" id="customerName" name="customerName" value="<?php echo htmlspecialchars($customerName); ?>" readonly>
        </div>
        <div class="form-group mb-3">
          <strong>Tour Name:</strong>
          <input type="text" class="form-control" id="tourName" name="tourName" value="<?php echo htmlspecialchars($tourName); ?>" readonly>
        </div>
        <div class="form-group mb-3">
          <strong>Tour Status:</strong>
          <input type="text" class="form-control" id="tourStatus" name="tourStatus" value="<?php echo htmlspecialchars($tourStatus); ?>" readonly>
        </div>
        <div class="form-group mb-3">
          <strong>Booking Status:</strong>
          <input type="text" class="form-control" id="bookingStatus" name="bookingStatus" value="<?php echo htmlspecialchars($bookingStatus); ?>" readonly>
        </div>
        <div class="form-group mb-3">
          <!-- <strong>Payment Status:</strong> <?php echo htmlspecialchars($paymentStatus); ?> -->
          <input type="hidden" class="form-control" id="paymentStatus" name="paymentStatus" value="<?php echo htmlspecialchars($paymentStatus); ?>">
        </div>
        <div class="form-group mb-3">
          <strong><label for="paymentAmount">Payment Amount :</label></strong>
          <input type="number" class="form-control" id="paymentAmount" name="paymentAmount" value="<?php echo htmlspecialchars($cost); ?>" placeholder="Enter payment amount" <?php echo $paymentAmountReadOnly; ?> required>
        </div>
        <input type="hidden" class="form-control" id="paymentStatus" name="paymentStatus" value="<?php echo htmlspecialchars($cost); ?>" placeholder="Enter payment amount" <?php echo $paymentAmountReadOnly; ?> required>
        <div class="form-group mt-3 float-end">
          <button type="submit" class="btn btn-success ">Payment Confirm</button>
          <a onclick="history.back()" class="btn btn-secondary ">Back</a>
        </div>
      </form>
    </div>
  </div>
</div>


<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $bookingId = $_POST['bookingId'];
  $customerName = $_POST['customerName'];
  $tourName = $_POST['tourName'];
  $tourStatus = $_POST['tourStatus'];
  $bookingStatus = $_POST['bookingStatus'];
  $paymentAmount = $_POST['paymentAmount'];
  $paymentStatus = $_POST['paymentStatus'];


  include_once './includes/travel_db.php';
  include_once './controller/BookingController.php';
  include_once './model/Booking.php';

  $controller = new BookingController();

  $inserted = $controller->insertPayment($bookingId, $customerName, $tourName, $tourStatus, $paymentAmount);



  if ($inserted) {
    echo '<script>alert("Failed to insert payment data.");</script>';
  } else {
    echo
    '<script>
            alert("Payment data inserted and booking data updated.");
            window.location.href = "booking.php";
          </script>';
  }
}


include_once 'layout/footer.php';

?>