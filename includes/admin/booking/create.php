<?php
// Start-up script
require_once __DIR__ . '/../../../init.php';

use Illuminate\Database\Capsule\Manager as DB;

try {
    // Save to database
    DB::table('bookings')
        ->insert([
            'vehicle_id' => filter_var($_REQUEST['vehicle_id'], FILTER_SANITIZE_NUMBER_INT),
            'user_id' => filter_var($_REQUEST['user_id'], FILTER_SANITIZE_NUMBER_INT),
            'started_at' => filter_var($_REQUEST['started_at'], FILTER_SANITIZE_STRING),
            'ended_at' => filter_var($_REQUEST['ended_at'], FILTER_SANITIZE_STRING),
            'booking_reason' => filter_var($_REQUEST['booking_reason'], FILTER_SANITIZE_STRING),
            'booking_status' => 'baru',
        ]);

    redirect(APP_URL.'/pages/admin/booking/index.php','Maklumat tempahan telah berjaya direkodkan!');
} catch (Exception $e) {
    die($e->getMessage());
}
