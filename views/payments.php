<?php

global $connection;

$result = $connection->execute_query("SELECT * FROM students");

$students = [];

while ($row = $result->fetch_assoc()) {

    array_push($students, $row);
}

$result = $connection->execute_query("SELECT * FROM month");

$month = [];

while ($row = $result->fetch_assoc()) {

    array_push($month, $row);
}

$result = $connection->execute_query("SELECT * FROM spps");

$spps = [];

while ($row = $result->fetch_assoc()) {

    array_push($spps, $row);
}

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
                        <h4>Transaksi Pembayaran</h4>
                    </div>
                    <div class="card-body">

                        <?php if (hasFlash('error')) { ?>
                            <div class="alert alert-danger">
                                <?php echo flash('error') ?>
                            </div>
                        <?php } ?>

                        <form action="<?php echo url('actions/students/store') ?>" class="needs-validation row" novalidate="" method="POST">

                            <div class="form-group col-md-6">
                                <label>Nama</label>
                                <select class="form-control selectric" name="name" required>
                                    <option selected disabled>Pilih Nama</option>
                                    <?php foreach ($students as $student) { ?>
                                        <option value="<?php echo $student['id'] ?>">
                                            <?php echo $student['nisn'] ?>-
                                            <?php echo $student['name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan isi pilih Siswa.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Tanggal Bayar</label>
                                <input type="date" class="form-control datepicker" name="date_payment" required>
                                <div class="invalid-feedback">
                                    Silahkan isi tanggal bayar.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Bulan</label>
                                <select class="form-control selectric" name="month_payment" required>
                                    <option selected disabled>Pilih Bulan</option>
                                    <?php foreach ($month as $mont) { ?>
                                        <option value="<?php echo $mont['id'] ?>">
                                            <?php echo $mont['name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan isi pilih Bulan.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Tahun</label>
                                <select class="form-control selectric" name="year_payment" required>
                                    <option selected disabled>Pilih Tahun</option>
                                    <?php foreach ($spps as $spp) { ?>
                                        <option value="<?php echo $spp['id'] ?>">
                                            <?php echo $spp['year'] ?> -
                                            RP.<?php echo $spp['nominal'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan isi pilih Tahun.
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label>Jumlah Dibayar</label>
                                <input type="text" class="form-control " name="phone" required>
                                <div class="invalid-feedback">
                                    Silahkan isi Jumlah Dibayar.
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