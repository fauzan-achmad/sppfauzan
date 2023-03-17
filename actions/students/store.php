<?php

global $connection;

$nisn = htmlspecialchars($_POST['nisn'] ?? null);
$nis = htmlspecialchars($_POST['nis'] ?? null);
$name = htmlspecialchars($_POST['name'] ?? null);
$phone = htmlspecialchars($_POST['phone'] ?? null);
$address = htmlspecialchars($_POST['address'] ?? null);
$class_id = htmlspecialchars($_POST['class_id'] ?? null);
$gender = htmlspecialchars($_POST['gender'] ?? null);

$username = "S$nis";

// var_dump($username);
// die();

$nis = $nis !== "" ? $nis : null;

$password = password_hash("123456", PASSWORD_DEFAULT);




/**
 * Memeriksa unique attribute.
 * 
 */

$checknisn = $connection->execute_query("SELECT * FROM students WHERE nisn = ? LIMIT 1", [$nisn])->fetch_assoc();

$checknis = $connection->execute_query("SELECT * FROM students WHERE nis = ? LIMIT 1", [$nis])->fetch_assoc();




if ($checknis || $checknisn) {

    $_SESSION['FLASH_MESSAGE']['error'] = [
        'value' => 'Data Murid telah terdaftar.',
        'called' => false,
    ];

    header('Location: ' . env('APP_URL') . '/students/create');
    die();
}

$query = $connection->execute_query("INSERT INTO users (name, username, password, role) VALUES (
    ?, ?, ?, ?
)", [$name, $username, $password, 'student']);

$userId = $connection->insert_id;

$query = $connection->execute_query("INSERT INTO students (
    nisn, nis, name,address, phone, gender, class_id, user_id
) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$nisn, $nis, $name, $address, $phone, $gender, $class_id, $connection->insert_id]);






$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil mendaftarkan Siswa.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/students');
die();
