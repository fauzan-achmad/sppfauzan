<?php

global $connection;

/**
 * Mengambil semua spp.
 * 
 */

$spps = [];

$result = $connection->execute_query("SELECT * FROM spps");

while ($row = $result->fetch_assoc()) {

    array_push($spps, $row);
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
                <div class="card card-success">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar Spp</h4>
                        <div>
                            <a href="<?php echo url('spps/create') ?>" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                <span>Tambah Spp</span>
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
                                        <th>Tahun</th>
                                        <th>Nominal</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($spps as $spp) { ?>
                                        <tr>
                                            <td><?php echo $iteration++ ?></td>
                                            <td><?php echo $spp['year'] ?></td>
                                            <td>RP.<?php echo number_format($spp['nominal']) ?></td>
                                            <td>
                                                <div class="d-flex align-items-center" style="gap: 1rem">

                                                    <a href="<?php echo url('spps/edit?id=' . $spp['id']) ?>" class="btn btn-warning">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    |
                                                    <form action="<?php echo url('actions/spps/delete') ?>" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $spp['id'] ?>">
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