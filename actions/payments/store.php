<?php

global $connection;

$student_id = htmlspecialchars($_POST['student_id'] ?? null);
$date_payment = htmlspecialchars($_POST['date_payment'] ?? null);
$month_payment = htmlspecialchars($_POST['month_payment'] ?? null);
$year_payment = htmlspecialchars($_POST['year_payment'] ?? null);
$payment_ammount = htmlspecialchars($_POST['payment_ammount'] ?? null);
$user_id = $_SESSION['user']['id'];
$nominal = htmlspecialchars($_POST['nominal'] ?? null);

$query = $connection->execute_query("SELECT * FROM officers WHERE user_id = ?", [$user_id]);
$officer = $query->fetch_assoc();

$query = $connection->execute_query("SELECT * FROM spps WHERE year = ?", [$year_payment]);
$spp = $query->fetch_assoc();

$officerId = $officer['id'];
$sppId = $spp['id'];









$query = $connection->execute_query("INSERT INTO payments (date_payment, month_paid, year_paid, payment_amount, student_id ,officer_id, spp_id) VALUES (
    ?, ?, ?, ?, ?, ?, ?
)", [$date_payment, $month_payment, $year_payment, $payment_ammount, $student_id, $officerId, $sppId]);







$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil menambahkan transaksi.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/history');
die();
