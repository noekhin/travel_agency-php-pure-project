<?php

include_once 'layout/slidebarmenu.php';
include_once 'controller/CustomerController.php';

$controller = new CustomerController();
$customers = $controller->getAllCustomer();



?>
<?php include_once 'layout/nagivation.php'; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h3 class="font-weight-bold">Customer Infromation</h3>
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Address</th>
              <th>Seats</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($customers as $customer) : ?>
              <tr>
                <td><?php echo htmlspecialchars($customer['id']) ?></td>
                <td><?php echo htmlspecialchars($customer['name']) ?></td>
                <td><?php echo htmlspecialchars($customer['phone']) ?></td>
                <td><?php echo htmlspecialchars($customer['email']) ?></td>
                <td><?php echo htmlspecialchars($customer['address']) ?></td>
                <td><?php echo htmlspecialchars($customer['seats']) ?></td>
                <td>
                  <a href="show_customer.php?id=<?php echo $customer['id']; ?>" class="btn btn-primary btn-sm mt-2" style="width: 56.5px;">Show</a>
                  <a href="delete_customer.php?id=<?php echo $customer['id']; ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once 'layout/footer.php'; ?>