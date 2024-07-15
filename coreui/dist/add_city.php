<?php
// Start session to use session variables
session_start();

// Start output buffering
ob_start();

include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './model/City.php';
include_once './controller/CityController.php';

$controller = new CityController();

$message = '';
$msg_type = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $data = ['name' => $name];

    try {
        $controller->addCity($data);
        // Set a session variable to indicate success
        $_SESSION['message'] = 'City added successfully!';
        $_SESSION['msg_type'] = 'success';
    } catch (Exception $e) {
        // Set a session variable to indicate error
        $_SESSION['message'] = 'Error adding city: ' . $e->getMessage();
        $_SESSION['msg_type'] = 'danger';
    }

    // Redirect to city.php to display the message
    header("Location: city.php");
    exit();
}
?>
<?php include_once 'layout/nagivation.php'; ?>
<main class="my-5" id="main">
  <section class="create-package">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h3 class="mb-4 font-weight-bold">Create City</h3>
          <form action="" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
            <a onclick="history.back()" class="btn btn-secondary text-white">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
// End output buffering and flush output
ob_end_flush();
?>
