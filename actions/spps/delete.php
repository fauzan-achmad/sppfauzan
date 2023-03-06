<?php

global $connection;

$sppsId = htmlspecialchars($_POST['id']);

$query = $connection->execute_query("DELETE FROM spps WHERE id = ?", [$sppsId]);

$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil menghapus data spp.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/spps');
die();
