<?php
include_once 'layouts/header.php';
include_once './includes/db.php';
include_once './model/Photo.php';
include_once './controller/PhotoController.php';

$package_id = isset($_GET['package_id']) ? intval($_GET['package_id']) : 0;

if ($package_id > 0) {
    $controller = new PhotoController();
    $data = $controller->getPhoto($package_id);

    $package = $data['package'] ?? null;

    if (!$package) {
        echo "Package not found";
        exit;
    }
} else {
    echo "Invalid package ID";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = false;

    // Validate form fields
    $name = $_POST['name'] ?? '';
    $phone_no = $_POST['phone_no'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $seats = $_POST['seats'] ?? '';
    $payment_status = $_POST['payment_status'] ?? '';

    if (empty($name)) {
        $error = true;
        $name_error = "Please enter your name";
    }
    if (empty($phone_no)) {
        $error = true;
        $phone_no_error = "Please enter your phone number";
    }
    if (empty($email)) {
        $error = true;
        $email_error = "Please enter your email";
    }
    if (empty($address)) {
        $error = true;
        $address_error = "Please enter your address";
    }
    if (empty($seats)) {
        $error = true;
        $seats_error = "Please enter number of seats";
    }
    $payment_status = 0;
    $booking_status = "Pending";
    $tour_status = "PackageTour";

    if (!$error) {
        $status = $controller->addBooking($name, $phone_no, $email, $address, $seats, $package_id, $tour_status, $booking_status, $payment_status);
        if ($status) {
            $message = "Success Booking";
            header('Location: packageTourView.php?status=' . urlencode($message));
            exit();
        } else {
            echo "Booking failed. Please try again.";
        }
    }
}
?>

<main id="main">


    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-body p-5">
                        <h2 class="card-title mb-4">Book Your Adventure</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?package_id=' . $package_id; ?>" method="post">
                            <input type="hidden" name="package_id" value="<?php echo htmlspecialchars($package_id); ?>">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                                <small class="text-danger"><?php echo isset($name_error) ? $name_error : ''; ?></small>
                            </div>
                            <div class="form-group">
                                <label for="phone_no">Phone Number</label>
                                <input type="text" class="form-control" id="phone_no" name="phone_no" value="<?php echo htmlspecialchars($phone_no ?? ''); ?>" required>
                                <small class="text-danger"><?php echo isset($phone_no_error) ? $phone_no_error : ''; ?></small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                                <small class="text-danger"><?php echo isset($email_error) ? $email_error : ''; ?></small>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($address ?? ''); ?>" required>
                                <small class="text-danger"><?php echo isset($address_error) ? $address_error : ''; ?></small>
                            </div>
                            <div class="form-group">
                                <label for="seats">Number of Seats</label>
                                <input type="number" class="form-control" id="seats" name="seats" value="<?php echo htmlspecialchars($seats ?? ''); ?>" required>
                                <small class="text-danger"><?php echo isset($seats_error) ? $seats_error : ''; ?></small>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" name="submit" class="btn btn-primary mr-2">Submit Request</button>
                                <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                            </div>
                            <div class="form-group mt-3">
                                <input type="hidden" name="payment_status" id="payment_status" class="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'layouts/footer.php'; ?>