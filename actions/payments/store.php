<?php

global $connection;

$student_id = htmlspecialchars($_POST['student_id'] ?? null);
$date_payment = htmlspecialchars($_POST['date_payment'] ?? null);
$month_payment = htmlspecialchars($_POST['month_payment'] ?? null);
$year_payment = htmlspecialchars($_POST['year_payment'] ?? null);
$payment_ammount = htmlspecialchars($_POST['payment_ammount'] ?? null);
$payment_ammount = (int) str_replace(',', '', $payment_ammount);
$user_id = $_SESSION['user']['id'];
$nominal = htmlspecialchars($_POST['nominal'] ?? null);

$query = $connection->execute_query("SELECT * FROM officers WHERE user_id = ?", [$user_id]);
$officer = $query->fetch_assoc();

$query = $connection->execute_query("SELECT * FROM spps WHERE year = ?", [$year_payment]);
$spp = $query->fetch_assoc();

$query = $connection->execute_query("SELECT * FROM payments WHERE student_id = ? AND year_paid = ? ORDER BY payments.id DESC LIMIT 1", [$student_id, $year_payment]);
$payment = $query->fetch_assoc();

$officerId = $officer['id'];
$sppId = $spp['id'];

$remainingPay = $payment ? $payment['remaining_pay'] - $payment_ammount : $spp['nominal'] - $payment_ammount;

if ($payment && $payment['remaining_pay'] == 0) {
    $_SESSION['FLASH_MESSAGE']['error'] = [
        'value' => 'Pembayaran sudah lunas.',
        'called' => false,
    ];

    header('Location: ' . env('APP_URL') . '/payments');
    die();
}

if (strtotime($date_payment) <= strtotime(date('Y-m-d'))) {
    $_SESSION['FLASH_MESSAGE']['error'] = [
        'value' => 'Tanggal Sudah Terlewat.',
        'called' => false,
    ];

    header('Location: ' . env('APP_URL') . '/payments');
    die();
}

$query = $connection->execute_query("INSERT INTO payments (date_payment, month_paid, year_paid, payment_amount, student_id ,officer_id, spp_id, remaining_pay) VALUES (
    ?, ?, ?, ?, ?, ?, ?, ?
)", [$date_payment, $month_payment, $year_payment, $payment_ammount, $student_id, $officerId, $sppId, $remainingPay]);


$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil menambahkan transaksi.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/history');
die();
