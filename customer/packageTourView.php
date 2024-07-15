<?php
session_start();
include_once 'layouts/header.php';
include_once 'controller/PackageTourController.php';

$controller = new PackageTourController();
$packages = $controller->showPackageTour();

?>

<main id="main">
  <!-- ======= Our Packages Section ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Our Packages</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Our Packages</li>
        </ol>
      </div>
    </div>
  </section>

  <!-- ======= Packages Section ======= -->
  <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="container">
      <div class="row">
        <?php foreach ($packages as $package) : ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="card">
              <?php
              $photoPath = $package['photo'];
              if (filter_var($photoPath, FILTER_VALIDATE_URL)) {
                $photoSrc = $photoPath;
              } else {
                $photoSrc = '.././upload_image' . htmlspecialchars($photoPath);
              }
              ?>
              <img src="<?php echo $photoSrc; ?>" class="card-img-top" alt="Package Photo">
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($package['name']); ?></h5>

                <div class="d-flex">
                  <p>Departure: <?php echo htmlspecialchars($package['departure_name']); ?></p>
                  <p class="ms-5">Duration: <?php echo htmlspecialchars($package['duration']); ?></p>
                </div>
                <p class="card-text">Cost: $<?php echo htmlspecialchars($package['cost']); ?></p>
                <a href="packageTourDetailView.php?id=<?php echo $package['id']; ?>" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php include 'layouts/footer.php'; ?>