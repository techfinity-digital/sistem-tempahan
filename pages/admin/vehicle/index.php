<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

global $db;

$vehicles = $db->from('vehicles')
    ->orderBy('name')
    ->select()
    ->all();
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>
                    Senarai Kenderaan

                    <div class="float-end">
                        <a href="/pages/admin/vehicle/create.php" class="btn btn-primary">
                            Tambah
                        </a>
                    </div>
                </h2>
                <div class="card">
                    <div class="card-table table-responsive-sm">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No. Pendaftaran</th>
                                <th>Jenama</th>
                                <th>Model</th>
                                <th>Status</th>
                                <th style="width: 200px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($vehicles) : ?>
                                <?php foreach ($vehicles as $vehicle) : ?>
                                    <tr>
                                        <td><?php echo $vehicle->name; ?></td>
                                        <td><?php echo $vehicle->registration_no; ?></td>
                                        <td><?php echo $vehicle->brand; ?></td>
                                        <td><?php echo $vehicle->model; ?></td>
                                        <td>
                                            <?php if ($vehicle->status == 'aktif') : ?>
                                                <span class="badge bg-success">Aktif</span>
                                            <?php elseif ($vehicle->status == 'tidak-aktif') : ?>
                                                <span class="badge bg-danger">Tidak Aktif</span>
                                            <?php else : ?>
                                                <span class="badge bg-secondary">Servis</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="/pages/admin/vehicle/edit.php?id=<?php echo $vehicle->id; ?>" class="btn btn-sm btn-warning">
                                                Ubah
                                            </a>

                                            <a href="/pages/admin/vehicle/delete.php?id=<?php echo $vehicle->id; ?>" class="btn btn-sm btn-danger">
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
