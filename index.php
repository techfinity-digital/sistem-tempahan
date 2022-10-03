<?php
// Start-up script
require_once __DIR__.'/init.php';
require APP_PATH.'/pages/_head.php';
?>

<main class="container">
    <div class="bg-light p-5 rounded">
        <h1><?php echo APP_NAME; ?></h1>
        <p class="lead">
            Anda boleh membuat tempahan kenderaan sewaan dengan cepat dan mudah.
        </p>
        <a class="btn btn-lg btn-primary" href="<?php echo APP_URL; ?>/pages/booking.php" role="button">Buat Tempahan</a>
    </div>
</main>

<?php require APP_PATH.'/pages/_footer.php'; ?>

