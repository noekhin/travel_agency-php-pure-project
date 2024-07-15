<?php
include_once 'layouts/header.php';

// Associative array for images and their corresponding content
$sections = [
    [
        "image" => "assets/img/recommended/g1.jpg",
        "title" => "Day 1 - Mandalay - Pyin Oo Lwin",
        "content" => "After picking you up at your hotel in Mandalay, you drive to the former British hill station of
        Pyin Oo Lwin, a town not only known for its charming colonial-style buildings, but also for its rich and diverse collection of flora at National Kandawgyi Botanical Gardens. After a short city tour by horse-drawn carriage, continue to see the Peik Chin Myaung Cave, located behind the gorgeous waterfall right by the entrance. ",
        "activities" => "Transfer & Sightseeing",
        "accommodation" => "Hotel in Pyin Oo Lwin",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/g2.jpg",
        "title" => "Day 2 - Pyin Oo Lwin - Hsipaw via Goteik Viaduct",
        "content" => "Today you join an adventurous train ride on Myanmar's highest railway. This train ride belongs to one of the most impressive train routes in whole Asia. You will cross the majestic 700-metre long Goteik Viaduct, which also runs over a 100-metre deep gorge.",
        "activities" => "Sightseeing",
        "accommodation" => "Hotel in Hsipaw",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/g3.jpg",
        "title" => "Day 3 - Hsipaw",
        "content" => "After breakfast, we pick you up to go to the Shan Palace, housing a huge historic collection of old historic photos. Afterwards, you visit the villages nearby around Bawyo Paya. Myauk Myo, the oldest neighbourhood in Hsipaw, has a quite enjoyable atmosphere.",
        "activities" => "Sightseeing",
        "accommodation" => " Hotel in Hsipaw",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/g4.jpg",
        "title" => "Day 4 - Hsipaw - Mandalay",
        "content" => "After breakfast, you get picked up and transfer to Mandalay. Upon arrival, the rest of the day is at your leisure.",
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
                <h4 class="mb-0">Goteik Viaduct Train Journey</h4>
                <ol class="d-flex list-unstyled mb-0">
                    <li class="ms-3"><a href="index.php">Home</a></li>
                    <li class="ms-3"><a href="packagetour.php">Package Tour</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-start mt-2">
                <p class="mb-0 me-5">Departure: Mandalay</p>
                <p class="mb-0 me-5">Duration: 4 days</p>
                <p class="mb-0">Cost: $559</p>
            </div>
        </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <?php foreach ($sections as $section): ?>
    <section id="portfolio-details" class="portfolio-details">
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

</main><!-- End #main -->
<?php
include 'layouts/footer.php';
?>
