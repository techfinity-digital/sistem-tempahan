<?php
// Start-up script
require_once __DIR__.'/../../../init.php';
require APP_PATH.'/pages/_head.php';

abortIfNotAdmin();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="/includes/admin/vehicle/create.php" method="post">
                <h2>Tambah Kenderaan</h2>
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
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak-aktif">Tidak Aktif</option>
                                    <option value="servis">Hantar Servis</option>
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
