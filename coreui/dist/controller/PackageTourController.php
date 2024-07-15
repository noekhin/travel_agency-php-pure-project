<?php
include_once './model/PackageTour.php';
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

  public function getAllPackages()
  {
    return $this->photoModel->getAllPackages();
  }

  public function getPackage($id)
  {
    return $this->photoModel->getPackage($id);
  }


  public function addPackage($data)
  {
    return $this->photoModel->addPackage($data);
  }


  public function updatePackage($id, $data)
  {
    $this->photoModel->updatePackage($id, $data);
  }

  public function deletePackage($id)
  {
    $this->photoModel->deletePackage($id);
  }
  public function getAllCities()
  {
    return $this->photoModel->getAllCities();
  }


  public function filter($min, $max)
  {
    return $this->photoModel->filter($min, $max);
  }
}
