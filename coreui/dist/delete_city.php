<?php
session_start(); // Start session to use session variables

include_once './controller/CityController.php';

$controller = new CityController();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    if ($controller->deleteCity($id)) {
        $_SESSION['message'] = 'City deleted successfully!';
        $_SESSION['msg_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Failed to delete city.';
        $_SESSION['msg_type'] = 'danger';
    }
}

header('Location: city.php');
exit;
?>
