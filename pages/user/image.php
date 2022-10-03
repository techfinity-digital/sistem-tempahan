<?php
// Start-up script
require_once __DIR__.'/../../init.php';
require APP_PATH.'/pages/_head.php';

use Illuminate\Database\Capsule\Manager as DB;

$user = DB::table('users')
    ->where('id', $_SESSION['user_id'])
    ->first();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2>
                Hello, <?php echo $user->name; ?>
            </h2>
            <form action="/includes/user/image.php" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label
                                for="input-image"
                                class="col-md-3 col-form-label">
                                Gambar Profil <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <input
                                    name="image"
                                    type="file"
                                    class="form-control"
                                    required
                                    autofocus
                                    id="input-image">
                            </div>
                        </div><!-- /.row -->

                        <?php if (! empty($user->image)) : ?>
                            <div class="mb-3 row">
                                <div class="col-md-4 offset-md-3">
                                    <img
                                        src="/uploads/image/<?php echo $user->image; ?>"
                                        class="img-fluid">
                                </div>
                            </div><!-- /.row -->
                        <?php endif; ?>

                        <div class="mb-0 row">
                            <div class="col-md-9 offset-md-3">
                                <em>Gambar lama akan dipadam secara automatik jika anda memuat-naik gambar baru.</em>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.card-body -->
                    <div class="card-footer text-muted text-md-end">
                        <button
                            type="submit"
                            class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </div><!-- /.card -->
            </form>
        </div>
    </div>
</div>
<?php
require APP_PATH.'/pages/_footer.php';