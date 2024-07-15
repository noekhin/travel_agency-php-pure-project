<?php
session_start();
ob_start();

include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './model/City.php';
include_once './controller/CityController.php';

$controller = new CityController();

$message = '';
$msg_type = '';
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  $msg_type = $_SESSION['msg_type'];
  unset($_SESSION['message']);
  unset($_SESSION['msg_type']);
}

$cities = $controller->getAllCities();

include_once 'layout/nagivation.php';
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="font-weight-bold">City Information</h3>
        <a href="add_city.php" class="btn btn-success btn-sm me-3 glow">Add New City</a>
      </div>
      <?php if ($message) : ?>
        <div class="alert alert-<?= $msg_type ?>">
          <?= $message ?>
        </div>
      <?php endif; ?>
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cities as $city) : ?>
              <tr>
                <td><?php echo htmlspecialchars($city['id']); ?></td>
                <td><?php echo htmlspecialchars($city['name']); ?></td>
                <td>

                  <a href="edit_city.php?id=<?php echo $city['id']; ?>" class="btn btn-info btn-sm ms-3 glow">Edit</a>
                  <a href="delete_city.php?id=<?php echo $city['id']; ?>" class="btn btn-danger btn-sm ms-3 glow" onclick="return confirm('Are you sure you want to delete this package?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once 'layout/footer.php';
ob_end_flush();
?>