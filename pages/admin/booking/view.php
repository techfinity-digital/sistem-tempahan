<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

abortIfNotAdmin();

use Illuminate\Database\Capsule\Manager as DB;

$booking = DB::table('bookings')
    ->join('vehicles', 'bookings.vehicle_id', 'vehicles.id')
    ->join('users', 'bookings.user_id', 'users.id')
    ->select(
        'bookings.started_at', 'bookings.ended_at', 'bookings.booking_reason',
        'bookings.booking_status', 'vehicles.registration_no', 'vehicles.brand',
        'vehicles.model', 'users.name'
    )
    ->where('bookings.id', $_REQUEST['id'])
    ->first();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2>
                Maklumat Tempahan

                <div class="float-end">
                    <a
                        href="/pages/admin/booking/index.php"
                        class="btn btn-outline-secondary">
                        Kembali
                    </a>
                    <button
                        type="button"
                        class="btn btn-success"
                        id="btn-print">
                        Cetak
                    </button>
                </div>
            </h2>
            <div class="card">
                <div class="card-body">
                    <div class="mb-0 row">
                        <label
                            class="col-md-3 col-form-label">
                            Nama Penempah
                        </label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext fw-bold">
                                <?php echo $booking->name; ?>
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="mb-0 row">
                        <label
                            class="col-md-3 col-form-label">
                            No. Pendaftaran Kenderaan
                        </label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext fw-bold">
                                <?php echo $booking->registration_no; ?>
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="mb-0 row">
                        <label
                            class="col-md-3 col-form-label">
                            Jenama
                        </label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext fw-bold">
                                <?php echo $booking->brand; ?>
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="mb-0 row">
                        <label
                            class="col-md-3 col-form-label">
                            Model
                        </label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext fw-bold">
                                <?php echo $booking->model; ?>
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="mb-0 row">
                        <label
                            class="col-md-3 col-form-label">
                            Dari
                        </label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext fw-bold">
                                <?php echo date('d/m/Y h:i a', strtotime($booking->started_at)); ?>
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="mb-0 row">
                        <label
                            class="col-md-3 col-form-label">
                            Hingga
                        </label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext fw-bold">
                                <?php echo date('d/m/Y h:i a', strtotime($booking->ended_at)); ?>
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="mb-0 row">
                        <label
                            class="col-md-3 col-form-label">
                            Tunjuan
                        </label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext fw-bold">
                                <?php echo nl2br($booking->booking_reason); ?>
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="mb-0 row">
                        <label
                            class="col-md-3 col-form-label">
                            Status Tempahan
                        </label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext fw-bold">
                                <?php if ($booking->booking_status == 'baru') : ?>
                                    <span class="badge bg-secondary">Baru</span>
                                <?php elseif ($booking->booking_status == 'lulus') : ?>
                                    <span class="badge bg-success">Lulus</span>
                                <?php else : ?>
                                    <span class="badge bg-dark">Lain-lain</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div><!-- /.row -->

                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.js"></script>
<script>
    $(document).ready( function () {
        $('#btn-print').click( function () {
            window.print()
        })
    })
</script>
<?php
require APP_PATH.'/pages/_footer.php';
