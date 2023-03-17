<?php

global $connection;

$user = $_SESSION['user'];
$userId = $user['id'];


$result = $connection->execute_query("SELECT students.*,
class.name AS class_name,
class.category AS class_category
 FROM students
 LEFT JOIN users ON students.user_id = users.id
 JOIN class ON students.class_id = class.id
 WHERE users.id = ?
 LIMIT 1", [$userId]);



$student = $result->fetch_assoc();


if (!$student) {

    header('Location: ' . env('APP_URL') . '/404');
    die();
}

?>
<?php if ($_SESSION['user']['role'] === 'admin') { ?>
    <div class="navbar-bg"></div>

    <!-- Topbar -->

    <?php topbar() ?>

    <!-- Sidebar -->
    <?php sidebar() ?>

    <!-- Main Content -->
    <div class="main-content">

        <section class="section">

            <div class="row">

                <div class="col-md-12 col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>Profile</h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama</th>
                                        <td class="border-top border-light"><?php echo $user['name'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td class="border-top border-light"><?php echo $user['username'] ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td class="border-top border-light"><?php echo $user['role'] ?> </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            <?php } elseif ($_SESSION['user']['role'] === 'officer') { ?>
                <div class="navbar-bg"></div>

                <!-- Topbar -->

                <?php topbar() ?>

                <!-- Sidebar -->
                <?php sidebar() ?>

                <!-- Main Content -->
                <div class="main-content">

                    <section class="section">

                        <div class="row">

                            <div class="col-md-12 col-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Nama</th>
                                                    <td class="border-top border-light"><?php echo $user['name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Username</th>
                                                    <td class="border-top border-light"><?php echo $user['username'] ?> </td>
                                                </tr>
                                                <tr>
                                                    <th>Role</th>
                                                    <td class="border-top border-light"><?php echo $user['role'] ?> </td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        <?php } elseif ($_SESSION['user']['role'] === 'student') { ?>
                            <div class="navbar-bg"></div>

                            <!-- Topbar -->

                            <?php topbar() ?>

                            <!-- Sidebar -->
                            <?php sidebar() ?>

                            <!-- Main Content -->
                            <div class="main-content">

                                <section class="section">

                                    <div class="row">

                                        <div class="col-md-12 col-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>User</h4>
                                                </div>
                                                <div class="card-body">



                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>Nama</th>
                                                                <td class="border-top border-light"><?php echo $user['name'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Username</th>
                                                                <td class="border-top border-light"><?php echo $user['username'] ?> </td>
                                                            </tr>

                                                        </table>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12">

                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between align-items-center">
                                                        <h4>Profile</h4>
                                                        <a href="<?php echo url('user/edit') ?>" class="d-block btn btn-primary">
                                                            <i class="fa fa-pen"></i>
                                                            <span>Edit siswa</span>
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php if (hasFlash('error')) { ?>
                                                            <div class="alert alert-danger">
                                                                <?php echo flash('error') ?>
                                                            </div>
                                                        <?php } ?>

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
                                        <?php } ?>

                                        </div>

                                </section>

                            </div>