<?php
ob_start();
include_once 'layout/slidebarmenu.php';

include_once './includes/travel_db.php';
include_once './model/PackageTourDetail.php';
include_once './controller/PackageTourDetailsController.php';

$controller = new PackageTourDetailController();
$packageTourDetails = $controller->getAllPackageTourDetail();
$accommodations = $controller->getAllAccommodations();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data = [
    'package_tour_id' => $_POST['package_tour_id'],
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'activities' => $_POST['activities'],
    'meals' => $_POST['meals'],
    'accommodation_id' => $_POST['accommodation_id'],
    'photo' => ''
  ];

  $uploadDir = '../../upload_image/';
  $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

  if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
    $data['photo'] = $uploadFile;
    $controller->addPackageTourDetail($data);
    header('Location: package_tour_details.php');
    exit();
  } else {
    echo "Failed to move uploaded file.\n";
  }
}
?>

<?php include_once 'layout/nagivation.php'; ?>

<main id="main" class="my-5">
  <section class="create-package">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h3 class="mb-4 font-weight-bold">Create Package</h3>
          <form action="add_packagetourdetail.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
              <select class="form-select" id="package_tour_id" name="package_tour_id" required>
                <option value="">Select package tour</option>
                <?php foreach ($packageTourDetails as $tourDetails) : ?>
                  <option value="<?php echo $tourDetails['id']; ?>">
                    <?php echo htmlspecialchars($tourDetails['name']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
              <label for="photo" class="form-label">Photo</label>
              <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
              <img id="previewImage" class="img-fluid mt-3" style="display: none; max-width: 200px; max-height: 200px;">
            </div>

            <div class="mb-3">
              <label for="content" class="form-label">Content</label>
              <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>

            <div class="mb-3">
              <label for="activities" class="form-label">Activities</label>
              <input type="text" class="form-control" id="activities" name="activities" required>
            </div>

            <div class="mb-3">
              <label for="meals" class="form-label">Meals</label>
              <input type="text" class="form-control" id="meals" name="meals">
            </div>

            <div class="mb-3">
              <select class="form-select" id="accommodation_id" name="accommodation_id" required>
                <option value="">Select Accommodation</option>
                <?php foreach ($accommodations as $accommodation) : ?>
                  <option value="<?php echo $accommodation['id']; ?>">
                    <?php echo htmlspecialchars($accommodation['name']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <button type="submit" class="btn btn-success">Create Package</button>
            <a onclick="history.back()" class="btn btn-secondary text-white">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include_once(__DIR__ . '/layout/footer.php'); ?>

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

</body>

</html>