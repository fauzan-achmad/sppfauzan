<?php

global $connection;

$id = (int) $_GET['id'];

$result = $connection->execute_query("SELECT * FROM class WHERE id = ?", [$id]);
$clas = $result->fetch_assoc();

if (!$clas) {

    header('Location: ' . env('APP_URL') . '/404');
    die();
}

$result1 = $connection->execute_query("SELECT * FROM kelas");

$kelas = [];

while ($row = $result1->fetch_assoc()) {

    array_push($kelas, $row);
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
                        <h4>Edit Kelas</h4>
                    </div>
                    <div class="card-body">

                        <?php if (hasFlash('error')) { ?>
                            <div class="alert alert-danger">
                                <?php echo flash('error') ?>
                            </div>
                        <?php } ?>

                        <form action="<?php echo url('actions/class/update') ?>" class="needs-validation row" novalidate="" method="POST">

                            <input type="hidden" name="clas_id" value="<?php echo $id ?>">

                            <div class="form-group col-md-6">
                                <label>Kelas</label>
                                <select class="form-control selectric" name="name" required>
                                    <option selected disabled>Pilih Kelas</option>
                                    <?php foreach ($kelas as $mont) { ?>
                                        <option value="<?php echo $mont['name'] ?>" <?php echo $mont['name'] == $clas['name'] ? 'selected' : '' ?>>
                                            <?php echo $mont['name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan isi pilih Kelas.
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label>Jurusan</label>
                                <input type="text" class="form-control" name="category" value="<?php echo $clas['category'] ?>" required>
                                <div class="invalid-feedback">
                                    Silahkan isi Jurusan.
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-lg" tabindex="4">
                                    Edit
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>

</div>