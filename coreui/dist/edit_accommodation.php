<?php
session_start();



ob_start();

include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './model/Accommodation.php';
include_once './controller/AccommodationController.php';

$controller = new AccommodationController();

if (!isset($_GET['id'])) {
  $_SESSION['message'] = 'Accommodation ID not provided.';
  $_SESSION['msg_type'] = 'danger';
  header("Location: accommodation.php");
  exit();
}

$accommodation_id = $_GET['id'];
$accommodation = $controller->getAccommodationById($accommodation_id);

if (!$accommodation) {
  $_SESSION['message'] = 'Accommodation not found.';
  $_SESSION['msg_type'] = 'danger';
  header("Location: accommodation.php");
  exit();
}

$message = '';
$msg_type = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data = [
    'name' => $_POST['name'],
    'type' => $_POST['type'],
    'address' => $_POST['address'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'rating' => $_POST['rating']

  ];

  try {
    $controller->updateAccommodation($accommodation_id, $data);

    $_SESSION['message'] = 'Accommodation updated successfully!';
    $_SESSION['msg_type'] = 'success';

    header("Location: accommodation.php");
    exit();
  } catch (Exception $e) {

    $_SESSION['message'] = 'Error updating accommodation: ' . $e->getMessage();
    $_SESSION['msg_type'] = 'danger';

    header("Location: accommodation.php");
    exit();
  }
}

?>

<main class="my-5" id="main">
  <section class="create-package">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h3 class="mb-4 font-weight-bold">Edit Accommodation</h3>
          <?php if ($message) : ?>
            <div class="alert alert-<?= $msg_type ?>">
              <?= $message ?>
            </div>
          <?php endif; ?>
          <form action="" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($accommodation['name']) ?>" required>

              <label for="type" class="form-label">Type</label>
              <input type="text" class="form-control" id="type" name="type" value="<?= htmlspecialchars($accommodation['type']) ?>" required>

              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" value="<?= htmlspecialchars($accommodation['address']) ?>" required>

              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="<?= htmlspecialchars($accommodation['email']) ?>" required>

              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($accommodation['phone']) ?>" required>

              <label for="rating" class="form-label">Rating</label>
              <input type="text" class="form-control" id="rating" name="rating" value="<?= htmlspecialchars($accommodation['rating']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="accommodation.php" class="btn btn-secondary">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include_once(__DIR__ . '/layout/footer.php'); ?>