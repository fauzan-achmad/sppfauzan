<?php

global $connection;

/**
 * Mengambil semua siswa.
 * 
 */

$students = [];

$result = $connection->execute_query("SELECT students.*,
class.name AS class_name,
class.category AS class_category
 FROM students
 LEFT JOIN class ON students.class_id = class.id
 ORDER BY students.id DESC");

while ($row = $result->fetch_assoc()) {

    array_push($students, $row);
}


$class = [];

$result1 = $connection->execute_query("SELECT * FROM class ORDER BY id DESC");

while ($row = $result1->fetch_assoc()) {

    array_push($class, $row);
}

$officers = [];

$result2 = $connection->execute_query("SELECT * FROM officers");

while ($row = $result2->fetch_assoc()) {

    array_push($officers, $row);
}

$spps = [];

$result3 = $connection->execute_query("SELECT * FROM spps");

while ($row = $result3->fetch_assoc()) {

    array_push($spps, $row);
}

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
                    <div class="card-header">
                        <h4>Reports</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-8 row-span-2">
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

            <div class="col-md-4 row-span-2">
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
                                            <td><?php echo $iteration++ ?></td>
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

        </div>
    </section>

</div>