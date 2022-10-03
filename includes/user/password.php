<?php
// Start-up script
require_once __DIR__ . '/../../init.php';

use Illuminate\Database\Capsule\Manager as DB;

// Get all user inputs
$currentPassword = filter_var($_REQUEST['current-password'], FILTER_SANITIZE_STRING);
$newPassword = filter_var($_REQUEST['new-password'], FILTER_SANITIZE_STRING);
$repeatNewPassword = filter_var($_REQUEST['repeat-new-password'], FILTER_SANITIZE_STRING);

// Verify old password
$user = DB::table('users')
    ->where('id', $_SESSION['user_id'])
    ->first();

if (! passwordVerify($currentPassword, $user->password)) {
    redirect(APP_URL.'/pages/user/password.php','Kata laluan lama tidak sah!', 'danger');
}

// If password does not match
if ($newPassword !== $repeatNewPassword) {
    redirect(APP_URL.'/pages/user/password.php','Kata laluan baru tidak sama!', 'danger');
}

try {
    // Save to database
    DB::table('users')
        ->where('id', $_SESSION['user_id'])
        ->update([
            'password' => passwordHash($newPassword),
        ]);

    redirect(APP_URL.'/pages/user/password.php','Kata laluan telah ditukar!');
} catch (Exception $e) {
    die($e->getMessage());
}