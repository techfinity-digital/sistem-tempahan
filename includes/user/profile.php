<?php
// Start-up script
require_once __DIR__ . '/../../init.php';

use Illuminate\Database\Capsule\Manager as DB;

// Get all user inputs
$name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_REQUEST['email'], FILTER_SANITIZE_STRING);

$data = [
    'name' => $name,
    'email' => $email,
];

try {
    // Save to database
    DB::table('users')
        ->where('id', $_REQUEST['id'])
        ->update([
            'name' => $name,
            'email' => $email,
        ]);

    redirect(APP_URL.'/pages/user/profile.php','Kemaskini selesai!');
} catch (Exception $e) {
    die($e->getMessage());
}
