<?php
include_once './includes/travel_db.php';
include_once './model/Customized.php';

class CustomizeController
{
  private $customize;
  function __construct()
  {
    $this->customize = new Customize();
  }
  public function getAllCustomized()
  {
    return $this->customize->getAllCustomized();
  }
  public function getCustomized($id)
  {
    return $this->customize->getCustomized($id);
  }
  public function deleteCustomized($id)
  {
    return $this->customize->deleteCustomized($id);
  }
  function countCustomize()
  {
    return sizeof($this->customize->getAllCustomize());
  }
}
