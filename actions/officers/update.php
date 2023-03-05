<?php

global $connection;


$name = htmlspecialchars($_POST['name'] ?? null);
$username = htmlspecialchars($_POST['username'] ?? null);
$officerId = htmlspecialchars($_POST['officer_id']);
$userId = htmlspecialchars($_POST['user_id']);



$query = $connection->execute_query("UPDATE users SET 
name = '$name', username = '$username'
WHERE id = ?", [$userId]);

$query = $connection->execute_query("UPDATE officers SET 
name = '$name', username = '$username'
WHERE id = ?", [$officerId]);


$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil mengubah data Petugas.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/officers');
die();
