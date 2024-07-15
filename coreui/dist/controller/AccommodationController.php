<?php

include_once './model/Accommodation.php';

class AccommodationController
{
  private $accommodationModel;

  public function __construct()
  {
    $this->accommodationModel = new Accommodation();
  }

  public function addAccommodation($data)
  {
    return $this->accommodationModel->addAccommodation($data);
  }

  public function updateAccommodation($id, $data)
  {
    $this->accommodationModel->updateAccommodation($id, $data);
  }

  public function deleteAccommodation($id)
  {
    return $this->accommodationModel->deleteAccommodation($id);
  }

  public function getAllAccommodation()
  {
    return $this->accommodationModel->getAllAccommodation();
  }

  public function getAccommodationById($id)
  {
    return $this->accommodationModel->getAccommodationById($id);
  }
  public function countAccommodations()
  {
    return sizeof($this->accommodationModel->getAllAccommodation());
  }
}
