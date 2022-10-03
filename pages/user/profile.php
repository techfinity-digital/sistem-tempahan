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
            <form action="/includes/user/profile.php" method="post">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-4">Lengkapkan maklumat anda.</p>

                        <div class="mb-3 row">
                            <label
                                    for="input-name"
                                    class="col-md-3 col-form-label">
                                Nama Penuh <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <input
                                        name="name"
                                        type="text"
                                        class="form-control"
                                        value="<?php echo $user->name; ?>"
                                        required
                                        autofocus
                                        id="input-name">
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-3 row">
                            <label
                                    for="input-email"
                                    class="col-md-3 col-form-label">
                                Alamat Emel <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <input
                                        name="email"
                                        type="email"
                                        class="form-control"
                                        value="<?php echo $user->email; ?>"
                                        required
                                        id="input-email">
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