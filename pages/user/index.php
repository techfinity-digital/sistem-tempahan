<?php
// Start-up script
require_once __DIR__.'/../../init.php';
require APP_PATH.'/pages/_head.php';
?>

<h1>User Dashboard</h1>

<pre>
    <?php echo $_SESSION['user_id']; ?>
</pre>
<?php
require APP_PATH.'/pages/_footer.php';
