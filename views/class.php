<?php

global $connection;

/**
 * Mengambil semua kelas.
 * 
 */

$class = [];

$result = $connection->execute_query("SELECT * FROM class ORDER BY category DESC");

while ($row = $result->fetch_assoc()) {

    array_push($class, $row);
}

$iteration = 1;

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
                <div class="modal-content">
                    <div class="card card-success">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Daftar kelas</h4>
                            <div>
                                <a href="<?php echo url('class/create') ?>" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    <span>Tambah kelas</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <?php if (hasFlash('success')) { ?>
                                <div class="alert alert-success">
                                    <?php echo flash('success') ?>
                                </div>
                            <?php } ?>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jurusan</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($class as $clas) { ?>
                                            <tr>
                                                <td><?php echo $iteration++ ?></td>
                                                <td><?php echo $clas['name'] ?></td>
                                                <td><?php echo $clas['category'] ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center" style="gap: 1rem">

                                                        <a href="<?php echo url('class/edit?id=' . $clas['id']) ?>" class="btn btn-warning">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        |
                                                        <form action="<?php echo url('actions/class/delete') ?>" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $clas['id'] ?>">
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

    </section>

</div>