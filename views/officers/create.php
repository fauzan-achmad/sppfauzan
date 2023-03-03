<div class="navbar-bg"></div>

<!-- Topbar -->

<?php topbar() ?>

<!-- Sidebar -->
<?php sidebar() ?>

<!-- Main Content -->
<div class="main-content">

    <section class="section">

        <div class="row">

            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Tambah Petugas Baru</h4>
                    </div>
                    <div class="card-body">

                        <?php if (hasFlash('error')) { ?>
                            <div class="alert alert-danger">
                                <?php echo flash('error') ?>
                            </div>
                        <?php } ?>

                        <form action="<?php echo url('actions/officers/store') ?>" class="needs-validation row" novalidate="" method="POST">

                            <div class="form-group col-6">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" required>
                                <div class="invalid-feedback">
                                    Silahkan isi nama Petugas.
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required>
                                <div class="invalid-feedback">
                                    Silahkan isi username Petugas.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Kata Sandi</label>
                                <input type="password" class="form-control" name="password" required>
                                <div class="invalid-feedback">
                                    Silahkan isi kata sandi Petugas.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Konfirmasi Kata Sandi</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                                <div class="invalid-feedback">
                                    Silahkan konfirmasi kata sandi Petugas.
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-lg" tabindex="4">
                                    Tambah
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>

</div>