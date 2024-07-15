<?php
include_once 'layouts/header.php';

// Associative array for images and their corresponding content
$sections = [
    [
        "id" => 1,
        "image" => "assets/img/recommended/M1.jpg",
        "title" => "Day 1 - Mandalay - Bagan",
        "content" => "After breakfast, you get picked up to transfer to Bagan. Upon arrival in Bagan, the rest of the day is at your leisure. ",
        "activities" => "Transfer",
        "accommodation" => "Hotel in Bagan",
        "meals" => "Breakfast"
    ],
    [
        "id" => 2,
        "image" => "assets/img/recommended/M2.jpg",
        "title" => "Day 2 - Bagan: Full Day Temple Tour",
        "content" => "Your temple tour by E-Bike starts in the morning time. Stroll around the colourful local market before visiting the most significant temples and pagodas around Bagan. The Shwezigon Pagoda, which was built by King Anawratha in the early 11th century, enshrines many sacred Buddhist relics.",
        "activities" => "Transfer",
        "accommodation" => "Hotel in Bagan",
        "meals" => "Breakfast"
    ],
    [
        "id" => 3,
        "image" => "assets/img/recommended/M3.jpg",
        "title" => "Day 3 - Bagan - Mt. Popa: Trekking",
        "content" => "In the morning you get picked up for your excursion to Mt. Popa. Upon arrival, you start the hike to Taung Ma Gyi, the so-called Mother Hill, for about 4 hours. Reaching Taung Ma Gyi, you have a beautiful view of the natural surroundings and Taunt Kalat, the pedestal hill (Mt.Popa).",
        "activities" => "Trekking & Sightseeing",
        "accommodation" => " Hotel near Mt. Popa",
        "meals" => "Breakfast"
    ],
    [
        "id" => 4,
        "image" => "assets/img/recommended/M4.jpg",
        "title" => "Day 4 - Mt. Popa - Bagan",
        "content" => "After breakfast, we provide a private transfer back to Bagan. The rest of the day is at your leisure.",
        "activities" => "Transfer",
        "accommodation" => "",
        "meals" => "Breakfast"
    ]
];
?>

<main id="main">

    <!-- ======= Our Portfolio Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0" id="bagan">Bagan Sightseeing & Mt. Popa Trekking</h4>
                <ol class="d-flex list-unstyled mb-0">
                    <li class="ms-3"><a href="index.php">Home</a></li>
                    <li class="ms-3"><a href="packagetour.php">Package Tour</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-start mt-2">
                <p class="mb-0 me-5">Departure: Mandalay</p>
                <p class="mb-0 me-5">Duration: 4 days</p>
                <p class="mb-0">Cost: $459</p>
            </div>
        </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <?php foreach ($sections as $section): ?>
    <section id="portfolio-details" class="portfolio-details mt-4">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <img src="<?php echo $section['image']; ?>" alt="">
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-description">
                        <h5><?php echo $section['title']; ?></h5><br>
                        <p><?php echo $section['content']; ?></p><br>
                        <span><b>Activities:</b> <?php echo $section['activities']; ?></span><br><br>
                        <?php if (!empty($section['accommodation'])): ?>
                            <span><b>Accommodation:</b> <?php echo $section['accommodation']; ?></span>
                        <?php endif; ?><br><br>
                        <?php if (!empty($section['meals'])): ?>
                            <span><b>Meals:</b> <?php echo $section['meals']; ?></span>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->
    <?php endforeach; ?>

    <!-- Booking Button Section -->
    <div class="container mt-5">
        <div class="d-flex justify-content-end">
            <form action="booking_form.php" method="post">
               
                <button type="submit" class="btn btn-primary ms-3">Book Now</button>
            </form>
        </div>
    </div><!-- End Booking Button Section -->

    <!-- Spacer to push the footer down -->
    <div class="mt-5"></div>

</main><!-- End #main -->
<?php
include 'layouts/footer.php';
?>
