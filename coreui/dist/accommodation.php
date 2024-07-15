<?php

session_start();


ob_start();

include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './model/City.php';
include_once './controller/AccommodationController.php';

$controller = new AccommodationController();


$message = '';
$msg_type = '';
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  $msg_type = $_SESSION['msg_type'];

  unset($_SESSION['message']);
  unset($_SESSION['msg_type']);
}

$accommodations = $controller->getAllAccommodation();

include_once 'layout/nagivation.php';
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="font-weight-bold">Accommodation Information</h3>
        <a href="add_accommodation.php" class="btn btn-success btn-sm me-2">Add New Accommodation</a>
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
              <th>Type</th>
              <th>Address</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Rating</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($accommodations as $accommodation) : ?>
              <tr>
                <td><?php echo htmlspecialchars($accommodation['id']); ?></td>
                <td><?php echo htmlspecialchars($accommodation['name']); ?></td>
                <td><?php echo htmlspecialchars($accommodation['type']); ?></td>
                <td><?php echo htmlspecialchars($accommodation['address']); ?></td>
                <td><?php echo htmlspecialchars($accommodation['email']); ?></td>
                <td><?php echo htmlspecialchars($accommodation['phone']); ?></td>
                <td><?php echo htmlspecialchars($accommodation['rating']); ?></td>

                <td>
                  <a href="show_accommodation.php?id=<?php echo $accommodation['id']; ?>" class="btn btn-primary btn-sm mb-2" style="width: 56.5px;">Show</a>
                  <a href="edit_accommodation.php?id=<?php echo $accommodation['id']; ?>" class="btn btn-info btn-sm mb-2" style="width: 56.5px;">Edit</a>
                  <a href="delete_accommodation.php?id=<?php echo $accommodation['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this package?')">Delete</a>
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