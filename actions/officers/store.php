<?php

global $connection;


$name = htmlspecialchars($_POST['name'] ?? null);
$username = htmlspecialchars($_POST['username'] ?? null);
$password = htmlspecialchars($_POST['password'] ?? null);
$passwordConfirmation = htmlspecialchars($_POST['password_confirmation'] ?? null);
/**
 * Memeriksa konfirmasi kata sandi.
 * 
 */

if ($password !== $passwordConfirmation) {

    $_SESSION['FLASH_MESSAGE']['error'] = [
        'value' => 'Konfirmasi kata sandi tidak sesuai.',
        'called' => false,
    ];

    header('Location: ' . env('APP_URL') . '/officers/create');
    die();
}

$password = password_hash($password, PASSWORD_DEFAULT);




/**
 * Memeriksa unique attribute.
 * 
 */

$checkusername = $connection->execute_query("SELECT * FROM officers WHERE username = ? LIMIT 1", [$username])->fetch_assoc();






if ($checknis || $checkusername) {

    $_SESSION['FLASH_MESSAGE']['error'] = [
        'value' => 'Data Petugas telah terdaftar.',
        'called' => false,
    ];

    header('Location: ' . env('APP_URL') . '/officers/create');
    die();
}

$query = $connection->execute_query("INSERT INTO users (name, username, password, role) VALUES (
    ?, ?, ?, ?
)", [$name, $username, $password, 'officer']);



$userId = $connection->insert_id;

$query = $connection->execute_query("INSERT INTO officers (
    name, username, password, user_id
) VALUES (?, ?, ?, ?)", [$name, $username, $password, $connection->insert_id]);




$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil mendaftarkan Petugas.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/officers');
die();
