<?php
// Start-up script
require_once __DIR__ . '/../../init.php';

use Illuminate\Database\Capsule\Manager as DB;

if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $allowed = [
        "jpg" => "image/jpg",
        "jpeg" => "image/jpeg",
        "gif" => "image/gif",
        "png" => "image/png",
    ];

    $filename = $_FILES["image"]["name"];
    $filetype = $_FILES["image"]["type"];
    $filesize = $_FILES["image"]["size"];

    // Verify file extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (! array_key_exists($ext, $allowed)) {
        redirect(APP_URL.'/pages/user/image.php','Format gambar tidak sah!', 'danger');
    }

    // Verify file size - 10MB maximum
    $maxsize = 10 * 1024 * 1024;

    if ($filesize > $maxsize) {
        redirect(APP_URL.'/pages/user/image.php','Saiz gambar melebihi 10MB!', 'danger');
    }

    // Verify MIME type of the file
    if (in_array($filetype, $allowed)) {
        $filename = sha1($filename).'.'. $ext;

        try {
            move_uploaded_file(
                $_FILES["image"]["tmp_name"],
                IMAGE_PATH.'/'.$filename
            );

            $user = DB::table('users')
                ->where('id', $_SESSION['user_id'])
                ->first();

            @unlink(IMAGE_PATH.'/'.$user->image);

            DB::table('users')
                ->where('id', $_SESSION['user_id'])
                ->update([
                    'image' => $filename,
                ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }

        redirect(APP_URL.'/pages/user/image.php','Gambar telah dimuat-naik!', 'success');
    }
    else {
        dd(1);
    }
} else {
    redirect(APP_URL.'/pages/user/image.php',$_FILES["image"]["error"], 'danger');
}