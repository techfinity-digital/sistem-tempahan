<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

abortIfNotAdmin();

use Illuminate\Database\Capsule\Manager as DB;

$booking = DB::table('bookings')
    ->where('id', $_REQUEST['id'])
    ->first();

$booking->booking_status = 'batal';
$booking->save();

redirect(APP_URL.'/pages/admin/booking/index.php','Tempahan telah dibatalkan!');