<?php

global $connection;

$id = (int) $_GET['id'];


$result = $connection->execute_query("SELECT payments.*,
students.name AS student_name,
students.nis AS student_nis,
officers.name AS officer_name,
spps.nominal AS spp_nominal,
class.*, class.id AS class_id, class.name AS class_name, class.category AS class_category
 FROM payments
 LEFT JOIN officers ON payments.officer_id = officers.id
 LEFT JOIN students ON payments.student_id = students.id
 LEFT JOIN class ON students.class_id = class.id
 LEFT JOIN spps ON payments.spp_id = spps.id
 WHERE payments.id = ?
 LIMIT 1", [$id]);



$payment = $result->fetch_assoc();

if (!$payment) {

    header('Location: ' . env('APP_URL') . '/404');
    die();
}

$literation = 1;
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
                                    <td class="border-top border-light"><?php echo $payment['spp_nominal'] ?? '-' ?></td>
                                </tr>

                            </table>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tanggal Bayar</th>
                                            <th scope="col">Nominal</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $literation++ ?></td>
                                            <td><?php echo $payment['date_payment'] ?></td>
                                            <td>RP. <?php echo number_format($payment['payment_amount']) ?> </td>
                                            <td><?php echo $payment['month_paid'] ?></td>
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