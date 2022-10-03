<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

abortIfNotAdmin();

use Illuminate\Database\Capsule\Manager as DB;

$vehicles = DB::table('vehicles')
    ->orderBy('registration_no')
    ->get();

$users = DB::table('users')
    ->orderBy('name')
    ->get();

$booking = DB::table('bookings')
    ->where('id', $_REQUEST['id'])
    ->first();
?>
<div class="container">
    <div class="row justify-content-center">
        <form action="/includes/admin/booking/edit.php?id=<?php echo $booking->id; ?>" method="post">
            <div class="col-md-10">
                <h2>
                    Maklumat Tempahan
                </h2>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label
                                class="col-md-3 col-form-label">
                                Nama Penempah <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <select
                                    class="form-select"
                                    name="user_id">
                                    <?php foreach ($users as $user) : ?>
                                    <option
                                        value="<?php echo $user->id; ?>"
                                        <?php echo $booking->user_id == $user->id ? 'selected' : ''; ?>>
                                        <?php echo $user->name; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div><!-- /.row -->

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
                                        <option
                                            value="<?php echo $vehicle->id; ?>"
                                            <?php echo $booking->vehicle_id == $vehicle->id ? 'selected' : ''; ?>>
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
                                    value="<?php echo date('Y-m-d', strtotime($booking->started_at)); ?>"
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
                                    value="<?php echo date('Y-m-d', strtotime($booking->ended_at)); ?>"
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
                                    rows="3"><?php echo $booking->booking_reason; ?></textarea>
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-3 row">
                            <label
                                class="col-md-3 col-form-label">
                                Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-3">
                                <select
                                    class="form-select"
                                    name="booking_status">
                                    <option
                                        value="baru"
                                        <?php echo $booking->booking_status == 'baru' ? 'selected' : ''; ?>>
                                        Baru
                                    </option>
                                    <option
                                        value="lulus"
                                        <?php echo $booking->booking_status == 'lulus' ? 'selected' : ''; ?>>
                                        Lulus
                                    </option>
                                    <option
                                        value="batal"
                                        <?php echo $booking->booking_status == 'batal' ? 'selected' : ''; ?>>
                                        Batal
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
            </div>
        </form>
    </div><!-- /.row -->
</div><!-- /.container -->
<?php
require APP_PATH.'/pages/_footer.php';
