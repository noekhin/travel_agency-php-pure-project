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
                <img src="assets/img/recommended/ananda.avif" alt="">
              </div>

              <!-- Add more slides if needed -->

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-description">
            <h2>About Ananda Pagoda</h2>
            <p>
            Ananda Pagoda, located in Bagan, Myanmar, is one of the most revered and iconic Buddhist temples in the country. Built in the 12th century during the reign of King Kyanzittha, Ananda Pagoda is celebrated for its architectural grandeur and historical significance. The pagoda is renowned for its symmetrical design and gilded stupas, housing four large standing Buddha statues, each facing a cardinal direction. These statues, made of solid teak and adorned with gold leaf, represent the Buddha at different stages of his life. Pilgrims and visitors flock to Ananda Pagoda not only for its religious importance but also to admire its ancient artwork and serene atmosphere, offering a glimpse into Myanmar's rich cultural and religious heritage.
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
