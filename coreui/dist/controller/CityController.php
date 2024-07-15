<?php

include_once './model/City.php';

class CityController
{
  private $cityModel;

  public function __construct()
  {
    $this->cityModel = new City();
  }

  public function addCity($data)
  {
    return $this->cityModel->addCity($data);
  }

  public function updateCity($id, $data)
  {
    $this->cityModel->updateCity($id, $data);
  }

  public function deleteCity($id)
  {
    return $this->cityModel->deleteCity($id);
  }

  public function getAllCities()
  {
    return $this->cityModel->getAllCities();
  }

  public function getCityById($id)
  {
    return $this->cityModel->getCityById($id);
  }
  function countCities()
  {
    return sizeof($this->cityModel->getAllCities());
  }

  public function showCustomerCountChart()
  {
    return $this->cityModel->getCustomerCountByCity();
  }
}
