<?php

// Start-up script
require_once __DIR__ . '/../init.php';

global $db;

$email = filter_var($_REQUEST['email'], FILTER_SANITIZE_STRING);
$password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);

// Get user hashed password
$user = $db->from('users')
    ->where('email')->is($email)
    ->select()
    ->first();

if (! $user) {
    redirect(APP_URL.'/pages/login.php','Maklumat pengguna tidak sah!', 'danger');
}

// Compare password
if (! passwordVerify($password, $user->password)) {
    redirect(APP_URL.'/pages/login.php','Kata laluan tidak sama!', 'danger');
}

// Successful login. Set user data to session
$_SESSION['user_id'] = $user->id;
$_SESSION['user_name'] = $user->name;

redirect(APP_URL.'/index.php','Selamat datang!', 'success');
