<?php

include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './model/PackageTour.php';
include_once './controller/PackageTourController.php';

$package_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$controller = new PhotoController();
$package = $controller->getPackage($package_id);
?>
<?php

include_once 'layout/nagivation.php';

?>
<section class="container mt-5">
  <div class="card">
    <h6 class="font-weight-bold card-header bg-dark text-white">
      Show PackageTour
    </h6>
    <div class="card-body">
      <div class="form-group">
        <?php if ($package) : ?>
          <table class="table table-bordered table-hover">
            <tbody>
              <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($package['id']); ?></td>
              </tr>
              <tr>
                <th>Name</th>
                <td><?php echo htmlspecialchars($package['name']); ?></td>
              </tr>
              <tr>
                <th>Departure</th>
                <td><?php echo htmlspecialchars($package['departure_name']); ?></td>
              </tr>
              <tr>
                <th>Destination</th>
                <td><?php echo htmlspecialchars($package['destination_name']); ?></td>
              </tr>
              <tr>
                <th>Services</th>
                <td><?php echo htmlspecialchars($package['services']); ?></td>
              </tr>
              <tr>
                <th>Start Date</th>
                <td><?php echo htmlspecialchars($package['start_date']); ?></td>
              </tr>
              <tr>
                <th>End Date</th>
                <td><?php echo htmlspecialchars($package['end_date']); ?></td>
              </tr>
              <tr>
                <th>Duration</th>
                <td><?php echo htmlspecialchars($package['duration']); ?></td>
              </tr>
              <tr>
                <th>Cost</th>
                <td><?php echo htmlspecialchars($package['cost']); ?></td>
              </tr>
              <tr>
                <th>Photo</th>
                <td>
                  <?php $photoPath = htmlspecialchars($package['photo']); ?>
                  <img src="<?php echo $photoPath; ?>" style="max-width: 400px; max-height: 300px;" class="img-fluid rounded">
                </td>
              </tr>
            </tbody>
          </table>
        <?php else : ?>
          <p class="text-danger">No package found.</p>
        <?php endif; ?>
        <div class="form-group mt-3">
          <a onclick="history.back()" class="btn btn-secondary">Back</a>
        </div>
      </div>
    </div>
  </div>
</section>