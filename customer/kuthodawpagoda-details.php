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
                                <img src="assets/img/recommended/kuthodaw.avif" alt="">
                            </div>

                            <!-- Add more slides if needed -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-description">
                        <h2>About Kuthodaw Pagoda</h2>
                        <p>

                            Kuthodaw Pagoda, located in Mandalay, Myanmar, is renowned for housing the "World's Largest Book." Built in the 19th century during the reign of King Mindon Min, the pagoda is surrounded by 729 marble slabs inscribed with Buddhist scriptures. Each slab is housed in its own small stupa or shrine, creating a vast open-air library spread throughout the pagoda grounds. This unique architectural feature makes Kuthodaw Pagoda a significant religious and cultural landmark, attracting visitors not only for its spiritual importance but also for its historical and artistic value. The pagoda complex, with its peaceful ambiance and intricate craftsmanship, offers a profound insight into Myanmar's Buddhist heritage and architectural brilliance.
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