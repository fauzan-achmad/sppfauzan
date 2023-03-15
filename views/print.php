<?php

global $connection;

$transactions = [];

$query = $connection->query("SELECT 
payments.*,
students.*,
students.name AS student_name,
officers.name AS officer_name,
class.* 
FROM payments 
LEFT JOIN students ON students.id = payments.student_id 
LEFT JOIN class ON class.id = students.class_id 
LEFT JOIN officers ON officers.id = payments.officer_id 
ORDER BY payments.id DESC");

while ($row = $query->fetch_assoc()) {

    array_push($transactions, $row);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <div class="container">

        <table>
            <thead>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Nama Kelas</th>
                <th>Nama Petugas</th>
                <th>Jumlah Bayar</th>
                <th>Tanggal Bayar</th>
            </thead>
            <tbody>
                <?php $index = 1 ?>
                <?php foreach ($transactions as $item) { ?>
                    <tr>
                        <td><?php echo $index++ ?></td>
                        <td><?php echo $item['student_name'] ?></td>
                        <td><?php echo $item['name'] ?> - <?php echo $item['category'] ?></td>
                        <td><?php echo $item['officer_name'] ?? 'Admin' ?></td>
                        <td><?php echo 'Rp. ' . number_format($item['payment_amount']) ?></td>
                        <td><?php echo $item['date_payment'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

    <script>
        window.print();

        window.onafterprint = function() {
            window.location.href = "<?php echo env('APP_URL') ?>/reports";
        }
    </script>

</body>

</html>