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
            <form action="/includes/user/password.php" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label
                                for="input-current-password"
                                class="col-md-3 col-form-label">
                                Kata Laluan Sekarang <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-4">
                                <input
                                    name="current-password"
                                    type="password"
                                    class="form-control"
                                    required
                                    autofocus
                                    id="input-current-password">
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-3 row">
                            <label
                                for="input-new-password"
                                class="col-md-3 col-form-label">
                                Kata Laluan Baru <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-4">
                                <input
                                    name="new-password"
                                    type="password"
                                    class="form-control"
                                    required
                                    id="input-new-password">
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-3 row">
                            <label
                                for="input-repeat-new-password"
                                class="col-md-3 col-form-label">
                                Kata Laluan Baru <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-4">
                                <input
                                    name="repeat-new-password"
                                    type="password"
                                    class="form-control"
                                    required
                                    id="input-repeat-new-password">
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-0 row">
                            <div class="col-md-9 offset-md-3">
                                <em>Maklumat yang bertanda <span class="text-danger">*</span> wajib diisi.</em>
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