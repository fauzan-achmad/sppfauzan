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
} ?>

<nav class="navbar navbar-expand-lg  main-navbar">

    <form class="form-inline mr-auto">

        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>

    </form>

    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?php echo asset('img/avatars/default.png') ?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?php echo $_SESSION['user']['name'] ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <a href="<?php echo url('profile') ?>" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>

                <div class="dropdown-divider"></div>


                <a href="<?php echo url('user/change-password') ?>" class="dropdown-item has-icon">
                    <i class="fas fa-key"></i> Ubah Password
                </a>

                <div class="dropdown-divider"></div>

                <form action="<?php echo url('actions/logout') ?>" method="POST">
                    <button type="submit" class="dropdown-item has-icon text-danger d-flex align-items-center">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>

            </div>
        </li>

    </ul>
</nav>