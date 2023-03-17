<?php
global $connection;

$result = $connection->execute_query("SELECT * FROM kelas");

$kelas = [];

while ($row = $result->fetch_assoc()) {

    array_push($kelas, $row);
}

$tg_awal = date('Y') - 10;
$tgl_akhir = date('Y') + 5;
?>


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
                        <h4>Tambah Spp Baru</h4>
                    </div>
                    <div class="card-body">

                        <?php if (hasFlash('error')) { ?>
                            <div class="alert alert-danger">
                                <?php echo flash('error') ?>
                            </div>
                        <?php } ?>

                        <form action="<?php echo url('actions/spps/store') ?>" class="needs-validation row" novalidate="" method="POST">
                            <div class="form-group col-md-6">
                                <label>Tahun</label>
                                <select class="form-control selectric" name="year" required>
                                    <option selected disabled>Pilih Tahun</option>
                                    <?php for ($i = $tgl_akhir; $i >= $tg_awal; $i--) { ?>
                                        <option value="<?php echo $i;
                                                        ?>">
                                            <?php echo $i ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan isi pilih Kelas.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nominal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="text" class="form-control currency" name="nominal" required>
                                </div>
                                <div class="invalid-feedback">
                                    Silahkan isi Nominal.
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