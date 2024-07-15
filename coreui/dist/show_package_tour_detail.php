<?php

include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './model/PackageTourDetail.php';
include_once './controller/PackageTourDetailsController.php';

$package_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$controller = new PackageTourDetailController();
$package = $controller->getPackageTour($package_id);

include_once 'layout/nagivation.php';
?>

<section class="container mt-5">
  <div class="card">
    <h6 class="font-weight-bold card-header bg-dark text-white">
      Package Tour Detail
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
                <th>Package Tour</th>
                <td><?php echo htmlspecialchars($package['package_tour_name']); ?></td>
              </tr>
              <tr>
                <th>Title</th>
                <td><?php echo htmlspecialchars($package['title']); ?></td>
              </tr>
              <tr>
                <th>Photo</th>
                <td>
                  <?php $photoPath = htmlspecialchars($package['photo']); ?>
                  <img src="<?php echo $photoPath; ?>" class="img-fluid rounded" style="max-width: 400px; max-height: 300px;">
                </td>
              </tr>
              <tr>
                <th>Content</th>
                <td><?php echo htmlspecialchars($package['content']); ?></td>
              </tr>
              <tr>
                <th>Activities</th>
                <td><?php echo htmlspecialchars($package['activities']); ?></td>
              </tr>
              <tr>
                <th>Meals</th>
                <td><?php echo htmlspecialchars($package['meals']); ?></td>
              </tr>
              <tr>
                <th>Accommodation</th>
                <td><?php echo htmlspecialchars($package['accommodation_name']); ?></td>
              </tr>
            </tbody>
          </table>
        <?php else : ?>
          <p class="text-danger">No package tour detail found.</p>
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