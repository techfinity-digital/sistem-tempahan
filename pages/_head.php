<?php
// Start-up script
//require_once APP_PATH.'/init.php';
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
<?php require APP_PATH.'/pages/_menu.php'; ?>