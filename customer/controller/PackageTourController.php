<?php
include_once './model/PackageTour.php';
class PackageTourController {
  private $customerModel;

  public function __construct() {
      $this->customerModel = new PackageTour();
  }

  public function showPackageTour() {
      return $this->customerModel->getAllPackageTour();
  }

  public function getPhoto($package_id) {
      return $this->customerModel->getPhoto($package_id);
  }

  public function getAllPackages() {
      return $this->customerModel->getAllPackageTour();
  }

  public function updatePhoto($packageId, $photoPath) {
      return $this->customerModel->updatePhoto($packageId, $photoPath);
  }
}

?>
