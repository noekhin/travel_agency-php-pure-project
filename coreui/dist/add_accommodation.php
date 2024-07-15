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
        $controller->addAccommodation($data);
        $_SESSION['message'] = 'Accommodation added successfully!';
        $_SESSION['msg_type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Error adding accommodation: ' . $e->getMessage();
        $_SESSION['msg_type'] = 'danger';
    }


    header("Location: accommodation.php");
    exit();
}
?>
<?php include_once 'layout/nagivation.php'; ?>
<main class="my-5" id="main">
  <section class="create-package">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h3 class="mb-4 font-weight-bold">Create Accommodation</h3>
          <form action="" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
              <label for="type" class="form-label">Type</label>
              <input type="text" class="form-control" id="type" name="type" required>
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" required>
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" required>
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="phone" name="phone" required>
              <label for="rating" class="form-label">Rating</label>
              <input type="text" class="form-control" id="rating" name="rating" required>
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
ob_end_flush();
?>
