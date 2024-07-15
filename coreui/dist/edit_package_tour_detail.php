<?php
ob_start();
include_once 'layout/slidebarmenu.php';

include_once './includes/travel_db.php';
include_once './model/PackageTourDetail.php';
include_once './controller/PackageTourDetailsController.php';

$controller = new PackageTourDetailController();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$package = $controller->getPackageTour($id);
$packageTourDetails = $controller->getAllPackageTourDetail();
$accommodations = $controller->getAllAccommodations();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $controller->updatePackageTour($id, $_POST);
  $uploadDir = '../../upload_image/';
  $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

  if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
    if ($controller->updatePackagePhoto($id, $uploadFile)) {
      echo "Photo updated successfully.\n";
    } else {
      echo "Failed to update photo.\n";
    }
  } else {
    echo "Failed to move uploaded file.\n";
  }
  header('Location: package_tour_details.php');
  exit();
}
?>

<?php include_once 'layout/nagivation.php'; ?>

<main id="main" class="my-5">
  <section class="edit-package">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
              <h3 class="font-weight-bold mb-0">Edit Package Tour Details</h3>
            </div>
            <div class="card-body">
              <form action="edit_package_tour_detail.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                  <label for="package_tour_id" class="form-label">Package Tour</label>
                  <select class="form-select" id="package_tour_id" name="package_tour_id" required>
                    <option value="">Select package tour</option>
                    <?php foreach ($packageTourDetails as $tourDetails) : ?>
                      <option value="<?php echo $tourDetails['id']; ?>" <?php echo $tourDetails['id'] == $package['package_tour_id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($tourDetails['name']); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($package['title']); ?>" required>
                </div>

                <div class="mb-3">
                  <label for="photo" class="form-label">Photo</label>
                  <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                  <?php if (!empty($package['photo'])) : ?>
                    <img id="" src="<?php echo htmlspecialchars($package['photo']); ?>" class="img-fluid mt-3" style="max-width: 200px; max-height: 200px;">
                  <?php else : ?>
                    <img id="" class="img-fluid mt-3" style="display: none; max-width: 200px; max-height: 200px;">
                  <?php endif; ?>
                </div>

                <div class="mb-3">
                  <label for="content" class="form-label">Content</label>
                  <textarea class="form-control" id="content" name="content" rows="4" required><?php echo htmlspecialchars($package['content']); ?></textarea>
                </div>

                <div class="mb-3">
                  <label for="activities" class="form-label">Activities</label>
                  <input type="text" class="form-control" id="activities" name="activities" value="<?php echo htmlspecialchars($package['activities']); ?>" required>
                </div>

                <div class="mb-3">
                  <label for="meals" class="form-label">Meals</label>
                  <input type="text" class="form-control" id="meals" name="meals" value="<?php echo htmlspecialchars($package['meals']); ?>" required>
                </div>

                <div class="mb-3">
                  <label for="accommodation_id" class="form-label">Select Accommodation</label>
                  <select class="form-select" id="accommodation_id" name="accommodation_id" required>
                    <option value="">Select Accommodation</option>
                    <?php foreach ($accommodations as $accommodation) : ?>
                      <option value="<?php echo $accommodation['id']; ?>" <?php echo $accommodation['id'] == $package['accommodation_id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($accommodation['name']); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-success me-3">Update Package</button>
                  <a onclick="history.back()" class="btn btn-secondary text-white">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

</body>

</html>


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