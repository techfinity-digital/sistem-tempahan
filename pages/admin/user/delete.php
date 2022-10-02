<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

global $db;

$user = $db->from('users')
    ->where('id')
    ->is($_REQUEST['id'])
    ->delete();

redirect(APP_URL.'/pages/admin/user/index.php','Pengguna telah dipadam dari sistem!');