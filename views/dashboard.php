<?php

global $connection;

$user = $_SESSION['user'];
$userId = $user['id'];

/**
 * Mengambil semua siswa.
 * 
 */

$students = [];

$result = $connection->execute_query("SELECT * FROM students");
$result2 = $connection->execute_query("SELECT * FROM officers");
$result3 = $connection->execute_query("SELECT * FROM class");
$result4 = $connection->execute_query("SELECT * FROM spps");

$totalStudents = mysqli_num_rows($result);
$totalOfficers = mysqli_num_rows($result2);
$totalClass = mysqli_num_rows($result3);
$totalSpps = mysqli_num_rows($result4);


/**
 * Mengambil semua siswa.
 * 
 */

$payments = [];

$result5 = $connection->execute_query("SELECT payments.*,
students.name AS student_name,
officers.name AS officers_name
 FROM payments
 LEFT JOIN students ON payments.student_id = students.id
 LEFT JOIN officers ON payments.officer_id = officers.id
 WHERE payments.created_at >= CURRENT_DATE()
 ORDER BY payments.id DESC");

while ($row = $result5->fetch_assoc()) {

    array_push($payments, $row);
}

$iteration = 1;

?>


<?php if ($_SESSION['user']['role'] === 'admin') { ?> <!-- Jika role user adalah admin -->


    <div class="navbar-bg  "></div>

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
                            <h4>Dashboard</h4>
                        </div>
                        <div class="card-body">
                            <p>Selamat datang kembali, <?php echo $_SESSION['user']['name'] ?>.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Siswa</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $totalStudents ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Petugas</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $totalOfficers ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total kelas</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $totalClass ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fa-sharp fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Spp</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $totalSpps ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>History Pembayaran</h4>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Petugas</th>
                                        <th>Nama Siswa</th>
                                        <th>Tanggal Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($payments as $payment) { ?>
                                        <tr>
                                            <td><?php echo $iteration++ ?></td>
                                            <th><?php echo $payment['officers_name'] ?? 'Admin' ?></th>
                                            <td><?php echo $payment['student_name'] ?></td>
                                            <td><?php echo $payment['date_payment'] ?></td>
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

<?php } elseif ($_SESSION['user']['role'] === 'officer') { ?> <!-- Jika role user selain admin -->

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
                            <h4>Dashboard</h4>
                        </div>
                        <div class="card-body">
                            <p>Selamat datang kembali, <?php echo $_SESSION['user']['name'] ?>.</p>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($payments as $payment) { ?>
                                            <tr>
                                                <td><?php echo $iteration++ ?></td>
                                                <th><?php echo $payment['officers_name'] ?? 'Admin' ?></th>
                                                <td><?php echo $payment['student_name'] ?></td>
                                                <td><?php echo $payment['date_payment'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                </div>

        </section>
    </div>

<?php } elseif ($_SESSION['user']['role'] === 'student') { ?> <!-- Jika role user selain admin -->

    <?php

    $payments = [];

    $userId = $_SESSION['user']['id'];

    $query = $connection->execute_query("SELECT 
    payments.id AS payment_id,
    payments.*, students.*, 
    students.name AS student_name, 
    officers.name AS officers_name 
    FROM payments 
    LEFT JOIN students ON payments.student_id = students.id 
    LEFT JOIN officers ON payments.officer_id = officers.id 
    LEFT JOIN users ON students.user_id = users.id 
    WHERE users.id = ?
    ", [$userId]);

    while ($row = $query->fetch_assoc()) {

        array_push($payments, $row);
    }

    ?>

    <div class="navbar-bg"></div>

    <!-- Topbar -->

    <?php topbar() ?>

    <?php sidebar() ?>

    <!-- Main Content -->
    <div class="main-content">

        <section class="section">

            <div class="row">

                <div class="col-12">

                    <div class="<?php echo $user['role'] === 'student' ? 'col-md-12' : 'col-12' ?>">

                        <div class="card">
                            <div class="card-header">
                                <h4>History</h4>
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
                                                            <a href="<?php echo url('payments/detail?id=' . $payment['payment_id']) ?>" class="btn btn-info">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
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
            </div>
        </section>
    </div>

<?php } ?>