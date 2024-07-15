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
                <img src="assets/img/recommended/maungmagan.jpg" alt="">
              </div>

              <!-- Add more slides if needed -->

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-description">
            <h2>About Maung Ma Gan</h2>
            <p>
            Maung Ma Gan is a picturesque beach destination located on Myanmar's southern coast, renowned for its tranquil ambiance and natural beauty. Nestled between the Andaman Sea and lush greenery, Maung Ma Gan offers visitors pristine sandy beaches and clear blue waters ideal for swimming and relaxation. The area is known for its serene environment, making it a perfect getaway for those seeking peace and quiet away from more touristy spots. Maung Ma Gan also provides opportunities to explore local culture through interactions with friendly villagers and sampling fresh seafood, offering a unique and tranquil coastal experience in Myanmar.
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
