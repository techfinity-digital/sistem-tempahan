<?php
// Require Composer's autoloader.
require __DIR__.'/vendor/autoload.php';

// System configuration
require __DIR__.'/config.php';

// Function declarations
require __DIR__.'/functions.php';

// Full path to application folder
const APP_PATH = __DIR__;

// Start the session
session_start();

// Create new database object
getDatabase();