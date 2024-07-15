<?php
include_once './model/PackageTourDetail.php';
class PackageTourDetailController
{
  private $customerModel;

  public function __construct()
  {
    $this->customerModel = new PackageTourDetail();
  }

  public function showPackageTour()
  {
    return $this->customerModel->getAllPackageTourDetail();
  }

  public function getPackageTour($id)
  {
    return $this->customerModel->getPackageTour($id);
  }


  public function addPackageTourDetail($data)
  {
    return $this->customerModel->addPackageTourDetail($data);
  }

  public function updatePackageTour($id, $data)
  {
    $this->customerModel->updatePackageTour($id, $data);
  }

  public function updatePackagePhoto($id, $photoPath)
  {
    return $this->customerModel->updatePackagePhoto($id, $photoPath);
  }

  public function deletePackage($id)
  {
    $this->customerModel->deletePackageTour($id);
  }
  public function getAllAccommodations()
  {
    return $this->customerModel->getAllAccommodations();
  }

  public function getAllPackageTourDetail()
  {
    return $this->customerModel->getAllPackageTourDetails();
  }
  public function filter($ptname)
  {
    return $this->customerModel->filter($ptname);
  }
}
