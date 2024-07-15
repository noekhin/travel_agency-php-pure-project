<?php
include_once 'layouts/header.php';
?>
<main id="main">

  <!-- ======= Our Portfolio Section ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Recommended Palaces Details</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="recommendedplaces.php">Recommended Places</a></li>
          <li>Recommended Palaces Details</li>
        </ol>
      </div>
    </div>
  </section><!-- End Our Portfolio Section -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">
      <div class="text-end"> <!-- Aligns content to the end (right side) -->
            <a href="recommendedplaces.php" class="btn btn-primary">&larr; Back to Recommended Places</a>
          </div>
        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="assets/img/recommended/zwegabin.jpg" alt="">
              </div>

              <!-- Add more slides if needed -->

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-description">
            <h2>About Zwegabin</h2>
            <p>
            Zwegabin is a notable mountain in Myanmar, located near Hpa-An in the southeastern part of the country. It stands at approximately 723 meters high and is renowned for its scenic beauty and religious significance. At its base lies the Kyauk Ka Lat Pagoda, a picturesque temple built atop a limestone pinnacle surrounded by serene lakes. Zwegabin attracts both pilgrims and tourists seeking tranquility amidst stunning natural landscapes, offering breathtaking views and a peaceful retreat in Myanmar's Karen State.
            </p>
          </div>
          
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<?php
include 'layouts/footer.php';
?>
