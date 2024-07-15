<?php
include_once 'layouts/header.php';

// Associative array for images and their corresponding content
$sections = [
    [
        "image" => "assets/img/recommended/trekking1.jpg",
        "title" => "Day 1 - Flight Yangon - Heho, Transfer to Kalaw",
        "content" => "After check out at your hotel in Yangon, you will be picked up to catch the flight to Heho. Upon arrival in Heho, we provide a private transfer to your hotel in Kalaw. On the way, you stop at a farming village of Pa-O and Shan people.",
        "activities" => "Flight & Sightseeing",
        "accommodation" => "Hotel in Kalaw",
        "meals" => ""
    ],
    [
        "image" => "assets/img/recommended/trekking2.jpg",
        "title" => "Day 2 - Trekking",
        "content" => "After breakfast, transfer to the trekking point Myin Ka. Your trekking tour from Myin Ka to Say Ti Kone village lasts approximately three hours. Lunch will be served at the Oo Min monastery. Afterwards, continue the trekking tour to Naung Ye (Paoh village) for about four hours. On the way, you can enjoy a fantastic endless view.",
        "activities" => "Trekking",
        "accommodation" => "Monastery",
        "meals" => "Breakfast, Lunch & Dinner"
    ],
    [
        "image" => "assets/img/recommended/trekking3.jpg",
        "title" => "Day 3 - Trekking",
        "content" => "After a traditional Burmese breakfast at the monastery, you will walk around Ye Poak, Nan Khone and Whla Sin (Danu villages) for approximately four hours. Continue to another Danu village, Pwe Pyat, where lunch will be served in a local's house.",
        "activities" => "Trekking",
        "accommodation" => " Monastery",
        "meals" => "Breakfast, Lunch & Dinner"
    ],
    [
        "image" => "assets/img/recommended/trekking4.jpg",
        "title" => "Day 4 - Trekking, Arrival Pindaya",
        "content" => "After breakfast, walk for approximately two hours through beautiful landscapes and small villages to Yasakyi, a Palaung hill tribe village. The Palaung people belong to the earliest inhabitants in Myanmar and have kept to their tradition living with several families in long-houses, cultivating cash crops for Burmese cheroot cigars.",
        "activities" => "Trekking",
        "accommodation" => "Hotel in Pindaya",
        "meals" => "Breakfast & Lunch"
    ],
    [
        "image" => "assets/img/recommended/trekking5.jpg",
        "title" => "Day 5 - Pindaya - Pindaya Caves - Nyaung Shwe (Inle-Lake)",
        "content" => "After breakfast at your hotel visit the Pindaya Caves - a unique site housing thousands of Buddha images placed there by pilgrims over the last centuries. Afterwards, we will provide a private transfer to your hotel in Nyaung Shwe (Inle Lake). The afternoon is at your leisure.",
        "activities" => "Sightseeing",
        "accommodation" => "Hotel in Nyaung Shwe",
        "meals" => "Breakfast"
    ],
    [
        "image" => "assets/img/recommended/trekking6.jpg",
        "title" => "Day 6 - Nyaung Shwe: Boat Trip Inle Lake & Indein, Flight Heho - Yangon",
        "content" => "You get picked up in the morning to join a comfortable boat trip on the beautiful Inle Lake, known for its leg rowers, floating villages and gardens. Today you will gain insight into the everyday life of the Intha, who mostly live in wooden houses built on tall stilts, and learn about their methods of fishing and gardening.",
        "activities" => "Sightseeing & Flight",
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
                <h4 class="mb-0">Myanmar Soft Trekking Tour</h4>
                <ol class="d-flex list-unstyled mb-0">
                    <li class="ms-3"><a href="index.php">Home</a></li>
                    <li class="ms-3"><a href="packagetour.php">Package Tour</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-start mt-2">
                <p class="mb-0 me-5">Departure: Yangon</p>
                <p class="mb-0 me-5">Duration: 6 days</p>
                <p class="mb-0">Cost: $710</p>
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
