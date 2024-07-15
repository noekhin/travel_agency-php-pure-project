<?php

include_once './controller/PackageTourDetailsController.php';

$controller = new PackageTourDetailController();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $controller->deletePackage($id);
}

?>

<?php
header('Location: package_tour_details.php');
?>
