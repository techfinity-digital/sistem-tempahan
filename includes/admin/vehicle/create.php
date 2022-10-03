<?php
// Start-up script
require_once __DIR__ . '/../../../init.php';

use Illuminate\Database\Capsule\Manager as DB;

// Get all user inputs
$name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
$registration_no = filter_var($_REQUEST['registration_no'], FILTER_SANITIZE_STRING);
$brand = filter_var($_REQUEST['brand'], FILTER_SANITIZE_STRING);
$model = filter_var($_REQUEST['model'], FILTER_SANITIZE_STRING);
$status = filter_var($_REQUEST['status'], FILTER_SANITIZE_STRING);

try {
    // Save to database
    DB::table('vehicles')
        ->insert([
            'name' => $name,
            'registration_no' => $registration_no,
            'brand' => $brand,
            'model' => $model,
            'status' => $status,
        ]);

    redirect(APP_URL.'/pages/admin/vehicle/index.php','Maklumat kenderaan telah berjaya direkodkan!');
} catch (Exception $e) {
    die($e->getMessage());
}
