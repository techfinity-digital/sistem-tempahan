<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

global $db;

$vehicle = $db->from('vehicles')
    ->where('id')
    ->is($_REQUEST['id'])
    ->select()
    ->first();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="<?php echo APP_URL; ?>/includes/admin/vehicle/edit.php?id=<?php echo $vehicle->id; ?>" method="post">
                <h2>Ubah Kenderaan</h2>
                <div class="card">
                    <div class="card-body">
                        <p class="mb-4">Lengkapkan maklumat kenderaan di bawah.</p>

                        <div class="mb-3 row">
                            <label
                                for="input-name"
                                class="col-md-3 col-form-label">
                                Nama Kenderaan <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <input
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    value="<?php echo $vehicle->name; ?>"
                                    required
                                    autofocus
                                    id="input-name">
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-3 row">
                            <label
                                for="input-registration_no"
                                class="col-md-3 col-form-label">
                                No. Pendaftaran <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-4">
                                <input
                                    name="registration_no"
                                    type="text"
                                    class="form-control"
                                    value="<?php echo $vehicle->registration_no; ?>"
                                    required
                                    id="input-registration_no">
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-3 row">
                            <label
                                for="input-brand"
                                class="col-md-3 col-form-label">
                                Jenama <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-4">
                                <input
                                    name="brand"
                                    type="text"
                                    class="form-control"
                                    value="<?php echo $vehicle->brand; ?>"
                                    required
                                    id="input-brand">
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-3 row">
                            <label
                                for="input-model"
                                class="col-md-3 col-form-label">
                                Model <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-4">
                                <input
                                    name="model"
                                    type="text"
                                    class="form-control"
                                    value="<?php echo $vehicle->model; ?>"
                                    required
                                    id="input-model">
                            </div>
                        </div><!-- /.row -->

                        <div class="mb-3 row">
                            <label
                                for="input-status"
                                class="col-md-3 col-form-label">
                                Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-4">
                                <select
                                    name="status"
                                    id="input-status"
                                    class="form-select">
                                    <option value="aktif" <?php echo $vehicle->status == 'aktif' ? 'selected' : ''; ?>>
                                        Aktif
                                    </option>
                                    <option value="tidak-aktif" <?php echo $vehicle->status == 'tidak-aktif' ? 'selected' : ''; ?>>
                                        Tidak Aktif
                                    </option>
                                    <option value="servis" <?php echo $vehicle->status == 'servis' ? 'selected' : ''; ?>>
                                        Hantar Servis
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
            </form>
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->
<?php
require APP_PATH.'/pages/_footer.php';
