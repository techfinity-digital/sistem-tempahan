<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

global $db;

$bookings = $db->from('bookings')
    ->join('vehicles', function ($join) {
        $join->on('bookings.id', 'vehicles.id');
    })
    ->join('users', function ($join) {
        $join->on('bookings.id', 'users.id');
    })
    ->orderBy('started_at')
    ->select()
    ->all();
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>
                    Senarai Tempahan

                    <div class="float-end">
                        <a href="/pages/admin/booking/create.php" class="btn btn-primary">
                            Tambah
                        </a>
                    </div>
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
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->

<?php
require APP_PATH.'/pages/_footer.php';
