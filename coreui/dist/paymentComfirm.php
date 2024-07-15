<?php

include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './controller/paymentController.php';
include_once './model/Payment.php';

$controller = new paymentController();
$pays = $controller->getPayment();



include_once 'layout/nagivation.php';

?>

<div class="container">
  <h2 class="my-4">Payments and Bookings</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Payment ID</th>
        <th>Booking ID</th>
        <th>Customer Name</th>
        <th>Tour Name</th>
        <th>Tour Status</th>
        <th>Amount</th>
        <th>Payment Date</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
      <?php if (!empty($pays)) : ?>
        <?php foreach ($pays as $pay) : ?>
          <tr>
            <td><?php echo htmlspecialchars($pay['id']); ?></td>
            <td><?php echo htmlspecialchars($pay['booking_id']); ?></td>
            <td><?php echo htmlspecialchars($pay['customer_name']); ?></td>
            <td><?php echo htmlspecialchars($pay['tour_name']); ?></td>
            <td><?php echo htmlspecialchars($pay['tour_status']); ?></td>
            <td><?php echo htmlspecialchars($pay['amount']); ?></td>
            <td><?php echo htmlspecialchars($pay['payment_date']); ?></td>
            <td>

              <a href="slip_payment.php?id=<?php echo $pay['id']; ?>" class="btn btn-primary btn-sm mt-2" style="width: 100px;">Print Invoice</a>
              <a href="deletePayment.php?id=<?php echo $pay['id']; ?>" class="btn btn-danger btn-sm mt-2" style="width: 100px;" onclick="return confirm('Are you sure you want to delete this package?')">Delete</a>

            </td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td colspan="6" class="text-center">No records found</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>