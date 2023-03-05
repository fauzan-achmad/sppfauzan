<?php

global $connection;


$name = htmlspecialchars($_POST['name'] ?? null);
$category = htmlspecialchars($_POST['category'] ?? null);
$clasId = htmlspecialchars($_POST['clas_id']);



$query = $connection->execute_query("UPDATE class SET 
name = '$name', category = '$category'
WHERE id = ?", [$clasId]);



$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil mengubah data Kelas.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/class');
die();
