<?php
include_once 'layout/slidebarmenu.php';
include_once './includes/travel_db.php';
include_once './controller/paymentController.php';
include_once './model/Payment.php';

$id = $_GET['id'] ?? null;
$controller = new paymentController();
$pays = $controller->getPaymentByID($id);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="stylesheet" href="/assets/stylesheets/email_media_queries.css" data-immutable="true">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Pyament Slip</title>
</head>

<body>
  <div id="printable">
    <table class="wrapper" bgcolor="#ECEEF1" style="background-color:#ECEEF1;width:100%;">
      <tr>
        <td>
          <table class="body-wrap" style="margin:0 auto;margin-bottom: 80px;">
            <tr>
              <td></td>
              <td class="container transaction-mailer" bgcolor="#FFFFFF" style="font-family:Source Sans Pro, Helvetica, sans-serif;color:#6f6f6f;display:block;max-width:600px;margin:0 auto;padding:40px;border:1px solid #CED3D8;">
                <div class="content" style="display:block;margin:0 auto;max-width:650px;padding:20px;-webkit-font-smoothing:antialiased">
                  <div class="receipt">
                    <div class="head">
                      <h1 class="light title" style="margin:0;padding:0;margin-bottom:20px;font-weight:700;line-height:130%;-webkit-font-smoothing:antialiased;margin-top:10px;color:#ccc;font-size:26px;text-align:left">Invoice</h1>
                      <div class="account-item" style="margin:10px 0;font-size:18px">
                        <span class="light" style="padding-right:5px;color:#ccc">Name:</span>
                        <span class="item-detail" style="padding-right:5px;color:#434343"><?php echo htmlspecialchars($pays['customer_name']); ?></span>
                      </div>
                      <div class="account-item" style="margin:10px 0;font-size:18px">
                        <span class="light" style="padding-right:5px;color:#ccc">Payment date:</span>
                        <span class="item-detail" style="padding-right:5px;color:#434343"><?php echo htmlspecialchars($pays['payment_date']); ?></span>
                      </div>
                    </div>
                    <div class="divider" style="margin-top:30px;padding-top:10px;border-top:1px solid #CCC">
                      <div class="message">
                        <h1 class="emphasis" style="margin:0;padding:0;margin-bottom:20px;font-weight:700;margin-top:10px;-webkit-font-smoothing:antialiased;font-size:28px;line-height:130%;text-align:left;color:#54bbff">Thank you for choosing us.</h1>
                        <p style="color:#434343;text-align:left;line-height:150%;padding:0;font-weight:400;font-size:18px">If you have any questions, please let us know. We'll get back to you as soon as we can.</p>
                        <p style="color:#434343;text-align:left;line-height:150%;padding:0;font-weight:400;font-size:18px">Your friends,
                          <br>
                          <a href="mailto:billing@wistia.com" style="color:#54bbff">contact@traveltreasures.com</a>
                        </p>
                      </div>
                    </div>
                    <div class="billing">
                      <div class="divider" style="margin-top:30px;padding-top:10px;border-top:1px solid #CCC"> <strong style="color:black;display:inline-block;font-size:18px;margin-bottom:5px;margin-top:5px">Details</strong>
                        <ul style="width:80%;text-align:left;list-style-type:none;font-size:18px;margin:0px;padding:0px">
                          <li style="padding-bottom:5px;font-size:18px;color:#434343;line-height:150%">Payment Id: <?php echo htmlspecialchars($pays['id']); ?></li>
                          <li style="padding-bottom:5px;font-size:18px;color:#434343;line-height:150%">Tour Name: <?php echo htmlspecialchars($pays['tour_name']); ?></li>
                          <li style="padding-bottom:5px;font-size:18px;color:#434343;line-height:150%">Tour Status: <?php echo htmlspecialchars($pays['tour_status']); ?></li>
                        </ul>
                      </div>
                      <div class="divider" style="margin-top:30px;padding-top:10px;border-top:1px solid #CCC">
                        <div class="grand-total">
                          <strong style="color:black;display:inline-block;font-size:18px;margin-bottom:5px;margin-top:5px">Total Amount</strong>
                          <strong class="total" style="margin-top:5px;color:black;display:inline-block;margin-bottom:5px;font-size:18px;float:right">$<?php echo htmlspecialchars($pays['amount']); ?></strong>
                        </div>
                      </div>
                    </div>
                    <div class="foot">
                      <p style="color:#434343;text-align:left;line-height:150%;padding:0;font-weight:400;font-size:18px">
                        <strong>You are all set.</strong> Have a safe and wonderful trip, filled with unforgettable experiences and cherished moments that enrich your journey
                      </p>
                      <button class="btn btn-primary btn-sm" style="width: 70px;" onclick="window.print()">Print</button>
                      <a href="paymentComfirm.php" class="btn btn-secondary btn-sm">Cancel</a>

                    </div>
                  </div>
                </div>
              </td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>

  <script>
    function printDiv() {
      var originalContents = document.body.innerHTML;
      var printableContents = document.getElementById('printable').innerHTML;

      document.body.innerHTML = printableContents;

      window.print();

      document.body.innerHTML = originalContents;
    }
  </script>
</body>

</html>