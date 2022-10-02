<?php
// Start-up script
require_once __DIR__.'/../init.php';
require APP_PATH.'/pages/_head.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="<?php echo APP_URL; ?>/includes/login.php" method="post">
                <h2>Borang Log Masuk</h2>
                <div class="card">
                    <div class="card-body">
                        <p class="mb-4">Isikan maklumat anda.</p>

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
                                    required
                                    id="input-password">
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
                            Log Masuk
                        </button>
                    </div>
                </div><!-- /.card -->
            </form>
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->

<?php
require APP_PATH.'/pages/_footer.php';
