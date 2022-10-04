<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

use Illuminate\Database\Capsule\Manager as DB;

$bookings = DB::table('bookings')
    ->join('vehicles', 'bookings.vehicle_id', 'vehicles.id')
    ->select(
        'bookings.id', 'bookings.started_at', 'bookings.ended_at', 'bookings.booking_reason',
        'bookings.booking_status', 'bookings.user_id', 'vehicles.registration_no',
    )
    ->where('bookings.user_id', $_SESSION['user_id'])
    ->get();
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>
                    Senarai Tempahan

                    <div class="float-end">
                        <a href="/pages/user/booking/create.php" class="btn btn-primary">
                            Tambah
                        </a>
                    </div>
                </h2>
                <div class="card">
                    <div class="card-table table-responsive-sm">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Dari</th>
                                <th>Hingga</th>
                                <th>Kenderaan</th>
                                <th>Status</th>
                                <th style="width: 220px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($bookings) : ?>
                                <?php foreach ($bookings as $booking) : ?>
                                    <tr>
                                        <td><?php echo date('d/m/Y h:i a', strtotime($booking->started_at)); ?></td>
                                        <td><?php echo date('d/m/Y h:i a', strtotime($booking->ended_at)); ?></td>
                                        <td><?php echo $booking->registration_no; ?></td>
                                        <td>
                                            <?php if ($booking->booking_status == 'baru') : ?>
                                                <span class="badge bg-info">Baru</span>
                                            <?php elseif ($booking->booking_status == 'lulus') : ?>
                                                <span class="badge bg-success">Lulus</span>
                                            <?php else : ?>
                                                <span class="badge bg-dark">Batal</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="/pages/user/booking/view.php?id=<?php echo $booking->id; ?>"
                                               class="btn btn-sm btn-info">
                                                Papar
                                            </a>

                                            <?php if ($booking->booking_status == 'baru') : ?>
                                            <a href="/pages/user/booking/edit.php?id=<?php echo $booking->id; ?>"
                                               class="btn btn-sm btn-warning">
                                                Ubah
                                            </a>

                                            <a href="/pages/user/booking/cancel.php?id=<?php echo $booking->id; ?>"
                                               class="btn btn-sm btn-danger">
                                                Batal
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Maaf, tiada rekod.
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->

<?php
require APP_PATH.'/pages/_footer.php';
