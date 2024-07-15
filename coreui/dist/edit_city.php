<?php
session_start();


ob_start();

include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './model/City.php';
include_once './controller/CityController.php';

$controller = new CityController();

if (!isset($_GET['id'])) {
    $_SESSION['message'] = 'City ID not provided.';
    $_SESSION['msg_type'] = 'danger';
    header("Location: city.php");
    exit();
}

$city_id = $_GET['id'];
$city = $controller->getCityById($city_id);

if (!$city) {
    $_SESSION['message'] = 'City not found.';
    $_SESSION['msg_type'] = 'danger';
    header("Location: city.php");
    exit();
}

$message = '';
$msg_type = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $data = ['name' => $name];

    try {
        $controller->updateCity($city_id, $data);

        $_SESSION['message'] = 'City updated successfully!';
        $_SESSION['msg_type'] = 'success';

        header("Location: city.php");
        exit();
    } catch (Exception $e) {

        $_SESSION['message'] = 'Error updating city: ' . $e->getMessage();
        $_SESSION['msg_type'] = 'danger';

        header("Location: city.php");
        exit();
    }
}

?>

<main class="my-5" id="main">
  <section class="create-package">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h3 class="mb-4 font-weight-bold">Edit City</h3>
          <!-- Display Bootstrap alert if message exists -->
          <?php if ($message): ?>
            <div class="alert alert-<?= $msg_type ?>">
              <?= $message ?>
            </div>
          <?php endif; ?>
          <form action="" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($city['name']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="city.php" class="btn btn-secondary">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include_once(__DIR__ . '/layout/footer.php'); ?>
