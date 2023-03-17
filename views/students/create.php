<?php

global $connection;

$result = $connection->execute_query("SELECT * FROM students");

$students = [];

while ($row = $result->fetch_assoc()) {

    array_push($students, $row);
}

$result = $connection->execute_query("SELECT * FROM class");

$class = [];

while ($row = $result->fetch_assoc()) {

    array_push($class, $row);
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
                        <h4>Tambah siswa Baru</h4>
                    </div>
                    <div class="card-body">

                        <?php if (hasFlash('error')) { ?>
                            <div class="alert alert-danger">
                                <?php echo flash('error') ?>
                            </div>
                        <?php } ?>

                        <form action="<?php echo url('actions/students/store') ?>" class="needs-validation row" novalidate="" method="POST">

                            <div class="form-group col-md-6">
                                <label>NISN</label>
                                <input type="text" class="form-control " name="nisn" required>
                                <div class="invalid-feedback">
                                    Silahkan isi NISN.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>NIS</label>
                                <input type="text" class="form-control " name="nis" required>
                                <div class="invalid-feedback">
                                    Silahkan isi NIS.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nama</label>
                                <input type="text" class="form-control " name="name" required>
                                <div class="invalid-feedback">
                                    Silahkan isi Nama.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>kelas</label>
                                <select class="form-control selectric" name="class_id" required>
                                    <option selected disabled>Pilih kelas</option>
                                    <?php foreach ($class as $clas) { ?>
                                        <option value="<?php echo $clas['id'] ?>">
                                            <?php echo $clas['name'] ?> -
                                            <?php echo $clas['category'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan isi pilih kelas.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Telepon</label>
                                <input type="text" class="form-control " name="phone" required>
                                <div class="invalid-feedback">
                                    Silahkan isi Telepon.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Jenis Kelamin</label>
                                <select class="form-control selectric" name="gender" required>
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki"> Laki - Laki </option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan isi pilih Jenis Kelamin.
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label>Alamat</label>
                                <textarea class="form-control" name="address" rows="3" required></textarea>
                                <div class="invalid-feedback">
                                    Silahkan isi Alamat.
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