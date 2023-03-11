<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand   ">
            <a href="<?php echo url('dashboard') ?>">
                <?php echo env('APP_NAME') ?>
            </a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"></a>
        </div>

        <ul class="sidebar-menu" style="margin-top: 1.95rem;">

            <li class="menu-header">Dashboard</li>

            <li class="">
                <a href="<?php echo url('dashboard') ?>" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php if ($_SESSION['user']['role'] === 'admin') { ?>
                <li class="menu-header">Kelola Data</li>

                <li>
                    <a class="nav-link" href="<?php echo url('students') ?>">
                        <i class="fas fa-users"></i>
                        <span>Data Siswa</span>
                    </a>
                </li>


                <li>
                    <a class="nav-link" href="<?php echo url('officers') ?>">
                        <i class="fas fa-users"></i>
                        <span>Data Petugas</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="<?php echo url('class') ?>">
                        <i class="fas fa-school"></i>
                        <span>Data Kelas</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="<?php echo url('spps') ?>">
                        <i class="fa-sharp fas fa-file-invoice-dollar"></i>
                        <span>Data Spp</span>
                    </a>
                </li>

                <li class="menu-header">pembayaran</li>

                <li>
                    <a class="nav-link" href="<?php echo url('payments') ?>">
                        <i class="fas fa-sack-dollar"></i>
                        <span>Transaksi pembayaran</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="<?php echo url('history') ?>">
                        <i class="fas fa-clock-rotate-left"></i>
                        <span>History pembayaran</span>
                    </a>
                </li>

                <li class="menu-header">Laporan</li>

                <li>
                    <a class="nav-link" href="<?php echo url('reports') ?>">
                        <i class="fas fa-file"></i>
                        <span>Laporan</span>
                    </a>
                </li>
            <?php } elseif ($_SESSION['user']['role'] === 'officer') { ?>

                <li class="menu-header">pembayaran</li>

                <li>
                    <a class="nav-link" href="<?php echo url('payments') ?>">
                        <i class="fas fa-sack-dollar"></i>
                        <span>Transaksi pembayaran</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="<?php echo url('history') ?>">
                        <i class="fas fa-clock-rotate-left"></i>
                        <span>History pembayaran</span>
                    </a>
                </li>
            <?php } ?>
        </ul>

    </aside>
</div>