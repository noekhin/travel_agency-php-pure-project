<?php
include_once 'layouts/header.php';

// Associative array for images and their corresponding content
$sections = [
    [
        "image" => "assets/img/recommended/chin1.jpg",
        "title" => "Day 1 - Flight Yangon - Nyaung (Bagan), Bagan: Full Day Temple Tour",
        "content" => "Transfer to Yangon Airport early in the morning to catch the flight to Nyaung U (Bagan). Upon arrival at your hotel in Bagan, your temple tour starts. Stroll around the colourful local market before visiting the most significant temples and pagodas around Bagan. The Shwezigon Pagoda, which was built by King Anawratha in the early 11th century, enshrines many sacred Buddhist relics. ",
        "activities" => "Flight & Sightseeing",
        "accommodation" => "Hotel in Bagan",
        "meals" => ""
    ],
    [
        "image" => "assets/img/recommended/chin2.jpg",
        "title" => "Day 2 - Bagan - Kanpalat",
        "content" => "In the morning you will be picked up at your hotel in Bagan to transfer to Kanpalat by jeep. On the way along the Ayeyarwady River, you visit the morning market in Chauk. Afterwards, stop by other villages such as Seikphyu and Kazunma in Myanmar's second largest Divison Magway. After a local lunch, head to Kanpalat, home to the Chin people.",
        "activities" => "Visit villages",
        "accommodation" => "Hotel in Kanpalat",
        "meals" => "Breakfast & Lunch"
    ],
    [
        "image" => "assets/img/recommended/chin3.jpg",
        "title" => "Day 3 - Kanpalat: Trekking Mt.Victoria - Aye village",
        "content" => "After breakfast in Kanpalat you will reach the base camp of Mt. Victoria after approximately 10 miles drive by jeep. While hiking to the top of Myanmar's third highest mountain, you will find a rich variety of flora and fauna. Furthermore, the area is known for its endemic and migratory birds.",
        "activities" => "Trekking & Visit villages",
        "accommodation" => " Aye Village",
        "meals" => "Breakfast, Lunch & Dinner"
    ],
    [
        "image" => "assets/img/recommended/chin4.jpg",
        "title" => "Day 4 - Aye village - Kyardo village - Lote Pe village - Mindat",
        "content" => "From Aye village, you will be transferred to Kyardo village, where you trek stream down for about two hours. Reaching the village, you will walk around and experience the local life. The village people still wear traditional costumes. Get to know about their belief of Animism, Sharman and Nat. Meet a fortune teller and experience a traditional Sharman and Chin dance.",
        "activities" => "Visit villages",
        "accommodation" => "Hotel in Mindat",
        "meals" => " Breakfast, Lunch & Dinner"
    ],
    [
        "image" => "assets/img/recommended/chin5.jpg",
        "title" => "Day 5 - Mindat - Ponetaung Ponenyar - Bagan",
        "content" => "Visit the local morning market in Mindat after breakfast. On the way back to Bagan, you can stop to see the beautiful pine forest hills. During another short stop at the top of the Ponetaung Ponenyar mountain range, you can also visit stupas and Nat shrines build on the summit. For sunset, you will be back in Bagan.",
        "activities" => "Transfer",
        "accommodation" => " Hotel in Bagan",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/chin6.jpg",
        "title" => "Day 6 - Flight Nyaung U - Yangon",
        "content" => "After breakfast, transfer to Nyaung U Airport to catch the flight back to Yangon.",
        "activities" => "Flight",
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
                <h4 class="mb-0">Mountains Of Chin State: Trekking Mt. Victoria & Chin Villages</h4>
                <ol class="d-flex list-unstyled mb-0">
                    <li class="ms-3"><a href="index.php">Home</a></li>
                    <li class="ms-3"><a href="packagetour.php">Package Tour</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-start mt-2">
                <p class="mb-0 me-5">Departure: Yangon</p>
                <p class="mb-0 me-5">Duration: 6 days</p>
                <p class="mb-0">Cost: $756</p>
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
