<?php

// Start-up script
require_once __DIR__ . '/../init.php';

global $db;

// Get all user inputs
$name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_REQUEST['email'], FILTER_SANITIZE_STRING);
$password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);
$password_confirmation = filter_var($_REQUEST['password_confirmation'], FILTER_SANITIZE_STRING);

// If password not match
if ($password !== $password_confirmation) {
    redirect(APP_URL.'/pages/register.php','Kata laluan tidak sama!', 'danger');
}

// Hash user password
$password = passwordHash($password);

try {
    // Save to database
    $db->insert(array(
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'role' => 'user'
    ))->into('users');

    redirect(APP_URL.'/index.php','Pendaftaran selesai!');
} catch (Exception $e) {
    die($e->getMessage());
}
