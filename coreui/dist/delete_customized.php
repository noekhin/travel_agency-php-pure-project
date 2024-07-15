<?php

include_once './controller/CustomizedTourController.php';

$controller = new CustomizeController();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
  $controller->deleteCustomized($id);
}

?>

<?php
header('Location: customized_tour.php');
?>
