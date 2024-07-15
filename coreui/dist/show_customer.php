<?php

include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './model/Customer.php';
include_once './controller/CustomerController.php';

$customer_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$controller = new CustomerController();
$customer = $controller->getCustomer($customer_id);

include_once 'layout/nagivation.php';
?>

<section class="container mt-5">
  <div class="card">
    <h6 class="font-weight-bold card-header bg-dark text-white">
      Customer Detail
    </h6>
    <div class="card-body">
      <div class="form-group">
        <?php if ($customer) : ?>
          <table class="table table-bordered table-hover">
            <tbody>
              <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($customer['id']); ?></td>
              </tr>
              <tr>
                <th>Name</th>
                <td><?php echo htmlspecialchars($customer['name']); ?></td>
              </tr>
              <tr>
                <th>Phone Number</th>
                <td><?php echo htmlspecialchars($customer['phone']); ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($customer['email']); ?></td>
              </tr>
              <tr>
                <th>Address</th>
                <td><?php echo htmlspecialchars($customer['address']); ?></td>
              </tr>
              <tr>
                <th>Seats</th>
                <td><?php echo htmlspecialchars($customer['seats']); ?></td>
              </tr>

            </tbody>
          </table>
        <?php else : ?>
          <p class="text-danger">No Customer detail found.</p>
        <?php endif; ?>
        <div class="form-group mt-3">
          <a onclick="history.back()" class="btn btn-secondary">Back</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include_once 'layout/footer.php';
?>
