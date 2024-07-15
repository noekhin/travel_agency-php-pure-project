<?php
include_once 'layout/slidebarmenu.php';
include_once 'controller/BookingController.php';

$controller = new BookingController();
$bookings = $controller->getAllBooking();
?>
<?php
include_once 'layout/nagivation.php';
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h3 class="font-weight-bold">Booking Information</h3>
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Customer Name</th>
              <th>Tour Name</th>
              <th>Tour Status</th>
              <th>Cost ($)</th>
              <th>Booking Status</th>
              <th>Payment Action</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($bookings as $booking) : ?>
              <?php if ($booking['payment_status'] == 0) : ?>
                <tr>
                  <td><?php echo htmlspecialchars($booking['id']) ?></td>
                  <td><?php echo htmlspecialchars($booking['customer_name']) ?></td>
                  <td><?php echo htmlspecialchars($booking['tour_name']) ?></td>
                  <td><?php echo htmlspecialchars($booking['tour_status']) ?></td>
                  <td><?php echo htmlspecialchars($booking['cost']) ?></td>
                  <td>
                    <?php
                    $status_button_class = '';
                    switch ($booking['booking_status']) {
                      case 'Pending':
                        $status_button_class = 'btn-warning';
                        break;
                      case 'Confirmed':
                        $status_button_class = 'btn-success';
                        break;
                      default:
                        $status_button_class = 'btn-secondary';
                    }
                    ?>
                    <button type="button" class="btn btn-sm ms-4 <?php echo $status_button_class; ?>" data-toggle="modal" name="bookingStatus" id="status-change" data-target="#exampleModal" data-id="<?php echo $booking['id']; ?>" data-customer-name="<?php echo $booking['customer_name']; ?>" data-tour-status="<?php echo $booking['tour_status']; ?>" data-status-name="<?php echo $booking['booking_status']; ?>">
                      <?php echo htmlspecialchars($booking['booking_status']) ?>
                    </button>
                  </td>
                  <td>
                    <?php if ($booking['booking_status'] == 'Confirmed') : ?>
                      <button type="button" class="btn btn-info btn-sm confirm-action ms-4" data-id="<?php echo $booking['id']; ?>">Payment</button>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="delete_booking.php?id=<?php echo $booking['id']; ?>" class="btn btn-danger btn-sm ms-4 mt-2" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</a>
                  </td>
                  <input type="hidden" name="payment_status" id="payment_status" value="<?php echo htmlspecialchars($booking['payment_status']) ?>">
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Box -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Status Change</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="customer-name">Customer Name</label>
          <input class="form-control" type="text" id="customer-name" disabled>
        </div>
        <div class="form-group">
          <label for="tour-status">Tour Type</label>
          <input class="form-control" type="text" id="tour-status" disabled>
        </div>
        <div class="form-group">
          <label for="bookingStatusId">Booking Status</label>
          <select class="form-select" id="bookingStatusId">
            <option value="">-- Booking Status --</option>
            <option value="Pending">Pending</option>
            <option value="Confirmed">Confirmed</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).on("click", '#status-change', function() {
    const id = $(this).data('id');
    const customerName = $(this).data('customer-name');
    const tourStatus = $(this).data('tour-status');
    const statusName = $(this).data('status-name');

    $('#customer-name').val(customerName);
    $('#tour-status').val(tourStatus);
    $('#bookingStatusId').val(statusName);
    $('#save').data('id', id);
  });

  // Save changes
  $(document).on('click', '#save', function() {
    const bookingId = $(this).data('id');
    const bookingStatus = $('#bookingStatusId').val();

    $.ajax({
      method: 'POST',
      url: "updateBookingStatus.php",
      data: {
        bookingId: bookingId,
        bookingStatus: bookingStatus
      },
      success: function(response) {
        console.log('Response:', response);
        location.reload();
      }
    });
  });

  $(document).on('click', '.confirm-action', function() {
    const bookingId = $(this).data('id');
    const customerName = $(this).closest('tr').find('td:eq(1)').text().trim();
    const tourName = $(this).closest('tr').find('td:eq(2)').text().trim();
    const tourStatus = $(this).closest('tr').find('td:eq(3)').text().trim();
    const cost = $(this).closest('tr').find('td:eq(4)').text().trim();
    const bookingStatus = $(this).closest('tr').find('td:eq(5)').text().trim();
    const paymentStatus = $('#payment_status').val();

    const params = new URLSearchParams({
      bookingId: bookingId,
      customerName: customerName,
      tourName: tourName,
      tourStatus: tourStatus,
      cost: cost,
      paymentStatus: paymentStatus,
      bookingStatus: bookingStatus
    }).toString();

    window.location.href = "payment.php?" + params;
  });
</script>

<?php include_once 'layout/footer.php'; ?>