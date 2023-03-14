<?php

global $connection;

/**
 * Mengambil semua siswa.
 * 
 */

$q = $_GET['q'] ?? '';

$students = [];

$result = $connection->execute_query("SELECT students.*,
class.name AS class_name,
class.category AS class_category 
 FROM students 
 LEFT JOIN class ON students.class_id = class.id 
 WHERE students.name LIKE '%$q%' OR students.nis LIKE '%$q%' OR class.category LIKE '%$q%' 
 ORDER BY students.id DESC");

while ($row = $result->fetch_assoc()) {

    array_push($students, $row);
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
                        <h4>Daftar siswa</h4>
                        <div class="d-flex align-items-center" style="gap: 1rem;">
                            <form class="d-flex align-items-center" style="gap: 1rem;">
                                <input type="text" class="form-control" name="q" value="<?php echo $_GET['q'] ?? '' ?>" placeholder="Cari siswa . . .">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                            <a href="<?php echo url('students/create') ?>" class="d-block btn btn-primary">
                                <i class="fas fa-plus"></i>
                                <span>Tambah siswa</span>
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
                                        <th>Nis</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Action</th>
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
                                            <td>
                                                <div class="d-flex align-items-center" style="gap: 1rem">
                                                    <a href="<?php echo url('students/detail?id=' . $student['id']) ?>" class="btn btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    |
                                                    <a href="<?php echo url('students/edit?id=' . $student['id']) ?>" class="btn btn-warning">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    |
                                                    <form action="<?php echo url('actions/students/delete') ?>" method="post">
                                                        <input type="hidden" name="user_id" value="<?php echo $student['user_id'] ?>">
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