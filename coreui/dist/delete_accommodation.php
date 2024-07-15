<?php
session_start();
include_once './controller/AccommodationController.php';

$controller = new AccommodationController();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    if ($controller->deleteAccommodation($id)) {
        $_SESSION['message'] = 'Accommodation deleted successfully!';
        $_SESSION['msg_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Failed to delete accommodation.';
        $_SESSION['msg_type'] = 'danger';
    }
}

header('Location: accommodation.php');
exit;
?>
