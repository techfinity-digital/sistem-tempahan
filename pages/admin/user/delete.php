<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

abortIfNotAdmin();

use Illuminate\Database\Capsule\Manager as DB;

DB::table('users')
    ->where('id', $_REQUEST['id'])
    ->delete();

redirect(APP_URL.'/pages/admin/user/index.php','Pengguna telah dipadam dari sistem!');