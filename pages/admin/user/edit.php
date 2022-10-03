<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

abortIfNotAdmin();

use Illuminate\Database\Capsule\Manager as DB;

$user = DB::table('users')
    ->where('id', $_REQUEST['id'])
    ->first();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="/includes/admin/user/edit.php?id=<?php echo $user->id; ?>" method="post">
                <h2>Ubah Pengguna</h2>
                <div class="card">
                    <div class="card-body">
                        <p class="mb-4">Lengkapkan maklumat pengguna di bawah.</p>

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

                        <div class="mb-3 row">
                            <label
                                for="input-password"
                                class="col-md-3 col-form-label">
                                Kata Laluan <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-4">
                                <input
                                    name="password"
                                    type="password"
                                    class="form-control"
                                    id="input-password">
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-3 row">
                            <label
                                for="input-password_confirmation"
                                class="col-md-3 col-form-label">
                                Ulang Kata Laluan <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-4">
                                <input
                                    name="password_confirmation"
                                    type="password"
                                    class="form-control"
                                    id="input-password_confirmation">
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-0 row">
                            <div class="col-md-9 offset-md-3">
                                <strong><em>Nota</em></strong>
                                <em>Isikan kata laluan yang baru jika anda ingin menukar kata laluan pengguna ini.</em>
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-3 row">
                            <label
                                for="input-role"
                                class="col-md-3 col-form-label">
                                Akses Pengguna <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-4">
                                <select
                                    name="role"
                                    id="input-role"
                                    class="form-select">
                                    <option value="user" <?php echo ($user->role === 'user') ? 'selected' : ''; ?>>
                                        Pengguna
                                    </option>
                                    <option value="admin" <?php echo ($user->role === 'admin') ? 'selected' : ''; ?>>
                                        Admin
                                    </option>
                                </select>
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
    </div><!-- /.row -->
</div><!-- /.container -->
<?php
require APP_PATH.'/pages/_footer.php';
