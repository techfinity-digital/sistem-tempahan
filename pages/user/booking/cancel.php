<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

use Illuminate\Database\Capsule\Manager as DB;

$booking = DB::table('bookings')
    ->where('id', $_REQUEST['id'])
    ->first();

if ($booking->booking_status != 'baru') {
    redirect(APP_URL.'/pages/user/booking/index.php','Anda tidak boleh mengubah tempahan ini!', 'danger');
}

if ($booking->user_id != $_SESSION['user_id']) {
    redirect(APP_URL.'/pages/user/booking/index.php','Anda hanya boleh membatalkan tempahan sendiri!', 'danger');
}

DB::table('bookings')
    ->where('id', $_REQUEST['id'])
    ->update([
        'booking_status' => 'batal',
    ]);

redirect(APP_URL.'/pages/user/booking/index.php','Tempahan telah dibatalkan!');