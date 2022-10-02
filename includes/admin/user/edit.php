<?php
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

// Start-up script
require_once __DIR__ . '/../../../init.php';

global $db;

// Get all user inputs
$name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_REQUEST['email'], FILTER_SANITIZE_STRING);
$password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);
$password_confirmation = filter_var($_REQUEST['password_confirmation'], FILTER_SANITIZE_STRING);
$role = filter_var($_REQUEST['role'], FILTER_SANITIZE_STRING);

$data = [
    'name' => $name,
    'email' => $email,
    'role' => $role,
];

// If password is not empty, we need to hash it
if (! empty($password)) {

    // If password does not match
    if ($password !== $password_confirmation) {
        redirect(APP_URL.'/pages/admin/user/edit.php','Kata laluan tidak sama!', 'danger');
    }

    $data['password'] = passwordHash($password);

    redirect(APP_URL.'/pages/admin/user/create.php','Kata laluan tidak sama!', 'danger');
}

try {
    // Save to database
    $db->update('users')
        ->where('id')
        ->is($_REQUEST['id'])
        ->set($data);

    $loginUrl = url('pages/login.php');

    redirect(APP_URL.'/pages/admin/user/index.php','Kemaskini selesai!');
} catch (Exception $e) {
    die($e->getMessage());
} catch (TransportExceptionInterface $e) {
    die($e->getMessage());
}
