<?php

include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './model/PackageTourDetail.php';
include_once './controller/AccommodationController.php';

$package_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$controller = new AccommodationController();
$package = $controller->getAccommodationById($package_id);

include_once 'layout/nagivation.php';
?>

<section class="container mt-5">
  <div class="card">
    <h6 class="font-weight-bold card-header bg-dark text-white">
      Accommodation Detail
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
                <th>Type</th>
                <td><?php echo htmlspecialchars($package['type']); ?></td>
              </tr>
              <tr>
                <th>Address</th>
                <td><?php echo htmlspecialchars($package['address']); ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($package['email']); ?></td>
              </tr>
              <tr>
                <th>Phone</th>
                <td><?php echo htmlspecialchars($package['phone']); ?></td>
              </tr>
              <tr>
                <th>Rating</th>
                <td><?php echo htmlspecialchars($package['rating']); ?></td>
              </tr>

            </tbody>
          </table>
        <?php else : ?>
          <p class="text-danger">No accommodation detail found.</p>
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
