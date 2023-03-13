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

$result = $connection->execute_query("SELECT * FROM class");

$class = [];
while ($row = $result->fetch_assoc()) {

    array_push($class, $row);
}

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

            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Edit Siswa</h4>
                    </div>
                    <div class="card-body">

                        <?php if (hasFlash('error')) { ?>
                            <div class="alert alert-danger">
                                <?php echo flash('error') ?>
                            </div>
                        <?php } ?>

                        <form action="<?php echo url('actions/students/update') ?>" class="needs-validation row" novalidate="" method="POST">

                            <input type="hidden" name="student_id" value="<?php echo $id ?>">
                            <input type="hidden" name="class_id" value="<?php echo $student['class_id'] ?>">
                            <input type="hidden" name="user_id" value="<?php echo $student['user_id'] ?>">


                            <div class="form-group col-md-6">
                                <label>NISN</label>
                                <input type="text" class="form-control " name="nisn" value="<?php echo $student['nisn'] ?>" required>
                                <div class="invalid-feedback">
                                    Silahkan isi NISN.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>NIS</label>
                                <input type="text" class="form-control " name="nis" value="<?php echo $student['nis'] ?>" required>
                                <div class="invalid-feedback">
                                    Silahkan isi NIS.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nama</label>
                                <input type="text" class="form-control " name="name" value="<?php echo $student['name'] ?>" required>
                                <div class="invalid-feedback">
                                    Silahkan isi Nama.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>kelas</label>
                                <select class="form-control selectric" name="class_id" required>
                                    <option selected disabled><?php echo $student['class_name'] ?> - <?php echo $student['class_category'] ?></option>
                                    <?php foreach ($class as $clas) { ?>
                                        <option value="<?php echo $clas['id'] ?>">
                                            <?php echo $clas['name'] ?> -
                                            <?php echo $clas['category'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan isi pilih kelas.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Telepon</label>
                                <input type="text" class="form-control " name="phone" value="<?php echo $student['phone'] ?>" required>
                                <div class="invalid-feedback">
                                    Silahkan isi Telepon.
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label>Jenis Kelamin</label>
                                <select class="form-control selectric" name="gender" required>
                                    <option selected disabled><?php echo $student['gender'] ?></option>
                                    <option value="Laki-Laki"> Laki - Laki </option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan isi pilih Jenis Kelamin.
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label>Alamat</label>
                                <textarea class="form-control" name="address" rows="3" value="<?php echo $student['address'] ?>" required></textarea>
                                <div class="invalid-feedback">
                                    Silahkan isi Alamat.
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