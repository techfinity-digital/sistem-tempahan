<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

use Illuminate\Database\Capsule\Manager as DB;

$vehicles = DB::table('vehicles')
    ->orderBy('registration_no')
    ->get();
?>
    <div class="container">
        <div class="row justify-content-center">
            <form action="/includes/user/booking/create.php" method="post">
                <div class="col-md-10">
                    <h2>
                        Maklumat Tempahan
                    </h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label
                                    class="col-md-3 col-form-label">
                                    No. Pendaftaran Kenderaan <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8">
                                    <select
                                        class="form-select"
                                        name="vehicle_id">
                                        <?php foreach ($vehicles as $vehicle) : ?>
                                            <option value="<?php echo $vehicle->id; ?>">
                                                <?php echo $vehicle->registration_no; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div><!-- /.row -->

                            <div class="mb-3 row">
                                <label
                                    class="col-md-3 col-form-label">
                                    Dari <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-3">
                                    <input
                                        type="date"
                                        name="started_at"
                                        class="form-control"
                                        value="<?php echo date('Y-m-d'); ?>"
                                    >
                                </div>
                            </div><!-- /.row -->

                            <div class="mb-3 row">
                                <label
                                    class="col-md-3 col-form-label">
                                    Sehingga <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-3">
                                    <input
                                        type="date"
                                        name="ended_at"
                                        class="form-control"
                                        value="<?php echo date('Y-m-d'); ?>"
                                    >
                                </div>
                            </div><!-- /.row -->

                            <div class="mb-3 row">
                                <label
                                    class="col-md-3 col-form-label">
                                    Tujuan <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8">
                                <textarea
                                    name="booking_reason"
                                    class="form-control"
                                    rows="3"></textarea>
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
                </div>
            </form>
        </div><!-- /.row -->
    </div><!-- /.container -->

<?php
require APP_PATH.'/pages/_footer.php';
