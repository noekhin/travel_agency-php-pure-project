<?php

include_once './model/CustomizedTour.php';

class CustomizedTourController {
    private $customized;

    function __construct() {
        $this->customized = new CustomizedTour();
    }

    public function getAllCustomizedTour() {
        return $this->customized->getAllCustomizedTour();
    }

    public function getAllCities() {
        return $this->customized->getAllCities();
    }

    public function createBooking($departure, $destination, $duration, $start_date, $name, $phone, $email, $address, $seats, $tour_status, $booking_status) {
        return $this->customized->createBooking($departure, $destination, $duration, $start_date, $name, $phone, $email, $address, $seats, $tour_status, $booking_status);
    }
    
}
?>
