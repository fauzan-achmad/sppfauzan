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

            </div>


        </section>
    </div>

<?php } elseif ($_SESSION['user']['role'] === 'officers') { ?> <!-- Jika role user selain admin -->

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
                    </div>
                </div>

            </div>

        </section>
    </div>

<?php } elseif ($_SESSION['user']['role'] === 'student') { ?> <!-- Jika role user selain admin -->

    <div class="navbar-bg"></div>

    <!-- Topbar -->

    <?php topbar() ?>



    <!-- Main Content -->
    <div class="main-content">

        <section class="section">

            <div class="row">


                <div class="<?php echo $user['role'] === 'employee' ? 'col-md-6' : 'col-12' ?>">

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
                                        <th>kelas</th>
                                        <td class="border-top border-light"><?php echo $user['class_name'] ?> </td>
                                    </tr>
                                    <tr>
                                        <th>kompetensi Keahlian</th>
                                        <td class="border-top border-light"><?php echo $user['class_category'] ?> </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section>
    </div>

<?php } ?>