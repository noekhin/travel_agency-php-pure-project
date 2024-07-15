<?php

include_once 'layout/slidebarmenu.php';
include_once 'controller/PackageTourController.php';

$controller = new PhotoController();
$packages = $controller->getAllPackages();

?>
<?php
include_once 'layout/nagivation.php';
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h3 class="font-weight-bold">Package Tour Information</h3>
      <div class="row mb-3">
        <div class="col-md-8">
          <form class="row g-3 mt-5 mb-4">
            <div class="col-md-4">
              <label for="min_cost" class="form-label">Minimum Cost</label>
              <input type="number" name="min" id="min_cost" class="form-control">
            </div>
            <div class="col-md-4">
              <label for="max_cost" class="form-label">Maximum Cost</label>
              <input type="number" name="max" id="max_cost" class="form-control">
            </div>
            <div class="col-md-4 d-flex align-items-end">
              <button class="btn btn-info btn-sm w-50" id="filtercost">Filter</button>
              <button class="btn btn-secondary ms-3 btn-sm w-50" id="cancel">Cancel</button>
            </div>
          </form>
        </div>
        <div class="col-md-4 d-flex align-items-end justify-content-end">
          <a href="add_package.php" class="btn btn-success btn-sm mb-3">Add New Package</a>
        </div>
      </div>
      <table class="table table-bordered table-striped table-hover table-responsive">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Departure</th>
            <th>Destination</th>
            <th>Services</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Duration</th>
            <th>Cost</th>
            <th>Photo</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="data_body">
          <?php foreach ($packages as $package) : ?>
            <tr>
              <td><?php echo htmlspecialchars($package['id']); ?></td>
              <td><?php echo htmlspecialchars($package['name']); ?></td>
              <td><?php echo htmlspecialchars($package['departure_name']); ?></td>
              <td><?php echo htmlspecialchars($package['destination_name']); ?></td>
              <td><?php echo htmlspecialchars($package['services']); ?></td>
              <td><?php echo htmlspecialchars($package['start_date']); ?></td>
              <td><?php echo htmlspecialchars($package['end_date']); ?></td>
              <td><?php echo htmlspecialchars($package['duration']); ?></td>
              <td>$<?php echo htmlspecialchars($package['cost']); ?></td>
              <td>
                <?php
                $photoPath = htmlspecialchars($package['photo']);
                ?>
                <img src="<?php echo $photoPath; ?>" style="max-width: 400px; max-height: 100px;" class="img-fluid rounded">
              </td>
              <td>
                <a href="show_package.php?id=<?php echo $package['id']; ?>" class="btn btn-primary mb-2 btn-sm mt-2" style="width: 56.5px;">Show</a>
                <a href="edit_package.php?id=<?php echo $package['id']; ?>" class="btn btn-info btn-sm me-2" style="width: 56.5px;">Edit</a>
                <a href="delete_package.php?id=<?php echo $package['id']; ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Are you sure you want to delete this package?')">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<script>
  const filter = document.querySelector('#filtercost');
  const min_cost = document.querySelector('#min_cost');
  const max_cost = document.querySelector('#max_cost');

  filter.addEventListener('click', function(event) {
    event.preventDefault();
    let min_value = min_cost.value;
    let max_value = max_cost.value;
    console.log("Cost:", min_value, max_value);

    $.ajax({
      method: 'post',
      url: 'filtercost.php',
      data: {
        min: min_value,
        max: max_value
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