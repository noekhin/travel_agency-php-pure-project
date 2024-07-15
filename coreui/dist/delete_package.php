<?php

include_once './controller/PackageTourController.php';

$controller = new PhotoController();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $controller->deletePackage($id);
}

?>

<?php
header('Location: admin_dashboard.php');
?>
