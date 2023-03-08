<?php

global $connection;

$user = $_SESSION['user'];
$userId = $user['id'];


$old_password = htmlspecialchars($_POST['old_password'] ?? null);
$password = htmlspecialchars($_POST['password'] ?? null);
$passwordConfirmation = htmlspecialchars($_POST['password_confirmation'] ?? null);

$checkpassword = password_verify($old_password, $user['password']);

/**s
 * 
 * Memeriksa apakah Pasword Lama Sesuai
 */
if (!$checkpassword) {

    $_SESSION['FLASH_MESSAGE']['error'] = [
        'value' => 'kata sandi lama tidak sesuai.',
        'called' => false,
    ];

    header('Location: ' . env('APP_URL') . '/students/change-password');
    die();
}

/**
 * Memeriksa konfirmasi kata sandi.
 * 
 */

if ($password !== $passwordConfirmation) {

    $_SESSION['FLASH_MESSAGE']['error'] = [
        'value' => 'Konfirmasi kata sandi tidak sesuai.',
        'called' => false,
    ];

    header('Location: ' . env('APP_URL') . '/students/change-password');
    die();
}

$password = password_hash($password, PASSWORD_DEFAULT);

$query = $connection->execute_query("UPDATE users SET 
        password = '$password'
        WHERE id = ?", [$userId]);


$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil Mengubah Password.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/dashboard');
die();
