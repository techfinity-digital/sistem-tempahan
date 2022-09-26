<?php
// Start-up script
require __DIR__.'/init.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title><?php echo APP_NAME; ?></title>

    <link href="<?php echo url('/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('/css/navbar-top-fixed.css'); ?>" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <?php echo APP_NAME; ?>
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo APP_URL; ?>">Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo APP_URL; ?>/pages/tempahan.php">Tempahan</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo APP_URL; ?>/pages/login.php">Log Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo APP_URL; ?>/pages/register.php">Daftar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">
    <?php
    global $db;

    $result = $db->from('users')
        ->select()
        ->all();
    ?>
    <div class="bg-light p-5 rounded">
        <h1>Navbar example</h1>
        <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser’s viewport.</p>
        <a class="btn btn-lg btn-primary" href="/docs/5.2/components/navbar/" role="button">View navbar docs &raquo;</a>
    </div>
</main>


<script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


</body>
</html>

