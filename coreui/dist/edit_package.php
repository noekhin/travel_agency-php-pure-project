<?php
ob_start();
include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './model/PackageTour.php';
include_once './controller/PackageTourController.php';

$controller = new PhotoController();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$package = $controller->getPackage($id);
$cities = $controller->getAllCities();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data = [
    'name' => $_POST['name'],
    'departure' => $_POST['departure'],
    'destination' => $_POST['destination'],
    'services' => $_POST['services'],
    'start_date' => $_POST['start_date'],
    'end_date' => $_POST['end_date'],
    'duration' => $_POST['duration'],
    'cost' => $_POST['cost'],
    'photo' => $package['photo']
  ];

  if (!empty($_FILES['photo']['name'])) {
    $uploadDir = '../../upload_image/';
    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
      // Set new photo path
      $data['photo'] = '../../upload_image/' . basename($_FILES['photo']['name']);
    }
  }

  $controller->updatePackage($id, $data);
  header('Location: admin_dashboard.php');
  exit;
}

include_once 'layout/nagivation.php';
?>


<main id="main">
  <section class="create-package">
    <div class="container">
      <div class="card shadow">
        <div class="card-header">
          <h3 class="font-weight-bold mb-0">Edit Package Tour</h3>
        </div>
        <div class="card-body">
          <form action="edit_package.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="name" class="form-label">Package Tour Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($package['name']); ?>" required>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="departure" class="form-label">Departure</label>
                  <select class="form-select" id="departure" name="departure" required>
                    <option value="">Select Departure</option>
                    <?php foreach ($cities as $city) : ?>
                      <option value="<?php echo $city['id']; ?>" <?php echo ($city['id'] == $package['departure']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($city['name']); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="destination" class="form-label">Destination</label>
                  <select class="form-select" id="destination" name="destination" required>
                    <option value="">Select Destination</option>
                    <?php foreach ($cities as $city) : ?>
                      <option value="<?php echo $city['id']; ?>" <?php echo ($city['id'] == $package['destination']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($city['name']); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="services" class="form-label">Services</label>
              <input type="text" class="form-control" id="services" name="services" value="<?php echo htmlspecialchars($package['services']); ?>">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="start_date" class="form-label">Start Date</label>
                  <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo htmlspecialchars($package['start_date']); ?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="end_date" class="form-label">End Date</label>
                  <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo htmlspecialchars($package['end_date']); ?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="duration" class="form-label">Duration</label>
                  <input type="text" class="form-control" id="duration" name="duration" value="<?php echo htmlspecialchars($package['duration']); ?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="cost" class="form-label">Cost</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" id="cost" name="cost" value="<?php echo htmlspecialchars($package['cost']); ?>" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="photo" class="form-label">Photo</label>
              <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
              <?php if (!empty($package['photo'])) : ?>
                <img id="previewImage" src="<?php echo htmlspecialchars($package['photo']); ?>" style="width: 200px; height: 200px; margin-top: 10px;" class="img-fluid rounded">
              <?php else : ?>
                <img id="previewImage" style="width: 200px; height: 200px; display: none; margin-top: 10px;" class="img-fluid rounded">
              <?php endif; ?>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-success me-3">Update</button>
              <a href="admin_dashboard.php" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
  const photoInput = document.getElementById('photo');
  const previewImage = document.getElementById('previewImage');

  photoInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        previewImage.src = e.target.result;
        previewImage.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  });
</script>

<?php include_once(__DIR__ . '/layout/footer.php'); ?>