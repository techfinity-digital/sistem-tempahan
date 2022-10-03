<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

global $db;

$user = $db->from('vehicles')
    ->where('id')
    ->is($_REQUEST['id'])
    ->delete();

redirect(APP_URL.'/pages/admin/vehicle/index.php','Maklumat kenderaan telah dipadam dari sistem!');
