<?php
include_once 'controller/PackageTourDetailsController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $pname = $_POST['pname'];

  $controller = new PackageTourDetailController();
  $packages = $controller->filter($pname);

  foreach ($packages as $package) : ?>
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
<?php endforeach;
}
