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
                <img src="assets/img/recommended/mountpopa.avif" alt="">
              </div>

              <!-- Add more slides if needed -->

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-description">
            <h2>About Mount Popa</h2>
            <p>
              Mount Popa, located southeast of Bagan in Myanmar, is a revered pilgrimage site known for its spiritual significance and stunning views. Rising 1,518 meters above sea level, it is crowned by the Popa Taungkalat monastery atop a volcanic plug. Pilgrims ascend over 700 steps to pay homage to the nat spirits, central to Myanmar's folk religion. Beyond its religious importance, Mount Popa's picturesque setting amid lush landscapes attracts tourists seeking cultural immersion and natural beauty, offering a unique experience blending spirituality with panoramic vistas.
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
