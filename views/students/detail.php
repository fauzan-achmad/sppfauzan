<?php
global $connection;

$id = (int) $_GET['id'];

$result = $connection->execute_query("SELECT students.*,
class.name AS class_name,
class.category AS class_category
 FROM students
 JOIN class ON students.class_id = class.id
 WHERE students.id = ?
 LIMIT 1", [$id]);



$student = $result->fetch_assoc();

if (!$student) {

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

            <div class="col-md-7 row-span-2">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Detail Siswa</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>NISN</th>
                                    <td class="border-top border-light">
                                        : <?php echo $student['nisn'] ?? '-' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>NIS</th>
                                    <td class="border-top border-light">
                                        : <?php echo $student['nis'] ? $student['nis'] : '-' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td class="border-top border-light">
                                        : <?php echo $student['name'] ?? '-' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td class="border-top border-light">
                                        : <?php echo $student['address'] ?? '-' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td class="border-top border-light">
                                        : <?php echo $student['gender'] ?? '-' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td class="border-top border-light">
                                        : <?php echo $student['phone'] ?? '-' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td class="border-top border-light">
                                        : <?php echo $student['class_name'] ?? '-' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td class="border-top border-light">
                                        : <?php echo $student['class_category'] ?? '-' ?>
                                    </td>
                                </tr>

                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>

</div>