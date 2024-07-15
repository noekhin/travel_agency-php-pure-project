<?php
include_once 'layouts/header.php';
include_once 'includes/db.php';

// Associative array for images and their corresponding content
$sections = [
    [
        "image" => "assets/img/recommended/highlight1.jpg",
        "title" => "Day 1 - Arrival Yangon",
        "content" => "Upon arrival at Yangon International Airport, you will be picked up by Golden Express Tours representatives and transfer to your hotel. The rest of the day is at your leisure.",
        "activities" => "Airport Transfer",
        "accommodation" => "Clover Hotel (Wingabar Rd.) in Yangon or similar",
        "meals" => ""
    ],
    [
        "image" => "assets/img/recommended/highlight2.jpg",
        "title" => "Day 2 - Yangon: Excursion Golden Rock",
        "content" => "Your excursion starts in the morning time. During your scenic drive to Kyaiktiyo, you gain insight into the life of people living in the countryside. We will depart straight to Kyaiktiyo (Kinpun base camp). At the base camp, you join an adventurous ride in a public open truck to reach the Golden Rock.",
        "activities" => "Sightseeing",
        "accommodation" => "Clover Hotel (Wingabar Rd.) in Yangon or similar",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/highlight11.jpg",
        "title" => "Day 3 - Yangon: Half Day Sightseeing Tour, Bus Yangon - Nyaung U (Bagan)",
        "content" => "On this half day city tour, you visit the spectacular sights in Yangon. Your first stop is the Chauk Htat Gyi Buddha Temple - one of the most revered reclining Buddha images in Myanmar. Visit the Shwedagon Pagoda afterwards, not only known as Myanmar's most precious sight but also the most sacred pagoda in the whole country. Upon arrival in Yangon's bustling downtown area, amble past Bogyoke (Scott) Market.",
        "activities" => "Sightseeing & Bus Transfer",
        "accommodation" => "Overnight on Bus",
        "meals" => ""
    ],
    [
        "image" => "assets/img/recommended/highlight3.jpg",
        "title" => "Day 4 - Bagan: Full Day Sightseeing Tour",
        "content" => "Upon arrival in Bagan, your temple tour starts. Stroll around the colourful local market before visiting the most significant temples and pagodas around Bagan. The Shwezigon Pagoda, which was built by King Anawratha in the early 11th century, enshrines many sacred Buddhist relics. The oldest original paintings in Bagan can be found at Gubyaukgyi Temple.",
        "activities" => "Sightseeing",
        "accommodation" => "Bagan Star Hotel in Bagan or similar",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/highlight4.jpg",
        "title" => "Day 5 - Bagan: Excursion Salay & Mt. Popa",
        "content" => "In the morning you get picked up at your hotel to drive to Salay, known for its cultural heritage. See the exceptional woodcarvings at Yoke Sone Monastery first, which was built in 1882 by King Thipaw. Afterwards, visit the 150-year old teak monastery Sarsana Yaungchi, built by King Mindon.",
        "activities" => "Sightseeing",
        "accommodation" => "Bagan Star Hotel in Bagan or similar",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/highlight5.jpg",
        "title" => "Day 6 - Bus Nyaung U (Bagan) - Mandalay",
        "content" => "After breakfast, transfer to the bus station to catch the bus to Mandalay. Upon arrival in Mandalay, transfer to your hotel and the rest of the day is at your leisure.",
        "activities" => "Bus Transfer",
        "accommodation" => "Apex Hotel in Mandalay or similar",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/highlight6.jpg",
        "title" => "Day 7 - Mandalay: Excursion Amarapura, Innwa & Sagaing",
        "content" => "You will get picked up at your hotel after breakfast to drive to Amarapura. There you will visit Mahagandayon, a well-known Buddhist Monastery, where over a thousand monks live and study. One of Myanmar's most popular spots to take photos at is the U-Bein Bridge, the longest wooden teak bridge in the world.",
        "activities" => "Sightseeing",
        "accommodation" => "Apex Hotel in Mandalay or similar",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/highlight7.jpg",
        "title" => "Day 8 - Bus Mandalay - Nyaung Shwe (Inle Lake)",
        "content" => "After breakfast, transfer to the bus station to catch the bus to Nyaung Shwe. Upon arrival in Nyaung Shwe, transfer to your hotel. The rest of the day is at your leisure.",
        "activities" => "Bus Transfer",
        "accommodation" => "Royal Inlay Hotel in Nyaung Shwe or similar",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/highlight8.jpg",
        "title" => "Day 9 - Inle Lake: Full Day Sightseeing Tour",
        "content" => "You get picked up in the morning to join a comfortable boat trip on the beautiful Inle Lake, known for its leg rowers, floating villages and gardens. Today you will gain insight into the everyday life of the Intha, who mostly live in wooden houses built on tall stilts, and learn about their methods of fishing and gardening.",
        "activities" => "Sightseeing",
        "accommodation" => "Royal Inlay Hotel in Nyaung Shwe or similar",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/highlight9.jpg",
        "title" => "Day 10 - Inle Lake: Excursion to Kakku & Taunggyi, Bus Nyaung Shwe - Yangon",
        "content" => "Today, you visit Kakku. Located in the heart of Shan state, you find over 2000 stupas at the Kakku Pagoda Complex, which were mostly built in the 16th century. Your guide provides information about the history and legends of the Kakku Pagodas.",
        "activities" => "Sightseeing",
        "accommodation" => "Overnight on Bus",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/highlight10.jpg",
        "title" => "Day 11 - Departure Yangon",
        "content" => "Upon arrival in Yangon, transfer to the airport to catch the flight back home.",
        "activities" => "Airport Transfer",
        "accommodation" => "",
        "meals" => "Breakfast"
    ],
];

?>

<main id="main">

    <!-- ======= Our Portfolio Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Highlights of Myanmar by bus</h4>
                <ol class="d-flex list-unstyled mb-0">
                    <li class="ms-3"><a href="index.php">Home</a></li>
                    <li class="ms-3"><a href="packagetour.php">Package Tour</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-start mt-2">
                <p class="mb-0 me-5">Departure: Yangon</p>
                <p class="mb-0 me-5">Duration: 11 days</p>
                <p class="mb-0">Cost: $875</p>
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
