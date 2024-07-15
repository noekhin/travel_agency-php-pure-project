<?php
include_once 'controller/PackageTourController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $min = $_POST['min'];
  $max = $_POST['max'];

  $package_controller = new PhotoController();
  $packages = $package_controller->filter($min, $max);

  foreach ($packages as $package) : ?>
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
<?php endforeach;
}
?>