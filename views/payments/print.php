<?php
global $connection;

$id = (int) $_GET['id'];
$userId = $_SESSION['user']['id'];

$result = $connection->execute_query("SELECT payments.*,
students.name AS student_name,
students.nis AS student_nis,
officers.name AS officer_name,
spps.nominal AS spp_nominal,
class.*, class.id AS class_id, class.name AS class_name, class.category AS class_category, 
users.id AS user_id 
 FROM payments
 LEFT JOIN officers ON payments.officer_id = officers.id
 LEFT JOIN students ON payments.student_id = students.id
 LEFT JOIN class ON students.class_id = class.id
 LEFT JOIN spps ON payments.spp_id = spps.id 
 JOIN users ON students.user_id = users.id 
 WHERE payments.id = ?
 LIMIT 1", [$id]);

$payment = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?php echo asset('img/employee-management.png') ?>" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo asset('modules/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('modules/fontawesome/css/all.min.css') ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo asset('modules/bootstrap-daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('modules/select2/dist/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('modules/jquery-selectric/selectric.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/style.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('css/components.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('css/custom.css') ?>">




    <link rel="icon" href="<?php echo asset('img/bpp.png') ?>">

    <style>
        .container {
            padding: 2rem;
        }

        table {
            width: 100%;
            border-spacing: 0;
            text-align: left;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 0.25rem 0.5rem;
        }
    </style>

    <title></title>
</head>

<body>


    <div class="navbar-bg"></div>


    <!-- Main Content -->
    <div class="main-content">

        <section class="section">

            <div class="row">

                <div class=" col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Pembayaran</h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nis</th>
                                        <td class="border-top border-light"><?php echo $payment['student_nis'] ? $payment['student_nis'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td class="border-top border-light"><?php echo $payment['student_name'] ?? '-' ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <td class="border-top border-light"><?php echo $payment['class_name'] ?? '-' ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Kompetensi Keahlian</th>
                                        <td class="border-top border-light"><?php echo $payment['class_category'] ?? '-' ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Spp</th>
                                        <td class="border-top border-light">RP. <?php echo number_format($payment['spp_nominal']) ?? '-' ?></td>
                                    </tr>

                                </table>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Tanggal Bayar</th>
                                                <th scope="col">Bulan Dibayar</th>
                                                <th scope="col">Nominal</th>
                                                <th scope="col">Sisa Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $literation++ ?></td>
                                                <td><?php echo $payment['date_payment'] ?></td>
                                                <td><?php echo $payment['month_paid'] ?></td>
                                                <td>RP. <?php echo number_format($payment['payment_amount']) ?> </td>
                                                <td><?php echo $payment['remaining_pay'] == 0 ? 'Lunas' : 'Rp. ' . number_format($payment['remaining_pay']) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <br>
                                <div class="col-12 d-flex justify-content">
                                    <b>Petugas : <?php echo $payment['officer_name'] ?? 'Admin' ?></b>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <?php if ($_SESSION['user']['role'] === 'admin') { ?>
                    <script>
                        window.print();

                        window.onafterprint = function() {
                            window.location.href = "<?php echo env('APP_URL') ?>/history";
                        }
                    </script>
                <?php } elseif ($_SESSION['user']['role'] === 'officer') { ?>

                    <script>
                        window.print();

                        window.onafterprint = function() {
                            window.location.href = "<?php echo env('APP_URL') ?>/history";
                        }
                    </script>

                <?php } elseif ($_SESSION['user']['role'] === 'student') { ?>
                    <script>
                        window.print();

                        window.onafterprint = function() {
                            window.location.href = "<?php echo env('APP_URL') ?>/dashboard";
                        }
                    </script>
</body>
<?php } ?>

</html>