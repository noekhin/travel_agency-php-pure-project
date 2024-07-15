<?php

include_once 'layout/slidebarmenu.php';
include_once 'controller/CustomizedTourController.php';

$controller = new CustomizeController();
$customized = $controller->getAllCustomized();

?>
<?php include_once 'layout/nagivation.php'; ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h3 class="font-weight-bold">Customized Tour Informations</h3>
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Customer Name</th>
              <th>Departure</th>
              <th>Destination</th>
              <th>Start Date</th>
              <th>Duration</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($customized as $cus) : ?>
              <tr>
                <td><?php echo htmlspecialchars($cus['id']); ?></td>
                <td><?php echo htmlspecialchars($cus['customer_name']); ?></td>
                <td><?php echo htmlspecialchars($cus['departure_name']); ?></td>
                <td><?php echo htmlspecialchars($cus['destination_name']); ?></td>
                <td><?php echo htmlspecialchars($cus['start_date']); ?></td>
                <td><?php echo htmlspecialchars($cus['duration']); ?></td>
                <td>
                  <a href="show_customized.php?id=<?php echo $cus['id']; ?>" class="btn btn-primary mb-2 btn-sm mt-2" style="width: 56.5px;">Show</a>
                  <a href="delete_customized.php?id=<?php echo $cus['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this package?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<?php
include_once(__DIR__ . '/layout/footer.php');

?>