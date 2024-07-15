<?php

include_once './controller/paymentController.php';

$controller = new paymentController();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
  $controller->deletePayment($id);
}

?>

<?php
header('Location: paymentComfirm.php');
?>
