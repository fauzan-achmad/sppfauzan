<?php

global $connection;

$classId = htmlspecialchars($_POST['id']);

$query = $connection->execute_query("DELETE FROM class WHERE id = ?", [$classId]);

$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil menghapus data kelas.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/class');
die();
