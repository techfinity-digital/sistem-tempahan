<?php

use Opis\Database\Database;
use Opis\Database\Connection;

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
        ob_start();
        include APP_PATH.'/pages/error.php';
        $return = ob_get_contents();
        ob_clean();

        echo $return;
        die;
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
    return isset($_SESSION['login_id']) OR ! empty($_SESSION['login_id']);
}