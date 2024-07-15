<?php

include_once './model/Customer.php';
class CustomerController
{
  private $customerModel;

  public function __construct()
  {
    $this->customerModel = new Customer();
  }

  public function getAllCustomer()
  {
    return $this->customerModel->getAllCustomer();
  }

  public function deleteCustomer($id)
  {
    $this->customerModel->deleteCustomer($id);
  }
  public function getCustomer($id)
  {
    return $this->customerModel->getCustomer($id);
  }
  function countCustomers()
  {
    return sizeof($this->customerModel->getAllCustomer());
  }
}
