<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

global $db;

$users = $db->from('users')
    ->orderBy('name')
    ->select()
    ->all();
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Senarai Pengguna</h2>
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
                                                <a href="#" class="btn btn-sm btn-warning">
                                                    Ubah
                                                </a>

                                                <a href="#" class="btn btn-sm btn-danger">
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
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->

<?php
require APP_PATH.'/pages/_footer.php';
