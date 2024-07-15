<?php

include_once './controller/CustomerController.php';

$controller = new CustomerController();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
  $controller->deleteCustomer($id);
}

?>

<?php
header('Location: customer.php');
?>
