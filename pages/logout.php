<?php

// Start-up script
require_once __DIR__ . '/../init.php';

// Clear all sessions
session_destroy();

redirect(APP_URL.'/index.php','Terima kasih!', 'success');