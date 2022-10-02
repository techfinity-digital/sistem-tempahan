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

// If password does not match
if ($password !== $password_confirmation) {
    redirect(APP_URL.'/pages/admin/user/create.php','Kata laluan tidak sama!', 'danger');
}

// Hold raw password
$rawPassword = $password;

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

    $loginUrl = url('pages/login.php');

    $message = "
    Pendaftaran akaun anda telah selesai. Sila log masuk ke dalam sistem menggunakan pautan di bawah:<br>
    <br>
    <a href=\"{$loginUrl}\" style=\"padding: 3px 10px; background-color: blue; color: white;\">
        Log Masuk
    </a>
    <br><br>
    Kata laluan anda ialah: <strong>{$rawPassword}</strong> 
    <br><br>
    <em>Sila tukar kata laluan anda untuk tujuan keselamatan.</em>
    <br><br>
    Terima kasih.
    ";

    sendEmail($email, 'admin@sistem-tempahan.com.my', 'Pendaftaran Akaun', $message);

    redirect(APP_URL.'/pages/admin/user/index.php','Pendaftaran selesai!');
} catch (Exception $e) {
    die($e->getMessage());
} catch (TransportExceptionInterface $e) {
    die($e->getMessage());
}
