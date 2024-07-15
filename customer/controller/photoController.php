<?php
include_once './model/Photo.php';

class PhotoController
{
    private $photoModel;

    public function __construct()
    {
        $this->photoModel = new Photo();
    }

    public function getPhoto($package_id)
    {
        return $this->photoModel->getPhoto($package_id);
    }

    public function addBooking($name, $phone, $email, $address, $seats, $tour_id, $tour_status, $booking_status, $payment_status)
    {
        return $this->photoModel->addBooking($name, $phone, $email, $address, $seats, $tour_id, $tour_status, $booking_status, $payment_status);
    }
}
