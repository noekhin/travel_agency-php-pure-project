<?php
include_once 'layouts/header.php';
include_once './includes/db.php';
include_once './model/Photo.php';
include_once './controller/photoController.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$controller = new PhotoController();
$data = $controller->getPhoto($id);

$package = $data['package'] ?? null;
$photos = $data['photos'] ?? [];
?>

<main id="main">
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><?php echo htmlspecialchars($package['name']); ?></h4>
                <ol class="d-flex list-unstyled mb-0">
                    <li class="ms-3"><a href="index.php">Home</a></li>
                    <li class="ms-3"><a href="packagetour.php">Package Tour</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-start mt-2">
                <p class="mb-0 me-5">Departure: <?php echo htmlspecialchars($package['departure']); ?></p>
                <p class="mb-0 me-5">Duration: <?php echo htmlspecialchars($package['duration']); ?></p>
                <p class="mb-0">Cost: $<?php echo htmlspecialchars($package['cost']); ?></p>
            </div>
        </div>
    </section>
    <div class="container mt-4 mb-4">
        <div class="text-end">
            <a href="bookingForm.php?package_id=<?php echo $package['id']; ?>" class="btn btn-primary">Book Now</a>
        </div>
    </div>
    <?php foreach ($photos as $photo) : ?>
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-8">
                        <?php
                        $photoPath = $photo['photo'];
                        if (filter_var($photoPath, FILTER_VALIDATE_URL)) {
                            $photoSrc = $photoPath;
                        } else {
                            $photoSrc = '.././upload_image' . htmlspecialchars($photoPath);
                        }
                        ?>
                        <img src="<?php echo $photoSrc; ?>" alt="Package Photo" class="img-fluid">
                    </div>
                    <div class="col-lg-4">
                        <div class="portfolio-description">
                            <h5><?php echo htmlspecialchars($photo['title']); ?></h5><br>
                            <p><?php echo htmlspecialchars($photo['content']); ?></p><br>
                            <span><b>Activities:</b> <?php echo htmlspecialchars($photo['activities']); ?></span><br><br>
                            <?php if (!empty($photo['accommodation_name'])) : ?>
                                <span><b>Accommodation:</b> <?php echo htmlspecialchars($photo['accommodation_name']); ?></span>
                            <?php endif; ?><br><br>
                            <?php if (!empty($photo['meals'])) : ?>
                                <span><b>Meals:</b> <?php echo htmlspecialchars($photo['meals']); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Portfolio Details Section -->
    <?php endforeach; ?>
</main>

<?php
include 'layouts/footer.php';
?>