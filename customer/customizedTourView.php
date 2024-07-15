<?php
include_once 'layouts/header.php';
include_once 'controller/CustomizedTourController.php';

$package_id = isset($_GET['package_id']) ? intval($_GET['package_id']) : 0;


$controller = new CustomizedTourController();
$cities = $controller->getAllCities();
$customizedTours = $controller->getAllCustomizedTour();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $departure = $_POST['departure'];
    $destination = $_POST['destination'];
    $duration = $_POST['duration'];
    $start_date = $_POST['start_date'];
    $name = $_POST['name'];
    $phone = $_POST['phone_no'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $seats = $_POST['seats'];
    $tour_status = 'CustomizedTour'; 
    $booking_status = 'Pending'; 

    if (empty($departure)) {
        $error = true;
        $departure_error = "Please enter your departure";
    }
    if (empty($destination)) {
        $error = true;
        $destination_error = "Please enter your destination";
    }
    if (empty($duration)) {
        $error = true;
        $duration_error = "Please enter your duration";
    }
    if (empty($start_date)) {
        $error = true;
        $start_date_error = "Please enter your start date";
    }
    if (empty($name)) {
        $error = true;
        $name_error = "Please enter your name";
    }
    if (empty($phone)) {
        $error = true;
        $phone_error = "Please enter your phone";
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
    

    if (!$error) {
        $status = $controller->createBooking($departure, $destination, $duration, $start_date, $name, $phone, $email, $address, $seats, $tour_status, $booking_status);
        if ($status) {
            $message = "Success Booking";
            header('Location: index.php?status=' . urlencode($message));
            exit();
        } else {
            echo "Booking failed. Please try again.";
        }
    }
    
}
?>
<body>
    <div class="container py-5">
        <h4>Booking Details (Customized Tour)</h4>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="package_id" value="<?php echo htmlspecialchars($package_id); ?>">
           
            <div class="form-group mb-3">
                <label for="departure">Departure City:</label>
                <select name="departure" id="departure" class="form-control">
                    <?php
                    foreach ($cities as $city) {
                        echo "<option value='" . $city['id'] . "'>" . $city['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="destination">Destination City:</label>
                <select name="destination" id="destination" class="form-control">
                    <?php
                    foreach ($cities as $city) {
                        echo "<option value='" . $city['id'] . "'>" . $city['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="duration">Duration (days):</label>
                <input type="text" name="duration" id="duration" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>

            <h4 style="margin-bottom: 20px;">Contact Information</h4>
            <hr>
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group mb-3">
                <label for="phone_no">Phone Number:</label>
                <input type="text" class="form-control" id="phone_no" name="phone_no" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group mb-3">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="seats">Number of Seats:</label>
                <input type="number" class="form-control" id="seats" name="seats" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
<?php include_once 'layouts/footer.php'; ?>

