<?php

global $connection;


$name = htmlspecialchars($_POST['name'] ?? null);
$category = htmlspecialchars($_POST['category'] ?? null);



$query = $connection->execute_query("INSERT INTO class (name,category) VALUES (
    ?, ?
)", [$name, $category]);





$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil mendaftarkan Kelas.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/class');
die();
