<?php
// Start-up script
require_once __DIR__.'/../../init.php';
require APP_PATH.'/pages/_head.php';

abortIfNotAdmin();

use Illuminate\Database\Capsule\Manager as DB;

$bookings = DB::table('bookings')
    ->join('vehicles', 'bookings.vehicle_id', 'vehicles.id')
    ->join('users', 'bookings.user_id', 'users.id')
    ->select(
        'bookings.id', 'bookings.started_at', 'bookings.ended_at', 'bookings.booking_reason',
        'bookings.booking_status', 'vehicles.registration_no', 'users.name'
    )
    ->where('booking_status', 'baru')
    ->limit(5)
    ->get();

$users = DB::table('users')
    ->orderBy('name')
    ->limit(5)
    ->get();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>
                Tempahan Terkini
            </h2>
            <div class="card">
                <div class="card-table table-responsive-sm">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nama Penempah</th>
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
                                    <td><?php echo $booking->name; ?></td>
                                    <td><?php echo date('d/m/Y h:i a', strtotime($booking->started_at)); ?></td>
                                    <td><?php echo date('d/m/Y h:i a', strtotime($booking->ended_at)); ?></td>
                                    <td><?php echo $booking->registration_no; ?></td>
                                    <td>
                                        <?php if ($booking->booking_status == 'baru') : ?>
                                            <span class="badge bg-secondary">Baru</span>
                                        <?php elseif ($booking->booking_status == 'lulus') : ?>
                                            <span class="badge bg-success">Lulus</span>
                                        <?php else : ?>
                                            <span class="badge bg-dark">Lain-lain</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="/pages/admin/booking/view.php?id=<?php echo $booking->id; ?>" class="btn btn-sm btn-info">
                                            Papar
                                        </a>

                                        <a href="/pages/admin/booking/edit.php?id=<?php echo $booking->id; ?>" class="btn btn-sm btn-warning">
                                            Ubah
                                        </a>

                                        <a href="/pages/admin/booking/delete.php?id=<?php echo $booking->id; ?>" class="btn btn-sm btn-danger">
                                            Padam
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">
                                    Maaf, tiada rekod.
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr>

            <h2>
                Pengguna Terkini
            </h2>
            <div class="card">
                <div class="card-table table-responsive-sm">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Emel</th>
                            <th style="width: 200px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($users) : ?>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?php echo $user->name; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td>
                                        <a href="/pages/admin/user/edit.php?id=<?php echo $user->id; ?>" class="btn btn-sm btn-warning">
                                            Ubah
                                        </a>

                                        <a href="/pages/admin/user/delete.php?id=<?php echo $user->id; ?>" class="btn btn-sm btn-danger">
                                            Padam
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3" class="text-center">
                                    Maaf, tiada rekod.
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require APP_PATH.'/pages/_footer.php';
