<?php

use Opis\Database\Database;
use Opis\Database\Connection;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;

/**
 * Create new database connection.
 * Refer https://opis.io/database/ for documentation.
 *
 * @return Database
 */
function getDatabase()
{
    try {
        $connection = new Connection(
            DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE,
            DB_USER,
            DB_PASSWORD
        );

        return new Database($connection);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

/**
 * Get base URL
 *
 * @return string
 */
function url($string = null)
{
    if (! is_null($string)) {
        $string = ltrim($string, '/');

        return APP_URL.'/'.$string;
    }

    return APP_URL;
}

/**
 * Check if the user is logged in
 *
 * @return bool
 */
function isLoggedIn()
{
    return isset($_SESSION['user_id']) OR ! empty($_SESSION['user_id']);
}

/**
 * Get information for logged-in user. Return false if not legged-in.
 *
 * @param $field
 * @return false|mixed
 */
function user($field)
{
    switch ($field) {
        case 'name':
            return $_SESSION['user_name'];
        case 'email':
            return $_SESSION['user_email'];
        case 'id':
            return $_SESSION['user_id'];
    }

    return false;
}

/**
 * Hash the password. Refer https://github.com/symfony/password-hasher
 *
 * @param $password
 * @return string
 */
function passwordHash($password)
{
    // Configure different password hashers via the factory
    $factory = new PasswordHasherFactory([
        'common' => ['algorithm' => 'bcrypt'],
    ]);

    // Retrieve the right password hasher by its name
    $passwordHasher = $factory->getPasswordHasher('common');

    // Hash a plain password
    return $passwordHasher->hash($password); // returns a bcrypt hash
}

/**
 * Verify the user password. Refer https://github.com/symfony/password-hasher
 *
 * @param $password
 * @param $hash
 * @return bool
 */
function passwordVerify($password, $hash)
{
    // Configure different password hashers via the factory
    $factory = new PasswordHasherFactory([
        'common' => ['algorithm' => 'bcrypt'],
    ]);

    // Retrieve the right password hasher by its name
    $passwordHasher = $factory->getPasswordHasher('common');

    // Verify that a given plain password matches the hash
    return $passwordHasher->verify($hash, $password);
}

/**
 * Send email to user. Refer https://github.com/symfony/mailer.
 *
 * @param $to
 * @param $from
 * @param $subject
 * @param $message
 * @return void
 * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
 */
function sendEmail($to, $from, $subject, $message)
{
    $dsn = EMAIL_TYPE.'://'.EMAIL_USER.':'.EMAIL_PASSWORD.'@s'.EMAIL_HOST.':'.EMAIL_PORT;

    $transport = Transport::fromDsn($dsn);

    $mailer = new Mailer($transport);

    $email = (new Email())
        ->from($from)
        ->to($to)
        //->cc('cc@example.com')
        //->bcc('bcc@example.com')
        //->replyTo('fabien@example.com')
        //->priority(Email::PRIORITY_HIGH)
        ->subject($subject)
        ->html($message);

    $mailer->send($email);
}