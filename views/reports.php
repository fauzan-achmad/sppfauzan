<?php

global $connection;

/**
 * Mengambil semua siswa.
 * 
 */

$date = $_GET['date'] ?? '';

$students = [];

$result = $connection->execute_query("SELECT students.*,
class.name AS class_name,
class.category AS class_category
 FROM students
 LEFT JOIN class ON students.class_id = class.id
 WHERE students.created_at >= IF('$date' != '', '$date', CURRENT_DATE())
 ORDER BY students.id DESC");

while ($row = $result->fetch_assoc()) {

    array_push($students, $row);
}

$class = [];

$result1 = $connection->execute_query("SELECT * FROM class WHERE class.created_at >= IF('$date' != '', '$date', CURRENT_DATE())");

while ($row = $result1->fetch_assoc()) {

    array_push($class, $row);
}

$officers = [];

$result2 = $connection->execute_query("SELECT * FROM officers WHERE officers.created_at >= IF('$date' != '', '$date', CURRENT_DATE())");

while ($row = $result2->fetch_assoc()) {

    array_push($officers, $row);
}

$spps = [];

$result3 = $connection->execute_query("SELECT * FROM spps WHERE spps.created_at >= IF('$date' != '', '$date', CURRENT_DATE())");

while ($row = $result3->fetch_assoc()) {

    array_push($spps, $row);
}

$payments = [];

$result = $connection->execute_query("SELECT payments.*,
students.name AS student_name,
officers.name AS officers_name
 FROM payments
 LEFT JOIN students ON payments.student_id = students.id
 LEFT JOIN officers ON payments.officer_id = officers.id 
 WHERE payments.created_at >= IF('$date' != '', '$date', CURRENT_DATE())
 ORDER BY payments.id DESC");

while ($row = $result->fetch_assoc()) {

    array_push($payments, $row);
}



$piteration = 1;
$siteration = 1;
$oiteration = 1;
$iteration = 1;
$citeration = 1;
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
                        <h4>Reports</h4>
                        <div class="d-flex align-items-center" style="gap: 1rem;">
                            <form class="d-flex align-items-center" style="gap: 1rem;">
                                <input type="date" class="form-control" name="date" value="<?php echo $_GET['date'] ?? '' ?>" placeholder="Cari siswa . . .">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 row-span-2">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar siswa</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nis</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($students as $student) { ?>
                                        <tr>
                                            <td><?php echo $iteration++ ?></td>
                                            <th><?php echo $student['nis'] ?></th>
                                            <td><?php echo $student['name'] ?></td>
                                            <td><?php echo $student['class_name'] ?></td>
                                            <td><?php echo $student['class_category'] ?></td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6 row-span-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar petugas</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($officers as $officer) { ?>
                                        <tr>
                                            <td><?php echo $oiteration++ ?></td>
                                            <td><?php echo $officer['name'] ?></td>
                                            <td><?php echo $officer['username'] ?></td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-6">

                <div class="card ">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar kelas</h4>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($class as $clas) { ?>
                                        <tr>
                                            <td><?php echo $citeration++ ?></td>
                                            <td><?php echo $clas['name'] ?></td>
                                            <td><?php echo $clas['category'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar Spp</h4>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($spps as $spp) { ?>
                                        <tr>
                                            <td><?php echo $siteration++ ?></td>
                                            <td><?php echo $spp['year'] ?></td>
                                            <td>RP.<?php echo number_format($spp['nominal']) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>History Pembayaran</h4>

                    </div>
                    <div class="card-body">

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
                                            <td><?php echo $piteration++ ?></td>
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