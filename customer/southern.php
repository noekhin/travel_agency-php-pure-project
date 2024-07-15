<?php
include_once 'layouts/header.php';

// Associative array for images and their corresponding content
$sections = [
    [
        "image" => "assets/img/recommended/s1.jpg",
        "title" => "Day 1 - Yangon - Bago - Kyaikhtiyo",
        "content" => "You will be picked up at your hotel in Yangon to drive to Kyaikhtiyo (Golden Rock). During your scenic drive to Kyaiktiyo, you will gain insight into the life of people living in the countryside. On the way you will stop in Bago, housing lots of historical sites worth visiting such as the Shwemawdaw Pagoda, only one spire taller than the Shwedagon Pagoda in Yangon. ",
        "activities" => "Sightseeing & Transfer",
        "accommodation" => "Hotel in Kyaikhtiyo",
        "meals" => ""
    ],
    [
        "image" => "assets/img/recommended/s2.jpg",
        "title" => "Day 2 - Kyaikhtiyo: Excursion Golden Rock, Transfer to Hpa-An",
        "content" => "After breakfast, transfer to Kinpun base camp. At the base camp, you will join an adventurous ride in a public open truck, as this is the only way to reach the Golden Rock.",
        "activities" => "Sightseeing & Transfer",
        "accommodation" => "Hotel in Hpa-An",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/s3.jpg",
        "title" => "Day 3 - Hpa-An",
        "content" => "The picturesque capital city of Kayin state captivates due to its fascinating landscape and verdurous rice fields. First, you visit the Kaw Ka Thaung Cave, housing a lot of Buddha statues of different sizes and shapes. Afterwards, head to the huge Saddan Cave, home to millions of bats. Make sure to bring a torchlight with you so you can see the fascinating carvings.",
        "activities" => "Sightseeing",
        "accommodation" => " Hotel in Hpa-An",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/s4.jpg",
        "title" => "Day 4 - Boat Hpa-An - Mawlamyine",
        "content" => "In the morning time, the journey continues to Mawlamyine by boat. A must-see place around Mawlamyine is the world's largest reclining Buddha Win Sein Taw Ya. Other sights to be found in the area include the cave of Kha-Yon, which used to be a Buddhist temple, and the Kyaik Thanlan-Pagoda.",
        "activities" => "Sightseeing",
        "accommodation" => "Hotel in Mawlamyine",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/s5.jpg",
        "title" => "Day 5 - Mawlamyine - Dawei",
        "content" => "After breakfast you will be transferred to Dawei, arriving in the late afternoon.",
        "activities" => "Transfer",
        "accommodation" => "Hotel in Dawei",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/s6.jpeg",
        "title" => "Day 6 - Dawei",
        "content" => "Today is at your leisure. Enjoy this day at the pristine beach of Maungmagan. Located in a majestic setting surrounded by green mountains and clear water, relaxation is guaranteed.",
        "activities" => "Bus Transfer",
        "accommodation" => "Apex Hotel in Mandalay or similar",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/s7.jpg",
        "title" => "Day 7 - Flight Dawei - Yangon",
        "content" => "Be fond of the salty air and enjoy the last couple of hours before leaving the untouched paradise of Dawei to fly back to Yangon.",
        "activities" => "  Flight",
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
                <h4 class="mb-0">Southern Myanmar (Beach Extension)</h4>
                <ol class="d-flex list-unstyled mb-0">
                    <li class="ms-3"><a href="index.php">Home</a></li>
                    <li class="ms-3"><a href="packagetour.php">Package Tour</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-start mt-2">
                <p class="mb-0 me-5">Departure: Yangon</p>
                <p class="mb-0 me-5">Duration: 7 days</p>
                <p class="mb-0">Cost: $759</p>
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
