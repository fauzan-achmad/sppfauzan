<?php

global $connection;

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

/**
 * Cek apakah username sudah terdaftar atau belum.
 * 
 */

$result = $connection->execute_query("SELECT * FROM users WHERE username = ? LIMIT 1", [$username]);
$user = $result->fetch_assoc();

if (!$user) {

    $_SESSION['FLASH_MESSAGE']['error'] = [
        'value' => 'username yang anda masukan belum terdaftar.',
        'called' => false,
    ];

    header('Location: ' . env('APP_URL') . '/login');
    die();
}

/**
 * Cek apakah kata sandi betul atau salah.
 * 
 */

$checkPassword = password_verify($password, $user['password']);

if (!$checkPassword) {

    $_SESSION['FLASH_MESSAGE']['error'] = [
        'value' => 'Kata sandi yang anda masukan salah.',
        'called' => false,
    ];

    header('Location: ' . env('APP_URL') . '/login');
    die();
}

$_SESSION['user'] = $user;

header('Location: ' . env('APP_URL'));
die();
