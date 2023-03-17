<?php

global $connection;

$paymentsId = htmlspecialchars($_POST['id']);

$query = $connection->execute_query("DELETE FROM payments WHERE id = ?", [$paymentsId]);

$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil menghapus data Pembayaran.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/history');
die();
