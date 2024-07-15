<?php

include_once 'layout/slidebarmenu.php';
include_once 'controller/PackageTourDetailsController.php';

$controller = new PackageTourDetailController(); // Corrected the controller class name
$packages = $controller->showPackageTour();
$ptnames = $controller->getAllPackageTourDetail();
include_once 'layout/nagivation.php';
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="row mb-3">
          <h3 class="font-weight-bold">Package Tour Details Information</h3>
          <div class="col-md-8">
            <form class="row g-3">
              <div class="col-md-4 mt-5">

                <select class="form-select" id="package_tour_id" name="package_tour_id">
                  <option value="">Select package tour</option>
                  <?php foreach ($ptnames as $ptname) : ?>
                    <option value="<?php echo $ptname['id']; ?>">
                      <?php echo htmlspecialchars($ptname['name']); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-4 d-flex align-items-end">
                <button class="btn btn-info btn-sm w-50" id="filterpt">Filter</button>
                <button class="btn btn-secondary ms-3 btn-sm w-50" id="cancel">Cancel</button>
              </div>
            </form>
          </div>
          <div class="col-md-4 d-flex align-items-end justify-content-end">
            <a href="add_packagetourdetail.php" class="btn btn-success btn-sm me-2">Add New Package Tour Details</a>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Package Tour</th>
              <th>Title</th>
              <th>Photo</th>
              <th>Content</th>
              <th>Activities</th>
              <th>Meals</th>
              <th>Accommodation</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="data_body">
            <?php foreach ($packages as $package) : ?>
              <tr>
                <td><?php echo htmlspecialchars($package['id']); ?></td>
                <td><?php echo htmlspecialchars($package['package_tour_name']); ?></td>
                <td><?php echo htmlspecialchars($package['title']); ?></td>
                <td>
                  <?php
                  $photoPath = htmlspecialchars($package['photo']);
                  ?>
                  <img src="<?php echo $photoPath; ?>" class="img-fluid rounded" style="width: 400px; height: 100px;">
                </td>
                <td class="text-truncate" style="max-width: 200px;"><?php echo htmlspecialchars($package['content']); ?></td>
                <td><?php echo htmlspecialchars($package['activities']); ?></td>
                <td><?php echo htmlspecialchars($package['meals']); ?></td>
                <td><?php echo htmlspecialchars($package['accommodation_name']); ?></td>
                <td>
                  <a href="show_package_tour_detail.php?id=<?php echo $package['id']; ?>" class="btn btn-primary mb-2 btn-sm mt-2" style="width: 56.5px;">Show</a>
                  <a href="edit_package_tour_detail.php?id=<?php echo $package['id']; ?>" class="btn btn-info btn-sm me-2" style="width: 56.5px;">Edit</a>
                  <a href="delete_package_tour_detail.php?id=<?php echo $package['id']; ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Are you sure you want to delete this package?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script>
  const filter = document.querySelector('#filterpt');
  const package_tour = document.querySelector('#package_tour_id');

  console.log(package_tour);

  filter.addEventListener('click', function(event) {
    event.preventDefault();
    let pt_value = package_tour.options[package_tour.selectedIndex].text;

    console.log("Name:", pt_value);

    $.ajax({
      method: 'post',
      url: 'filterpt.php',
      data: {
        pname: pt_value
      },
      success: function(response) {
        let tbody = $('#data_body');
        tbody.empty().append(response);
      }
    });
  });
</script>

<?php
include_once(__DIR__ . '/layout/footer.php');
?>
</body>

</html>