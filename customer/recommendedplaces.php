<?php
include_once 'layouts/header.php';
?>
<main id="main">

  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Recommended Palaces</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Recommended Palaces</li>
        </ol>
      </div>
    </div>
  </section>

  <section class="portfolio">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">Mountains</li>
            <li data-filter=".filter-card">Beaches</li>
            <li data-filter=".filter-web">Pagodas</li>
          </ul>
        </div>
      </div>

      <style>
        .portfolio-item {
          position: relative;
          overflow: hidden;
          margin-bottom: 30px;
        }

        .portfolio-item img {
          width: 100%;
          height: 300px; /* Adjust this height as needed */
          object-fit: cover; /* Maintain aspect ratio */
        }
      </style>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
          <div class="portfolio-item">
            <img src="assets/img/recommended/mountpopa.avif" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Mount Popa</h3>
              <div>
                <a href="assets/img/recommended/mountpopa.avif" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"></a>
                <a href="mountpopa-details.php" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
          <div class="portfolio-item">
            <img src="assets/img/recommended/zwegabin.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Zwegabin</h3>
              <div>
                <a href="assets/img/recommended/zwegabin.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"></a>
                <a href="zwegabin-details.php" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
          <div class="portfolio-item">
            <img src="assets/img/recommended/kalaw.avif" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Kalaw</h3>
              <div>
                <a href="assets/img/recommended/kalaw.avif" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"></a>
                <a href="kalaw-details.php" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-card">
          <div class="portfolio-item">
            <img src="assets/img/recommended/ngapali.avif" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Ngapali</h3>
              <div>
                <a href="assets/img/recommended/ngapali.avif" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"></a>
                <a href="ngapali-details.php" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-card">
          <div class="portfolio-item">
            <img src="assets/img/recommended/ngwesaung.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Ngwe Saung</h3>
              <div>
                <a href="assets/img/recommended/ngwesaung.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"></a>
                <a href="ngwesaung-details.php" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-card">
          <div class="portfolio-item">
            <img src="assets/img/recommended/maungmagan.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Maung Ma Gan</h3>
              <div>
                <a href="assets/img/recommended/maungmagan.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"></a>
                <a href="maungmagan-details.php" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-web">
          <div class="portfolio-item">
            <img src="assets/img/recommended/ananda.avif" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Ananda Pagoda</h3>
              <div>
                <a href="assets/img/recommended/ananda.avif" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"></a>
                <a href="anandapagoda-details.php" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-web">
          <div class="portfolio-item">
            <img src="assets/img/recommended/kuthodaw.avif" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Kuthodaw Pagoda</h3>
              <div>
                <a href="assets/img/recommended/kuthodaw.avif" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"></a>
                <a href="kuthodawpagoda-details.php" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-web">
          <div class="portfolio-item">
            <img src="assets/img/recommended/bodhi.avif" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Bodhi Tataung</h3>
              <div>
                <a href="assets/img/recommended/bodhi.avif" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 1"></a>
                <a href="bodhitataung-details.php" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Section -->

</main><!-- End #main -->

<?php
include 'layouts/footer.php';
?>
