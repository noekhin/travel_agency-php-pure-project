<?php
include_once 'layout/slidebarmenu.php';
include_once 'controller/CustomerController.php';
include_once 'controller/AccommodationController.php';
include_once 'controller/CityController.php';
include_once 'controller/CustomizedTourController.php';
include_once 'controller/BookingController.php';

$customer_controller = new CustomerController();
$count_customer = $customer_controller->countCustomers();

$accommodation_controller = new AccommodationController();
$count_accommodation = $accommodation_controller->countAccommodations();

$city_controller = new CityController();
$count_city = $city_controller->countCities();
$customer_count_data = $city_controller->showCustomerCountChart();

$customize_controller = new CustomizeController();
$count_customize = $customize_controller->countCustomize();

$booking_controller = new BookingController();
$count_booking = $booking_controller->countBooking();
$controller = $booking_controller->maxBookedTour();

$data = $booking_controller->showLastChangedBookings();
$lastChangedBookings = $data['lastChangedBookings'];
$bookingStatusCounts = $data['bookingStatusCounts'];

include_once 'layout/nagivation.php';
?>

<div class="header-divider"></div>
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb my-0 ms-2">
      <li class="breadcrumb-item">
        <span>Home</span>
      </li>
      <li class="breadcrumb-item active"><span>Dashboard</span></li>
    </ol>
  </nav>
</div>
</header>

<div class="body flex-grow-1 px-3">
  <div class="container-lg">
    <div class="row">
      <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-primary">
          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="fs-4 fw-semibold"><?php echo $count_customer; ?></div>
              <div>Customer</div>
            </div>
            <div class="dropdown">
              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
          </div>
          <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
            <canvas class="chart" id="card-chart1" height="70"></canvas>
          </div>
        </div>
      </div>
      <!-- /.col-->
      <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-info">
          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="fs-4 fw-semibold"><?php echo $count_accommodation; ?></div>
              <div>Accommodation</div>
            </div>
            <div class="dropdown">
              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
          </div>
          <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
            <canvas class="chart" id="card-chart2" height="70"></canvas>
          </div>
        </div>
      </div>
      <!-- /.col-->
      <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-warning">
          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="fs-4 fw-semibold"><?php echo $count_city; ?></div>
              <div>Cities</div>
            </div>
            <div class="dropdown">
              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
          </div>
          <div class="c-chart-wrapper mt-3" style="height:70px;">
            <canvas class="chart" id="card-chart3" height="70"></canvas>
          </div>
        </div>
      </div>
      <!-- /.col-->
      <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-danger">
          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="fs-4 fw-semibold"><?php echo $count_customize; ?></div>
              <div>Customize Tour</div>
            </div>
            <div class="dropdown">
              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
          </div>
          <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
            <canvas class="chart" id="card-chart4" height="70"></canvas>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>

    <!-- row2 -->
    <div class="row">
      <div class="col-lg-12 mb-5">
        <div class="card">
          <div class="card-header">
            <h6>Travel Treasures Admin Panel</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-5 col-sm-6 card m-2 p-3">
                <h5 class="font-weight-bold"><img width="7%" src="https://img.icons8.com/dotty/purchase-order.png" alt="purchase-order">Booking</h5>
                <div class="mx-4">
                  <h6>Pending Status : <span class="badge bg-secondary"><?php echo $bookingStatusCounts['pending_count']; ?></span></h6>
                  <a href="http://localhost/amm/coreui/dist/booking.php" class="fw-bold">Show more.. <i class="fas fa-arrow-circle-right ms-2"></i></a>
                </div>
              </div>

              <div class="col-md-5 col-sm-6 card m-2 p-3">
                <h5 class="font-weight-bold"><img width="7%" src="https://img.icons8.com/dotty/purchase-order.png" alt="purchase-order">Booking Number</h5>
                <div>
                  <div class="fs-4 fw-semibold"><?php echo $count_booking; ?></div>
                  <div>Booking</div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- row3 -->
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-0">Today Payment</p>
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Remark</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="4" class="text-center text-danger">There are no Payment for today!
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <a href="http://localhost/amm/coreui/dist/paymentComfirm.php" class=" fw-bold">Show more.. <i class="fas fa-arrow-circle-right ms-2"></i></a>
        </div>
      </div>
    </div>

    <!-- /row3 -->

    <!-- Row to display Bar Chart -->
    <div class="row">
      <div class="col-lg-12 mb-5">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">Most Popular Package Tour</h>
          </div>
          <div class="card-body">
            <div class="row">
              <?php if ($controller) : ?>
                <p>Tour Name: <?php echo htmlspecialchars($controller['name']); ?></p>
                <p>Number of Bookings: <?php echo htmlspecialchars($controller['total_bookings']); ?></p>
              <?php else : ?>
                <p>No bookings found.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Prepare the data for the chart
  const customerCountData = <?php echo json_encode($customer_count_data); ?>;
  const cityNames = customerCountData.map(data => data.city_name);
  const customerCounts = customerCountData.map(data => data.customer_count);


  // Customize chart colors for better visibility
  const backgroundColors = [
    'rgba(75, 192, 192, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(255, 99, 132, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)',
    'rgba(105, 105, 105, 0.2)'
  ];
  const borderColors = [
    'rgba(75, 192, 192, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(255, 99, 132, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)',
    'rgba(105, 105, 105, 1)'
  ];

  const ctx = document.getElementById('customerCountChart').getContext('2d');
  const customerCountChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: cityNames,
      datasets: [{
        label: 'Number of Customers',
        data: customerCounts,
        backgroundColor: backgroundColors,
        borderColor: borderColors,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<?php include_once 'layout/footer.php'; ?>