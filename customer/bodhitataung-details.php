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
                                <img src="assets/img/recommended/bodhi.avif" alt="">
                            </div>

                            <!-- Add more slides if needed -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-description">
                        <h2>About Bodhi Tataung Pagoda</h2>
                        <p>

                        Bodhi Tataung Pagoda, located near Monywa in Myanmar, is distinguished for its colossal standing Buddha statues, including one of the tallest in the world. The pagoda complex is home to a 129-meter-tall standing Buddha statue, which is surrounded by 1,000 smaller statues of Buddha's disciples. The site is also notable for its Bodhi tree garden, featuring a sacred Bodhi tree propagated from the original tree in Bodh Gaya, India, under which the Buddha attained enlightenment. Bodhi Tataung Pagoda is a significant pilgrimage site and cultural landmark, offering visitors a serene and awe-inspiring experience amidst Myanmar's spiritual and natural beauty.
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