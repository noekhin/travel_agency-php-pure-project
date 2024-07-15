<?php

include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './model/Customized.php';
include_once './controller/CustomizedTourController.php';

$customized_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$controller = new CustomizeController();
$customized = $controller->getCustomized($customized_id);
?>
<?php

include_once 'layout/nagivation.php';

?>
<section class="container mt-5">
  <div class="card">
    <h6 class="font-weight-bold card-header bg-dark text-white">
      Show CustomizedTour
    </h6>
    <div class="card-body">
      <div class="form-group">
        <?php if ($customized) : ?>
          <table class="table table-bordered table-hover">
            <tbody>
              <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($customized['id']); ?></td>
              </tr>
              <tr>
                <th>Customer Name</th>
                <td><?php echo htmlspecialchars($customized['customer_name']); ?></td>
              </tr>
              <tr>
                <th>Departure</th>
                <td><?php echo htmlspecialchars($customized['departure_name']); ?></td>
              </tr>
              <tr>
                <th>Destination</th>
                <td><?php echo htmlspecialchars($customized['destination_name']); ?></td>
              </tr>
              <tr>
                <th>Start Date</th>
                <td><?php echo htmlspecialchars($customized['start_date']); ?></td>
              </tr>
              <tr>
                <th>Duration</th>
                <td><?php echo htmlspecialchars($customized['duration']); ?></td>
              </tr>
            </tbody>
          </table>
        <?php else : ?>
          <p class="text-danger">No Customized Tour found.</p>
        <?php endif; ?>
        <div class="form-group mt-3">
          <a onclick="history.back()" class="btn btn-secondary">Back</a>
        </div>
      </div>
    </div>
  </div>
</section>