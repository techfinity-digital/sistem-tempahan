<?php
// Require Composer's autoloader.
require __DIR__.'/vendor/autoload.php';

// System configuration
require __DIR__.'/config.php';

// Function declarations
require __DIR__.'/includes/functions.php';

// Start the session
session_start();

// Database object
global $db;

// Create new database object
$db = db();