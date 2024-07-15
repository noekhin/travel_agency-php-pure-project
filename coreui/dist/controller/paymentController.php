<?php
include_once './model/Payment.php';

class paymentController
{
  private $payment;

  public function __construct()
  {
    $this->payment = new Payment();
  }
  public function getPayment()
  {
    return $this->payment->getPayment();
  }
  public function getPaymentByID($id)
  {
    return $this->payment->getPaymentByID($id);
  }
  public function deletePayment($id)
  {
    $this->payment->deletePayment($id);
  }
}
