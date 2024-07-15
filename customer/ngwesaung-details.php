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
                <img src="assets/img/recommended/ngwesaung.jpg" alt="">
              </div>

              <!-- Add more slides if needed -->

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-description">
            <h2>About Ngwesaung</h2>
            <p>
            Ngwesaung is a beautiful beach destination situated on the western coast of Myanmar, known for its pristine white sands and crystal-clear waters. It stretches along the Bay of Bengal, offering stunning sunsets and a serene atmosphere perfect for relaxation and water activities. Unlike more developed beach resorts, Ngwesaung maintains a quiet and peaceful ambiance, making it an ideal retreat for those seeking tranquility amidst natural beauty. Visitors can enjoy swimming, sunbathing, and exploring nearby fishing villages, experiencing the authentic charm of Myanmar's coastal life while basking in the scenic splendor of Ngwesaung.
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
