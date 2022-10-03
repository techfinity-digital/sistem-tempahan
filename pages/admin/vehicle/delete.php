<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

abortIfNotAdmin();

use Illuminate\Database\Capsule\Manager as DB;

$vehicle = DB::table('vehicles')
    ->where('id', $_REQUEST['id'])
    ->first();

$vehicle->delete();

redirect(APP_URL.'/pages/admin/vehicle/index.php','Maklumat kenderaan telah dipadam!');
