<?php

use Medoo\Medoo;

/**
 * Create new database connection.
 * Refer https://medoo.in/ for documentation.
 *
 * @return Medoo
 */
function db()
{
    return new Medoo([
        'type' => DB_TYPE,
        'host' => DB_HOST,
        'port' => DB_PORT,
        'database' => DB_DATABASE,
        'username' => DB_USER,
        'password' => DB_PASSWORD,
    ]);
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