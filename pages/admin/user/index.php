<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

abortIfNotAdmin();

use Illuminate\Database\Capsule\Manager as DB;

$users = DB::table('users')
    ->orderBy('name')
    ->get();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>
                Senarai Pengguna

                <div class="float-end">
                    <a href="/pages/admin/user/create.php" class="btn btn-primary">
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
                                <th>Emel</th>
                                <th>Akses</th>
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
                                            <?php if ($user->role == 'admin') : ?>
                                                <span class="badge bg-danger">Admin</span>
                                            <?php else : ?>
                                                <span class="badge bg-success">Pengguna</span>
                                            <?php endif; ?>
                                        </td>
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
                                    <td colspan="4" class="text-center">
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
