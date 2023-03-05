<?php

global $connection;

$id = (int) $_GET['id'];



$result = $connection->execute_query("SELECT * FROM officers");
$officer = $result->fetch_assoc();

if (!$officer) {

    header('Location: ' . env('APP_URL') . '/404');
    die();
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
                        <h4>Edit Petugas</h4>
                    </div>
                    <div class="card-body">

                        <?php if (hasFlash('error')) { ?>
                            <div class="alert alert-danger">
                                <?php echo flash('error') ?>
                            </div>
                        <?php } ?>

                        <form action="<?php echo url('actions/officers/update') ?>" class="needs-validation row" novalidate="" method="POST">

                            <input type="hidden" name="officer_id" value="<?php echo $id ?>">
                            <input type="hidden" name="user_id" value="<?php echo $officer['user_id'] ?>">

                            <div class="form-group col-6">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $officer['name'] ?>" required>
                                <div class=" invalid-feedback">
                                    Silahkan isi nama Petugas.
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $officer['username'] ?>" required>
                                <div class="invalid-feedback">
                                    Silahkan isi username Petugas.
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