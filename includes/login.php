<?php

// Start-up script
require_once __DIR__ . '/../init.php';

use Illuminate\Database\Capsule\Manager as DB;

$email = filter_var($_REQUEST['email'], FILTER_SANITIZE_STRING);
$password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);

// Get user hashed password
$user = DB::table('users')
    ->where('email', $email)
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
$_SESSION['user_role'] = $user->role;

if ($user->role == 'admin') {
    redirect(APP_URL . '/pages/admin/index.php', 'Selamat datang!', 'success');
} else {
    redirect(APP_URL . '/pages/user/index.php', 'Selamat datang!', 'success');
}
