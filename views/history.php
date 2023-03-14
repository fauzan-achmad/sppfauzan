<?php

global $connection;

/**
 * Mengambil semua siswa.
 * 
 */

$payments = [];

$result = $connection->execute_query("SELECT payments.*,
students.name AS student_name,
officers.name AS officers_name
 FROM payments
 LEFT JOIN students ON payments.student_id = students.id
 LEFT JOIN officers ON payments.officer_id = officers.id 
 ORDER BY payments.id DESC");

while ($row = $result->fetch_assoc()) {

    array_push($payments, $row);
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
                <div class="card ">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>History Pembayaran</h4>
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
                                        <th>Nama Petugas</th>
                                        <th>Nama Siswa</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($payments as $payment) { ?>
                                        <tr>
                                            <td><?php echo $iteration++ ?></td>
                                            <th><?php echo $payment['officers_name'] ?? 'Admin' ?></th>
                                            <td><?php echo $payment['student_name'] ?></td>
                                            <td><?php echo $payment['date_payment'] ?></td>
                                            <td>
                                                <div class="d-flex align-items-center" style="gap: 1rem">
                                                    <a href="<?php echo url('payments/detail?id=' . $payment['id']) ?>" class="btn btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    |
                                                    <form action="<?php echo url('actions/payments/delete') ?>" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $payment['id'] ?>">
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